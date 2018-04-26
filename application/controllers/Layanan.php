<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {

	public function index()
	{	
		// Mainn page berita
		$data = array(
			'title' 	=>		'Services',
			'isi' 		=>		'layanan/list' 
		);
		$this->load->view('layout/wrapper', $data);		
	}

}

/* End of file Layanan.php */
/* Location: ./application/controllers/Layanan.php */