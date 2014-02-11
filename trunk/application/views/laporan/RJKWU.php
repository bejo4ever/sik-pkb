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
                            <h2 align="center">Rekapitulasi Jumlah Kendaraan Wajib Uji
							<br>s.d. Bulan <?=$this->converter_model->getNamaBulan(date('m'))?> <?=date('Y')?>
							</h2>
                        </header>
                        <section class="container_6 clearfix">
                            <div class="grid_6 clearfix" style="margin-top:10px;">
                            
							<center>
							<table width="97%" align="center" class="display2"  style="border:1px #CCCCCC solid;">
								<thead>
									<tr>
										<th class="ui-state-default" width="3%" rowspan="2"><br><b>No.</b></th> 
										<th class="ui-state-default" rowspan="2"><br><b>Jenis Kendaraan</b></th>
										<th class="ui-state-default" colspan="<?=count($statKendaraan)?>"><b>Jumlah</b></th>
										<th class="ui-state-default" rowspan="2"><br><b>Jumlah</b></th>
									</tr>
									<tr>
										<?php foreach($statKendaraan as $d1): ?>
											<th class="ui-state-default"><b><?=$d1->detail?></b></th>
										<?php endforeach; ?>
									</tr>
								</thead>
							<tbody>
								<?php foreach($kelKendaraan as $d2):  ?>
									<tr height="35px">
										<td align="center"><?=$a=$a+1?></td>
										<td>&nbsp;&nbsp;<a href="<?=base_url()?>index.php/laporan/RJKWU2/<?=$d2->id_kelompokkendaraan?>" target="_parent"><?=$d2->nama_kelompok?></a></td>
										<?php 
											$jumlah=0; $idBar=0;
											foreach($statKendaraan as $d3): 
											$idBar	= $idBar+1;
											$totD=$this->kendaraanmodel->getJumlahUjiKel($d2->id_kelompokkendaraan,$d3->id_statuskendaraan);
											$jumlah		= $jumlah+$totD;
											$jumlahBar[$idBar]	= $jumlahBar[$idBar]+$totD;
										?>
										<td align="center"><?=$totD?></td>
										<?php endforeach; ?>
										<?php $jumlahTot=$jumlahTot+$jumlah; ?>		
										<td align="center"><?=$jumlah?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
							<tr height="30px">
								<td colspan="2" align="center"><b>Jumlah</b></td>
								<?php foreach($statKendaraan as $d4):
									$idBar2		= $idBar2+1;
								?>
								<td align="center"><b><?=$jumlahBar[$idBar2]?></b></td>
								<?php endforeach; ?>
								<td align="center"><b><?=$jumlahTot?></b></td>
							</tr>
							</table>
							</center>

							<div align="right" style="margin-top:5px; margin-right:10px;display:<?=$display?>;">
								<button class="button" style="width:140px; height:25px;" type="button" onClick="javascript:popup('<?=base_url()?>index.php/laporan/RJKWU_pdf');">Cetak PDF</button>
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