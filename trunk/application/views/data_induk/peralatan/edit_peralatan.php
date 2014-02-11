<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="<?= base_url(); ?>js/global.js"></script>
</head>
<body>

<form class="form has-validation" id="editFormLoad" action="<?=base_url()?>index.php/peralatan_uji/update" method="post">
	<?php foreach($data as $row): ?>
	<input type="hidden" name="kode" value="<?=$row->kode_alat?>"?>
		<label for="nama" class="form-label">Nama Alat <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:190px" id="nama" name="nama" required="required" value="<?=$row->nama_alat?>" />
			</div>
			<label for="merek" class="form-label">Merek <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:190px" id="merek" name="merek" required="required" value="<?=$row->merk?>" />
			</div>
			<label for="nip" class="form-label">Untuk Pengujian <em>*</em></label>
			<div class="form-input">
			<select name="kelompok">
				<option value="">Pilih Item Pengujian</option>
				<?php foreach($itemUji as $d): ?>
				<?php if($d->kd_kelompok==$row->kd_kelompok){ $s="selected"; }else{ $s=""; } ?>
				<option value="<?=$d->kd_kelompok?>" <?=$s?> ><?=$d->deskripsi_kelompok?></option>
				<?php endforeach; ?>
			</select>
			</div>
			<label for="jumlah" class="form-label">Jumlah Alat <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:190px" id="jumlah" name="jumlah" required="required" value="<?=$row->jumlah_alat?>" />
			</div>
			<label for="jumlah" class="form-label">Tahun Produksi <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:190px" id="produksi" name="produksi" required="required" value="<?=$row->tahun_produksi?>" />
			</div>
			<label for="jumlah" class="form-label">Tahun Pemakaian <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:190px" id="pemakaian" name="pemakaian" required="required" value="<?=$row->tahun_penggunaan?>" />
			</div>
			<label for="jumlah" class="form-label">Tahun Kalibrasi <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:190px" id="kalibrasi" name="kalibrasi" required="required" value="<?=$row->tahun_kalibrasi?>" />
			</div>
			<label for="status" class="form-label">Status Alat <em>*</em></label>
			<div class="form-input">
			<select name="status" required="required">
				<option value="">Pilih Status Alat</option>
				<option value="Baik dan Berfungsi" <?=$row->status_alat=='Baik dan Berfungsi'?'selected':''?>>Baik dan Berfungsi</option>
				<option value="Baik tetapi Tidak Berfungsi" <?=$row->status_alat=='Baik tetapi Tidak Berfungsi'?'selected':''?>>Baik tetapi Tidak Berfungsi</option>
				<option value="Rusak" <?=$row->status_alat=='Rusak'?'selected':''?>>Rusak</option>
			</select>
			</div>
	<?php endforeach; ?>
	<div align="right">
		<button class="button" style="width:90px; height:25px" type="submit" data-icon-primary="ui-icon-circle-check">Simpan</button>
		<button class="button" style="width:80px; height:25px" type="button" data-icon-primary="ui-icon-circle-close" onClick="$('#editForm' ).dialog('close');">Batalkan</button>
	</div>
</form>

</body>
</html>
