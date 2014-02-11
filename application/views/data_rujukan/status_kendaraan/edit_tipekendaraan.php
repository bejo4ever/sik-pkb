<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="<?= base_url(); ?>js/global.js"></script>
</head>
<body>

<form class="form has-validation" id="editFormLoad" action="<?=base_url()?>index.php/status_kendaraan/simpanEditTipeKendaraan" method="post">
	<?php foreach($dKendaraan as $row): ?>
		<input type="hidden" name="id" value="<?=$row->id_tipekendaraan?>" />
		<label for="form-name" class="form-label">Tipe Kendaraan<em>*</em></label>
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