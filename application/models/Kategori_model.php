<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kategori_model extends CI_Model {


	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->database(); //load database
		
	}

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();

	}

	public function tambah($data)
	{
		$this->db->insert('kategori', $data);
	}

	public function detail($id_kategori)
	{
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->where('id_kategori',$id_kategori);
		$this->db->order_by('id_kategori','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	public function read($slug_kategori)
	{
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->where('slug_kategori',$slug_kategori);
		$this->db->order_by('slug_kategori');
		$query = $this->db->get();
		return $query->row();
	}

	public function edit($data)
	{
		$this->db->where('id_kategori', $data['id_kategori']);
		$this->db->update('kategori', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_kategori', $data['id_kategori']);
		$this->db->delete('kategori', $data);
	}

	


}

/* End of file kategori_model.php */
/* Location: ./application/models/kategori_model.php */