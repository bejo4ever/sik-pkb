<!DOCTYPE html>
<html lang="en">

<head>

	<script type="text/javascript" src="<?= base_url(); ?>js/global.js"></script>

</head>

<body style="overflow: hidden;">

          <form class="form has-validation" id="editForm" action="<?=base_url()?>index.php/penguji/sanksi_editsave" method="post">
		  
		  <?php foreach ($fields as $m): ?>
			
			<div class="form-input">
			<input type="hidden" style="width:190px" name="kd_sanksi" required="required" value="<?= $m->kd_sanksi; ?>"/>
			</div>
			<label for="no_sertifikat" class="form-label">Tahun <em>*</em></label>
			<div class="form-input">
			<input type="text" style="width:190px" id="tahun" name="tahun" required="required" value="<?= $m->tahun; ?>"/>
			</div>
			<label for="tgl_terbit" class="form-label">Sanksi <em>*</em></label>
			<div class="form-input">
			<textarea name="keterangan" rows="3"><?= $m->sanksi; ?></textarea>
			</div>
			<div class="form-action clearfix" align="right" style="padding-right:20px">
				<button class="button" type="submit" data-icon-primary="ui-icon-circle-check">Update</button>
                <button class="button" type="button" onClick="$('#editSanksi' ).dialog('close');">Batalkan</button>
				</div>
				
			<?php endforeach; ?>
		</form>

</body>

</html>