<page backtop="60px" backbottom="15px" backleft="5px" backright="5px" width="100%">
	
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
    
	
	<h3 align="center">Rekapitulasi Jumlah Kendaraan yang Diuji Pertama Kali Bulan <?=$this->converter_model->getNamaBulan($bulan)?> <?=$tahun?>
		<br>
		Jenis Kendaraan <?=$kelompok?>
	</h3>
	
	<table border="1" align="center" cellpadding="0" cellspacing="0">
		<thead>
			<tr align="center">
				<th class="ui-state-default" width="30" height="30"><b>No.</b></th> 
				<th class="ui-state-default" width="200"><b>Subjenis Kendaraan</b></th>
				<th class="ui-state-default" width="200"><b>Sampai Dengan Bulan Lalu</b></th>
				<th class="ui-state-default" width="150"><b>Bulan Ini</b></th>
				<th class="ui-state-default" width="150"><b>Jumlah s/d Bulan Ini</b></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($jnsKendaraan as $d1):?>
			<?php
				$BlnLalu=$this->pendaftaranmodel->getDataUjiBulanSebelumnya($tahun,$bulan,$d1->id_jeniskendaraan,"baru");
				$tBlnLalu	= $tBlnLalu+$BlnLalu;
			
				$BlnIni=$this->pendaftaranmodel->getDataUjiBulanIni($tahun,$bulan,$d1->id_jeniskendaraan,"baru");
				$tBlnIni	= $tBlnIni+$BlnIni;
			
				$jSdBulanIni= $BlnLalu+$BlnIni;
				$tSdBulanIni= $tSdBulanIni+$jSdBulanIni;
			?>
			<tr>
				<td align="center" height="20"><?=$a=$a+1?></td>
				<td>&nbsp;&nbsp;<?=$d1->detail?></td>
				<td align="center"><?=$BlnLalu?></td>
				<td align="center"><?=$BlnIni?></td>
				<td align="center"><b><?=$jSdBulanIni?></b></td>
			</tr>
			<?php endforeach; ?>
			<tr align="center">
				<td colspan="2" height="20"><b>Jumlah</b></td>
				<td><b><?=$tBlnLalu?></b></td>
				<td><b><?=$tBlnIni?></b></td>
				<td><b><?=$tSdBulanIni?></b></td>
			</tr>
		</tbody>
	</table> 

</page>