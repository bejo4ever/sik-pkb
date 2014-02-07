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
    
	<h3 align="center">PROFIL UNIT PKB</h3>
	<?php
		foreach($unit_pkb as $dat)
		{
			$nama	= $dat->nama_unit;
			$alamat	= $dat->alamat_unit;
			$telp	= $dat->telp_unit;
			$email	= $dat->email_unit;
			$kanit	= $dat->nama_kanit;
			$nip	= $dat->nip_kanit;
		} 
	?>
	<table>
		<tr>
			<td width="150" height="20"><b>Nama Unit PKB</b></td><td>:</td><td width="340">&nbsp;<?=$nama?></td>
			<td width="150"><b>Alamat Email</b></td><td>:</td><td width="340">&nbsp;<?=$email?></td>
	 	</tr>
	 	<tr>
			<td height="20"><b>Alamat</b></td><td>:</td><td>&nbsp;<?=$alamat?></td>
			<td><b>Kepala Unit</b></td><td>:</td><td>&nbsp;<?=$kanit?></td>
	 	</tr>
		<tr>
			<td height="20"><b>Nomor Telpon</b></td><td>:</td><td>&nbsp;<?=$telp?></td>
			<td><b>NIP Kepala Unit</b></td><td>:</td><td>&nbsp;<?=$nip?></td>
		</tr>
	</table>

	<br>
	<h4>Daftar Penguji</h4>
	<table width="100%" border="1" style="border:1px #CCCCCC solid;" cellpadding="0" cellspacing="0">
		<thead>
			<tr align="left">
				<th class="ui-state-default" width="35" height="20">&nbsp;No.</th>
				<th class="ui-state-default" width="100">&nbsp;No. Register</th>
				<th class="ui-state-default" width="60">&nbsp;N I P</th>
				<th class="ui-state-default" width="300">&nbsp;Nama Penguji</th>
				<th class="ui-state-default" width="250">&nbsp;Pangkat / Golongan</th>
				<th class="ui-state-default" width="200">&nbsp;Jabatan Fungsional</th>
				<th class="ui-state-default" width="100">&nbsp;Status</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($penguji as $row): ?>
			<tr>
				<td align="right" height="20"><?=$a=$a+1?>&nbsp;</td>
				<td>&nbsp;<?=$row->NRP?></td>
				<td>&nbsp;<?=$row->nip_penguji?></td>
				<td>&nbsp;<?=$row->nama_penguji?></td>
				<td>&nbsp;<?=$row->gol_pangkat?></td>
				<td>&nbsp;<?=$row->jabatan_fungsional?></td>
				<td>&nbsp;<?=$row->tipe_penguji?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>

	<br>
	<h4>Daftar Peralatan Uji</h4>
	<table width="100%" border="1" style="border:1px #CCCCCC solid;" cellpadding="0" cellspacing="0">
		<thead>
			<tr align="left" height="20">
				<th class="ui-state-default" width="35">&nbsp;No.</th>
				<th class="ui-state-default" width="155">&nbsp;Nama Alat</th>
				<th class="ui-state-default" width="160">&nbsp;Merek</th>
				<th class="ui-state-default" width="150">&nbsp;Untuk Pengujian</th>
				<th class="ui-state-default" width="60">&nbsp;Jumlah</th>
				<th class="ui-state-default" width="115">&nbsp;Tahun Produksi</th>
				<th class="ui-state-default" width="125">&nbsp;Tahun Pemakaian</th>
				<th class="ui-state-default" width="115">&nbsp;Tahun Kalibrasi</th>
				<th class="ui-state-default" width="100">&nbsp;Status</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($peralatan as $d): ?>
			<tr>
				<td align="right" height="20"><?=$b=$b+1?>&nbsp;</td>
				<td>&nbsp;<?=$d->nama_alat?></td>
				<td>&nbsp;<?=$d->merk?></td>
				<td>&nbsp;<?=$d->deskripsi_kelompok?></td>
				<td align="right"><?=$d->jumlah_alat?>&nbsp;</td>
				<td align="right"><?=$d->tahun_produksi?>&nbsp;</td>
				<td align="right"><?=$d->tahun_penggunaan?>&nbsp;</td>
				<td align="right"><?=$d->tahun_kalibrasi?>&nbsp;</td>
				<td>&nbsp;<?=$d->status_alat?></td>
			</tr>
	 	<?php endforeach; ?>
		</tbody>
	</table>

	<br>
	<h4>Daftar Fasilitas</h4>
	<table width="100%" border="1" style="border:1px #CCCCCC solid;" cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th width="35" class="ui-state-default" height="20">&nbsp; No.</th>
				<th width="315">&nbsp;Nama Fasilitas</th>
				<th width="70" class="ui-state-default">&nbsp;Jumlah</th>
				<th width="80" class="ui-state-default">&nbsp;Satuan</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($fasilitas as $f): ?>
			<tr>
				<td align="right" height="20"><?=$e=$e+1?>&nbsp;</td>
				<td>&nbsp;<?=$f->fasilitas?></td>
				<td align="right"><?=$f->jumlah?>&nbsp;</td>
				<td>&nbsp;<?=$f->satuan?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>			 

</page>