<?php if ( ! defined('BASEPATH')) exit('Silahkan menghubungi Administrator');
 
class klasifikasi_uji extends CI_Controller {
 
	function __construct() 
	{
		
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('temp_model','',TRUE);
		$this->load->model('master_model','',TRUE);
		$this->load->model('klasifikasiuji_model','',TRUE);
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
		$data['data']		= $this->klasifikasiuji_model->getAll();
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('4');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenudaftar('1');
		
		$this->load->view('data_rujukan/klasifikasi_uji/klasifikasi_data',$data);
	}
	function simpanBaru()
	{
		$idBaru	= $this->klasifikasiuji_model->getNoBaru();
		$desk	= $this->input->post('deskripsi');
		
		$varData	= array('kd_klasifikasi'=>$idBaru,'deskripsi_klasifikasi'=>$desk);
		$this->klasifikasiuji_model->save($varData);
		
		redirect('klasifikasi_uji','refresh');
	}
	function edit($id)
	{
		$data['data']	= $this->klasifikasiuji_model->getbyid($id)->result();
		$this->load->view('data_rujukan/klasifikasi_uji/edit_klasifikasi',$data);
	}
	function simpanEdit()
	{
		$id		= $this->input->post('id');
		$desk	= $this->input->post('deskripsi');
		
		$varData=array('deskripsi_klasifikasi'=>$desk);
		$this->klasifikasiuji_model->update($id,$varData);
		
		redirect('klasifikasi_uji','refresh');
	}
	function hapus($id)
	{
		$this->klasifikasiuji_model->delete($id);
		
		redirect('klasifikasi_uji','refresh');
	}
	
}