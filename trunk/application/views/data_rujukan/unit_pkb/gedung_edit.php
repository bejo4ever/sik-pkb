<!DOCTYPE html>
<html lang="en">

<head>

	<script type="text/javascript" src="<?= base_url(); ?>js/global.js"></script>

</head>

<body style="overflow: hidden;">

          <form class="form has-validation" id="editForm" action="<?=base_url()?>index.php/unit_pkb/saveEditGedung" method="post">
		  
		  <?php foreach ($data as $m): ?>
			
			<div class="form-input">
			<input type="hidden" style="width:190px" name="kd_gedung" required="required" value="<?= $m->kd_gedung; ?>"/>
			</div>
			<label for="no_sertifikat" class="form-label">Gedung <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:190px" id="nama_gedung" name="nama_gedung" required="required" value="<?= $m->nama_gedung; ?>"/>
			</div>
			<div class="form-action clearfix" align="right" style="padding-right:20px">
				<button class="button" type="submit" data-icon-primary="ui-icon-circle-check">Update</button>
                <button class="button" type="button" onClick="$('#editGedung' ).dialog('close');">Batalkan</button>
				</div>
				
			<?php endforeach; ?>
		</form>

</body>

</html>