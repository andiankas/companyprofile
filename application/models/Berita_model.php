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

	public function home()
	{
		$this->db->select('berita.*,kategori.nama_kategori, kategori.slug_kategori,user.nama');
		$this->db->from('berita');
		// join
		$this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
		$this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
		// end join
		$this->db->where(array('status_berita' => 'Publish',
								'jenis_berita' => 'Berita'));
		$this->db->order_by('id_berita','DESC');
		$this->db->limit(6); //limit atau jumlah berita yang tayang di homepage
		$query = $this->db->get();
		return $query->result();

	}

	public function berita_sidebar()
	{
		$this->db->select('berita.*,kategori.nama_kategori, kategori.slug_kategori,user.nama');
		$this->db->from('berita');
		// join
		$this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
		$this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
		// end join
		$this->db->where(array('status_berita' => 'Publish',
								'jenis_berita' => 'Berita'));
		$this->db->order_by('id_berita','DESC');
		$this->db->limit(3); //limit atau jumlah berita yang tayang di homepage
		$query = $this->db->get();
		return $query->result();

	}

	public function berita($limit,$start)
	{
		$this->db->select('berita.*,kategori.nama_kategori, kategori.slug_kategori,user.nama');
		$this->db->from('berita');
		// join
		$this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
		$this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
		// end join
		$this->db->where(array('status_berita' => 'Publish'));

		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();

	}

	// total berita homepage
	public function total()
	{
		$this->db->select('berita.*,kategori.nama_kategori, kategori.slug_kategori,user.nama');
		$this->db->from('berita');
		// join
		$this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
		$this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
		// end join
		$this->db->where(array('status_berita' => 'Publish'));

		$query = $this->db->get();
		return $query->result();

	}

	// lisitng kategori berita
	public function berita_kategori($id_kategori,$limit,$start)
	{
		$this->db->select('berita.*,kategori.nama_kategori, kategori.slug_kategori,user.nama');
		$this->db->from('berita');
		// join
		$this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
		$this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
		// end join
		$this->db->where(array(	'status_berita' 			=> 'Publish',
								'berita.id_kategori' 		=> $id_kategori));

		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();

	}

	// total berita homepage
	public function total_kategori($id_kategori)
	{
		$this->db->select('berita.*,kategori.nama_kategori, kategori.slug_kategori,user.nama');
		$this->db->from('berita');
		// join
		$this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
		$this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
		// end join
		$this->db->where(array(	'status_berita' 			=> 'Publish',
								'berita.id_kategori' 		=> $id_kategori));

		$query = $this->db->get();
		return $query->result();

	}

	public function read($slug_berita)
	{
		$this->db->select('berita.*,kategori.nama_kategori, kategori.slug_kategori,user.nama');
		$this->db->from('berita');
		// join
		$this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
		$this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
		// end join
		$this->db->where(array(	'status_berita' 			=> 'Publish',
								'berita.slug_berita' 		=> $slug_berita));

		$query = $this->db->get();
		return $query->row();

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