<!DOCTYPE html>

<html lang="en">

<head>
<link href="<?= base_url() ?>css/ui/ui.base.css" rel="stylesheet" media="all" />
<?= $inc; ?>

</head>

<body style="overflow: hidden;">



    <div id="loading"> 

        <script type = "text/javascript"> 

            document.write("<div id='container'><p id='content'>" +

                           "<img id='loadinggraphic' width='16' height='16' src='<?= base_url() ?>images/ajax-loader-eeeeee.gif' /> " +

                           "Loading...</p></div>");

        </script> 

    </div>

    

    <div id="wrapper" class="clearfix">
        
        <?= $header; ?>

        <section>

            <div class="container_8 clearfix">                



                <!-- Main Section -->



                <section class="main-section grid_8">
                    
                <!--<nav class="collapsed">
				<a class="chevron" href="#">&raquo;</a>
					<ul>
						<li><a href="<?=base_url()?>index.php/master" class="navicon-table">Instansi</a></li>
						<li class="current" ><a href="#" class="navicon-id-card">Penguji</a></li>
						<li><a href="<?=base_url()?>index.php/master/jenis_kendaraan" class="navicon-magnify">Jenis Kendaraan</a></li>
						<li><a href="<?=base_url()?>index.php/master/tipe_kendaraan" class="navicon-newspaper">Tipe Kendaraan</a></li>
						<li><a href="#" class="navicon-ekg">Daftar Checklist</a></li>
					</ul>
				</nav>-->

                    <div class="main-content" style="min-height:555px">
                        <header>
                            <h2>
                               Daftar Provinsi, Kabupaten, dan Kota.
                            </h2>
                        </header>
                        <section class="container_6 clearfix">
                           
                                <!-- isi -->
                                
                                <div id="dashboard-buttons">
					<ul>
						
						<li>
							<a href="<?= base_url() ?>index.php/data_provinsi" class="provinsi tooltip" title="Daftar Provinsi">
								Provinsi
							</a>
	
						</li>
						<li>
							<a href="<?= base_url() ?>index.php/data_kabkota" class="kabkota tooltip" title="Daftar Kabupaten &amp; Kota">
								Kab / Kota
							</a>
							<div class="clear"></div>
						</li>
					</ul>
					<div class="clear"></div>
				</div>
                                
                                <!-- end isi -->
                            
                        </section>
                    </div>

                </section>

                <!-- Main Section End -->



            </div>

        </section>

    </div>

    

    <?= $footer; ?>



</body>

</html>