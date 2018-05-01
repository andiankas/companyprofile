<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan_model extends CI_Model {


	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->database(); //load database
		
	}

	public function listing()
	{
		$this->db->select('layanan.*,user.nama');
		$this->db->from('layanan');
		// join
		$this->db->join('user', 'user.id_user = layanan.id_user', 'LEFT');
		// end join
		$this->db->order_by('id_layanan','DESC');
		$query = $this->db->get();
		return $query->result();

	}

	public function tambah($data)
	{
		$this->db->insert('layanan', $data);
	}

	public function detail($id_layanan)
	{
		$this->db->select('*');
		$this->db->from('layanan');
		$this->db->where('id_layanan',$id_layanan);
		$this->db->order_by('id_layanan');
		$query = $this->db->get();
		return $query->row();
	}	

	public function edit($data)
	{
		$this->db->where('id_layanan', $data['id_layanan']);
		$this->db->update('layanan', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_layanan', $data['id_layanan']);
		$this->db->delete('layanan', $data);
	}

	


}

/* End of file Layanan_model.php */
/* Location: ./application/models/Layanan_model.php */