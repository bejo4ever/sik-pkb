<?php if ( ! defined('BASEPATH')) exit('Silahkan menghubungi Administrator');
 
class jenis_kendaraan extends CI_Controller {
 
	function __construct() 
	{
		
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('temp_model','',TRUE);
		$this->load->model('master_model','',TRUE);
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
		$data['total']		= $this->master_model->count_data("1");
		$data['jKendaraan']	= $this->master_model->getAllJenisKendaraan();
		$data['kKendaraan']	= $this->master_model->getAllKelompokKendaraan();
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('4');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenudaftar('1');
		
		$this->load->view('data_rujukan/jenis_kendaraan/jenis_kendaraan',$data);
	}
	function simpanJenisKendaraan()
	{
		$kel	= $this->input->post('kelompok');
		$nama	= $this->input->post('name');
		$idBaru	= $this->master_model->getidJenisKendaraanBaru();
		if($nama!="")
		{	
			$varData=array('id_jeniskendaraan'=>$idBaru,'detail'=>$nama,'id_kelompokkendaraan'=>$kel);
			$this->master_model->saveJenisKendaraan($varData);
		}	
		redirect('jenis_kendaraan','refresh');
	}
	function editJenisKendaraan($id)
	{
		$data['kKendaraan']	= $this->master_model->getAllKelompokKendaraan();
		$data['dKendaraan']	= $this->master_model->getbyidJenisKendaraan($id)->result();
		$this->load->view('data_rujukan/jenis_kendaraan/edit_jeniskendaraan',$data);
	}
	function simpanEditJenisKendaraan()
	{
		$id		= $this->input->post('id');
		$kel	= $this->input->post('kelompok');
		$nama	= $this->input->post('name');
		if($nama!="")
		{	
			$varData=array('detail'=>$nama,'id_kelompokkendaraan'=>$kel);
			$this->master_model->updateJenisKendaraan($id,$varData);
		}	
		redirect('jenis_kendaraan','refresh');
	}
	function hapusJenisKendaraan($id)
	{
		$this->master_model->deleteJenisKendaraan($id);
		redirect('jenis_kendaraan','refresh');
	}
	
}