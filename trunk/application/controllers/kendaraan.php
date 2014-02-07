<?php if (!defined('BASEPATH')) exit('Silahkan menghubungi Administrator');
 
class kendaraan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('temp_model','',TRUE);
		$this->load->model('kendaraanmodel','',TRUE);
		$this->load->model('pemilikmodel','',TRUE);
		$this->load->model('kabkotamodel','',TRUE);
		$this->load->model('pendaftaranmodel','',TRUE);
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
		$data['data']		= $this->kendaraanmodel->getAllKendaraan();
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('1');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenudaftar('1');

		$this->load->view('kendaraan/kendaraan_data',$data);
	}
	
	function addKendaraan()
	{
		$data['jenisKend']	= $this->master_model->getAllJenisKendaraan();
		$data['tipeKend']	= $this->master_model->getAllTipeKendaraan();
		$data['kota'] 		= $this->kabkotamodel->get_by_prop($this->session->userdata('kdProv'))->result();
		$data['dRetribusi']	= $this->retribusimodel->getAllData();
		$data['inc']		= $this->temp_model->includeFile();
		$data['header']		= $this->temp_model->headerInc('3');
		$data['footer']		= $this->temp_model->footerInc();
		$data['submenu']	= $this->temp_model->submenudaftar('1');
		
		$this->load->view('kendaraan/kendaraan_baru', $data);
	} 
	
	function simpanKendaraanBaru()
	{
		$kdUnit	= $this->session->userdata('kdUnit');

		// Post data identitas kendaraan
		$noUji			= $this->input->post('no_uji');
		$noKend			= $this->input->post('no_kend');
		$merek			= $this->input->post('merek');
		$tipe			= $this->input->post('tipe');
		$jenisKend		= $this->input->post('jenisK');
		$silinder		= $this->input->post('silinder');
		$daya			= $this->input->post('daya');
		$satuanDaya		= $this->input->post('satuan_daya');
		$bahanBakar		= $this->input->post('bahan_bakar');
		$tahunBuat		= $this->input->post('tahun_buat');
		$penggunaan		= $this->input->post('penggunaan');
		$chasis			= $this->input->post('chasis');
		$noMesin		= $this->input->post('no_mesin');
		$noUjitipe		= $this->input->post('no_ujitipe');
		$tglUjitipe		= $this->converter_model->tgl_In_Eng($this->input->post('tgl_ujitipe'));
		$noSRUT			= $this->input->post('no_srut');
		$tglSRUT		= $this->converter_model->tgl_In_Eng($this->input->post('tgl_srut'));
		$tglUjiPertama	= $this->converter_model->tgl_In_Eng($this->input->post('tgl_ujipertama'));
		$tglUjiBerikut	= $this->converter_model->tgl_In_Eng($this->input->post('tgl_ujiberikut'));
		$tglAwal		= date('Y-m-d');

		// Post data pemilik kendaraan
		$pemilik		= $this->input->post('pemilik');
		$idCard			= $this->input->post('id_card');
		$alamat			= $this->input->post('alamat');
		$kota			= $this->input->post('kota');
		$telp			= $this->input->post('telp');
		$hp				= $this->input->post('hp');
		$email			= $this->input->post('email');
		
		// Upload foto kendaraan
		$img1 = $this->img1_upload($noKend);
		$img2 = $this->img2_upload($noKend);
		$img3 = $this->img3_upload($noKend);
		$img4 = $this->img4_upload($noKend);
		
		if($img1=="error"){ $img1="0_1.jpg"; }
		if($img2=="error"){ $img2="0_2.jpg"; }
		if($img3=="error"){ $img3="0_3.jpg"; }
		if($img4=="error"){ $img4="0_4.jpg"; }
		
		// Simpan data kendaraan
		$varKendaraan	=array('no_uji'=>$noUji,'no_kendaraan'=>$noKend,'merek'=>$merek,'tipe'=>$tipe,'id_jeniskendaraan'=>$jenisKend,'isi_silinder'=>$silinder,'daya_motor'=>$daya,'satuan_daya'=>$satuanDaya,'bahan_bakar'=>$bahanBakar,'tahun_buat'=>$tahunBuat,'id_statuskendaraan'=>$penggunaan,'no_chassis'=>$chasis,'no_mesin'=>$noMesin,'no_ujitipe'=>$noUjitipe,'tgl_ujitipe'=>$tglUjitipe,'no_srut'=>$noSRUT,'tgl_srut'=>$tglSRUT,'kode_unit'=>$kdUnit,'tgl_ujipertama'=>$tglUjiPertama,'tgl_ujiberikut'=>$tglUjiBerikut,'foto_depan'=>$img1,'foto_belakang'=>$img2,'foto_kiri'=>$img3,'foto_kanan'=>$img4);
		$this->kendaraanmodel->save($varKendaraan);
		
		// Simpan data pemilik kendaraan
		$varPemilik	 = array('no_srut'=>$noSRUT,'nama'=>$pemilik,'id_card'=>$idCard,'alamat'=>$alamat,'kode_kabkota'=>$kota,'no_telp'=>$telp,'no_hp'=>$hp,'email'=>$email);
		$this->pemilikmodel->save($varPemilik);
		
		redirect('kendaraan','refresh');	
	}

	function detail($id)
	{
		$data = $this->pendaftaranmodel->getById($id);

		foreach($data as $dat)
		{
			echo'
				<div class="clearfix">
				<table width="100%">
				<tr height="25px"><td colspan="3"><b>Pemilik Kendaraan</b></td></tr>
				<tr><td width="18%">Nama Pemilik<td><td width="3%">:</td><td>'.$dat->nama.'</td><td width="18%">No. HP<td><td>:</td><td>'.$dat->no_hp.'</td></tr>
				<tr><td>Alamat<td><td>:</td><td>'.$dat->alamat.'</td><td>Email<td><td>:</td><td>'.$dat->email.'</td></tr>
				<tr><td>No. Telepon<td><td>:</td><td>'.$dat->no_telp.'</td><td colspan="2"></td></tr>
				
				<tr height="35px"><td colspan="3"><br><b>Data Kendaraan</b></td></tr>
				<tr><td>Jenis Kendaraan<td><td>:</td><td>'.$this->master_model->namaJenis($dat->id_jeniskendaraan).'</td><td>Bahan Bakar<td><td>:</td><td>'.$dat->bahan_bakar.'</td></tr>
				<tr><td>Status Penggunaan<td><td>:</td><td>'.$this->master_model->namaTipe($dat->id_statuskendaraan).'</td><td>No Chassis<td><td>:</td><td>'.$dat->no_chassis.'</td></tr>
				<tr><td>No. Kendaraan<td><td>:</td><td>'.$dat->no_kendaraan.'</td><td>No. Mesin<td><td>:</td><td>'.$dat->no_mesin.'</td></tr>
				<tr><td>Merek<td><td>:</td><td>'.$dat->merek.'</td><td>Isi Silinder<td><td>:</td><td>'.$dat->isi_silinder.' cc</td></tr>
				<tr><td>Tipe<td><td>:</td><td>'.$dat->tipe.'</td><td>Daya Motor<td><td>:</td><td>'.$dat->daya_motor.' '.$dat->satuan_daya.'</td></tr>
				<tr><td>Tahun Pembuatan<td><td>:</td><td>'.$dat->tahun_buat.'</td><td colspan="2"></td></tr>
				
				<tr height="35px"><td colspan="3"><br><b>Detail Pendaftaran</b></td></tr>
				<tr><td width="18%">Tgl Uji Pertama<td><td>:</td><td>'.$dat->tgl_ujipertama.'</td>
				<tr><td width="18%">Tgl Uji Berikut<td><td>:</td><td>'.$dat->tgl_ujiberikut.'</td></tr>
				</table>
				
				<table width="100%" cellspacing="5">
				<tr height="35px"><td colspan="3"><br><b>Foto Kendaraan</b></td></tr>
				<tr>
				<td width="24%"><img src="'.base_url().'uploads/dpn/thumbnail/'.$dat->foto_depan.'"></img></td>
				<td width="24%"><img src="'.base_url().'uploads/blkng/thumbnail/'.$dat->foto_belakang.'"></img></td>
				<td width="24%"><img src="'.base_url().'uploads/kiri/thumbnail/'.$dat->foto_kiri.'"></img></td>
				<td width="24%"><img src="'.base_url().'uploads/kanan/thumbnail/'.$dat->foto_kanan.'"></img></td>
				</tr></table>
				</div>
			';
		}
	}
	
	function bukuuji($id)
	{
		$data['dKendaraan']	= $this->kendaraanmodel->getDetailKendaraan($id);
		$data['pengujian']	= $this->kendaraanmodel->listPengujian($id);

		$this->load->view('kendaraan/bukuuji',$data);
	}
	
	function printPDF($id)
	{
		$data['dKendaraan']	= $this->kendaraanmodel->getDetailKendaraan($id);
		$data['pengujian']	= $this->kendaraanmodel->listPengujian($id);
		
		$content = $this->load->view('kendaraan/bukuuji_pdf',$data,TRUE);
		
		$file_name = "buku_uji_".$id; 
		$this->load->library('html2pdf/html2pdf');
		$html2pdf = new Html2Pdf('P','A4','en',array(5,5,5,5));  
		$this->html2pdf->WriteHTML($content);  
		$this->html2pdf->Output($file_name.'.pdf');
	}
	
	function printTandaSamping($id)
	{
		$data['dKendaraan']	= $this->kendaraanmodel->getDetailKendaraan($id);
		$data['pengujian']	= $this->kendaraanmodel->listPengujian($id);
				
		$content = $this->load->view('kendaraan/tandasamping_pdf',$data,TRUE);
		
		$file_name	= "tanda_samping_".$id; 
		$this->load->library('html2pdf/html2pdf');
		$html2pdf = new Html2Pdf('P','A4','en',array(5,5,5,5));  
		$this->html2pdf->WriteHTML($content);  
		$this->html2pdf->Output($file_name.'.pdf');
	}
	
	function selesaiUji($id)
	{
		$varData =	array('status'=>'selesai');
		$this->pendaftaranmodel->update($id,$varData);
	
		redirect('laporan/hasilPengujian','refresh');
	}
}