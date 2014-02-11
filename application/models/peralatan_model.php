<?php

class peralatan_model extends CI_Model
{
	private $tbl= 'peralatan_uji';
	
	function __construct()
	{
		parent::__construct();
	}
	function count_data() 
	{   
		return $this->db->count_all($this->tbl);
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
}

