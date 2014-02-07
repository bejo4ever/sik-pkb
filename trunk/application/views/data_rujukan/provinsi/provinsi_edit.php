<!DOCTYPE html>
<html lang="en">

<head>

	<script type="text/javascript" src="<?= base_url(); ?>js/global.js"></script>

</head>

<body style="overflow: hidden;">

          <form class="form has-validation" action="<?= base_url() ?>index.php/provinsi/editData" method="post">
		 <table width="100%">
		 <?php foreach($fields as $m): ?>
		  <input type="hidden" name="kode_provinsi" id="kode_provinsi" required="required" style="width:200px" value="<?= $m->kode_provinsi; ?>"/>
			<tr><td colspan="2">
				<div class="clearfix">
					<label for="kode_provinsi" class="form-label">Kode Provinsi <em>*</em></label>
					<div class="form-input">
					<input type="text" name="kode_prov" id="kode_prov" disabled="disabled" required="required" style="width:200px" value="<?= $m->kode_provinsi; ?>"/>
					</div>
				</div>
			</td></tr>
			
			<tr><td colspan="2">
				<div class="clearfix">
					<label for="nama_provinsi" class="form-label">Nama Provinsi <em>*</em></label>
					<div class="form-input"><textarea rows="3" name="nama_provinsi" id="nama_provinsi" required="required" style="width:300px" ><?= $m->nama_provinsi; ?></textarea></div>
				</div>
			</td></tr>
																			
			<tr><td colspan="2">
						<div class="form-action clearfix" align="right" style="padding-right:20px">

							<button class="button" type="submit" data-icon-primary="ui-icon-circle-check">Update</button>
			
							<!--button class="button" type="button"><a href="<?= base_url() ?>index.php/data_provinsi">Batal</a></button-->
							
							<button class="button" type="button" onClick="$('#editForm' ).dialog('close');">Batal</button>

						</div>
		   
			</td></tr>
			<?php endforeach; ?>
			</table>
			</form>

</body>

</html>