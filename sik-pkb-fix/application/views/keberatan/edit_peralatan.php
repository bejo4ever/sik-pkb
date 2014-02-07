<!DOCTYPE html>
<html lang="en">

<head>
	<script type="text/javascript" src="<?= base_url(); ?>js/global.js"></script>
</head>

<body>

	<form class="form has-validation" id="editFormLoad" action="<?=base_url()?>index.php/keberatan/update" method="post">
		<?php foreach($data as $row): ?>

			<input type="hidden" name="no_berat" value="<?=$row->no_keberatan?>"?>

			<label for="no_bap" class="form-label">Nomor BAP <em>*</em></label>
			<div class="form-input">
			<select name="no_bap">
				<option value="">- Pilih Nomor BAP -</option>
				<?php foreach($noBAP as $d): ?>
				<?php if($d->no_bap==$row->no_bap){ $s="selected"; }else{ $s=""; } ?>
					<option value="<?=$d->no_bap?>" <?=$s?> ><?=$d->no_bap?></option>
				<?php endforeach; ?>
			</select>
			</div>

			<label for="tgl_berat" class="form-label">Tanggal Keberatan <em>*</em></label>
			<div class="form-input">
			<input type="date" style="width:100px" id="tgl_berat" name="tgl_berat" required="required" value="<?=$row->tgl_keberatan?>"/>
			</div>

			<label for="pemohon" class="form-label">Nama Pemohon <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:190px" id="pemohon" name="pemohon" required="required" value="<?=$row->nama_pemohon?>"/>
			</div>

			<label for="id_pemohon" class="form-label">No. Identitas Pemohon <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:150px" id="id_pemohon" name="id_pemohon" required="required" value="<?=$row->id_pemohon?>"/>
			</div>

			<label for="alamat" class="form-label">Alamat Pemohon <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:250px" id="alamat" name="alamat" required="required" value="<?=$row->alamat_pemohon?>"/>
			</div>

			<label for="ket" class="form-label">Keterangan <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:250px" id="ket" name="ket" required="required" value="<?=$row->keterangan?>"/>
			</div>

			<label for="status" class="form-label">Status Penanganan <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:250px" id="status" name="status" required="required" value="<?=$row->status?>"/>
			</div>

		<?php endforeach; ?>

		<hr>
		
		<div align="right">
			<button class="button" style="width:90px; height:25px" type="submit" data-icon-primary="ui-icon-circle-check">Simpan</button>
			<button class="button" style="width:80px; height:25px" type="button" data-icon-primary="ui-icon-circle-close" onClick="$('#editForm' ).dialog('close');">Batal</button>
		</div>

		<br>

</form>

</body>
</html>
