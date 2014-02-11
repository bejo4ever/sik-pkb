<?php if ( ! defined('BASEPATH')) exit('Silahkan menghubungi Administrator');
 
class penguji extends CI_Controller {
 
	function __construct() 
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation'); // +
		$this->load->model('temp_model','',TRUE);
		$this->load->model('penguji_model','',TRUE);
		$this->cekLogin();
	}
	function cekLogin()
	{
		if($this->session->userdata('id_level')=="")
		{
			redirect('home');
		}
	}
	public function index()
	{
		$data['data']		= $this->penguji_model->getPenguji();
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('1');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenudaftar('1');
		
		$this->load->view('data_induk/penguji/penguji_data',$data);
	}
	
	function saveData()
	{
		$nip		= $this->input->post('nip');
		$nrp		= $this->input->post('nrp');
		$nama		= $this->input->post('nama');
		$pangkat	= $this->input->post('pangkat');
		//$golongan	= $this->input->post('golongan');
		$jabatan	= $this->input->post('jabatan');
		$status		= $this->input->post('status');
		
		$this->form_validation->set_rules('nip', 'Nip', 'required'); // +
		$this->form_validation->set_rules('nrp', 'Nrp', 'required'); // +
		$this->form_validation->set_rules('nama', 'Nama', 'required'); // +
		$this->form_validation->set_rules('pangkat', 'Pangkat', 'required'); // +
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required'); // +
		$this->form_validation->set_rules('status', 'Status', 'required'); // +
		
		$this->form_validation->set_message('required', ' %s tidak boleh kosong !!');
		if ($this->form_validation->run() == FALSE) {
			redirect('penguji');
		}else{		
			$varData	= array('nip_penguji'=>$nip,'NRP'=>$nrp,'nama_penguji'=>$nama,'gol_pangkat'=>$pangkat,'jabatan_fungsional'=>$jabatan,'tipe_penguji'=>$status,'kode_unit'=>$this->session->userdata('kdUnit'));
			$this->penguji_model->save($varData);
		}
		redirect('penguji','refresh');
	}
	
	function edit($id)
	{
		$data['data']		= $this->penguji_model->getById($id);
		$this->load->view('data_induk/penguji/edit_penguji',$data);
	}
	
	function update()
	{
		$nrps		= $this->input->post('nrp_sblmnya');
		$nip		= $this->input->post('nip');
		$nrp		= $this->input->post('nrp');
		$nama		= $this->input->post('nama');
		$pangkat	= $this->input->post('pangkat');
		//$golongan	= $this->input->post('golongan');
		$jabatan	= $this->input->post('jabatan');
		$status		= $this->input->post('status');
		
		$varData	= array('nip_penguji'=>$nip,
						'NRP'=>$nrp,
						'nama_penguji'=>$nama,
						'gol_pangkat'=>$pangkat,
						'tipe_penguji'=>$status,
						'jabatan_fungsional'=>$jabatan
						);
		$this->penguji_model->update($nrps, $varData);
		
		redirect('penguji','refresh');
	}
	
	function hapus($id)
	{
		$this->penguji_model->delete($id);
		redirect('penguji','refresh');
	}
	
	function sertifikat($id)
	{
		$data['data']		= $this->penguji_model->getSertifikat($id);
		$data['NRP']		= $id; 
		
		$r = $this->penguji_model->getById($id);
		foreach($r as $dat)
		{
			$data['nama_penguji']	= $dat->nama_penguji;
			$data['nrp']			= $dat->NRP;
			$data['nip_penguji']	= $dat->nip_penguji;
			$data['jabatan']		= $dat->jabatan_fungsional;
			$data['status']			= $dat->tipe_penguji;
		}
		
		$this->load->view('data_induk/penguji/sertifikat',$data);
	}
	
	function sertifikat_add($id)
	{
		//$data['data']		= $this->penguji_model->getSertifikat($id);
		//$data['nip']		= $id; 
		$r = $this->penguji_model->getById($id);
		foreach($r as $dat)
		{
			$data['nama_penguji'] = $dat->nama_penguji;
			$data['nip_penguji']  = $dat->nip_penguji;
			$data['nrp']		  = $dat->NRP;
		}
		$this->load->view('data_induk/penguji/sertifikatadd',$data);
	}
	
	function sertifikat_save()
	{
		$nrp				= $this->input->post('nrp');
		$no_sertifikat		= $this->input->post('no_sertifikat');
		$tgl_terbit			= $this->converter_model->tgl_In_Eng($this->input->post('tgl_terbit'));
		$lembaga_penerbit	= $this->input->post('lembaga_penerbit');
		$jenis_sertifikat	= $this->input->post('jenis_sertifikat');
		
		$varData	= array(
							'NRP'				=>$nrp,
							'no_sertifikat'		=>$no_sertifikat,
							'tgl_terbit'		=>$tgl_terbit,
							'lembaga_penerbit'	=>$lembaga_penerbit,
							'jenis_sertifikat'	=>$jenis_sertifikat
							);
		$this->penguji_model->saveSertifikat($varData);
		
		redirect('penguji','refresh');
	}
	
	function sertifikat_edit($id)
	{
		$data['fields'] = $this->penguji_model->getdetailSertifikat($id);
		$this->load->view('data_induk/penguji/sertifikatedit',$data);
	}
	
	function sertifikat_editsave()
	{
		$sertifikat_sblmnya		= $this->input->post('sertifikat_sblmnya');
		$no_sertifikat			= $this->input->post('no_sertifikat');
		$tgl_terbit				= $this->converter_model->tgl_In_Eng($this->input->post('tgl_terbit'));
		$lembaga_penerbit		= $this->input->post('lembaga_penerbit');
		$jenis_sertifikat		= $this->input->post('jenis_sertifikat');
				
		$varData	= array('no_sertifikat'		=>$no_sertifikat,
							'tgl_terbit'		=>$tgl_terbit,
							'lembaga_penerbit'	=>$lembaga_penerbit,
							'jenis_sertifikat'	=>$jenis_sertifikat
						);
		$this->penguji_model->updatedetailSertifikat($sertifikat_sblmnya, $varData);
		
		redirect('penguji','refresh');
	}
	
	function sertifikat_delete($id)
	{
		$this->penguji_model->deleteSertifikat($id);
		redirect('penguji','refresh');
	}
	
	function riwayatPendidikan($id)
	{
		$data['data']		= $this->penguji_model->getRiwayat($id);
		$data['nrp']		= $id; 
		
		$r = $this->penguji_model->getById($id);
		foreach($r as $dat)
		{
			$data['nama_penguji']	= $dat->nama_penguji;
			$data['nip_penguji']	= $dat->nip_penguji;
			$data['nrp']			= $dat->NRP;
			$data['jabatan']		= $dat->jabatan_fungsional;
			$data['status']			= $dat->tipe_penguji;
		}
		
		$this->load->view('data_induk/penguji/riwayat_pendidikan',$data);
	}
	function riwayat_add($id)
	{
		$r = $this->penguji_model->getById($id);
		foreach($r as $dat)
		{
			$data['nama_penguji'] = $dat->nama_penguji;
			$data['nip_penguji']  = $dat->nip_penguji;
			$data['nrp']  = $dat->NRP;
		}
		$this->load->view('data_induk/penguji/riwayat_pendidikan_add',$data);
	}
	function riwayat_save()
	{
		$nrp			= $this->input->post('nrp');
		$periode		= $this->input->post('periode');
		$keterangan		= $this->input->post('keterangan');
		
		$varData	= array(
							'NRP'		=>$nrp,
							'kd_riwayat'		=>$this->penguji_model->getidRiwayatBaru($nrp),
							'periode'			=>$periode,
							'keterangan'		=>$keterangan
							);
		$this->penguji_model->saveRiwayat($varData);
		
		redirect('penguji','refresh');
	}
	function riwayat_edit($id)
	{
		$data['fields'] = $this->penguji_model->getRiwayatKd($id);
		$this->load->view('data_induk/penguji/riwayat_pendidikan_edit',$data);
	}
	function riwayat_editsave()
	{
		$kd				= $this->input->post('kd_riwayat');
		$periode		= $this->input->post('periode');
		$keterangan			= $this->input->post('keterangan');
		
		$varData	= array('periode'		=>$periode,
							'keterangan'	=>$keterangan
						);
		$this->penguji_model->updateRiwayat($kd, $varData);
		
		redirect('penguji','refresh');
	}
	function riwayat_delete($id)
	{
		$this->penguji_model->deleteRiwayat($id);
		redirect('penguji','refresh');
	}
	
	function penghargaan($id)
	{
		$data['data']		= $this->penguji_model->getPenghargaan($id);
		$data['nrp']		= $id; 
		
		$r = $this->penguji_model->getById($id);
		foreach($r as $dat)
		{
			$data['nama_penguji']	= $dat->nama_penguji;
			$data['nip_penguji']	= $dat->nip_penguji;
			$data['nrp']			= $dat->NRP;
			$data['jabatan']		= $dat->jabatan_fungsional;
			$data['status']			= $dat->tipe_penguji;
		}
		
		$this->load->view('data_induk/penguji/penghargaan',$data);
	}
	function penghargaan_add($id)
	{
		$r = $this->penguji_model->getById($id);
		foreach($r as $dat)
		{
			$data['nama_penguji'] = $dat->nama_penguji;
			$data['nip_penguji']  = $dat->nip_penguji;
			$data['nrp']			= $dat->NRP;
		}
		$this->load->view('data_induk/penguji/penghargaan_add',$data);
	}
	function penghargaan_save()
	{
		$nrp			= $this->input->post('nrp');
		$tahun			= $this->input->post('tahun');
		$keterangan		= $this->input->post('keterangan');
		
		$varData	= array(
							'NRP'		=>$nrp,
							'kd_penghargaan'	=>$this->penguji_model->getidPenghargaanBaru($nrp),
							'tahun'				=>$tahun,
							'penghargaan'		=>$keterangan
							);
		$this->penguji_model->savePenghargaan($varData);
		
		redirect('penguji','refresh');
	}
	function penghargaan_edit($id)
	{
		$data['fields'] = $this->penguji_model->getPenghargaanKd($id);
		$this->load->view('data_induk/penguji/penghargaan_edit',$data);
	}
	function penghargaan_editsave()
	{
		$kd				= $this->input->post('kd_penghargaan');
		$tahun			= $this->input->post('tahun');
		$keterangan			= $this->input->post('keterangan');
		
		$varData	= array('tahun'		=>$tahun,
							'penghargaan'	=>$keterangan
						);
		$this->penguji_model->updatePenghargaan($kd, $varData);
		
		redirect('penguji','refresh');
	}
	function penghargaan_delete($id)
	{
		$this->penguji_model->deletePenghargaan($id);
		redirect('penguji','refresh');
	}
	
	function sanksi($id)
	{
		$data['data']		= $this->penguji_model->getSanksi($id);
		$data['nrp']		= $id; 
		
		$r = $this->penguji_model->getById($id);
		foreach($r as $dat)
		{
			$data['nama_penguji']	= $dat->nama_penguji;
			$data['nip_penguji']	= $dat->nip_penguji;
			$data['nrp']			= $dat->NRP;
			$data['jabatan']		= $dat->jabatan_fungsional;
			$data['status']			= $dat->tipe_penguji;
		}
		
		$this->load->view('data_induk/penguji/sanksi',$data);
	}
	function sanksi_add($id)
	{
		$r = $this->penguji_model->getById($id);
		foreach($r as $dat)
		{
			$data['nama_penguji'] = $dat->nama_penguji;
			$data['nip_penguji']  = $dat->nip_penguji;
			$data['nrp']			= $dat->NRP;
		}
		$this->load->view('data_induk/penguji/sanksi_add',$data);
	}
	function sanksi_save()
	{
		$nrp			= $this->input->post('nrp');
		$tahun			= $this->input->post('tahun');
		$keterangan		= $this->input->post('keterangan');
		
		$varData	= array(
							'NRP'				=>$nrp,
							'kd_sanksi'			=>$this->penguji_model->getidSanksiBaru($nrp),
							'tahun'				=>$tahun,
							'sanksi'			=>$keterangan
							);
		$this->penguji_model->saveSanksi($varData);
		
		redirect('penguji','refresh');
	}
	function sanksi_edit($id)
	{
		$data['fields'] = $this->penguji_model->getSanksiKd($id);
		$this->load->view('data_induk/penguji/sanksi_edit',$data);
	}
	function sanksi_editsave()
	{
		$kd				= $this->input->post('kd_sanksi');
		$tahun			= $this->input->post('tahun');
		$keterangan			= $this->input->post('keterangan');
		
		$varData	= array('tahun'		=>$tahun,
							'sanksi'	=>$keterangan
						);
		$this->penguji_model->updateSanksi($kd, $varData);
		
		redirect('penguji','refresh');
	}
	function sanksi_delete($id)
	{
		$this->penguji_model->deleteSanksi($id);
		redirect('penguji','refresh');
	}
}
