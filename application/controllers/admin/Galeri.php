<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Galeri extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('galeri_model'); //load model
		
	}
	public function index()
	{
		// listing data galeri
		$galeri = $this->galeri_model->listing();

		$data = array(
		'title'				=>		'Data Galeri Administrator ('.count($galeri).')',
		'galeri'		 	=>		$galeri,
		'isi'				=>		'admin/galeri/list'
		);

		$this->load->view("admin/layout/wrapper", $data);
	}
	// Tambah
	public function tambah()
		{
		
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('judul_galeri','Judul Galeri','required',
											array( 'required'		=>		'%s harus diisi'));
		$valid->set_rules('isi_galeri','Isi Galeri','required',
											array( 'required'		=>		'%s harus diisi'));
		
		// End validasi
		if ($valid->run()) { //jika validasi berjalan, maka..
			
			$config['upload_path']          = './assets/upload/image/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 5000; //kb
			$config['max_width']            = 5000; //px
			$config['max_height']           = 5000; //px
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('gambar')){
			$data = array(
					'title'			=>		'Tambah Galeri',
					// 'kategori' 		=>		 $kategori,
					'error_upload' 	=>		$this->upload->display_errors(),
					'isi'			=>		'admin/galeri/tambah');
			$this->load->view('admin/layout/wrapper', $data );
		}else { 
			
			// proses manipulasi gambar
					$upload_data = array('uploads'	=>	$this->upload->data());
			// gambar asli disimpan di folder assets/upload/image
			//lalu gambar asli itu di copy untuk versi mini size ke folder assets/upload/image/thumbs
					$config['image_library'] 	= 'gd2';
					$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name'];
			// gambar versi kecil dipindahkan
					$config['new_image']		= './assets/upload/image/thumbs/'.$upload_data['uploads']['file_name'];
			// gambar versi kecil dipindahkan
					$config['create_thumb'] 	= TRUE;
					$config['maintain_ratio'] 	= TRUE;
					$config['width']         	= 200;
					$config['height']       	= 200;
					$config['thumb_marker']     = '';

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			// input ke database
			$i = $this->input;
			$data = array(
			'id_user'					=>	$this->session->userdata('id_user'),
			// 'slug_galeri'				=>	 $slug = url_title($this->input->post('judul_galeri'), 'dash', TRUE),
			'judul_galeri'				=>	$i->post('judul_galeri'),
			'isi_galeri'				=>	$i->post('isi_galeri'),
			'gambar'					=>	$upload_data['uploads']['file_name'],
			'posisi_galeri'			=>	$i->post('posisi_galeri'),
			'website'						=>	$i->post('website'),
			'tanggal_post'				=>	date('Y-m-d H:i:s'));

			$this->galeri_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Galeri telah berhasil ditambah');
			redirect(base_url('admin/galeri'),'refresh');
		}}
		// end masuk database

		$data = array(
				'title'			=>		'Tambah Galeri',
				// 'kategori' 		=>		 $kategori,
				'isi'			=>		'admin/galeri/tambah'
			);
			$this->load->view('admin/layout/wrapper', $data );
	}
	// edit
	public function edit($id_galeri)
		{
		$galeri 	= $this->galeri_model->detail($id_galeri);
		// $kategori 	= $this->kategori_model->listing();
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('judul_galeri','Judul Galeri','required',
											array( 'required'		=>		'%s harus diisi'));
		$valid->set_rules('isi_galeri','Isi Galeri','required',
											array( 'required'		=>		'%s harus diisi'));
		
		// End validasi
		if ($valid->run()) { //jika validasi berjalan, maka..
			// kalau tidak mengganti gambar
			if (!empty($_FILES['gambar']['name'])) {
				
			
			$config['upload_path']          = './assets/upload/image/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 5000; //kb
			$config['max_width']            = 5000; //px
			$config['max_height']           = 5000; //px
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('gambar')){
			$data = array(
					'title'			=>		'Edit Galeri',
					// 'kategori' 		=>		 $kategori,
					'kategori' 		=>		 $galeri,
					'error_upload' 	=>		$this->upload->display_errors(),
					'isi'			=>		'admin/galeri/edit');
			$this->load->view('admin/layout/wrapper', $data );
		}else { 
			
			// proses manipulasi gambar
					$upload_data = array('uploads'	=>	$this->upload->data());
			// gambar asli disimpan di folder assets/upload/image
			//lalu gambar asli itu di copy untuk versi mini size ke folder assets/upload/image/thumbs
					$config['image_library'] 	= 'gd2';
					$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name'];
			// gambar versi kecil dipindahkan
					$config['new_image']		= './assets/upload/image/thumbs/'.$upload_data['uploads']['file_name'];
			// gambar versi kecil dipindahkan
					$config['create_thumb'] 	= TRUE;
					$config['maintain_ratio'] 	= TRUE;
					$config['width']         	= 200;
					$config['height']       	= 200;
					$config['thumb_marker']     = '';

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			// input ke database
			$i = $this->input;

			// end hapus gambar 
			if ($galeri->gambar != "") {
				unlink('./assets/upload/image/'.$galeri->gambar);
				unlink('./assets/upload/image/thumbs/'.$galeri->gambar);
			}

			$data = array(
			'id_galeri'					=>	$id_galeri,
			'id_user'					=>	$this->session->userdata('id_user'),
			// 'slug_galeri'				=>	 $slug = url_title($this->input->post('judul_galeri'), 'dash', TRUE),
			'judul_galeri'				=>	$i->post('judul_galeri'),
			'isi_galeri'				=>	$i->post('isi_galeri'),
			'gambar'					=>	$upload_data['uploads']['file_name'],
			'posisi_galeri'			=>	$i->post('posisi_galeri'),
			'website'						=>	$i->post('website'));
			$this->galeri_model->edit($data);
			$this->session->set_flashdata('sukses', 'Galeri telah berhasil ditambah');
			redirect(base_url('admin/galeri'),'refresh');
		}}else {
			// update galeri tanpa ganti gambar baru
			$i = $this->input;

			$data = array(
			'id_galeri'					=>	$id_galeri,
			'id_user'					=>	$this->session->userdata('id_user'),
			// 'slug_galeri'				=>	 $slug = url_title($this->input->post('judul_galeri'), 'dash', TRUE),
			'judul_galeri'				=>	$i->post('judul_galeri'),
			'isi_galeri'				=>	$i->post('isi_galeri'),
			// 'gambar'					=>	$upload_data['uploads']['file_name'],
			'posisi_galeri'			=>	$i->post('posisi_galeri'),
			'website'						=>	$i->post('website'));

			$this->galeri_model->edit($data);
			$this->session->set_flashdata('sukses', 'Galeri telah berhasil ditambah');
			redirect(base_url('admin/galeri'),'refresh');
		}}
		// end masuk database

		$data = array(
				'title'			=>		'Edit Galeri',
				// 'kategori' 		=>		 $kategori,
				'galeri' 		=>		 $galeri,
				'isi'			=>		'admin/galeri/edit'
			);
			$this->load->view('admin/layout/wrapper', $data );
	}
	public function delete($id_galeri)
	{
		// proteksi delete
		$this->check_login->check();
		$galeri = $this->galeri_model->detail($id_galeri);
		// delete gambar
		if ($galeri->gambar != "") {
			unlink('./assets/upload/image/'.$galeri->gambar);
			unlink('./assets/upload/image/thumbs/'.$galeri->gambar);
		}
		// end delete gambar
		$data = array('id_galeri' 	=>	$galeri->id_galeri);
		$this->galeri_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah berhasil dihapus');
		redirect(base_url('admin/galeri'),'refresh');
	}
}
/* End of file Galeri.php */
/* Location: ./application/controllers/admin/Galeri.php */