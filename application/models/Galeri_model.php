<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri_model extends CI_Model {


	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->database();
		
		
	}

	public function listing()
	{
		$this->db->select('galeri.*,user.nama');
		$this->db->from('galeri');
		// join
		$this->db->join('user', 'user.id_user = galeri.id_user', 'LEFT');
		// end join
		$this->db->order_by('id_galeri','DESC');
		$query = $this->db->get();
		return $query->result();
		

	}

	public function slider()
	{
		$this->db->select('galeri.*,user.nama');
		$this->db->from('galeri');
		// join
		$this->db->join('user', 'user.id_user = galeri.id_user', 'LEFT');
		// end join
		$this->db->where('posisi_galeri', 'Homepage');
		$this->db->order_by('id_galeri','DESC');
		$this->db->limit(4);
		$query = $this->db->get();
		return $query->result();
		

	}

	public function tambah($data)
	{
		$this->db->insert('galeri', $data);
	}

	public function detail($id_galeri)
	{
		$this->db->select('*');
		$this->db->from('galeri');
		$this->db->where('id_galeri',$id_galeri);
		$this->db->order_by('id_galeri');
		$query = $this->db->get();
		return $query->row();
	}	

	public function edit($data)
	{
		$this->db->where('id_galeri', $data['id_galeri']);
		$this->db->update('galeri', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_galeri', $data['id_galeri']);
		$this->db->delete('galeri', $data);
	}

	


}

/* End of file Galeri_model.php */
/* Location: ./application/models/Galeri_model.php */