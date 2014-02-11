<?php if ( ! defined('BASEPATH')) exit('Silahkan menghubungi Administrator');
 
class pencetakan extends CI_Controller {
 
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
		$this->load->model('prapengujianmodel','',TRUE);
		$this->load->model('unitpkb_model','',TRUE);
		$this->load->model('peralatanuji_model','',TRUE);
		$this->cekLogin();
	}

	function cekLogin()
	{
		if($this->session->userdata('id_level')=="")
		{
			redirect('home');
		}
	}

	function index()
	{
		$data['data']		= $this->pendaftaranmodel->getAllSudahVerifikasi();
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('2');
		$data['footer']		= $this->temp_model->footerInc();

		$this->load->view('pencetakan/hasil_uji',$data);
	}
	
	function hasilPengujianDet($id)
	{
		$data['no_daftar']	= $id;
		$data['no_uji']		= $this->pendaftaranmodel->getNoUjiBydaftar($id);
		$data['detail']		= $this->pendaftaranmodel->getByPendaftar($id);
		$data['penguji']	= $this->penguji_model->getPenguji();
		$data['hasildata']	= $this->pengujianmodel->getStatus($id);
		$data['dataHasil']	= $this->uraianmodel->getById($this->pendaftaranmodel->getNoUjiBydaftar($id))->result();
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('3');
		$data['footer']		= $this->temp_model->footerInc();
		
		$this->load->view('pencetakan/hasil_uji_det',$data);
	}
}
