<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('user_model');
	}

	public function index()
	{	

		// validasi
		$valid = $this->form_validation;
		$valid->set_rules('username','Username','required|trim|min_length[4]|max_length[12]',
			array( 'required'		=>		'%s harus diisi',
					'min_length'	=>		'%s minimal 4 karakter',
					'max_length'	=>		'%s maksimal 12 karakter'));

		$valid->set_rules('password','Password','required|trim|min_length[4]',
			array( 'required'		=>		'%s harus diisi',
					'min_length'	=>		'%s minimal 4 karakter'));

		if ($valid->run()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$check_login = $this->user_model->login($username,$password);
			// jika ada data yang cocok, maka create SESSION
			if (count($check_login) == 1) {
				$this->session->set_userdata('id_user',$check_login->id_user);
				$this->session->set_userdata('username',$check_login->username);
				$this->session->set_userdata('nama',$check_login->nama);
				$this->session->set_userdata('akses_level',$check_login->akses_level);
				
				$this->session->set_flashdata('sukses', 'Berhasil Login');
				redirect(base_url('admin/dashboard'),'refresh');


			}else { //jika tidak ada, maka rederict ke login kembali1
				
				$this->session->set_flashdata('sukses', 'Username atau password salah');
				redirect(base_url('login'),'refresh');
			}
		}
		// end validasi
		
		$data = array(
			'title' 	=>		'Login Administrator'
			
		);

		$this->load->view('admin/login/list', $data);		
	}

	public function logout()
	{
		$this->check_login->logout();
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */