<?php if ( ! defined('BASEPATH')) exit('Silahkan menghubungi Administrator');
 
class keberatan extends CI_Controller {
 
	function __construct() 
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('temp_model','',TRUE);
		$this->load->model('keberatanmodel','',TRUE);
		$this->load->model('kendaraanmodel','',TRUE);
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
		$data['data']		= $this->keberatanmodel->getAllKeberatan();
		$data['noBAP']		= $this->pengujianmodel->getTidakLulus();
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('2');
		$data['footer']		= $this->temp_model->footerInc();
		
		$this->load->view('keberatan/keberatan_data',$data);
	}
	
	function saveData()
	{
		$noBerat	= $this->keberatanmodel->getNoKeberatan();
		$tglBerat	= $this->converter_model->tgl_In_Eng($this->input->post('tgl_berat'));
		$pemohon	= $this->input->post('pemohon');
		$id_pemohon	= $this->input->post('id_pemohon');
		$alamat		= $this->input->post('alamat');
		$ket		= $this->input->post('ket');
		$status		= $this->input->post('status');
		$no_bap		= $this->input->post('no_bap');
		
		$varData	= array('no_keberatan'=>$noBerat,'tgl_keberatan'=>$tglBerat,'nama_pemohon'=>$pemohon,'id_pemohon'=>$id_pemohon,'alamat_pemohon'=>$alamat,'keterangan'=>$ket,'status'=>$status,'no_bap'=>$no_bap,'kode_unit'=>$this->session->userdata('kdUnit'));
		$this->keberatanmodel->save($varData);
		
		redirect('keberatan','refresh');
	}
	
	function edit($id)
	{
		$data['data']	= $this->keberatanmodel->getById($id);
		$data['noBAP']	= $this->pengujianmodel->getTidakLulus();
		$this->load->view('keberatan/edit_keberatan',$data);
	}
	
	function update()
	{
		$noBerat	= $this->input->post('no_berat');
		$tglBerat	= $this->converter_model->tgl_In_Eng($this->input->post('tgl_berat'));
		$pemohon	= $this->input->post('pemohon');
		$id_pemohon	= $this->input->post('id_pemohon');
		$alamat		= $this->input->post('alamat');
		$ket		= $this->input->post('ket');
		$status		= $this->input->post('status');
		$no_bap		= $this->input->post('no_bap');
		
		$varData	= array('no_keberatan'=>$noBerat,'tgl_keberatan'=>$tglBerat,'nama_pemohon'=>$pemohon,'id_pemohon'=>$id_pemohon,'alamat_pemohon'=>$alamat,'keterangan'=>$ket,'status'=>$status,'no_bap'=>$no_bap,'kode_unit'=>$this->session->userdata('kdUnit'));
		$this->keberatanmodel->update($noBerat,$varData);

		redirect('keberatan','refresh');
	}
	
	function hapus($id)
	{
		$this->keberatanmodel->delete($id);
		redirect('keberatan','refresh');
	}
}