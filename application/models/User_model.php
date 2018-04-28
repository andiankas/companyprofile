<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {


	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->database(); //load database
		$this->load->model('User_model');
	}

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->order_by('id_user');
		$query = $this->db->get();
		return $query->result();

	}

	public function tambah($data)
	{
		$this->db->insert('user', $data);
	}

	public function detail($id_user)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id_user',$id_user);
		$this->db->order_by('id_user');
		$query = $this->db->get();
		return $query->row();
	}	

	public function edit($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('user', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->delete('user', $data);
	}

	public function login($username,$password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array(
			'username' => $username,
			'password' => sha1($password)
		));
		$this->db->order_by('id_user');
		$query = $this->db->get();
		return $query->row();
	}	


}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */