<!DOCTYPE html>
<html lang="en">

<head>

	<script type="text/javascript" src="<?= base_url(); ?>js/global.js"></script>

</head>

<body style="overflow: hidden;">

          
		 <table width="100%">
		
		 
			<tr><td colspan="2">
				<div class="clearfix">
					<p>Data Sudah ada di dalam Database..!!!</p>
                    <p><?= $q; ?></p>
				</div>
			</td></tr>
																									
			<tr><td colspan="2">
						<div class="form-action clearfix" align="right" style="padding-right:20px">

							<!--button class="button" type="submit" data-icon-primary="ui-icon-circle-check">Update</button>
			
							<button class="button" type="button"><a href="<?= base_url() ?>index.php/data_provinsi">Batal</a></button-->
							
							<button class="button" type="button" onClick="$('#konfirmasiForm' ).dialog('close');">OK</button>

						</div>
		   
			</td></tr>
			
			</table>
			

</body>

</html>