<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function index()
	{	
		// Mainn page berita
		$data = array(
			'title' 	=>		'Berita',
			'isi' 		=>		'berita/list' 
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