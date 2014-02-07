<?php

class user_model extends CI_Model
{
	private $tbl= 'sistem_user';
	
	function __construct()
	{
		parent::__construct();
	}
	function getUserByName($user)
	{
		$this->db->where('username', $user);
		//$this->db->where('id_level', $id);
		return $this->db->get($this->tbl);
	}
	function getUserByNip($nip)
	{
		$this->db->where('NIP', $nip);
		//$this->db->where('id_level', $id);
		return $this->db->get($this->tbl);
	}
	function count_data() 
	{   
		return $this->db->count_all($this->tbl);
	}
	function get_list_data($limit,$offset) 
  	{
		if($offset==""){ $offset=0; }
  		$query =$this->db->query("select * from sistem_user, level_user WHERE sistem_user.id_level = level_user.id_level ORDER BY sistem_user.id_user ASC LIMIT $offset,$limit");
		return $query->result();
  	} 
	function search($tipe,$tipe2,$key)
	{
		$this->db->like($tipe,$key);
		$this->db->or_like($tipe2,$key);
		return $this->db->get($this->tbl);
	}
	function getAll() 
  	{
  		$query = $this->db->query("SELECT * FROM sistem_user ORDER BY nama_asli DESC");
		return $query->result();
  	}
	function getbyid($id){
		//return $this->db->get_where($this->tbl, array('id_user'=>$id))->row();
		$this->db->where('id_user',$id);
		$this->db->join('level_user','level_user.id_level = sistem_user.id_level');
		return $this->db->get($this->tbl);
	}
	function save($varData){
		$this->db->insert($this->tbl, $varData);
		return $this->db->insert_id();
	}
	function update($id, $data){
		$this->db->where('id_user', $id);
		$this->update($this->tbl, $data);
	}
	function delete($id){
		$this->db->where('id_user', $id);
		$this->db->delete($this->tbl);
	}
	function getlevel()
	{
		$query = $this->db->query("SELECT * FROM level_user ORDER BY id_level ASC");
		return $query->result();
	}
}

