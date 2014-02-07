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
    
	
	<h3 align="center">Daftar Kendaraan Wajib Uji <br> Periode <?=$tgl_awal?> s/d <?=$tgl_akhir?></h3>
							
		<table width="100%" border="1" style="border:1px #CCCCCC solid;" cellpadding="0" cellspacing="0">
		<thead>
			<tr align="center">
				<th width="30" height="20">No</th>
				<th width="80">No Uji</th>
				<th width="100">No Kendaraan</th>
				<th width="150">Pemilik</th>
				<th width="180">Alamat</th>
				<th width="120">Jenis Kendaraan</th>
				<th width="100">Merek</th>
				<th width="80">Tipe</th>
				<th width="100">Tgl Uji Pertama</th>
				<th width="100">Masa Uji Berkala</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($kendaraan as $dat): ?>
			<tr>
				<td align="center" height="20"><?=$a=$a+1?></td>
				<td>&nbsp;<?=$dat->no_uji?></td>
				<td>&nbsp;<?=$dat->no_kendaraan?></td>
				<td>&nbsp;<?=$dat->nama?></td>
				<td>&nbsp;<?=$dat->alamat?></td>
				<td>&nbsp;<?=$dat->detail?></td>
				<td>&nbsp;<?=$dat->merek?></td>
				<td>&nbsp;<?=$dat->tipe?></td>
				<td align="center"><?=$this->converter_model->tgl_Eng_In($dat->tgl_ujipertama)?></td>
				<td align="center"><?=$this->converter_model->tgl_Eng_In($dat->tgl_ujiberikut)?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
		</table>
		
</page>