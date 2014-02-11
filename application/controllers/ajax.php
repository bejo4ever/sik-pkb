<?php
class ajax extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('kabkotamodel','',TRUE);
		$this->load->model('user_model','',TRUE);
	}
	function getKab($id)
	{
		$datKab=$this->kabkotamodel->get_by_prop($id)->result();
		if(count($datKab)==0)
		{
			echo "kab.options[kab.options.length] = new Option('--- Kab/Kota ---',' ');\n";
		}
		else
		{
			echo "kab.options[kab.options.length] = new Option('--- Kab/Kota ---',' ');\n";
			foreach($datKab as $k)
			{
				echo "kab.options[kab.options.length] = new Option('".$k->nama_kabkota."','".$k->kode_kabkota."');\n";
			}
		}
	}
	function cekNIP($nip)
	{
		$dataUser=$this->user_model->getUserByNip($nip)->result();
		if(count($datKab)!=0)
		{
			echo "alert('NIP Sudah Terdaftar !!');";
		}
		
	}
}