<?php if ( ! defined('BASEPATH')) exit('Silahkan menghubungi Administrator');
 
class user extends CI_Controller {
 	private $limit = 10;
	function __construct()
	{
		
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('temp_model','',TRUE);
		$this->load->model('user_model','',TRUE);
		$this->load->library('pagination');
		$this->cekLogin();
	}
	function cekLogin()
	{
		if($this->session->userdata('id_level')=="")
		{
			redirect('home');
		}
	}
	public function index($offset=0)
	{
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);
		$config['base_url'] = site_url('user/index/');
		$config['total_rows'] = $this->user_model->count_data();
		$config['per_page'] = $this->limit;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		$data['fields']	= $this->user_model->get_list_data($this->limit,$offset);
		
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('6');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenudaftar('1');
		
		$this->load->view('user/user_data',$data);
	}
	function save()
	{
		$nip		= $this->input->post('nip');
		$name		= $this->input->post('nama');
		//$username	= $this->input->post('username');,'username'=>$username
		$pass		= $this->input->post('pass1');
		$level		= $this->input->post('level');
		
			$varData=array('NIP'=>$nip,'nama_asli'=>$name,'password'=>$pass,'id_level'=>$level);
			$this->user_model->save($varData);
			
		redirect('user','refresh');
	}
	function edit($id)
	{
		$data['dUser']	= $this->user_model->getbyid($id)->result();
		$this->load->view('user/user_edit',$data);
	}
	function editAccount()
	{
		$userId	= $this->session->userdata('userid');
		
		$data['dUser']		= $this->user_model->getbyid($userId)->result();
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('6');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenudaftar('1');
		$this->load->view('user/user_account',$data);
	}
	function saveEdit()
	{
		$nip		= $this->input->post('nip');
		$name		= $this->input->post('nama');
		//$username	= $this->input->post('username');,'username'=>$username
		$id			= $this->input->post('id');
		$level		= $this->input->post('level');
		
		/*echo "'NIP'=>$nip,'nama_asli'=>$name,'username'=>$username,'id_level'=>$level";*/
		
			$varData=array('NIP'=>$nip,'nama_asli'=>$name,'id_level'=>$level);
			$this->user_model->update($id,$varData);
			
		redirect('user','refresh');
	}
	function hapus($id)
	{
		$this->user_model->delete($id);
		redirect('user','refresh');
	}
}