<?php

class pendaftaranmodel extends CI_Model
{
	private $tbl= 'pendaftaran';
	
	function __construct()
	{
		parent::__construct();
	}

	function count_data() 
	{
		return $this->db->count_all($this->tbl);
	}

	function getAllPendaftaran() 
  	{
  		$query = $this->db->query("SELECT * FROM pendaftaran a, kendaraan b WHERE a.no_srut = b.no_srut AND a.status = 'daftar' ORDER BY a.tgl_pendaftaran DESC");
		return $query->result();
  	}
	
	function getPeriodePendaftaran($tglAwal,$tglAkhir) 
  	{
  		$query = $this->db->query("SELECT * FROM pendaftaran a, hasil_pengujian b WHERE a.tgl_pendaftaran >= '$tglAwal' AND a.tgl_pendaftaran <= '$tglAkhir' AND a.no_pendaftaran = b.no_pendaftaran ORDER BY a.tgl_pendaftaran ASC");
		return $query->result();
  	}

	function getAllBayar() 
  	{
  		$query = $this->db->query("SELECT * FROM pendaftaran a, kendaraan b WHERE a.no_srut = b.no_srut AND a.status = 'daftar' ORDER BY tgl_pendaftaran DESC");
		return $query->result();
  	}

	function getAllSudahBayar() 
  	{
  		$query = $this->db->query("SELECT * FROM pendaftaran a, kendaraan b WHERE a.no_srut = b.no_srut AND a.status = 'bayar' ORDER BY tgl_pendaftaran DESC");
		return $query->result();
  	}

	function getAllSudahUji() 
  	{
  		$query = $this->db->query("SELECT * FROM pendaftaran a, kendaraan b WHERE a.no_srut = b.no_srut AND a.status = 'uji' ORDER BY a.tgl_pendaftaran DESC");
		return $query->result();
  	}

	function getAllSudahVerifikasi() 
  	{
  		$query = $this->db->query("SELECT * FROM pendaftaran a, kendaraan b WHERE a.no_srut = b.no_srut AND a.status = 'verifikasi' ORDER BY a.tgl_pendaftaran DESC");
		return $query->result();
  	}

	function getAllDataSekarang() 
  	{
  		$query = $this->db->query("SELECT * FROM pendaftaran a, kendaraan b, pemilik_kendaraan c WHERE a.tgl_pendaftaran = curdate() AND a.no_srut = b.no_srut AND a.no_srut = c.no_srut ORDER BY a.no_pendaftaran ASC");
		return $query->result();
  	}
	
	function getById($id)
	{
		$query = $this->db->query("SELECT * FROM pemilik_kendaraan b, kendaraan c WHERE c.no_srut ='$id' AND c.no_srut = b.no_srut");
		return $query->result();
	}

	function getByPendaftar($id)
	{
		$query = $this->db->query("SELECT * FROM pendaftaran a, kendaraan b, pemilik_kendaraan c WHERE a.no_pendaftaran ='$id' AND a.no_srut = b.no_srut AND a.no_srut = c.no_srut ");
		return $query->result();
	}

	function getDataPendaftaran($noDaftar)
	{
		$query = $this->db->query("SELECT * FROM pendaftaran WHERE no_pendaftaran = '$noDaftar' ");
		return $query->result();
	}

	function getNoUjiBydaftar($noDaftar)
	{
		$query = $this->db->query("SELECT * FROM pendaftaran WHERE no_pendaftaran = '$noDaftar' ");
		foreach ($query->result() as $row)
		{
		   return $row->no_srut;
		}
	}

	function getNoDaftar($noSrut)
	{
		$query = $this->db->query("SELECT * FROM pendaftaran WHERE no_srut = '$noSrut' AND status = 'bayar' ");
		foreach ($query->result() as $row)
		{
		   return $row->no_pendaftaran;
		}
	}

	function getNoBAPBydaftar($noDaftar)
	{
		$query = $this->db->query("SELECT * FROM pendaftaran a, uraian_kendaraan b WHERE no_pendaftaran = '$noDaftar' AND a.no_srut = b.no_srut");
		foreach ($query->result() as $row)
		{
		   return $row->no_bap;
		}
	}

	function getBiayaDaftar($no)
	{
		$query = $this->db->query("SELECT * FROM pendaftaran  WHERE no_pendaftaran ='$no'");
		foreach ($query->result() as $row)
		{
		   return $this->setRp($row->jumlah_bayar);
		}
	}

	function getNoPendaftaran()
	{
		$query = $this->db->query("SELECT * FROM pendaftaran WHERE tgl_pendaftaran = curdate() ORDER BY no_pendaftaran DESC LIMIT 1");
		foreach ($query->result() as $row)
		{
		   $no_daftar		= $row->no_pendaftaran;
		   $no_daftar_baru	= $no_daftar+1;
		}
		
		if($no_daftar_baru=="")
		{
			$no_daftar_baru	= date('Y').date('m').date('d')."1";
		}
		return $no_daftar_baru;
	}

	function getDataUjiKelBulanIni($tahun,$bulan,$kel,$tipe)
	{
		$query = $this->db->query("SELECT count(*) as jumlah FROM pendaftaran a,kendaraan b, kelompok_kendaraan c, jenis_kendaraan d WHERE a.no_srut = b.no_srut AND c.id_kelompokkendaraan='$kel' AND a.tgl_pendaftaran >= '$tahun-$bulan-01' AND a.tgl_pendaftaran <= '$tahun-$bulan-31' AND a.tipe_pendaftaran ='$tipe' AND b.id_jeniskendaraan = d.id_jeniskendaraan AND d.id_kelompokkendaraan = c.id_kelompokkendaraan ");
		foreach ($query->result() as $row)
		{
		   return $row->jumlah;
		}
	}

	function getDataUjiKelBulanSebelumnya($tahun,$bulan,$kel,$tipe)
	{
		if($bulan!="01")
		{ 
			$bulanSeblmnya=$bulan-1; 
			if($bulanSeblmnya<=9){ $bulanSeblmnya="0$bulanSeblmnya"; }
		}
		else
		{
			$bulanSeblmnya="12";
			$tahun=$tahun-1; 
			
		}
		
		$query = $this->db->query("SELECT count(*) as jumlah FROM pendaftaran a,kendaraan b, kelompok_kendaraan c, jenis_kendaraan d WHERE a.no_srut = b.no_srut AND c.id_kelompokkendaraan='$kel' AND a.tgl_pendaftaran >= '$tahun-01-01' AND a.tgl_pendaftaran <= '$tahun-$bulanSeblmnya-31' AND a.tipe_pendaftaran ='$tipe' AND b.id_jeniskendaraan = d.id_jeniskendaraan AND d.id_kelompokkendaraan = c.id_kelompokkendaraan ");
		foreach ($query->result() as $row)
		{
		   return $row->jumlah;
		}
		/*return "'$tahun-01-01' '$tahun-$bulanSeblmnya-31'";*/
	}

	function getDataUjiBulanIni($tahun,$bulan,$jenisK,$tipe)
	{
		$query = $this->db->query("SELECT count(*) as jumlah FROM pendaftaran a,kendaraan b WHERE a.no_srut = b.no_srut AND b.id_jeniskendaraan='$jenisK' AND a.tgl_pendaftaran >= '$tahun-$bulan-01' AND a.tgl_pendaftaran <= '$tahun-$bulan-31' AND a.tipe_pendaftaran ='$tipe' ");
		foreach ($query->result() as $row)
		{
		   return $row->jumlah;
		}
	}

	function getDataUjiBulanSebelumnya($tahun,$bulan,$jenisK,$tipe)
	{
		if($bulan!="01")
		{ 
			$bulanSeblmnya=$bulan-1; 
			if($bulanSeblmnya<=9){ $bulanSeblmnya="0$bulanSeblmnya"; }
		}
		else
		{
			$bulanSeblmnya="12";
			$tahun=$tahun-1;  
		}
		
		$query = $this->db->query("SELECT count(*) as jumlah FROM pendaftaran a,kendaraan b WHERE a.no_srut = b.no_srut AND b.id_jeniskendaraan='$jenisK' AND a.tgl_pendaftaran >= '$tahun-01-01' AND a.tgl_pendaftaran <= '$tahun-$bulanSeblmnya-31' AND a.tipe_pendaftaran ='$tipe' ");
		foreach ($query->result() as $row)
		{
		   return $row->jumlah;
		}
		/*return "'$tahun-01-01' '$tahun-$bulanSeblmnya-31'";*/
	}

	function save($varData){
		$this->db->insert($this->tbl, $varData);
		return $this->db->insert_id();
	}

	function update($id, $data){
		$this->db->where('no_pendaftaran', $id);
		$this->db->update($this->tbl, $data);
	}

	function delete($id){
		$this->db->where('no_pendaftaran', $id);
		$this->db->delete($this->tbl);
	}

	function setRp($nilai) 
	{   
	  		
			$panjang=strlen($nilai);
			
			if($panjang>3&&$panjang<=6)
			{	
				$awal=substr($nilai,0,-3);
				$akhir=substr($nilai,-3);
				$uang="$awal.$akhir";
				return $uang;
			}
			elseif($panjang>6&&$panjang<=9)
			{
				$awal=substr($nilai,0,-6);
				$tengah1=substr($nilai,-6,3);
				$akhir=substr($nilai,-3);
				$uang="$awal.$tengah1.$akhir";
				return $uang;	
					
			}
			elseif($panjang>9&&$panjang<=12)
			{
				$awal=substr($nilai,0,-9);
				$tengah1=substr($nilai,-9,3);
				$tengah2=substr($nilai,-6,3);
				$akhir=substr($nilai,-3);
				$uang="$awal.$tengah1.$tengah2.$akhir";
				return $uang;
			}
			elseif($panjang>=12&&$panjang<=15)
			{
				$awal=substr($nilai,0,-12);
				$tengah1=substr($nilai,-9,3);
				$tengah2=substr($nilai,-6,3);
				$tengah3=substr($nilai,-3,3);
				$akhir=substr($nilai,-3);
				$uang="$awal.$tengah1.$tengah2.$tengah3.$akhir";
				return $uang;
			}
			else{
				return $nilai;
			}
  	}
}

