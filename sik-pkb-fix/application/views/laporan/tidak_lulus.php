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
                                Daftar Kendaraan Tidak Lulus Uji
								<br>
								s/d Tanggal <?=date('d/m/Y')?>
                            </h2>
                        </header>
                        <section class="container_6 clearfix">
                            <div class="grid_6 clearfix" style="margin-top:10px;">
                                <table class="display">
                                    <thead>
                                         <tr>
											<th class="ui-state-default">No. Uji</th>
                                            <th class="ui-state-default">No. Kendaraan</th>
											<th class="ui-state-default">Nama Pemilik</th>
											<th class="ui-state-default">Alamat</th>
                                            <th class="ui-state-default">Merek</th>
                                            <th class="ui-state-default">Type</th>
											<th class="ui-state-default">Tanggal Uji</th>
											<th class="ui-state-default">Nama Penguji</th>
											<th class="ui-state-default">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php foreach($data as $dat): ?>
										<?php $i=$i+1; ?>
										<?php
											$noUji		= $this->kendaraanmodel->getNoUji($dat->no_srut);
											$noKend		= $this->kendaraanmodel->getNoKendaraan($dat->no_srut);
											$merek		= $this->kendaraanmodel->getMerek($dat->no_srut);
											$tipe		= $this->kendaraanmodel->getTipe($dat->no_srut);
											$nama		= $this->pemilikmodel->getNamaPemilik($dat->no_srut);
											$alamat		= $this->pemilikmodel->getAlamat($dat->no_srut);
											$penguji	= $this->penguji_model->getNamaPenguji($dat->NRP);
										?>
                                        <tr>
                                        	<td><?=$noUji?></td>
                                            <td><?=$noKend?></td>
                                            <td><?=$nama?></td>
                                            <td><?=$alamat?></td>
                                            <td><?=$merek?></td>
                                            <td><?=$tipe?></td>
											<td><?=$this->converter_model->tgl_Eng_In($dat->tgl_pengujian)?></td>
                                            <td><?=$penguji?></td>
											<td><?=$dat->keterangan?></td>
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