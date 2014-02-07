<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="<?= base_url(); ?>js/global.js"></script>
</head>
<body>

<form class="form has-validation" id="editFormLoad" action="<?=base_url()?>index.php/jenis_kendaraan/simpanEditJenisKendaraan" method="post">
	<?php foreach($dKendaraan as $row): ?>
		<input type="hidden" name="id" value="<?=$row->id_jeniskendaraan?>" />
		<label for="form-name" class="form-label">Jenis Kendaraan<em>*</em></label>
		<div class="form-input">
		<select name="kelompok">
			<?php foreach($kKendaraan as $kK){ ?>
			<?php if($row->id_kelompokkendaraan == $kK->id_kelompokkendaraan){ $st="selected"; }else{ $st=""; } ?>
			<option value="<?=$kK->id_kelompokkendaraan?>" <?=$st?> ><?=$kK->nama_kelompok?></option>
			<?php } ?>
		</select>
		</div>
		<label for="form-name" class="form-label">Jenis Kendaraan<em>*</em></label>
		<div class="form-input">
		<input type="text" style="width:190px" id="form-name" name="name" required="required" value="<?=$row->detail?>"/>
		</div>
	<?php endforeach; ?>
	<div class="form-action clearfix" align="right">
		<button class="button" style="width:90px; height:30px" type="submit" data-icon-primary="ui-icon-circle-check">Simpan</button>
	</div>
</form>

</body>
</html>