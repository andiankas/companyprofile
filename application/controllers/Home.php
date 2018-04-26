<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data = array(
			'title' 	=>		'MassiveUp - Creative Creator',
			'isi' 		=>		'home/list' 
		);
		$this->load->view('layout/wrapper', $data);		
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */