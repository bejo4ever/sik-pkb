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
                                Monitoring Status Pelaksanaan Pengujian
								<br>
								Tanggal <?=date('d/m/Y')?>
                            </h2>
                        </header>
                        <section class="container_6 clearfix">
                            <div class="grid_6 clearfix" style="margin-top:10px;">
                                <table class="display">
                                    <thead>
                                         <tr>
											<th class="ui-state-default">No. Pendaftaran</th>
											<th class="ui-state-default">No. Uji</th>
                                            <th class="ui-state-default">No. Kendaraan</th>
											<th class="ui-state-default">Nama Pemilik</th>
											<th class="ui-state-default">Alamat</th>
                                            <th class="ui-state-default">Merek</th>
                                            <th class="ui-state-default">Type</th>
											<th class="ui-state-default">Status Pengujian</th>
											<th class="ui-state-default">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($data as $dat): ?>
										<?php $i=$i+1; ?>
										<?php
											if ($dat->tipe_pendaftaran=="baru") { $permohonan="Uji Baru"; }
											elseif ($dat->tipe_pendaftaran=="berkala") { $permohonan="Uji Berkala"; } 
											elseif ($dat->tipe_pendaftaran=="ulang") { $permohonan="Uji Ulang"; } 
											else { $permohonan="Numpang Uji"; }
										?>
                                        <tr>
                                        	<td><?=$dat->no_pendaftaran?></td>
                                        	<td><?=$dat->no_uji?></td>
                                            <td><?=$dat->no_kendaraan?></td>
                                            <td><?=$dat->nama?></td>
                                            <td><?=$dat->alamat?></td>
                                            <td><?=$dat->merek?></td>
                                            <td><?=$dat->tipe?></td>
                                            <td><?=$dat->status?></td>
											<td><?=$permohonan?></td>
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