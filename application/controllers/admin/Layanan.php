<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Layanan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('layanan_model'); //load database
		
	}
	public function index()
	{
		// listing data layanan
		$layanan = $this->layanan_model->listing();
		$data = array(
		'title'			=>		'Data Layanan Administrator ('.count($layanan).')',
		'layanan'		 	=>		$layanan,
		'isi'			=>		'admin/layanan/list');
		$this->load->view('admin/layout/wrapper', $data );
	}
	// Tambah
	public function tambah()
		{
		
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('judul_layanan','Judul Layanan','required',
											array( 'required'		=>		'%s harus diisi'));
		$valid->set_rules('isi_layanan','Isi Layanan','required',
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
					'title'			=>		'Tambah Layanan',
					// 'kategori' 		=>		 $kategori,
					'error_upload' 	=>		$this->upload->display_errors(),
					'isi'			=>		'admin/layanan/tambah');
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
			'slug_layanan'				=>	 $slug = url_title($this->input->post('judul_layanan'), 'dash', TRUE),
			'judul_layanan'				=>	$i->post('judul_layanan'),
			'isi_layanan'				=>	$i->post('isi_layanan'),
			'gambar'					=>	$upload_data['uploads']['file_name'],
			'status_layanan'			=>	$i->post('status_layanan'),
			'harga'						=>	$i->post('harga'),
			'keywords'					=>	$i->post('keywords'),
			'tanggal_post'				=>	date('Y-m-d H:i:s'));

			$this->layanan_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Layanan telah berhasil ditambah');
			redirect(base_url('admin/layanan'),'refresh');
		}}
		// end masuk database

		$data = array(
				'title'			=>		'Tambah Layanan',
				// 'kategori' 		=>		 $kategori,
				'isi'			=>		'admin/layanan/tambah'
			);
			$this->load->view('admin/layout/wrapper', $data );
	}
	// edit
	public function edit($id_layanan)
		{
		$layanan 	= $this->layanan_model->detail($id_layanan);
		// $kategori 	= $this->kategori_model->listing();
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('judul_layanan','Judul Layanan','required',
											array( 'required'		=>		'%s harus diisi'));
		$valid->set_rules('isi_layanan','Isi Layanan','required',
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
					'title'			=>		'Edit Layanan',
					// 'kategori' 		=>		 $kategori,
					'kategori' 		=>		 $layanan,
					'error_upload' 	=>		$this->upload->display_errors(),
					'isi'			=>		'admin/layanan/edit');
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
			if ($layanan->gambar != "") {
				unlink('./assets/upload/image/'.$layanan->gambar);
				unlink('./assets/upload/image/thumbs/'.$layanan->gambar);
			}

			$data = array(
			'id_layanan'					=>	$id_layanan,
			'id_user'					=>	$this->session->userdata('id_user'),
			'slug_layanan'				=>	 $slug = url_title($this->input->post('judul_layanan'), 'dash', TRUE),
			'judul_layanan'				=>	$i->post('judul_layanan'),
			'isi_layanan'				=>	$i->post('isi_layanan'),
			'gambar'					=>	$upload_data['uploads']['file_name'],
			'status_layanan'			=>	$i->post('status_layanan'),
			'harga'						=>	$i->post('harga'),
			'keywords'					=>	$i->post('keywords'));
			$this->layanan_model->edit($data);
			$this->session->set_flashdata('sukses', 'Layanan telah berhasil ditambah');
			redirect(base_url('admin/layanan'),'refresh');
		}}else {
			// update layanan tanpa ganti gambar baru
			$i = $this->input;

			$data = array(
			'id_layanan'					=>	$id_layanan,
			'id_user'					=>	$this->session->userdata('id_user'),
			'slug_layanan'				=>	 $slug = url_title($this->input->post('judul_layanan'), 'dash', TRUE),
			'judul_layanan'				=>	$i->post('judul_layanan'),
			'isi_layanan'				=>	$i->post('isi_layanan'),
			// 'gambar'					=>	$upload_data['uploads']['file_name'],
			'status_layanan'			=>	$i->post('status_layanan'),
			'harga'						=>	$i->post('harga'),
			'keywords'					=>	$i->post('keywords'));

			$this->layanan_model->edit($data);
			$this->session->set_flashdata('sukses', 'Layanan telah berhasil ditambah');
			redirect(base_url('admin/layanan'),'refresh');
		}}
		// end masuk database

		$data = array(
				'title'			=>		'Edit Layanan',
				// 'kategori' 		=>		 $kategori,
				'layanan' 		=>		 $layanan,
				'isi'			=>		'admin/layanan/edit'
			);
			$this->load->view('admin/layout/wrapper', $data );
	}
	public function delete($id_layanan)
	{
		// proteksi delete
		$this->check_login->check();
		$layanan = $this->layanan_model->detail($id_layanan);
		// delete gambar
		if ($layanan->gambar != "") {
			unlink('./assets/upload/image/'.$layanan->gambar);
			unlink('./assets/upload/image/thumbs/'.$layanan->gambar);
		}
		// end delete gambar
		$data = array('id_layanan' 	=>	$layanan->id_layanan);
		$this->layanan_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah berhasil dihapus');
		redirect(base_url('admin/layanan'),'refresh');
	}
}
/* End of file Layanan.php */
/* Location: ./application/controllers/admin/Layanan.php */