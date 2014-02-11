<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="<?= base_url(); ?>js/global.js"></script>
</head>
<body>

<form class="form has-validation" id="editFormLoad" action="<?=base_url()?>index.php/retribusi/simpanEdit" method="post">
	<?php foreach($dRetribusi as $row): ?>
		<input type="hidden" name="id" value="<?=$row->kd_retribusi?>" />
		<label for="form-name" class="form-label">Uraian Biaya<em>*</em></label>
		<div class="form-input">
		<input type="text" style="width:190px" id="form-name" name="deskripsi" required="required" value="<?=$row->deskripsi?>"/>
		</div>
		<label for="form-name" class="form-label">Nilai<em>*</em></label>
		<div class="form-input">
		<input type="text" style="width:190px" id="form-name" name="nilai" required="required" value="<?=$row->nilai?>"/>
		</div>
	<?php endforeach; ?>
	<div class="form-action clearfix" align="right">
		<button class="button" style="width:90px; height:30px" type="submit" data-icon-primary="ui-icon-circle-check">Simpan</button>
	</div>
</form>

</body>
</html>