<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('berita_model'); //load model
		$this->load->library('pagination'); //load library pagination
	}

	public function index()
	{	
		$konfigurasi = $this->konfigurasi_model->listing();

		// listing berita dengan pagination
		$this->load->library('pagination');

		$config['base_url'] 	= base_url('berita/index/');
		$config['total_rows'] 	= count($this->berita_model->total());
		$config['per_page'] 	= 3;
		$config['uri_segment'] 	= 3;

		// limit dan start
		$limit 	=	$config['per_page'];
		$start 	=	$this->uri->segment(3) ? ($this->uri->segment(3)) : 0;
		// end limit start
		$this->pagination->initialize($config);

		$berita = $this->berita_model->berita($limit,$start);
		// end listing berita dengan pagination

		// Main page berita
		$data = array(
			'title' 		=>		'Berita - '.$konfigurasi->namaweb,
			'deskripsi' 	=> 		'Berita'.$konfigurasi->deskripsi,
			'keywords' 		=> 		'Berita'.$konfigurasi->keywords,
			'paginasi' 		=> 		$this->pagination->create_links(),
			'berita' 		=>		$berita, 
			'isi' 			=>		'berita/list' 
		);

		$this->load->view('layout/wrapper', $data);		
	}

	// Detail page berita
	public function read(){
		$data = array(
			'title' 	=>		'Berita',
			'isi' 		=>		'berita/read' 
		);
		$this->load->view('layout/wrapper', $data);
	}

}

/* End of file Berita.php */
/* Location: ./application/controllers/Berita.php */