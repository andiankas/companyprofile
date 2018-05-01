<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Berita extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('berita_model'); //load database
		$this->load->model('kategori_model'); //load database
	}
	public function index()
	{
		// listing data berita
		$berita = $this->berita_model->listing();
		$data = array(
		'title'			=>		'Data Berita Administrator ('.count($berita).')',
		'berita'		 	=>		$berita,
		'isi'			=>		'admin/berita/list');
		$this->load->view('admin/layout/wrapper', $data );
	}
	// Tambah
	public function tambah()
		{
		$kategori = $this->kategori_model->listing();
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('judul_berita','Judul Berita','required',
											array( 'required'		=>		'%s harus diisi'));
		$valid->set_rules('isi_berita','Isi Berita','required',
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
					'title'			=>		'Tambah Berita',
					'kategori' 		=>		 $kategori,
					'error_upload' 	=>		$this->upload->display_errors(),
					'isi'			=>		'admin/berita/tambah');
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
			'id_kategori'				=>	$i->post('id_kategori'),
			'slug_berita'				=>	 $slug = url_title($this->input->post('judul_berita'), 'dash', TRUE),
			'judul_berita'				=>	$i->post('judul_berita'),
			'isi_berita'				=>	$i->post('isi_berita'),
			'gambar'					=>	$upload_data['uploads']['file_name'],
			'status_berita'				=>	$i->post('status_berita'),
			'jenis_berita'				=>	$i->post('jenis_berita'),
			'keywords'					=>	$i->post('keywords'),
			'tanggal_post'				=>	date('Y-m-d H:i:s'));

			$this->berita_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Berita telah berhasil ditambah');
			redirect(base_url('admin/berita'),'refresh');
		}}
		// end masuk database

		$data = array(
				'title'			=>		'Tambah Berita',
				'kategori' 		=>		 $kategori,
				'isi'			=>		'admin/berita/tambah'
			);
			$this->load->view('admin/layout/wrapper', $data );
	}
	// edit
	public function edit($id_berita)
		{
		$berita 	= $this->berita_model->detail($id_berita);
		$kategori 	= $this->kategori_model->listing();
		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('judul_berita','Judul Berita','required',
											array( 'required'		=>		'%s harus diisi'));
		$valid->set_rules('isi_berita','Isi Berita','required',
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
					'title'			=>		'Edit Berita',
					'kategori' 		=>		 $kategori,
					'kategori' 		=>		 $berita,
					'error_upload' 	=>		$this->upload->display_errors(),
					'isi'			=>		'admin/berita/edit');
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
			if ($berita->gambar != "") {
				unlink('./assets/upload/image/'.$berita->gambar);
				unlink('./assets/upload/image/thumbs/'.$berita->gambar);
			}

			$data = array(
			'id_berita'					=>	$id_berita,
			'id_kategori'				=>	$i->post('id_kategori'),
			'slug_berita'				=>	 $slug = url_title($this->input->post('judul_berita'), 'dash', TRUE),
			'judul_berita'				=>	$i->post('judul_berita'),
			'isi_berita'				=>	$i->post('isi_berita'),
			'gambar'					=>	$upload_data['uploads']['file_name'],
			'status_berita'				=>	$i->post('status_berita'),
			'jenis_berita'				=>	$i->post('jenis_berita'),
			'keywords'					=>	$i->post('keywords'));

			$this->berita_model->edit($data);
			$this->session->set_flashdata('sukses', 'Berita telah berhasil ditambah');
			redirect(base_url('admin/berita'),'refresh');
		}}else {
			// update berita tanpa ganti gambar baru
			$i = $this->input;

			$data = array(
			'id_berita'					=>	$id_berita,
			'id_kategori'				=>	$i->post('id_kategori'),
			'slug_berita'				=>	 $slug = url_title($this->input->post('judul_berita'), 'dash', TRUE),
			'judul_berita'				=>	$i->post('judul_berita'),
			'isi_berita'				=>	$i->post('isi_berita'),
			'status_berita'				=>	$i->post('status_berita'),
			'jenis_berita'				=>	$i->post('jenis_berita'),
			'keywords'					=>	$i->post('keywords'));

			$this->berita_model->edit($data);
			$this->session->set_flashdata('sukses', 'Berita telah berhasil ditambah');
			redirect(base_url('admin/berita'),'refresh');
		}}
		// end masuk database

		$data = array(
				'title'			=>		'Edit Berita',
				'kategori' 		=>		 $kategori,
				'berita' 		=>		 $berita,
				'isi'			=>		'admin/berita/edit'
			);
			$this->load->view('admin/layout/wrapper', $data );
	}
	public function delete($id_berita)
	{
		// proteksi delete
		$this->check_login->check();
		$berita = $this->berita_model->detail($id_berita);
		// delete gambar
		if ($berita->gambar != "") {
			unlink('./assets/upload/image/'.$berita->gambar);
			unlink('./assets/upload/image/thumbs/'.$berita->gambar);
		}
		// end delete gambar
		$data = array('id_berita' 	=>	$berita->id_berita);
		$this->berita_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah berhasil dihapus');
		redirect(base_url('admin/berita'),'refresh');
	}
}
/* End of file Berita.php */
/* Location: ./application/controllers/admin/Berita.php */