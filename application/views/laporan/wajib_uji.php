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
                            <h2 align="center">Daftar Kendaraan Wajib Uji</h2>
                        </header>
                        <section class="container_6 clearfix">
                            <div class="grid_6 clearfix" style="margin-top:-10px;">
                            
							<center>
							<form action="<?=base_url()?>index.php/laporan/wajib_uji" method="post">
							<ul class="action-buttons clearfix">
                                <li>Tgl Awal : <input type="date" style="width:80px" name="tgl_awal" value="<?=$tgl_awal?>"/></li>
								<li>&nbsp;&nbsp;Tgl Akhir : <input type="date" style="width:80px" name="tgl_akhir" value="<?=$tgl_akhir?>" /></li>
								<li><button class="button" style="width:80px;" type="submit">Cari</button></li>
                            </ul>
							</form>
							</center>
							<br>
							
							<table width="99%" class="display2" style="border:1px #CCCCCC solid;" align="center">
							<thead>
								<tr>
									<th class="ui-state-default" width="3%">No.</th>
									<th class="ui-state-default">No. Uji</th>
									<th class="ui-state-default">No. Kendaraan</th>
									<th class="ui-state-default">Pemilik</th>
									<th class="ui-state-default">Alamat</th>
									<th class="ui-state-default">Jenis Kendaraan</th>
									<th class="ui-state-default">Merek</th>
									<th class="ui-state-default">Tipe</th>
									<th class="ui-state-default">Tgl Uji Pertama</th>
									<th class="ui-state-default">Masa Uji Berkala</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($kendaraan as $dat): ?>
									<tr>
										<td align="center"><?=$a=$a+1?></td>
										<td>&nbsp;<?=$dat->no_uji?></td>
										<td>&nbsp;<?=$dat->no_kendaraan?></td>
										<td>&nbsp;<?=$dat->nama?></td>
										<td>&nbsp;<?=$dat->alamat?></td>
										<td>&nbsp;<?=$dat->detail?></td>
										<td>&nbsp;<?=$dat->merek?></td>
										<td>&nbsp;<?=$dat->tipe?></td>
										<td align="center"><?=$this->converter_model->tgl_Eng_In($dat->tgl_ujipertama)?></td>
										<td align="center"><?=$this->converter_model->tgl_Eng_In($dat->tgl_ujiberikut)?></td>
									</tr>
								<?php endforeach; ?>
								<?php if(count($kendaraan)==0 && $tgl_awal==""){ ?>
									<tr>
										<td align="center" colspan="9">Silahkan Pilih Tanggal Terlebih Dahulu</td>
									</tr>
								<?php }elseif(count($kendaraan)==0 && $tgl_awal!=""){ ?>
									<tr>
										<td align="center" colspan="9">Data Tidak Ditemukan</td>
									</tr>
								<?php } ?>
							</tbody>
							</table>

							<div align="right" style="margin-top:5px; margin-right:10px;display:<?=$display?>;">
								<button class="button" style="width:140px; height:25px;" type="button" onClick="javascript:popup('<?=base_url()?>index.php/laporan/cetak_wajib_uji/<?=$tgl_awal?>/<?=$tgl_akhir?>');">Cetak PDF</button>
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