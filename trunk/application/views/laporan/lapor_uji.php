<!DOCTYPE html>

<html lang="en">

<head>
	<?= $inc; ?>
	<script>
	function popup(url) 
		{
			newwindow=window.open(url,'bukuuji','height=600,width=800');
			if (window.focus) {newwindow.focus()}
			return false;
	}
	</script>
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
                            <h2 align="center">Laporan Pelaksanaan Pengujian</h2>
                        </header>

                        <section class="container_6 clearfix">
                            <div class="grid_6 clearfix" style="margin-top:-10px;">
							<center>
							<form action="<?=base_url()?>index.php/laporan/lapor_uji" method="post">
								<ul class="action-buttons clearfix">
                                	<li>Tgl Awal : <input type="date" style="width:80px" name="tgl_awal" value="<?=$tgl_awal?>"/></li>
									<li>&nbsp;&nbsp;Tgl Akhir : <input type="date" style="width:80px" name="tgl_akhir" value="<?=$tgl_akhir?>" /></li>
									<li><button class="button" style="width:60px;" type="submit">Cari</button></li>
                            	</ul>
							</form>
							</center>
							<br>
							
							<table width="99%" class="display2" style="border:1px #CCCCCC solid;" align="center">
								<thead>
									<tr>
										<th class="ui-state-default" width="3%">No.</th>
										<th class="ui-state-default">No. Pendaftaran</th>
										<th class="ui-state-default">Tgl Pendaftaran</th>
										<th class="ui-state-default">No. Uji</th>
                                        <th class="ui-state-default">No. Kendaraan</th>
                                        <th class="ui-state-default">Merek / Type</th>
										<th class="ui-state-default">Nama Pemilik</th>
										<th class="ui-state-default">Jenis Pengujian</th>
										<th class="ui-state-default">Hasil Pengujian</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($datauji as $dat): ?>
									<?php
										if ($dat->tipe_pendaftaran=="baru") { $permohonan="Uji Baru"; }
										elseif ($dat->tipe_pendaftaran=="berkala") { $permohonan="Uji Berkala"; } 
										elseif ($dat->tipe_pendaftaran=="ulang") { $permohonan="Uji Ulang"; } 
										else { $permohonan="Numpang Uji"; }
									?>
									<?php
										$noUji	= $this->kendaraanmodel->getNoUji($dat->no_srut);
										$noKend	= $this->kendaraanmodel->getNoKendaraan($dat->no_srut);
										$merek	= $this->kendaraanmodel->getMerek($dat->no_srut);
										$tipe	= $this->kendaraanmodel->getTipe($dat->no_srut);
										$nama	= $this->pemilikmodel->getNamaPemilik($dat->no_srut);
									?>
                                    <tr>
										<td align="center"><?=$i=$i+1?></td>
										<td><?=$dat->no_pendaftaran?></td>
										<td><?=$this->converter_model->tgl_Eng_In($dat->tgl_pendaftaran)?></td>
                                        <td><?=$noUji?></td>
                                        <td><?=$noKend?></td>
                                        <td><?=$merek?> <?=$tipe?></td>
                                        <td><?=$nama?></td>
                                        <td><?=$permohonan?></td>
										<td><?=$dat->hasil_pengujian?></td>
                                    </tr>
									<?php endforeach; ?>  
									<?php if(count($datauji)==0 && $tgl_awal==""){ ?>
										<tr>
											<td align="center" colspan="9">Silahkan Pilih Tanggal Terlebih Dahulu</td>
										</tr>
									<?php }elseif(count($datauji)==0 && $tgl_awal!=""){ ?>
										<tr>
											<td align="center" colspan="9">Data Tidak Ditemukan</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>

							<div align="right" style="margin-top:5px; margin-right:10px;display:<?=$display?>;">
								<button class="button" style="width:120px; height:25px;" type="button" onClick="javascript:popup('<?=base_url()?>index.php/laporan/cetak_lapor_uji/<?=$tgl_awal?>/<?=$tgl_akhir?>');">Cetak PDF</button>
							</div>
									
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