<!DOCTYPE html>

<html lang="en">

<head>
	<script> var pBaseUrl = '<?=base_url()?>'; </script>
	<?= $inc; ?>
	<script>
		$(function() {
    		$('.date-picker').datepicker( {
        		changeMonth: true,
        		changeYear: true,
        		showButtonPanel: true,
        		dateFormat: 'm-yy',
        		buttonImage: "<?= base_url();?>images/calendar.gif",
        		showOn : "button",
        		buttonImageOnly: true,
        		onClose : function(dateText, inst) { 
            		var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            		var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            		$(this).datepicker('setDate', new Date(year, month, 1));
        		}
    		});
		});
	</script>

	<style>
		.ui-datepicker-calendar {
    		display: none;
    	}
	</style>
</head>

<body style="overflow: hidden;">

	<div id="loading"> 
        <script type = "text/javascript"> 
            document.write("<div id='container'><p id='content'>" + "<img id='loadinggraphic' width='16' height='16' src='<?= base_url() ?>images/ajax-loader-eeeeee.gif' /> " + "Loading...</p></div>");
        </script> 
    </div>

    <div id="wrapper" class="clearfix">        
        <?= $header; ?>
        <section>
            <div class="container_8 clearfix">                

				<!-- Main Section -->
				<section class="main-section grid_8">
				<div class="main-content" style="min-height:450px">
					<header>
						<h2>Ekspor Data</h2>
					</header>

                    <section class="container_6 clearfix">
						<div class="grid_6 clearfix" style="margin-top:-10px;">
						<center>
						<form action="<?=base_url()?>index.php/exportdata/ProsesUnduhFile" id="radio_form" method="post">
							<table border="1" cellpadding="0" cellspacing="0" align="center" width="55%">
								<tr align="center">
									<td colspan="2">
									<div class="error" align="center">
										<?php echo validation_errors(); ?>
									</div>
									</td>
								</tr>
								<tr>
									<td>
									<table border="0" cellpadding="1" cellspacing="1" id="tbl_layout" align="center" width="55%">
										<tr class="tr_data" id="tahun">
											<td valign="top">Periode Data:</td>
											<td valign="middle">
												<input name="periode" id="periode" class="date-picker" size="8" >
											</td>
										</tr>
										<tr><td>&nbsp;</td></tr>
										<tr class="tr_data">
											<td valign="top">Data yang Akan Diekspor:</td>
											<td>
												<b>Data Master:</b>
												<ul>
			 										<li>Dishub </li>
			 										<li>Unit PKB / Bengkel </li>
			 										<li>Penguji </li>
			 										<li>Peralatan Uji </li>
			 										<li>Kendaraan </li>
			 									</ul>
											</td>
										</tr>
										<tr><td>&nbsp;</td></tr>
										<tr class="tr_data">
											<td valign="top"></td>
											<td>
												<b>Data Transaksi:</b>
												<ul>
			 										<li>Pendaftaran </li>
			 										<li>Pembayaran </li>
			 										<li>Pengujian </li>
			 										<li>Pengesahan Hasil Uji</li>
			 										<li>Pengajuan Keberatan</li>
			 									</ul>
											</td>
										</tr>
										<tr><td>&nbsp;</td></tr>
										<tr>
											<td colspan="2">
												<input type="submit" value="Ekspor Data" class="button" />
											</td>
										</tr>		
									</table>
									</td>
								</tr>
							</table>
						</form>
						</center>
						</div>
					</section>
				</div>
                </section>
                <!-- Main Section End -->

			</div>
        </section>
    </div>

</body>

</html>