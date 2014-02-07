<?php

class keberatanmodel extends CI_Model
{
	private $tbl= 'keberatan';
	
	function __construct()
	{
		parent::__construct();
	}

	function getNoKeberatan()
	{
		$query = $this->db->query("SELECT * FROM keberatan ORDER BY no_keberatan DESC LIMIT 1");
		foreach ($query->result() as $row)
		{
		   $no_keberatan		= $row->no_keberatan;
		   $no_keberatan_baru	= $no_keberatan+1;
		}
		
		if($no_keberatan_baru=="")
		{
			$no_keberatan_baru	= date('Y').date('m').date('d')."1";
		}
		return $no_keberatan_baru;
	}

	function getAllKeberatan() 
  	{
  		$query = $this->db->query("SELECT * FROM keberatan ORDER BY tgl_keberatan DESC");
		return $query->result();
  	}

	function getById($id)
	{
		$query = $this->db->query("SELECT * FROM keberatan WHERE no_keberatan ='$id' ");
		return $query->result();
	}

	function save($varData){
		$this->db->insert($this->tbl, $varData);
		return $this->db->insert_id();
	}
	
	function update($id, $data){
		$this->db->where('no_keberatan', $id);
		$this->db->update($this->tbl, $data);
	}
	
	function delete($id){
		$this->db->where('no_keberatan', $id);
		$this->db->delete($this->tbl);
	}
}
