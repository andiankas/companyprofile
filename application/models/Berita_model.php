<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {


	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->database(); //load database
		$this->load->model('Berita_model');
	}

	public function listing()
	{
		$this->db->select('berita.*,kategori.nama_kategori, kategori.slug_kategori,user.nama');
		$this->db->from('berita');
		// join
		$this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
		$this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
		// end join
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();

	}

	public function tambah($data)
	{
		$this->db->insert('berita', $data);
	}

	public function detail($id_berita)
	{
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where('id_berita',$id_berita);
		$this->db->order_by('id_berita');
		$query = $this->db->get();
		return $query->row();
	}	

	public function edit($data)
	{
		$this->db->where('id_berita', $data['id_berita']);
		$this->db->update('berita', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_berita', $data['id_berita']);
		$this->db->delete('berita', $data);
	}

	


}

/* End of file Berita_model.php */
/* Location: ./application/models/Berita_model.php */