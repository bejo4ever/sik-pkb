<!DOCTYPE html>
<html lang="en">

<head>
	
	<script type="text/javascript" src="<?= base_url(); ?>js/global.js"></script>
	<script>
    
	function konfirData()
	{
		var url	= '<?=base_url()?>index.php/provinsi/kodecheck';
		$.fx.speeds._default = 1000;
		$(function() {
			$( "#konfirmasiForm" ).dialog({
			autoOpen: false,
			width: 400,
			show: "fade",
			hide: "fade",
			modal: true,
			close: function (event,ui) { $( "#konfirmasiForm" ).dialog( "destroy" );  }, 
			open: function (event,ui) { $("#konfirmasiForm").html(ajax_load).load(url); }
			})
			$( "#konfirmasiForm" ).dialog( "open" );
		});
	}
	
    
    </script>
</head>

<body style="overflow: hidden;">

<div id="konfirmasiForm" title="Konfirmasi Data" style="display:none"></div>

          <form class="form has-validation" id="formAdd" action="<?=base_url()?>index.php/provinsi/kodecheck" method="post">
	 <table width="100%">
	  
		<tr><td colspan="2">
			<div class="clearfix">
				<label for="kode_provinsi" class="form-label">Kode Provinsi <em>*</em></label>
				<div class="form-input">
				<input type="text" name="kode_provinsi" id="kode_provinsi" required="required" style="width:200px" />
				</div>
			</div>
		</td></tr>
		
		<tr><td colspan="2">
			<div class="clearfix">
				<label for="nama_provinsi" class="form-label">Nama Provinsi <em>*</em></label>
				<div class="form-input"><textarea rows="3" name="nama_provinsi" id="nama_provinsi" required="required" style="width:300px" ></textarea></div>
			</div>
		</td></tr>
		
		<tr><td colspan="2">
			
				<div class="form-action clearfix" align="right" style="padding-right:20px">
					<button class="button" type="button" onClick="javascript:konfirData();" data-icon-primary="ui-icon-circle-check">Simpan</button>
					<button class="button" type="button" onClick="$('#addForm' ).dialog('close');">Batalkan</button>
				</div>
			</td></tr>
																
	</table>
	</form>

</body>

</html>