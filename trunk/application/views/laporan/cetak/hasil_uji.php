<!DOCTYPE html>

<html lang="en">

<head>

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
                    
                   <!-- <nav class="collapsed">
						<a class="chevron" href="#">&raquo;</a>
						<ul>
							<li class="current" ><a href="<?=base_url()?>index.php/hasil" class="navicon-table">Daftar</a></li>
							<li><a href="#" class="navicon-id-card">Lulus</a></li>
							<li><a href="#" class="navicon-newspaper">Tidak Lulus</a></li>
							<li><a href="#" class="navicon-magnify">Cari Data</a></li>
							<li><a href="#" class="navicon-ekg">Berita Acara</a></li>
						</ul>
					</nav> -->

                    <div class="main-content" style="min-height:500px">
                        <header>
							<ul class="action-buttons clearfix">
                                <li>
									<select name="view">
										<option> --- View Data ---</option>
										<option>Laporan Hari Ini</option>
										<option>Laporan Minggu Ini</option>
										<option>Laporan Bulan Ini</option>
									</select>
								</li>
                            </ul>
                            <h2>
                                Laporan Hasil Pengujian Terakhir
                            </h2>
                        </header>
                        <section class="container_6 clearfix">
                            <div class="grid_6 clearfix" style="margin-top:-10px;">
                                <table class="display">
                                    <thead>
                                         <tr>
											<th class="ui-state-default">No Uji</th>
                                            <th class="ui-state-default">Permohonan</th>
											<th class="ui-state-default">Tanggal Pengujian</th>
											<th class="ui-state-default">Nama Pendaftar</th>
                                            <th class="ui-state-default">No. Kendaraan</th>
                                            <th class="ui-state-default">Merek</th>
                                            <th class="ui-state-default">Type</th>
											<th class="ui-state-default">Hasil</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($data as $dat): ?>
										<?php $i=$i+1; ?>
										<?php
											if($dat->tipe_pendaftaran=="baru"){ $permohonan="UJI BARU"; }else{ $permohonan="UJI BERKALA"; } 
										?>
                                        <tr>
                                        	<td><?=$dat->no_uji?></td>
											<td><?=$permohonan?></td>
											<td><?=$this->converter_model->tgl_Eng_In($this->pengujianmodel->getVerifikasi($dat->no_pendaftaran,"tgl"))?></td>
                                            <td><?=$dat->nama_pendaftar?></td>
                                            <td><?=$dat->no_kendaraan?></td>
                                            <td><?=$dat->merek?></td>
                                            <td><?=$dat->tipe?></td>
											<td><b><?=$this->pengujianmodel->getVerifikasi($dat->no_pendaftaran,"status")?></b></td>
                                            <td align="center">
                                            <a href="<?= base_url() ?>index.php/hasiluji/lihatHasil/<?=$dat->no_pendaftaran?>" class="button" title="Lihat Hasil Pengujian" data-icon-primary="ui-icon-clipboard" data-icon-only="true">&nbsp;</a>
                                            </td>
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