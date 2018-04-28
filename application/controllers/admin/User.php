<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('user_model'); //load database
	}

	public function index()
	{
		// listing data user
		$user = $this->user_model->listing();
		$data = array(
			'title'			=>		'Data User Administrator ('.count($user).')',
			'user'		 	=>		$user,
			'isi'			=>		'admin/user/list' 
		);

		$this->load->view('admin/layout/wrapper', $data );
	}

	// Tambah
	public function tambah()
	{	

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required',
			array( 'required'		=>		'%s harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
			array( 'required'		=>		'%s harus diisi',
					'valid_email'	=>		'Format %s tidak valid'));

		$valid->set_rules('username','Username','required|trim|min_length[4]|max_length[12]|is_unique[user.username]',
			array( 'required'		=>		'%s harus diisi',
					'min_length'	=>		'%s minimal 4 karakter',
					'max_length'	=>		'%s maksimal 12 karakter',
					'is_unique'		=>		'%s <strong>'.$this->input->post('username').'</strong> sudah terpakai. Silahkan buat %s baru.'));

		$valid->set_rules('password','Password','required|trim|min_length[4]',
			array( 'required'		=>		'%s harus diisi',
					'min_length'	=>		'%s minimal 4 karakter'));
		// End validasi

		if ($valid->run() === FALSE) { //jika validasi error, maka..
			
			$data = array(
				'title'			=>		'Tambah Data Administrator',
				'isi'			=>		'admin/user/tambah' 
			);
			$this->load->view('admin/layout/wrapper', $data );
		}else { //jika validasi TRUE, maka..
			// input ke database
			$i = $this->input;
			$data = array(
				'nama'				=>	$i->post('nama'), 
				'email'				=>	$i->post('email'), 
				'username'			=>	$i->post('username'), 
				'password'			=>	sha1($i->post('password')), 
				'akses_level'		=>	$i->post('akses_level')
			);

			$this->user_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah berhasil ditambah');
			redirect(base_url('admin/user'),'refresh');
		}

	}


	// edit
	public function edit($id_user)
	{	
		$user = $this->user_model->detail($id_user);

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required',
			array( 'required'		=>		'%s harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
			array( 'required'		=>		'%s harus diisi',
					'valid_email'	=>		'Format %s tidak valid'));

		$valid->set_rules('password','Password','required|trim|min_length[4]',
			array( 'required'		=>		'%s harus diisi',
					'min_length'	=>		'%s minimal 4 karakter'));
		// End validasi

		if ($valid->run() === FALSE) { //jika validasi error, maka..
			
			$data = array(
				'title'			=>		'Edit User Administrator : '.$user->nama,
				'user'			=>		$user, 
				'isi'			=>		'admin/user/edit' 
			);
			$this->load->view('admin/layout/wrapper', $data );
		}else { //jika validasi TRUE, maka..
			// input ke database
			$i = $this->input;
			$data = array(
				'id_user'			=>	$id_user, 
				'nama'				=>	$i->post('nama'), 
				'email'				=>	$i->post('email'), 
				'username'			=>	$i->post('username'), 
				'password'			=>	sha1($i->post('password')), 
				'akses_level'		=>	$i->post('akses_level')
			);

			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah berhasil diupdate');
			redirect(base_url('admin/user'),'refresh');
		}

	}

	public function delete($id_user)
	{
		$user = $this->user_model->detail($id_user);
		$data = array('id_user' 	=>	$user->id_user);
		$this->user_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah berhasil dihapus');
		redirect(base_url('admin/user'),'refresh');
	}

}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */