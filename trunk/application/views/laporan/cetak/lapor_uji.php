<page backtop="40px" backbottom="5px" backleft="5px" backright="5px" width="100%">
	
	<page_header>
		<table style="width: 100%; border: solid 0px black;">
			<tr>
				<td style="text-align: left;	width: 23%"><img src="<?=base_url()?>dishub.png"/></td>
				<td style="text-align: center;	width: 54%">Sistem Informasi & Komunikasi Pengujian Kendaraan Bermotor</td>
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
    
	
	<h3 align="center">Laporan Pelaksanaan Pengujian Kendaraan Bermotor
		<br>
		Periode <?=$tgl_awal?> s/d <?=$tgl_akhir?>
	</h3>
							
	<table width="100%" border="1" style="border:1px #CCCCCC solid;" cellpadding="0" cellspacing="0">
		<thead>
			<tr align="center">
				<th width="30" height="20">No.</th>
				<th width="120">No. Pendaftaran</th>
				<th width="120">Tgl Uji Pertama</th>
				<th width="90">No. Uji</th>
				<th width="100">No Kendaraan</th>
				<th width="180">Merek / Type</th>
				<th width="150">Nama Pemilik</th>
				<th width="120">Jenis Pengujian</th>
				<th width="120">Hasil Pengujian</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($datauji as $dat): ?>
			<?php
				if ($dat->tipe_pendaftaran=="baru") { $permohonan="Uji Baru"; }
				elseif ($dat->tipe_pendaftaran=="berkala") { $permohonan="Uji Berkala"; } 
				elseif ($dat->tipe_pendaftaran=="ulang") { $permohonan="Uji Ulang"; } 
				else { $permohonan="Numpang Uji"; }
			?>
			<?php
				$noUji	= $this->kendaraanmodel->getNoUji($dat->no_srut);
				$noKend	= $this->kendaraanmodel->getNoKendaraan($dat->no_srut);
				$merek	= $this->kendaraanmodel->getMerek($dat->no_srut);
				$tipe	= $this->kendaraanmodel->getTipe($dat->no_srut);
				$nama	= $this->pemilikmodel->getNamaPemilik($dat->no_srut);
			?>
            <tr>
				<td align="center"><?=$i=$i+1?></td>
				<td>&nbsp; <?=$dat->no_pendaftaran?></td>
				<td>&nbsp; <?=$this->converter_model->tgl_Eng_In($dat->tgl_pendaftaran)?></td>
                <td>&nbsp; <?=$noUji?></td>
                <td>&nbsp; <?=$noKend?></td>
                <td>&nbsp; <?=$merek?> <?=$tipe?></td>
                <td>&nbsp; <?=$nama?></td>
                <td>&nbsp; <?=$permohonan?></td>
				<td>&nbsp; <?=$dat->hasil_pengujian?></td>
			</tr>
			<?php endforeach; ?>  
		</tbody>
	</table>
		
</page>