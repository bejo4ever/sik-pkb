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
                <!-- Main Section -->
                <section class="main-section grid_8">
                    <div class="main-content" style="min-height:500px">
                        <header>
                            <h2>
                                Daftar Kendaraan yang Sudah Diuji
                            </h2>
                        </header>
                        <section class="container_6 clearfix">
                            <div class="grid_6 clearfix">
                                <table class="display">
                                    <thead>
                                         <tr>
											<th class="ui-state-default">No. Daftar</th>
                                            <th class="ui-state-default">Tanggal Daftar</th>
											<th class="ui-state-default">Nama Pendaftar</th>
											<th class="ui-state-default">No. Uji</th>
                                            <th class="ui-state-default">No. Kendaraan</th>
                                            <th class="ui-state-default">Merek</th>
                                            <th class="ui-state-default">Type</th>
											<th class="ui-state-default">No. SRUT</th>
											<th class="ui-state-default">Permohonan</th>
                                            <th width="4%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php foreach($data as $dat): ?>
											<?php
												if ($dat->tipe_pendaftaran=="baru")
													{ $permohonan = "Uji Baru"; }
												elseif ($dat->tipe_pendaftaran=="berkala")
													{ $permohonan = "Uji Berkala"; }
												elseif ($dat->tipe_pendaftaran=="numpang")
													{ $permohonan = "Numpang Uji"; }
												else{ $permohonan = "Uji Ulang"; }
											?>
											<?php $i=$i+1; ?>
                                        	<tr>
                                        		<td><?=$dat->no_pendaftaran?></td>
												<td><?=$this->converter_model->tgl_time_Eng_In($dat->tgl_pendaftaran)?></td>
                                            	<td><?=$dat->nama_pendaftar?></td>
                                        		<td><?=$dat->no_uji?></td>
                                            	<td><?=$dat->no_kendaraan?></td>
                                            	<td><?=$dat->merek?></td>
                                            	<td><?=$dat->tipe?></td>
                                        		<td><?=$dat->no_srut?></td>
												<td><?=$permohonan?></td>
	                                            <td align="center">
												<div align="center">
													<a href="<?= base_url() ?>index.php/hasiluji/lihatHasil/<?=$dat->no_pendaftaran?>" class="iconApp" title="Ubah Status Pengujian"><img src="<?=base_url()?>images/icons/detail.png" ></a>
												</div>
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