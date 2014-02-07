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
    
	
	<h3 align="center">Rekapitulasi Jumlah Kendaraan yang Diuji <br> Bulan <?=$this->converter_model->getNamaBulan($bulan)?> <?=$tahun?></h3>
	
	<table border="1" align="center" cellpadding="0" cellspacing="0">
		<thead>
		<tr align="center">
			<th class="ui-state-default" width="30" rowspan="2" height="30"><br><b>No.</b></th> 
			<th class="ui-state-default" width="300" rowspan="2"><br><b>Jenis Kendaraan</b></th>
			<th class="ui-state-default" width="100" rowspan="2"><br><b>Sampai Dengan <br> Bulan Lalu</b></th>
			<th class="ui-state-default" width="400" colspan="2"><b>Bulan Ini</b></th>
			<th class="ui-state-default" width="100" rowspan="2"><br><b>Jumlah Bulan Ini</b></th>
			<th class="ui-state-default" width="100" rowspan="2"><br><b>Jumlah s/d Bulan Ini</b></th>
		</tr>
		<tr align="center">
			<th class="ui-state-default" height="20"><b>Uji Pertama</b></th>
			<th class="ui-state-default"><b>Uji Berkala</b></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach($kelKendaraan as $d1):?>
		<?php
			$BlnLalu1=$this->pendaftaranmodel->getDataUjiKelBulanSebelumnya($tahun,$bulan,$d1->id_kelompokkendaraan,"baru");
			$BlnLalu2=$this->pendaftaranmodel->getDataUjiKelBulanSebelumnya($tahun,$bulan,$d1->id_kelompokkendaraan,"berkala");
			$tBlnLalu1	= $tBlnLalu1+$BlnLalu1;
			$tBlnLalu2	= $tBlnLalu2+$BlnLalu2;
			
			$BlnIni1=$this->pendaftaranmodel->getDataUjiKelBulanIni($tahun,$bulan,$d1->id_kelompokkendaraan,"baru");
			$BlnIni2=$this->pendaftaranmodel->getDataUjiKelBulanIni($tahun,$bulan,$d1->id_kelompokkendaraan,"berkala");
			$tBlnIni1	= $tBlnIni1+$BlnIni1;
			$tBlnIni2	= $tBlnIni2+$BlnIni2;
			
			$jSdBulanIni= $BlnLalu1+$BlnLalu2+$BlnIni1+$BlnIni2;
			$tSdBulanIni= $tSdBulanIni+$jSdBulanIni;
		?>
			<tr>
				<td align="center" height="20"><?=$a=$a+1?></td>
				<td>&nbsp;&nbsp;<?=$d1->nama_kelompok?></td>
				<td align="center"><?=$BlnLalu1+$BlnLalu2?></td>
				<td align="center"><?=$BlnIni1?></td>
				<td align="center"><?=$BlnIni2?></td>
				<td align="center"><?=$BlnIni1+$BlnIni2?></td>
				<td align="center"><b><?=$jSdBulanIni?></b></td>
			</tr>
		<?php endforeach; ?>
			<tr align="center">
				<td colspan="2" height="20"><b>Jumlah</b></td>
				<td><b><?=$tBlnLalu1+$tBlnLalu2?></b></td>
				<td><b><?=$tBlnIni1?></b></td>
				<td><b><?=$tBlnIni2?></b></td>
				<td><b><?=$tBlnIni1+$tBlnIni2?></b></td>
				<td><b><?=$tSdBulanIni?></b></td>
			</tr>
		</tbody>
		</table>
		
	<br /><br />
	
	<table border="1" align="center" cellpadding="0" cellspacing="0">
		<thead>
		<tr align="center">
			<th class="ui-state-default" width="30" rowspan="2" height="30"><br><b>No.</b></th> 
			<th class="ui-state-default" width="300" rowspan="2"><br><b>Subjenis Kendaraan</b></th>
			<th class="ui-state-default" width="100" rowspan="2"><br><b>Sampai Dengan <br> Bulan Lalu</b></th>
			<th class="ui-state-default" width="400" colspan="2"><b>Bulan Ini</b></th>
			<th class="ui-state-default" width="100" rowspan="2"><br><b>Jumlah Bulan Ini</b></th>
			<th class="ui-state-default" width="100" rowspan="2"><br><b>Jumlah s/d Bulan Ini</b></th>
		</tr>
		<tr align="center">
			<th class="ui-state-default" height="20"><b>Uji Pertama</b></th>
			<th class="ui-state-default"><b>Uji Berkala</b></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach($jnsKendaraan as $d1):?>
		<?php
			$BlnLalu1=$this->pendaftaranmodel->getDataUjiBulanSebelumnya($tahun,$bulan,$d1->id_jeniskendaraan,"baru");
			$BlnLalu2=$this->pendaftaranmodel->getDataUjiBulanSebelumnya($tahun,$bulan,$d1->id_jeniskendaraan,"berkala");
			$tBlnLalu1	= $tBlnLalu1+$BlnLalu1;
			$tBlnLalu2	= $tBlnLalu2+$BlnLalu2;
			
			$BlnIni1=$this->pendaftaranmodel->getDataUjiBulanIni($tahun,$bulan,$d1->id_jeniskendaraan,"baru");
			$BlnIni2=$this->pendaftaranmodel->getDataUjiBulanIni($tahun,$bulan,$d1->id_jeniskendaraan,"berkala");
			$tBlnIni1	= $tBlnIni1+$BlnIni1;
			$tBlnIni2	= $tBlnIni2+$BlnIni2;
			
			$jSdBulanIni= $BlnLalu1+$BlnLalu2+$BlnIni1+$BlnIni2;
			$tSdBulanIni= $tSdBulanIni+$jSdBulanIni;
		?>
			<tr>
				<td align="center" height="20"><?=$b=$b+1?></td>
				<td>&nbsp;&nbsp;<?=$d1->detail?></td>
				<td align="center"><?=$BlnLalu1+$BlnLalu2?></td>
				<td align="center"><?=$BlnIni1?></td>
				<td align="center"><?=$BlnIni2?></td>
				<td align="center"><?=$BlnIni1+$BlnIni2?></td>
				<td align="center"><b><?=$jSdBulanIni?></b></td>
			</tr>
		<?php endforeach; ?>
			<tr align="center">
				<td colspan="2" height="20"><b>Jumlah</b></td>
				<td><b><?=$tBlnLalu1+$tBlnLalu2?></b></td>
				<td><b><?=$tBlnIni1?></b></td>
				<td><b><?=$tBlnIni2?></b></td>
				<td><b><?=$tBlnIni1+$tBlnIni2?></b></td>
				<td><b><?=$tSdBulanIni?></b></td>
			</tr>
		</tbody>
		</table> 

</page>