<!DOCTYPE html>

<html lang="en">

<head>

<?= $inc; ?>

</head>

<body style="overflow: hidden;">

	<?php 
		$userLevel=$this->session->userdata('id_level');
		if($userLevel!="1")
		{
			$display='hidden';
		}else{
			$display='block';
		}
	?>
	
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
                    
                    <div class="main-content" style="min-height:500px">
                        <header>
						<?php if($display!="hidden"){ ?>
                            <!--ul class="action-buttons clearfix">
                                <li><a href="#" class="button" data-icon-primary="ui-icon-plusthick">Tambah Daftar Uji</a></li>
                            </ul-->
						<?php } ?>
                            <h2>Daftar Uji</h2>
                        </header>
                        <section class="container_6 clearfix">
                            <div class="grid_6 clearfix" style="margin-top:-20px;">
                                <table class="display">
                                    <thead>
                                        <tr>
                                            <th class="ui-state-default" width="5%">Kode</th>
                                            <th class="ui-state-default" width="15%">Kelompok</th>
											<!--<th class="ui-state-default" width="10%">Tipe Input</th>-->
											<th class="ui-state-default">Spesifikasi</th>
											<th class="ui-state-default" width="25%">Item Pengujian</th>
											<th class="ui-state-default">Satuan</th>
											<?php if($display!="hidden"){ ?>
                                            	<th width="70px">Aksi</th>
											<?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($data as $d): ?>
                                        <tr>
                                        	<td align="center"><?=$i=$i+1?></td>
                                            <td><?=$d->deskripsi_kelompok?></td>
											<!--<td><?=$d->tipe_input?></td>-->
											<td><?=$d->spesifikasi?></td>
											<td><?=$d->deskripsi_itemuji?></td>
											<td><?=$d->satuan?></td>
											<?php if($display!="hidden"){ ?>
												<td>
												<div align="center">
												<a class="iconApp" title="Edit">
												<img src="<?=base_url()?>images/icons/edit.png" ></a>
												<a class="iconApp" title="Hapus">
												<img src="<?=base_url()?>images/icons/hapus.png" >
												</a>
												</div>
												</td>
											<?php } ?>
                                        </tr>
                                      <?php endforeach; ?>	
                                    </tbody>
                                </table>
                            </div>
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