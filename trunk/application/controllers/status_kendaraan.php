<?php if ( ! defined('BASEPATH')) exit('Silahkan menghubungi Administrator');
 
class status_kendaraan extends CI_Controller {
 
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
		
		$data['dKendaraan']	= $this->master_model->getAllTipeKendaraan();
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('4');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenudaftar('1');
		
		$this->load->view('data_rujukan/status_kendaraan/status_kendaraan',$data);
	}
	function simpanTipeKendaraan()
	{
		$nama	= $this->input->post('name');
		if($nama!="")
		{	
			$varData=array('detail'=>$nama);
			$this->master_model->saveTipeKendaraan($varData);
		}	
		redirect('status_kendaraan','refresh');
	}
	function editTipeKendaraan($id)
	{
		$data['dKendaraan']	= $this->master_model->getbyidTipeKendaraan($id)->result();
		$this->load->view('data_rujukan/status_kendaraan/edit_tipekendaraan',$data);
	}
	function simpanEditTipeKendaraan()
	{
		$id		= $this->input->post('id');
		$nama	= $this->input->post('name');
		if($nama!="")
		{	
			$varData=array('detail'=>$nama);
			$this->master_model->updateTipeKendaraan($id,$varData);
		}	
		redirect('status_kendaraan','refresh');
	}
	function hapusTipeKendaraan($id)
	{
		$this->master_model->deleteTipeKendaraan($id);
		redirect('status_kendaraan','refresh');
	}
	
}