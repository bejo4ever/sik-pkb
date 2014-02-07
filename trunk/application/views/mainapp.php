<!DOCTYPE html>

<html lang="en">

<head>
	<?= $inc; ?>
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
				<section class="main-section grid_8">
					<div class="main-content">
						<header>
							<h2><center>Selamat Datang di Aplikasi Pengujian Kendaraan Bermotor</center></h2>
						</header>

                        <section class="container_6 clearfix" style="margin-top:-30px">
							<div class="sortable leading clearfix" align="center">
								<br><br> <img src="<?=base_url()?>images/logos.png"> <br><br><br><br><br>
                            </div>
                        </section>
                    </div>
                </section>
            </div>
        </section>
    </div>

	<?= $footer; ?>            

</body>

</html>