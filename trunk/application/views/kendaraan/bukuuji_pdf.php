
<page backtop="40px" backbottom="5px" backleft="5px" backright="5px" width="100%">
	
	<page_header>
		<table style="width: 100%; border: solid 0px black;">
			<tr>
				<td style="text-align: left;	width: 23%"><img src="<?=base_url()?>dishub.png"/></td>
				<td style="text-align: center;	width: 54%">SISTEM INFORMASI PENGUJIAN DAN PEMERIKSAAN KENDARAAN BERMOTOR</td>
				<td style="text-align: right;	width: 23%">Ditjen Hubdat</td>
			</tr>
		</table>
	</page_header>
	
	<page_footer>
		<table style="width: 100%; border: solid 0px black;">
			<tr>
				<td style="text-align:left; width: 50%"><?=date('d/m/Y')?></td>
				<td style="text-align:right; width: 50%">Halaman [[page_cu]]/[[page_nb]]</td>
			</tr>
		</table>
	</page_footer>
	
	<table style="width:100%;" border='0' cellpadding='0' cellspacing='0' align='center'>
	<tr>
		<td align='center'>
			<h4><u>IDENTIFIKASI KENDARAAN DAN PEMILIK</u>
			<br><p style="margin-top:-1px"><i>IDENTIFICATION OF VEHICLE AND OWNER</i></p></h4>
		</td>
	</tr>
	</table>
	
	<br>
	<?php
		foreach($dKendaraan as $d1)
		{
			$noUji			= $d1->no_uji;
			$noKendaraan	= $d1->no_kendaraan;
			$pemilik		= $d1->nama;
			$alamat			= $d1->alamat;
			$idCard			= $d1->id_card;
		}
	?>
					
	<table style="border: 0px thin 75B3E3; width:100%;" cellpadding="0" cellspacing="0" align="center">
		<tr>
			<td colspan="3" width="500" height="80">
				<label><b><u>PEMILIK</u><br><p style="margin-top:-1px;"><i>(OWNER)</i></p></b></label>
				</td>
		</tr>
		<tr>
			<td height="40"><b><u>Nomor Uji Berkala</u></b><br>
			<p style="margin-top:-1px;"><i>(Periodical Inspection Number)</i></p></td>
			<td width="2%">:</td><td><span class="isi"><?=$noUji?></span></td>
		</tr>
		<tr>
			<td height="40"><b><u>Nomor Kendaraan</u></b><br>
			<p  style="margin-top:-1px;">(Vehicle Registration Number)</p></td>
			<td>:</td><td><span class="isi"><?=$noKendaraan?></span></td>
		</tr>
		<tr>
			<td height="40"><b><u>Nama Pemilik Kendaraan</u></b><br><p  style="margin-top:-1px;">(Name of Owner)</p></td>
			<td>:</td><td><span class="isi"><?=$pemilik?></span></td>
		</tr>
		<tr>
			<td height="40"><b><u>Alamat Pemilik Kendaraan</u></b><br>
			<p  style="margin-top:-1px;">(Address of Owner)</p></td>
			<td>:</td><td><span class="isi"><?=$alamat?></span></td>
		</tr>
		<tr>
			<td height="40"><b><u>Kartu Identitas Diri</u></b><br>
			<p  style="margin-top:-1px;">(ID Card)</p></td>
			<td>:</td><td><span class="isi"><?=$idCard?></span></td>
		</tr>
	</table>
	
</page>

<page backtop="40px" backbottom="5px" backleft="5px" backright="5px" width="100%">
	
	<page_header>
		<table style="width: 100%; border: solid 0px black;">
			<tr>
				<td style="text-align: left;	width: 23%"><img src="<?=base_url()?>dishub.png"/></td>
				<td style="text-align: center;	width: 54%">SISTEM INFORMASI PENGUJIAN DAN PEMERIKSAAN KENDARAAN BERMOTOR</td>
				<td style="text-align: right;	width: 23%">Ditjen Hubdat</td>
			</tr>
		</table>
	</page_header>
	
	<page_footer>
		<table style="width: 100%; border: solid 0px black;">
			<tr>
				<td style="text-align:left; width: 50%"><?=date('d/m/Y')?></td>
				<td style="text-align:right; width: 50%">Halaman [[page_cu]]/[[page_nb]]</td>
			</tr>
		</table>
	</page_footer>
	
	<?php
		foreach($dKendaraan as $d2)
		{
			$merek		= $d2->merek;
			$tipe		= $d2->tipe;
			$jenis		= $this->master_model->namaJenis($d2->id_jeniskendaraan);
			$silinder	= $d2->isi_silinder;
			$daya		= $d2->daya_motor;
			$sDaya		= $d2->satuan_daya;
			$bahanBakar	= $d2->bahan_bakar;
			$pembuatan	= $d2->tahun_buat;
			$penggunaan	= $this->master_model->namaTipe($d2->id_statuskendaraan);
			$chasis		= $d2->no_chassis;
			$noMesin	= $d2->no_mesin;
			$nosrut		= $d2->no_ujitipe." ".$d2->tgl_ujitipe."<br>".$d2->no_srut." ".$d2->tgl_srut;
		}
	?>
					
	<table style="width:100%;" border='0' cellpadding='0' cellspacing='0' align='center'>
	<tr>
		<td align='center'>
			<h4><u>URAIAN DATA KENDARAAN</u>
			<br><p style="margin-top:-1px"><i>DESCRIPTION OF VEHICLE</i></p></h4>
		</td>
	</tr>
	</table>
	
	<br>
			
	<table style="border: 0px thin 75B3E3; width:100%;" cellpadding="0" cellspacing="0" align="center">
		<tr>
			<td colspan="3" width="800" height="70"><b>IDENTITAS KENDARAAN <i>(IDENTITY OF VEHICLE)</i></b></td>
		</tr>
		<tr>
			<td height="40"><b>Merek</b> <span ><i>(Brand)</i></span></td>
			<td width="2%">:</td><td><span class="isi"><?=$merek?></span></td>
		</tr>
		<tr>
			<td height="40"><b>Tipe</b> <span ><i>(Type)</i></span></td>
			<td>:</td><td><span class="isi"><?=$tipe?></span></td>
		</tr>
		<tr>
			<td height="40"><b>Jenis</b> <span ><i>(Category)</i></span></td>
			<td>:</td><td><span class="isi"><?=$jenis?></span></td>
		</tr>
		<tr>
			<td height="40"><b>Isi Silinder</b> <span ><i>(Cylinder Volume)</i></span></td>
			<td>:</td><td><span class="isi"><?=$silinder?></span> cc</td>
		</tr>
		<tr>
			<td height="40"><b>Daya Motor</b> <span ><i>(Power)</i></span></td>
			<td>:</td><td><span class="isi"><?=$daya?></span> <?=$sDaya?></td>
		</tr>
		<tr>
			<td height="40"><b>Bahan Bakar</b> <span ><i>(Fuel)</i></span></td>
			<td>:</td><td><span class="isi"><?=$bahanBakar?></span></td>
		</tr>
		<tr>
			<td height="40"><b>Tahun Pembuatan</b> <span ><i>(Year of Manufactured)</i></span></td>
			<td>:</td><td><span class="isi"><?=$pembuatan?></span></td>
		</tr>
		<tr>
			<td height="40"><b>Status Penggunaan</b> <span ><i>(Usage Status)</i></span></td>
			<td>:</td><td><span class="isi"><?=$penggunaan?></span></td>
		</tr>
		<tr>
			<td><b>Nomor Rangka Landasan</b> <span ><i>(Chassis Number)</i></span></td>
			<td>:</td><td><span class="isi"><?=$chasis?></span></td>
		</tr>
		<tr>
			<td height="40"><b>Nomor Mesin</b> <span ><i>(Engine Number)</i></span></td>
			<td>:</td><td><span class="isi"><?=$noMesin?></span></td>
		</tr>
		<tr>
			<td height="40">
			<b><u>Nomor dan Tanggal Sertifikasi Uji Tipe dan Sertifikat Registrasi Uji Tipe</u></b><br>
			<p  style="margin-top:-1px;"><i>(Number and Date of Type Approval Certificate and Type Approval Certificate Registration)</i></p></td>
			<td>:</td><td><?=$nosrut?></td>
		</tr>
	</table>
	
</page>

<page backtop="40px" backbottom="5px" backleft="5px" backright="5px" width="100%">
	
	<page_header>
		<table style="width: 100%; border: solid 0px black;">
			<tr>
				<td style="text-align: left;	width: 23%"><img src="<?=base_url()?>dishub.png"/></td>
				<td style="text-align: center;	width: 54%">SISTEM INFORMASI PENGUJIAN DAN PEMERIKSAAN KENDARAAN BERMOTOR</td>
				<td style="text-align: right;	width: 23%">Ditjen Hubdat</td>
			</tr>
		</table>
	</page_header>
	
	<page_footer>
		<table style="width: 100%; border: solid 0px black;">
			<tr>
				<td style="text-align:left; width: 50%"><?=date('d/m/Y')?></td>
				<td style="text-align:right; width: 50%">Halaman [[page_cu]]/[[page_nb]]</td>
			</tr>
		</table>
	</page_footer>
					
	<table style="width:100%;" border='0' cellpadding='0' cellspacing='0' align='center'>
	<tr>
		<td align='center'>
			<h4><u>UKURAN KENDARAAN</u>
			<br><p style="margin-top:-1px"><i>(VEHICLE DIMENSIONS)</i></p></h4>
		</td>
	</tr>
	</table>
	
	<br>
						
	<table style="border: 0px thin 75B3E3; width:100%;" cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td width="800" height="30" colspan="3"><b>a. Ukuran Utama <i> (Main Dimension)</i></b></td>
	</tr>
	<tr>
		<td colspan="3">
			<?php
			foreach($dKendaraan as $d3)
			{
				$panjang	= $d3->panjang;
				$lebar		= $d3->lebar;
				$tinggi		= $d3->tinggi;
				$roh		= $d3->julur_belakang;
				$foh		= $d3->julur_depan;
			}
			?>
			
			<table style="border: 0px thin 75B3E3; width:100%; margin-left:15px;" cellpadding="0" cellspacing="0">
			<tr>
				<td width="800" height="20"><b>Panjang</b> <span > <i>(Length)</i></span></td>
				<td width="5">:</td><td><span class="isi"><?=$panjang?></span> mm</td>
			</tr>
			<tr>
				<td height="20"><b>Lebar</b> <span > <i>(Width)</i></span></td>
				<td>:</td><td><span class="isi"><?=$lebar?></span> mm</td>
			</tr>
			<tr>
				<td height="20"><b>Tinggi</b> <span > <i>(Height)</i></span></td>
				<td>:</td><td><span class="isi"><?=$tinggi?></span> mm</td>
			</tr>
			<tr>
				<td height="20"><b>Julur Belakang</b> <span > <i>(Rear Over Hang)/ROH</i></span></td>
				<td>:</td><td><span class="isi"><?=$roh?></span> mm</td>
			</tr>
			<tr>
				<td height="20"><b>Julur Depan</b> <span > <i>(Front Over Hang)/FOH</i></span></td>
				<td>:</td><td><span class="isi"><?=$foh?></span> mm</td>
			</tr>
			</table>
									
		</td>
	</tr>
	<tr>
		<td width="800" height="30" colspan="3"><b>b. Jarak Sumbu<i> (Wheel Base)</i></b></td>
	</tr>
	<tr>
		<td colspan="3">
			<?php
			foreach($dKendaraan as $d4)
			{
				$sumbu12	= $d4->sumbu_12;
				$sumbu23	= $d4->sumbu_23;
				$sumbu34	= $d4->sumbu_34;
				$q			= $d4->q;
			}
			?>
			
			<table style="border: 0px thin 75B3E3; width:100%; margin-left:15px;" cellpadding="0" cellspacing="0">
			<tr>
				<td width="800" height="20"><b>Sumbu I-II</b> <span > <i>(Axie I-II))</i></span></td>
				<td width="5">:</td><td><span class="isi"><?=$sumbu12?></span> mm</td>
			</tr>
			<tr>
				<td height="20"><b>Sumbu II-III</b> <span > <i>(Axie II-III)</i></span></td>
				<td width="5">:</td><td><span class="isi"><?=$sumbu23?></span> mm</td>
			</tr>
			<tr>
				<td height="20"><b>Sumbu III-IV</b> <span > <i>(Axie III-IV)</i></span></td>
				<td width="5">:</td><td><span class="isi"><?=$sumbu34?></span> mm</td>
			</tr>
			<tr>
				<td height="20"><b>Q</b> <span > <i>(Jarak Titik Berat)</i></span></td>
				<td width="5">:</td><td><span class="isi"><?=$q?></span> mm</td>
			</tr>
			</table>
					
		</td>
	</tr>
	<tr>
		<td width="800" height="30" colspan="3"><b>c. Dimensi Bak Muatan<i> (Mobil Barang Bak Terbuka/Bak Tertutup/Box)</i></b></td>
	</tr>
	<tr>
		<td colspan="3">
		
			<?php
			foreach($dKendaraan as $d5)
			{
				$p_bak	= $d5->panjang_bak;
				$l_bak	= $d5->lebar_bak;
				$t_bak	= $d5->tinggi_bak;
				$b_bak	= $d5->bahan_bak;
			}
			?>
			<table style="border: 0px thin 75B3E3; width:100%; margin-left:15px;" cellpadding="0" cellspacing="0">
			<tr>
				<td width="800" height="20"><b>Panjang</b></td>
				<td width="5">:</td><td><span class="isi"><?=$p_bak?></span> mm</td>
			</tr>
			<tr>
				<td height="20"><b>Lebar</b></td>
				<td width="5">:</td><td><span class="isi"><?=$l_bak?></span> mm</td>
			</tr>
			<tr>
				<td height="20"><b>Tinggi</b></td>
				<td width="5">:</td><td><span class="isi"><?=$t_bak?></span> mm</td>
			</tr>
			<tr>
				<td height="20"><b>Bahan Bak</b></td>
				<td width="5">:</td><td><span class="isi"><?=$b_bak?></span> mm</td>
			</tr>
			</table>
							
		</td>
	</tr>
	<tr>
		<td width="800" height="30" colspan="3"><b>c1. Dimensi Tangki</b></td>
	</tr>
	<tr>
		<td colspan="3">
		<?php
		foreach($dKendaraan as $d6)
		{
			$p_tangki	= $d6->panjang_tangki;
			$l_tangki	= $d6->lebar_tangki;
			$t_tangki	= $d6->tinggi_tangki;
			$v_tangki	= $d6->volume_tangki;
			$j_muatan	= $d6->jenis_muatan;
			$b_muatan	= $d6->berat_jenis_muatan;
			$b_tangki	= $d6->bahan_tangki;
		}
		?>
							
		<table style="border: 0px thin 75B3E3; width:100%; margin-left:15px;" cellpadding="0" cellspacing="0">
			<tr>
				<td width="800" height="20"><b>Panjang</b></td>
				<td width="5">:</td><td><span class="isi"><?=$p_tangki?></span> mm</td>
			</tr>
			<tr>
				<td height="20"><b>Lebar</b></td>
				<td>:</td><td><span class="isi"><?=$l_tangki?></span> mm</td>
			</tr>
			<tr>
				<td height="20"><b>Tinggi</b></td>
				<td>:</td><td><span class="isi"><?=$t_tangki?></span> mm</td>
			</tr>
			<tr>
				<td height="20"><b>Volume</b></td>
				<td>:</td><td><span class="isi"><?=$v_tangki?></span> ltr</td>
			</tr>
			<tr>
				<td height="20"><b>Jenis Muatan</b></td>
				<td>:</td><td><span class="isi"><?=$j_muatan?></span></td>
			</tr>
			<tr>
				<td height="20"><b>Berat Jenis Muatan</b></td>
				<td>:</td><td><span class="isi"><?=$b_muatan?></span> kg/dm<sup>3</sup></td>
			</tr>
			<tr>
				<td height="20"><b>Bahan Tamgki</b></td>
				<td>:</td><td><span class="isi"><?=$b_tangki?></span></td>
			</tr>
		</table>
		
		</td>
	</tr>
	<tr>
		<td width="800" height="30" colspan="3"><b><u>PEMAKAIAN BAN YANG DIIJINKAN</u></b><p style="margin-top:-1"><i>(PERMISSIBLE TIRE USED)</i></p></td>
	</tr>
	<tr>
		<td colspan="3">
			<?php
			foreach($dKendaraan as $d7)
			{
				$sumbu1	= $d7->sumbu_1;
				$sumbu2	= $d7->sumbu_2;
				$sumbu3	= $d7->sumbu_3;
				$sumbu4	= $d7->sumbu_4;
				$jbb	= $d7->jbb;
				$jbkb	= $d7->jbkb;
			}
			?>
							
			<table style="border: 0px thin 75B3E3; width:100%; margin-left:15px;" cellpadding="0" cellspacing="0">
			<tr>
				<td width="800" height="20"><b>a. Sumbu Ke-1</b> <span><i>(First Axie)</i></span></td>
				<td width="5">:</td><td><span class="isi"><?=$sumbu1?></span></td>
			</tr>
			<tr>
				<td height="20"><b>b. Sumbu Ke-2</b> <span><i>(Second Axie)</i></span></td>
				<td>:</td><td><span class="isi"><?=$sumbu2?></span> </td>
			</tr>
			<tr>
				<td height="20"><b>c. Sumbu Ke-3</b> <span><i>(Third Axie)</i></span></td>
				<td>:</td><td><span class="isi"><?=$sumbu3?></span> </td>
			</tr>
			<tr>
				<td height="20"><b>d. Sumbu Ke-4</b> <span><i>(Fourth Axie)</i></span></td>
				<td>:</td><td><span class="isi"><?=$sumbu4?></span> </td>
			</tr>
			</table>
			
		</td>
	</tr>
	<tr>
		<td width="700" height="40" colspan="3"><b><u>KONFIGURASI SUMBU</u></b><p style="margin-top:-1px">(AXLE CONFIGURATION)</p></td>
	</tr>
	<tr>
		<td width="700" height="30"><b><u>Jumlah Berat Yang Diperbolehkan (JBB)</u></b><p style="margin-top:-1px"><i>Gross Vehicle Weight(GVW)</i></p></td><td  width="3">:</td><td><span class="isi"><?=$jbb?></span> kg</td>
	</tr>
	<tr>
		<td width="700" height="30"><b><u>Jumlah Berat Kombinasi Yang Diperbolehkan (JBKB)</u></b><p style="margin-top:-1px"><i>Gross Combination Weight (GCW)</i></p></td><td  width="3">:</td><td><span class="isi"><?=$jbkb?></span> kg</td>
	</tr>
	<tr>
		<td width="800" height="40" colspan="3"><b>BERAT KOSONG</b><i>&nbsp;(KERB WEIGHT)</i></td>
	</tr>
	<tr>
		<td colspan="3">
			<?php
				foreach($dKendaraan as $d8)
				{
					$bk_s1	= $d8->bk_sumbu_1;
					$bk_s2	= $d8->bk_sumbu_2;
					$bk_s3	= $d8->bk_sumbu_3;
					$bk_s4	= $d8->bk_sumbu_4;
					$tot_bk	= $bk_s1+$bk_s2+$bk_s3+$bk_s4;
				}
			?>      
			<table style="border: 0px thin 75B3E3; width:100%; margin-left:15px;" cellpadding="0" cellspacing="0">
			<tr>
				<td width="800" height="20"><b>Sumbu Ke-1</b> <span><i>(First Axie)</i></span></td>
				<td width="5">:</td><td><span class="isi"><?=$bk_s1?></span> kg</td>
			</tr>
			  <tr>
				<td height="20"><b>Sumbu Ke-2</b> <span class="itlc">(Second Axie)</span></td>
				<td>:</td><td><span class="isi"><?=$bk_s2?></span> kg</td>
			 </tr>
			  <tr>
				<td height="20"><b>Sumbu Ke-3</b> <span class="itlc">(Third Axie)</span></td>
				<td>:</td><td><span class="isi"><?=$bk_s3?></span> kg</td>
			 </tr> 
			 <tr>
				<td height="20"><b>Sumbu Ke-4</b> <span class="itlc">(Fourth Axie)</span></td>
				<td>:</td><td><span class="isi"><?=$bk_s4?></span> kg</td>
			 </tr>      
			<tr style="height:30px;">
				<td height="20"><b>Jumlah (Total)</b></td>
				<td>:</td><td><span class="isi"><?=$tot_bk?></span> kg</td>
			 </tr> 
			</table>
		</td>
	</tr>
	<tr>
		<td width="800" height="40" colspan="3"><b>DAYA ANGKUT</b><i>&nbsp;(PAY LOAD)</i></td>
	</tr>
	<tr>
		<td colspan="3">
			
			<?php
				foreach($dKendaraan as $d9)
				{
					$orang	= $d8->orang;
					$barang	= $d8->barang;
					$jbi	= $d8->JBI;
					$jbki	= $d8->JBKI;
					$mst	= $d8->MST;
					$kjt	= $d8->KJT;
				}
			?>
					
			<table style="border: 0px thin 75B3E3; width:100%; margin-left:15px;" cellpadding="0" cellspacing="0">
			<tr>
				<td width="800" height="20"><b>Orang</b> <span><i>(Persons)</i></span></td>
				<td width="5">:</td><td><span class="isi"><?=$orang?></span> Penumpang/Passenger</td>
			</tr> 
			<tr height="20">
				<td><b>Barang</b> <span><i>(Goods)</i></span></td>
				<td>:</td><td><span class="isi"><?=$barang?></span> kg</td>
			 </tr>
			</table>
			
		</td>
	</tr>
	<tr>
		<td width="700" height="30"><b>Jumlah Berat Yang diijinkan (JBI)</b> <span class="itlc">Gross Permissible Vehicle Weight(GPVW)</span></td><td>:</td><td><span class="isi"><?=$jbi?></span> kg</td>
	</tr>
	<tr>
		<td width="700" height="30"><b>Jumlah Berat Kombinasi Yang Diijinkan (JBKI)</b> <span class="itlc">Gross Permissible Combination Weight (GPCW)</span></td><td>:</td><td><span class="isi"><?=$jbki?></span> kg</td>
	</tr>
	<tr>
		<td width="700" height="30"><b>Muatan Sumbu Terberat (MST)</b> <span class="itlc">(Permissible Axie Load)</span></td><td>:</td><td><span class="isi"><?=$mst?></span> kg</td>
	</tr>
	<tr>
		<td width="700" height="30"><b>Kelas Jalan Yang Boleh Dilalui</b> <span class="itlc">(The Lowes Road Category)</span></td>
		<td>:</td><td><span class="isi"><?=$kjt?></span></td>
	</tr>
	</table>
</page>

<page backtop="40px" backbottom="5px" backleft="5px" backright="5px" width="100%">
	
	<page_header>
		<table style="width: 100%; border: solid 0px black;">
			<tr>
				<td style="text-align: left;	width: 23%"><img src="<?=base_url()?>dishub.png"/></td>
				<td style="text-align: center;	width: 54%">SISTEM INFORMASI PENGUJIAN DAN PEMERIKSAAN KENDARAAN BERMOTOR</td>
				<td style="text-align: right;	width: 23%">Ditjen Hubdat</td>
			</tr>
		</table>
	</page_header>
	
	<page_footer>
		<table style="width: 100%; border: solid 0px black;">
			<tr>
				<td style="text-align:left; width: 50%"><?=date('d/m/Y')?></td>
				<td style="text-align:right; width: 50%">Halaman [[page_cu]]/[[page_nb]]</td>
			</tr>
		</table>
	</page_footer>
	
	<?php
		
		foreach($pengujian as $h): 
		$noDaftar[]	= $h->no_pendaftaran;
		 endforeach;
		 
		$hasilUji=$this->pengujianmodel->getStatus($noDaftar[0]);
		foreach($hasilUji as $s)
		{
			$verifikasi	= $s->verifikasi;
			$keterangan	= $s->keterangan;
			$penguji	= $s->nama_penguji;
		}
	?>
	
	<br> 
								
	<table style="border: 0px thin 75B3E3; width:100%;" cellpadding="0" cellspacing="0" align="center">
		<tr align="center">
			<td><b><u>ITEM UJI</u><br>TESTING</b></td>
			<td width="600"><b><u>AMBANG BATAS</u><br>THRESSHOLD</b></td>
			<td><b><u>HASIL UJI</u><br>TEST RESULT</b></td>
			<td><b><u>KETERANGAN</u><br>REMARK</b></td>
		</tr>
		<tr style="height:5px;"><td colspan="4"><hr color="#000000"></td></tr>
		<tr>
			<td width="20%"rowspan="5" align="center"><b>REM UTAMA <br> (BRAKE)</b></td>
			<td >Total Gaya Pengereman &ge; 50% x Total berat sumbu (kg)</td>
			<td align="right" width="15%" height="15"><?=$this->pengujianmodel->getHasilUjiFisik($noDaftar[0],'1211','')?> kg</td>
			<td rowspan="5" width="20%" align="center"><?=$verifikasi?></td>
		</tr>
		<tr>
			<td rowspan="4">Selisih Gaya Pengereman roda kiri dan roda kanan dalam satu sumbu 8%</td>
			<td align="right" height="20">I &nbsp;&nbsp;&nbsp;&nbsp; <?=$this->pengujianmodel->getHasilUjiFisik($noDaftar[0],'1311','')?> %</td>
		</tr>
		<tr>
			<td align="right" height="20">II &nbsp;&nbsp;&nbsp;&nbsp; <?=$this->pengujianmodel->getHasilUjiFisik($noDaftar[0],'1312','')?> %</td>
		</tr>
		<tr>
			<td align="right" height="20">III &nbsp;&nbsp;&nbsp;&nbsp; <?=$this->pengujianmodel->getHasilUjiFisik($noDaftar[0],'1313','')?> %</td>
		</tr>
		<tr>
			<td align="right" height="20">IV &nbsp;&nbsp;&nbsp;&nbsp; <?=$this->pengujianmodel->getHasilUjiFisik($noDaftar[0],'1314','')?> %</td>
		</tr>
		<tr style="height:5px;"><td colspan="4"><hr color="#000000"></td></tr>
		<tr>
			<td align="center" rowspan="4"><b>LAMPU UTAMA <br> (HEAD LAMP)</b></td>
			<td>Kekuatan Pancar Lampu Kanan  12.000 cd (lampu jauh)</td>
			<td align="right" height="20"><?=$this->pengujianmodel->getHasilUjiFisik($noDaftar[0],'1011','')?> cd</td>
			<td align="center" rowspan="4">Berlaku sampai Dengan</td>
		</tr>
		<tr>
			<td>Kekuatan Pancar Lampu Kiri  12.000 cd (lampu jauh)</td>
			<td align="right" height="20"><?=$this->pengujianmodel->getHasilUjiFisik($noDaftar[0],'1012','')?> cd</td>
		</tr>
		<tr>
			<td>Penyimpangan Ke Kanan 1&deg; 34&acute; (lampu jauh)</td>
			<td align="right" height="20"><?=$this->pengujianmodel->getHasilUjiFisik($noDaftar[0],'1021','')?> &deg; <?=$this->pengujianmodel->getHasilUjiFisik($noDaftar[0],'1022','')?>&acute; </td>
		</tr>
		<tr>
			<td>Penyimpangan Ke Kiri 0&deg; 09&acute; (lampu jauh)</td>
			<td align="right" height="20"><?=$this->pengujianmodel->getHasilUjiFisik($noDaftar[0],'1031','')?> &deg; <?=$this->pengujianmodel->getHasilUjiFisik($noDaftar[0],'1032','')?> &acute; </td>
		</tr>
		<tr style="height:5px;"><td colspan="4"><hr color="#000000"></td></tr>
		<tr>
			<td align="center" rowspan="8"><b>EMISI <br> (EMISSION)</b></td>
			<td>Asap (bahan bakar solar) 70%</td>
			<td align="right" height="20"><?=$this->pengujianmodel->getHasilUjiFisik($noDaftar[0],'811','')?> %</td>
			<td align="center" rowspan="8"><?=$penguji?></td>
		</tr>
		<tr>
			<td>Bahan Bakar Bensin</td><td></td>
		</tr>
		<tr>
			<td>Tahun Pembuatan < <?=date('Y')-4?></td><td></td>
		</tr>
		<tr>
			<td> - CO : 4,5 %</td>
			<td align="right" height="20"> <?=$this->pengujianmodel->getHasilUjiFisik($noDaftar[0],'821','')?> %</td>
		</tr>
		<tr>
			<td> - HCL : 1.200 ppm</td>
			<td align="right" height="20"> <?=$this->pengujianmodel->getHasilUjiFisik($noDaftar[0],'822','')?> ppm</td>
		</tr>
		<tr>
			<td>Tahun Pembuatan &ge; <?=date('Y')-4?></td><td></td>
		</tr>
		<tr>
			<td> - CO : 1,5 %</td>
			<td align="right" height="20"> <?=$this->pengujianmodel->getHasilUjiFisik($noDaftar[0],'821','')?> %</td>
		</tr>
		<tr>
			<td> - HCL : 200 ppm</td>
			<td align="right" height="20"> <?=$this->pengujianmodel->getHasilUjiFisik($noDaftar[0],'822','')?> ppm</td>
		</tr>
	</table>
	
</page>

<page backtop="40px" backbottom="5px" backleft="5px" backright="5px" width="100%">
	
	<page_header>
		<table style="width: 100%; border: solid 0px black;">
			<tr>
				<td style="text-align: left;	width: 23%"><img src="<?=base_url()?>dishub.png"/></td>
				<td style="text-align: center;	width: 54%">SISTEM INFORMASI PENGUJIAN DAN PEMERIKSAAN KENDARAAN BERMOTOR</td>
				<td style="text-align: right;	width: 23%">Ditjen Hubdat</td>
			</tr>
		</table>
	</page_header>
	
	<page_footer>
		<table style="width: 100%; border: solid 0px black;">
			<tr>
				<td style="text-align:left; width: 50%"><?=date('d/m/Y')?></td>
				<td style="text-align:right; width: 50%">Halaman [[page_cu]]/[[page_nb]]</td>
			</tr>
		</table>
	</page_footer>
	
	<table style="width:100%;" border='0' cellpadding='0' cellspacing='0' align='center'>
	<tr>
		<td align='center'>
			<h4><u>CATATAN</u>
			<br><p style="margin-top:-1px"><i>NOTES</i></p></h4>
		</td>
	</tr>
	</table>
	
	<br>
					
	<table style="border: 0px thin 75B3E3; width:100%;" cellpadding="0" cellspacing="0" align="center">
		<tr>
			<td width="500" height="80">
				<P><?=$keterangan?></P>
			</td>
		</tr>
	</table>
	
</page>