<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function index()
	{	
		// Mainn page berita
		$data = array(
			'title' 	=>		'About',
			'isi' 		=>		'profile/list' 
		);
		$this->load->view('layout/wrapper', $data);		
	}

}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */