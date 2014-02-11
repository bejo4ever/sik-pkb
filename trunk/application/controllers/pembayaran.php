<?php if ( ! defined('BASEPATH')) exit('Silahkan menghubungi Administrator');
 
class pembayaran extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('temp_model','',TRUE);
		$this->load->model('master_model','',TRUE);
		$this->load->model('pendaftaranmodel','',TRUE);
		$this->load->model('pemilikmodel','',TRUE);
		$this->load->model('kendaraanmodel','',TRUE);
		$this->load->model('uraianmodel','',TRUE);
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
		$data['data']		= $this->pendaftaranmodel->getAllBayar();
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('2');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenudaftar('3');
		
		$this->load->view('pembayaran/pembayaran_data',$data);
	}
	
	function detailBayar($id)
	{
		$biaya	= $this->pendaftaranmodel->getDataPendaftaran($id);
		foreach($biaya as $dat)
		{
			$jumlahBayar	= $this->converter_model->setRp($dat->jumlah_bayar);
			$retribusi		= explode("|",$dat->retribusi);
		}
		echo "<table width='100%'>";
		for($i=0;$i<count($retribusi)-1;$i++)
		{
			$datRetribusi=$this->retribusimodel->getbyid("$retribusi[$i]")->result();
			foreach($datRetribusi as $dat2)
			{
				echo "<tr><td>".($i+1)."</td><td>".$dat2->deskripsi."</td><td align='right'>".$this->converter_model->setRp($dat2->nilai)."</td></tr>";
			}
		}
		echo"<tr><td colspan='2' align='left'><h4>Jumlah Biaya yang Harus Dibayar </td><td align='right'> <b>$jumlahBayar</b></h4></td></tr>";
		echo"</table>";
	}
	
	function dibayar($id)
	{
		$varData=array('status'=>'bayar');
		$this->pendaftaranmodel->update($id,$varData);
		
		redirect('pembayaran','refresh');
	}

	function struk_pembyrn($id)
	{
		$biaya	= $this->pendaftaranmodel->getDataPendaftaran($id);
		foreach($biaya as $dat)
		{
			$data['no']				= $dat->no_pendaftaran;
			$data['nama']			= $dat->nama_pendaftar;
			$data['jumlahBayar']	= $this->converter_model->setRp($dat->jumlah_bayar);
			$data['retribusi']		= explode("|",$dat->retribusi);
		}
		
		$content 	=$this->load->view('pembayaran/struk',$data,TRUE);;
		
		$file_name         = "Struk Pembayaran"; 
		$this->load->library('html2pdf/html2pdf');
		$html2pdf = new Html2Pdf('P','A4','en',array(5,5,5,5));  
		$this->html2pdf->WriteHTML($content);  
		$this->html2pdf->Output($file_name.'.pdf');
	}
}