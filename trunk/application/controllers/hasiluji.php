<?php if ( ! defined('BASEPATH')) exit('Silahkan menghubungi Administrator');
 
class hasiluji extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('temp_model','',TRUE);
		$this->load->model('master_model','',TRUE);
		$this->load->model('pendaftaranmodel','',TRUE);
		$this->load->model('pemilikmodel','',TRUE);
		$this->load->model('kendaraanmodel','',TRUE);
		$this->load->model('penguji_model','',TRUE);
		$this->load->model('uraianmodel','',TRUE);
		$this->load->model('daftaruji_model','',TRUE);
		$this->load->model('pengujianmodel','',TRUE);
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
		$data['data']		= $this->pendaftaranmodel->getAllSudahUji();
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('2');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenudaftar('5');
		$this->load->view('hasil_uji/hasil_data',$data);
	}
	
	function lihatHasil($id)
	{
		$data['hasildata']	= $this->pengujianmodel->getStatus($id);
		$data['no_uji']		= $this->pendaftaranmodel->getNoUjiBydaftar($id);
		$data['no_bap']		= $this->pendaftaranmodel->getNoBAPBydaftar($id);
		$data['no_daftar']	= $id;
		$data['penguji']	= $this->penguji_model->getPenguji();
		$data['data']		= $this->pendaftaranmodel->getByPendaftar($id);
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('2');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenuHasilUji('5',$id);
		$this->load->view('hasil_uji/status',$data);
	}
	
	function detail($id)
	{
		$data['no_uji']		= $this->pendaftaranmodel->getNoUjiBydaftar($id);
		$data['no_daftar']	= $id;
		$data['penguji']	= $this->penguji_model->getPenguji();
		$data['data']		= $this->pendaftaranmodel->getByPendaftar($id);
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('3');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenuHasilUji('1',$id);
		$this->load->view('hasil_uji/detail_kendaraan',$data);
	}
	
	function uraian($id)
	{
		$data['no_uji']		= $this->pendaftaranmodel->getNoUjiBydaftar($id);
		$data['no_daftar']	= $id;
		$data['dataHasil']	= $this->uraianmodel->getById($this->pendaftaranmodel->getNoUjiBydaftar($id))->result();
		$data['penguji']	= $this->penguji_model->getPenguji();
		$data['data']		= $this->pendaftaranmodel->getByPendaftar($id);
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('3');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenuHasilUji('2',$id);
		$this->load->view('hasil_uji/uraian_kendaraan',$data);
	}
	
	function ujifisik($id)
	{
		$data['no_uji']		= $this->pendaftaranmodel->getNoUjiBydaftar($id);
		$data['no_daftar']	= $id;
		$data['penguji']	= $this->penguji_model->getPenguji();
		$data['data']		= $this->pendaftaranmodel->getByPendaftar($id);
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('3');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenuHasilUji('3',$id);
		$this->load->view('hasil_uji/ujifisik',$data);
	}
	
	function ujimekanis($id)
	{
		$data['no_uji']		= $this->pendaftaranmodel->getNoUjiBydaftar($id);
		$data['no_daftar']	= $id;
		$data['penguji']	= $this->penguji_model->getPenguji();
		$data['data']		= $this->pendaftaranmodel->getByPendaftar($id);
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('3');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenuHasilUji('4',$id);
		$this->load->view('hasil_uji/ujimekanis',$data);
	}
	
	function setStatus($id)
	{
		$data['no_uji']		= $this->pendaftaranmodel->getNoUjiBydaftar($id);
		$data['no_daftar']	= $id;
		$data['penguji']	= $this->penguji_model->getPenguji();
		$data['data']		= $this->pendaftaranmodel->getByPendaftar($id);
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('3');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenuHasilUji('5',$id);
		$this->load->view('hasil_uji/status',$data);
	}

	function simpanstatus()
	{
		$no_bap		= $this->input->post('no_bap');
		$no_daftar	= $this->input->post('no_daftar');
		$no_uji		= $this->input->post('no_uji');
		$tgl		= $this->converter_model->tgl_In_Eng($this->input->post('tgl_periksa'));
		$verifikasi	= $this->input->post('hasil');
		$ket		= $this->input->post('ket');
		$penguji	= $this->input->post('penguji');
		$kdUnit		= $this->session->userdata('kdUnit');
		$tData		= $this->input->post('tData');
		
		if($tData=="1")
		{
			$varData=array('no_bap'=>$no_bap,'tgl_pengujian'=>$tgl,'hasil_pengujian'=>$verifikasi,'keterangan'=>$ket,'NRP'=>$penguji);
			$this->pengujianmodel->updateStatus($no_daftar,$varData);
		}
		else
		{
			$varData=array('no_bap'=>$no_bap,'no_pendaftaran'=>$no_daftar,'no_srut'=>$no_uji,'tgl_pengujian'=>$tgl,'hasil_pengujian'=>$verifikasi,'keterangan'=>$ket,'NRP'=>$penguji,'kode_unit'=>$kdUnit);
			$this->pengujianmodel->simpanStatus($varData);
		}
		
		$varData=array('status'=>'verifikasi');
		$this->pendaftaranmodel->update($no_daftar,$varData);
		
		redirect('hasiluji','refresh');
	}
}