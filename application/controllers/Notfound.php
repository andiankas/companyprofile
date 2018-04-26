<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notfound extends CI_Controller {

	public function index()
	{	
		// Mainn page contact
		$data = array(
			'title' 	=>		'Page Not Found',
			'isi' 		=>		'notfound/list' 
		);
		$this->load->view('layout/wrapper', $data);		
	}

}

/* End of file Notfound.php */
/* Location: ./application/controllers/Notfound.php */