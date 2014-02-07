<?php if ( ! defined('BASEPATH')) exit('Silahkan menghubungi Administrator');
 
class bengkel extends CI_Controller {
 
	function __construct() 
	{
		
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('temp_model','',TRUE);
		$this->load->model('bengkel_model','',TRUE);
		$this->load->model('unitpkb_model','',TRUE);
		$this->load->model('dishub_model','',TRUE);
	}
	
	public function index()
	{
		$data['dishub']		= $this->dishub_model->getDishub();
		$data['data']		= $this->bengkel_model->getBengkel();
		$data['inc']		= $this->temp_model->includeFile();
		$data['fasilitas']	= $this->unitpkb_model->getFasilitas();
		$data['header']		= $this->temp_model->headerInc('1');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenudaftar('1');
		
		$this->load->view('data_rujukan/bengkel/bengkel_data',$data);
	}
	
	function update()
	{
		$id			= $this->input->post('id');
		$nama		= $this->input->post('nama');
		$dishub		= $this->input->post('dishub');
		$email		= $this->input->post('email');
		$alamat		= $this->input->post('alamat');
		$kepala		= $this->input->post('kepala');
		$telp		= $this->input->post('telp');
		$luas		= $this->input->post('luas');
		$kapasitas	= $this->input->post('kapasitas');
		
		
		if($id!="")
		{
			$varData=array('nama_bengkel'=>$nama,'alamat_bengkel'=>$alamat,'telp_bengkel'=>$telp,'email_bengkel'=>$email,'nama_pemilik'=>$kepala,'luas'=>$luas,'kapasitas'=>$kapasitas,'kode_dishub'=>$dishub);
			$this->bengkel_model->update($id,$varData);
		}
		else
		{
			$varData=array('kode_bengkel'=>$dishub."1",'nama_bengkel'=>$nama,'alamat_bengkel'=>$alamat,'telp_bengkel'=>$telp,'email_bengkel'=>$email,'nama_pemilik'=>$kepala,'luas'=>$luas,'kapasitas'=>$kapasitas,'kode_dishub'=>$dishub);
			$this->bengkel_model->save($varData);
		}
		
		redirect('bengkel','refresh');
	}	
}