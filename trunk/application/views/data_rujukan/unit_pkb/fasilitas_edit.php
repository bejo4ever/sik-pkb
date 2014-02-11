<!DOCTYPE html>
<html lang="en">

<head>
	<script type="text/javascript" src="<?= base_url(); ?>js/global.js"></script>
</head>

<body style="overflow: hidden;">

	<form class="form has-validation" id="editForm" action="<?=base_url()?>index.php/unit_pkb/saveEditFasilitas" method="post">
	
	<?php foreach ($data as $m): ?>

	<div class="form-input">
		<input type="hidden" style="width:190px" name="kd_fasilitas" required="required" value="<?= $m->kd_fasilitas; ?>"/>
	</div>

	<label for="no_sertifikat" class="form-label">Nama Fasilitas <em>*</em></label>
	<div class="form-input">
		<input type="text" style="width:190px" id="fasilitas" name="fasilitas" required="required" value="<?= $m->fasilitas; ?>"/>
	</div>

	<label for="no_sertifikat" class="form-label">Jumlah <em>*</em></label>
	<div class="form-input">
		<input type="text" style="width:90px" id="fasilitas" name="jumlah" required="required" value="<?= $m->jumlah; ?>"/>
	</div>

	<label for="no_sertifikat" class="form-label">Satuan <em>*</em></label>
	<div class="form-input">
		<input type="text" style="width:150px" id="fasilitas" name="satuan" required="required" value="<?= $m->satuan; ?>"/>
	</div>
	
	<hr>
	<div class="form-action clearfix" align="right" style="padding-right:20px">
		<button class="button" type="submit">Update</button>
		<button class="button" type="button" onClick="$('#editFasilitas' ).dialog('close');">Batal</button>
	</div>
				
	<?php endforeach; ?>
	</form>

</body>

</html>