<?php if ( ! defined('BASEPATH')) exit('Silahkan menghubungi Administrator');
 
class retribusi extends CI_Controller {
 
	function __construct() 
	{
		
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('temp_model','',TRUE);
		$this->load->model('master_model','',TRUE);
		$this->load->model('retribusimodel','',TRUE);
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
		
		$data['dRetribusi']	= $this->retribusimodel->getAllData();
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('4');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenudaftar('1');
		
		$this->load->view('data_rujukan/retribusi/retribusi_data',$data);
	}
	function simpanBaru()
	{
		$idBaru		= $this->retribusimodel->getNoBaru();
		$deskripsi	= $this->input->post('deskripsi');
		$nilai		= $this->input->post('nilai');
		$kdUnit		= $this->session->userdata('kdUnit');
		
		$varData=array('kd_retribusi'=>$idBaru,'unit_pkb'=>$kdUnit,'deskripsi'=>$deskripsi,'nilai'=>$nilai);
		$this->retribusimodel->save($varData);
		
		redirect('retribusi','refresh');
	}
	function edit($id)
	{
		$data['dRetribusi']	= $this->retribusimodel->getbyid($id)->result();
		$this->load->view('data_rujukan/retribusi/edit_retribusi',$data);
	}
	function simpanEdit()
	{
		$kdRetribusi	= $this->input->post('id');
		$deskripsi		= $this->input->post('deskripsi');
		$nilai			= $this->input->post('nilai');
		
		$varData=array('deskripsi'=>$deskripsi,'nilai'=>$nilai);
		$this->retribusimodel->update($kdRetribusi,$varData);
		
		redirect('retribusi','refresh');
	}
	function hapus($id)
	{
		$this->retribusimodel->delete($id);
		
		redirect('retribusi','refresh');
	}
}