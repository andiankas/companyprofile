<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check_login
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	// check login
	public function check()
	{
		if ($this->ci->session->userdata('username') == "" && $this->ci->session->userdata('akses_level') == "") {
			$this->ci->session->set_flashdata('sukses', 'Anda belum login');
			redirect(base_url('login'),'refresh');
		}
	}

	// check logout
	public function logout()
	{
		$this->ci->session->set_userdata('id_user');
		$this->ci->session->unset_userdata('username');
		$this->ci->session->unset_userdata('nama');
		$this->ci->session->unset_userdata('akses_level');
				
		$this->ci->session->set_flashdata('sukses', 'Berhasil logout');
		redirect(base_url('login'),'refresh');
	}

}

/* End of file Check_login.php */
/* Location: ./application/libraries/Check_login.php */
