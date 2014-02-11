<?php

//session_start();
class provinsi extends CI_Controller {

private $limit = 10000;

	function __construct()
	{
		parent :: __construct();
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('temp_model','',TRUE);
		$this->load->model('propinsiModel','',TRUE);
		$this->cekLogin();
	}
	function cekLogin()
	{
		if($this->session->userdata('id_level')=="")
		{
			redirect('home');
		}
	}
	function is_logged_in()
	{
		if($_SESSION['privilege']=="")
		{
			redirect('home/errorLogin','refresh');
		}
		
	}
	
// == List data ==
	function index($offset = 0)
	{
	
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('4');
		$data['footer']		= $this->temp_model->footerInc();
		//$data['submenu']	= $this->temp_model->submenudaftar('1');
	
		
			$uri_segment = 3;
			$offset = $this->uri->segment($uri_segment);
			$this->load->library('pagination');
			$config['base_url'] = site_url('provinsi/index/');
			$config['total_rows'] = $this->propinsiModel->count_propinsi();
			$config['per_page'] = $this->limit;
			$this->pagination->initialize($config);
			$data['pagination'] = $this->pagination->create_links();
			
			$data['offset']=$offset;
			
			$data['fields'] = $this->propinsiModel->get_list_propinsi($this->limit,$offset)->result();
			
			$data['jumlah']=$this->propinsiModel->count_propinsi();
			
		
		$this->load->view('data_rujukan/provinsi/provinsi_data',$data);
	}
	

// === Add data ===

	function newData()
	{
		//$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('4');
		$data['footer']		= $this->temp_model->footerInc();
		
		$this->load->view('data_rujukan/provinsi/provinsi_add', $data);
	}
	
// == save data ==
	function saveData()
		{
			$nama_provinsi				= $this->input->post('nama_provinsi');
			$kode_provinsi				= $this->input->post('kode_provinsi');
								
			if($nama_provinsi!=""){
				$data = array(
					'nama_provinsi'		=> $nama_provinsi,
					'kode_provinsi'		=> $kode_provinsi			
					);
				$this->propinsiModel->save($data);
			}
			redirect('provinsi/index','refresh');
		}

	function saveDat()
		{
				
			$kode_provinsi	= $this->input->post('kode_provinsi');
			$nama_provinsi	= $this->input->post('nama_provinsi');
			
			$kode=$this->propinsiModel->checkByKode($kode_provinsi)->result();
			$nama=$this->propinsiModel->checkByProv($nama_provinsi)->result();
			
			if (count($kode) != 0 || count($nama) != 0)
				{
					$data['inc']		= $this->temp_model->includeFile();
					$data['header']		= $this->temp_model->headerInc('4');
					$data['footer']		= $this->temp_model->footerInc();
					$data['f'] = 1;
					
					$uri_segment = 3;
					$offset = $this->uri->segment($uri_segment);
					$this->load->library('pagination');
					$config['base_url'] = site_url('provinsi/index/');
					$config['total_rows'] = $this->propinsiModel->count_propinsi();
					$config['per_page'] = $this->limit;
					$this->pagination->initialize($config);
					$data['pagination'] = $this->pagination->create_links();
					
					$data['offset']=$offset;
					
					$data['fields'] = $this->propinsiModel->get_list_propinsi($this->limit,$offset)->result();
					
					$data['jumlah']=$this->propinsiModel->count_propinsi();
					
				
				$this->load->view('data_rujukan/provinsi/provinsi_data',$data);
					
							
				} 
				else 
				{
					
					$this->saveData();
				}
				

		}
		
	function kodecheck($str)
	{
			$kode_provinsi	= $this->input->post('kode_provinsi');
			$nama_provinsi	= $this->input->post('nama_provinsi');
			
			$query=$this->propinsiModel->checkByKode($kode_provinsi)->result();
			
			if(count ($query) == 0)
			{
				
			$this->form_validation->set_message('usercheck', '<p class="error"> Password Salah, Silahkan Ulangi !! </p>');
			}
	}



// === edit data ==	
	function editData($id)
	{
		
		if($_POST==NULL)
		{
			//$data['inc']		= $this->temp_model->includeFile();
			$data['fields']	= $this->propinsiModel->get_by_id($id);
			$this->load->view('data_rujukan/provinsi/provinsi_edit',$data);
			
		}else {
									
			//$id	= $this->input->post('id_provinsi');
			$nama_provinsi	= $this->input->post('nama_provinsi');
			$id	= $this->input->post('kode_provinsi');
			
			$this->propinsiModel->update($id);
			redirect('provinsi/index');
			
		}
				
	}

// == delete ==
		function deleteData($id)
			{
				$this->propinsiModel->delete($id);
				redirect('provinsi/index/');
			}
	


}
