<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="<?= base_url(); ?>js/global.js"></script>
</head>
<body>

<form class="form has-validation" id="editFormLoad" action="<?=base_url()?>index.php/klasifikasi_uji/simpanEdit" method="post">
	<?php foreach($data as $row): ?>
		<input type="hidden" name="id" value="<?=$row->kd_klasifikasi?>" />
		<label for="form-name" class="form-label">Deksripsi Klasifikasi<em>*</em></label>
		<div class="form-input">
		<input type="text" style="width:190px" id="form-name" name="deskripsi" required="required" value="<?=$row->deskripsi_klasifikasi?>"/>
		</div>
	<?php endforeach; ?>
	<div class="form-action clearfix" align="right">
		<button class="button" style="width:90px; height:30px" type="submit" data-icon-primary="ui-icon-circle-check">Simpan</button>
	</div>
</form>

</body>
</html>