<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="<?= base_url(); ?>js/global.js"></script>
</head>
<body>

<form class="form has-validation" id="editFormLoad" action="<?=base_url()?>index.php/penguji/update" method="post">
	<?php foreach($data as $row): ?>
	<input type="hidden" name="nrp_sblmnya" value="<?=$row->NRP?>"?>
			<label for="nip" class="form-label">NIP <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:275px" id="nip" name="nip" value="<?=$row->nip_penguji?>" />
			</div>
			<label for="nip" class="form-label">NRP <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:275px" id="nrp" name="nrp" required="required" value="<?=$row->NRP?>" />
			</div>
			<label for="nama" class="form-label">Nama Penguji <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:275px" id="nama" name="nama" required="required" value="<?=$row->nama_penguji?>" />
			</div>
			<label for="pangkat" class="form-label">Pangkat <em>*</em></label>
			<div class="form-input">
			<select name="pangkat" required="required">
				<option value="">Pilih Pangkat</option>
				<option value="I A / Juru Muda" <?=($row->gol_pangkat=='I A / Juru Muda' ? 'selected' : '')?>>I A / Juru Muda</option>
				<option value="I B / Juru Muda Tingkat I" <?=($row->gol_pangkat=='I B / Juru Muda Tingkat I' ? 'selected' : '')?>>I B / Juru Muda Tingkat I</option>
				<option value="I C / Juru" <?=($row->gol_pangkat=='I C / Juru' ? 'selected' : '')?>>I C / Juru</option>
				<option value="I D / Juru Tingkat I" <?=($row->gol_pangkat=='I D / Juru Tingkat I' ? 'selected' : '')?>>I D / Juru Tingkat I</option>
				<option value="II A / Pengatur Muda" <?=($row->gol_pangkat=='II A / Pengatur Muda' ? 'selected' : '')?>>II A / Pengatur Muda</option>
				<option value="II B / Pengatur Muda Tingkat I" <?=($row->gol_pangkat=='II B / Pengatur Muda Tingkat I' ? 'selected' : '')?>>II B / Pengatur Muda Tingkat I</option>
				<option value="II C / Pengatur" <?=($row->gol_pangkat=='II C / Pengatur' ? 'selected' : '')?>>II C / Pengatur</option>
				<option value="II D / Pengatur Tingkat I" <?=($row->gol_pangkat=='II D / Pengatur Tingkat I' ? 'selected' : '')?>>II D / Pengatur Tingkat I</option>
				<option value="III A / Penata Muda" <?=($row->gol_pangkat=='III A / Penata Muda' ? 'selected' : '')?>>III A / Penata Muda</option>
				<option value="III B / Penata Muda Tingkat I" <?=($row->gol_pangkat=='III B / Penata Muda Tingkat I' ? 'selected' : '')?>>III B / Penata Muda Tingkat I</option>
				<option value="III C / Penata" <?=($row->gol_pangkat=='III C / Penata' ? 'selected' : '')?>>III C / Penata</option>
				<option value="III D / Penata Tingkat I" <?=($row->gol_pangkat=='III D / Penata Tingkat I' ? 'selected' : '')?>>III D / Penata Tingkat I</option>
				<option value="IV A / Pembina" <?=($row->gol_pangkat=='IV A / Pembina' ? 'selected' : '')?>>IV A / Pembina</option>
				<option value="IV B / Pembina Tingkat I" <?=($row->gol_pangkat=='IV B / Pembina Tingkat I' ? 'selected' : '')?>>IV B / Pembina Tingkat I</option>
				<option value="IV C / Pembina Utama Muda" <?=($row->gol_pangkat=='IV C / Pembina Utama Muda' ? 'selected' : '')?>>IV C / Pembina Utama Muda</option>
				<option value="IV D / Pembina Utama Madya" <?=($row->gol_pangkat=='IV D / Pembina Utama Madya' ? 'selected' : '')?>>IV D / Pembina Utama Madya</option>
				<option value="IV E / Pembina Utama" <?=($row->gol_pangkat=='IV E / Pembina Utama' ? 'selected' : '')?>>IV E / Pembina Utama</option>
			</select>
			</div>
			
			<label for="nip" class="form-label">Jabatan Fungsional <em>*</em></label>
			<div class="form-input">
			<?php
				switch($row->jabatan_fungsional)
				{
					case"penyelia"; 			$s1="selected"; break;
					case"pelaksana lanjutan"; 	$s2="selected"; break;
					case"pelaksana"; 			$s3="selected"; break;
					case"pemula"; 				$s4="selected"; break;
				}
			?>
			<select name="jabatan">
				<option value="">Pilih Jabatan Fungsional</option>
				<option value="penyelia" <?=$s1?> >Penyelia</option>
				<option value="pelaksana lanjutan" <?=$s2?> >Pelaksana Lanjutan</option>
				<option value="pelaksana" <?=$s3?> >Pelaksana</option>
				<option value="pemula" <?=$s4?> >Pemula</option>
			</select>
			</div>
			<label for="nip" class="form-label">Status <em>*</em></label>
			<div class="form-input">
			<?php
				switch($row->tipe_penguji)
				{
					case"PNS"; 		$t1="selected"; break;
					case"NON PNS"; 	$t2="selected"; break;
				}
			?>
			<select name="status">
				<option value="">Status Penguji</option>
				<option value="PNS" <?=$t1?> >PNS</option>
				<option value="NON PNS" <?=$t2?> >NON PNS</option>
			</select>
			</div>
	<?php endforeach; ?>
	<br>
	<div align="right">
		<button class="button" style="width:90px; height:25px" type="submit" data-icon-primary="ui-icon-circle-check">Simpan</button>
		<button class="button" style="width:80px; height:25px" type="button" data-icon-primary="ui-icon-circle-close" onClick="$('#editForm' ).dialog('close');">Batalkan</button>
	</div>
	<br>
</form>

</body>
</html>
