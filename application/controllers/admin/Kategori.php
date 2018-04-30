<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('kategori_model');
	}

	public function index()
	{
		$kategori = $this->kategori_model->listing();
		// validasi
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'trim|required|is_unique[kategori.nama_kategori]', 
			array(
				'required' => '%s harus diisi',
				'is_unique' => '%s <strong>'.$this->input->post('nama_kategori').'</strong> sudah ada. Silahkan buat kategori baru.'
			));
		if ($this->form_validation->run() == FALSE ) { //jika validasi FALSE, tetap pada halaman itu
			// end validasi
			$data = array(
				'title'			=>	'Data Kategori Berita('.count($kategori).')',
				'kategori' 		=>	$kategori,
				'isi' 			=>	'admin/kategori/list' 
			);

			$this->load->view('admin/layout/wrapper', $data);
		}else { // jika validasi TRUE, maka input to database
			
			$i = $this->input;

			$slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);

			$data = array(
				'slug_kategori' 			=>	$slug_kategori,
				'nama_kategori'				=>	$i->post('nama_kategori'), 
				'urutan'					=>	$i->post('urutan'));

			$this->kategori_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah berhasil ditambah');
			redirect(base_url('admin/kategori'),'refresh');
		}

	}

	public function edit($id_kategori)
	{
		$kategori = $this->kategori_model->detail($id_kategori);
		// validasi
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'trim|required', 
			array(
				'required' => '%s harus diisi'
			));

		if ($this->form_validation->run() == FALSE ) { //jika validasi FALSE, tetap pada halaman itu
			// end validasi
			$data = array(
				'title'			=>	'Edit Kategori Berita',
				'kategori' 		=>	$kategori,
				'isi' 			=>	'admin/kategori/edit' 
			);

			$this->load->view('admin/layout/wrapper', $data);
		}else { // jika validasi TRUE, maka input to database
			
			$i = $this->input;

			$slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);

			$data = array(
				'id_kategori' 				=>	$id_kategori,
				'slug_kategori' 			=>	$slug_kategori,
				'nama_kategori'				=>	$i->post('nama_kategori'), 
				'urutan'					=>	$i->post('urutan'));

			$this->kategori_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah berhasil diupdate');
			redirect(base_url('admin/kategori'),'refresh');
		}

	}

	public function delete($id_kategori)
	{
		// proteksi delete
		$this->check_login->check();

		$kategori = $this->kategori_model->detail($id_kategori);
		$data = array('id_kategori' 	=>	$kategori->id_kategori);
		$this->kategori_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah berhasil dihapus');
		redirect(base_url('admin/kategori'),'refresh');
	}

}

/* End of file Kategori.php */
/* Location: ./application/controllers/admin/Kategori.php */