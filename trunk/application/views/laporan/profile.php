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
                            <h2>Profil Unit PKB</h2>
                        </header>

                        <section class="container_6 clearfix">
                            <div class="grid_6 clearfix" style="margin-top:-10px;">

							<?php foreach($unit_pkb as $dat)
								{
									$nama	= $dat->nama_unit;
									$alamat	= $dat->alamat_unit;
									$telp	= $dat->telp_unit;
									$email	= $dat->email_unit;
									$kanit	= $dat->nama_kanit;
									$nip	= $dat->nip_kanit;
								} 
							?>
							<center>
							<table width="97%" align="center">
								<tr>
							  		<td width="15%"><b>Nama Unit PKB</b></td><td>:</td><td><?=$nama?></td>
									<td width="15%"><b>Alamat Email</b></td><td>:</td><td><?=$email?></td>
							 	</tr>
							 	<tr>
									<td><b>Alamat</b></td><td>:</td><td><?=$alamat?></td>
									<td><b>Kepala Unit</b></td><td>:</td><td><?=$kanit?></td>
							 	</tr>
							 	<tr>
									<td><b>Nomor Telpon</b></td><td>:</td><td><?=$telp?></td>
									<td><b>NIP Kepala Unit</b></td><td>:</td><td><?=$nip?></td>
								</tr>
							</table>
							</center>
							
							<br>
							<fieldset style="width:95%; border:0px ">
							<legend style="border:0px;">Daftar Penguji</legend>
							<table width="100%" class="display2" style="border:1px #CCCCCC solid;">
								<thead>
									<tr>
										<th class="ui-state-default" width="3%">No.</th>
										<th class="ui-state-default">No. Register</th>
										<th class="ui-state-default">N I P</th>
										<th class="ui-state-default">Nama Penguji</th>
										<th class="ui-state-default">Pangkat / Golongan</th>
										<th class="ui-state-default">Jabatan Fungsional</th>
										<th class="ui-state-default">Status</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach($penguji as $row): ?>
									<tr>
										<td align="center"><?=$a=$a+1?></td>
										<td>&nbsp;<?=$row->NRP?></td>
										<td>&nbsp;<?=$row->nip_penguji?></td>
										<td>&nbsp;<?=$row->nama_penguji?></td>
										<td>&nbsp;<?=$row->gol_pangkat?></td>
										<td>&nbsp;<?=$row->jabatan_fungsional?></td>
										<td>&nbsp;<?=$row->tipe_penguji?></td>
									</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
							</fieldset>
							
							<br>
							<fieldset style="width:95%; border:0px ">
							<legend style="border:0px;">Daftar Peralatan Uji</legend>
							<table width="100%" class="display2" style="border:1px #CCCCCC solid;">
								<thead>
									<tr>
										<th class="ui-state-default" width="3%">No.</th>
										<th class="ui-state-default">Nama Alat</th>
										<th class="ui-state-default">Merek</th>
										<th class="ui-state-default">Untuk Pengujian</th>
										<th class="ui-state-default">Jumlah</th>
										<th class="ui-state-default">Tahun Produksi</th>
										<th class="ui-state-default">Tahun Pemakaian</th>
										<th class="ui-state-default">Tahun Kalibrasi</th>
										<th class="ui-state-default">Status</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach($peralatan as $d): ?>
									<tr>
										<td align="center"><?=$b=$b+1?></td>
										<td>&nbsp;<?=$d->nama_alat?></td>
										<td>&nbsp;<?=$d->merk?></td>
										<td>&nbsp;<?=$d->deskripsi_kelompok?></td>
										<td>&nbsp;<?=$d->jumlah_alat?></td>
										<td>&nbsp;<?=$d->tahun_produksi?></td>
										<td>&nbsp;<?=$d->tahun_penggunaan?></td>
										<td>&nbsp;<?=$d->tahun_kalibrasi?></td>
										<td>&nbsp;<?=$d->status_alat?></td>
									</tr>
							 	<?php endforeach; ?>
								</tbody>
                            </table>
							</fieldset>
							
							<br>
							<fieldset style="width:95%; border:0px ">
							<legend style="border:0px;">Daftar Fasilitas</legend>
							<table width="98%" class="display2" style="border:1px #CCCCCC solid;">
								<thead>
									<tr>
										<th width="4%" class="ui-state-default">No.</th>
										<th class="ui-state-default">Nama Fasilitas</th>
										<th width="10%" class="ui-state-default">Jumlah</th>
										<th width="15%" class="ui-state-default">Satuan</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach($fasilitas as $f): ?>
									<tr>
										<td align="center"><?=$e=$e+1?></td>
										<td>&nbsp;<?=$f->fasilitas?></td>
										<td align="center">&nbsp;<?=$f->jumlah?></td>
										<td>&nbsp;<?=$f->satuan?></td>
									</tr>
								<?php endforeach; ?>
								<?php if(count($fasilitas)==0){ ?>
									<tr height="30px">
										<td colspan="3"><center>Tidak ada data fasilitas tersimpan</center></td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
							</fieldset>
									 
							<div align="right" style="margin-top:5px; margin-right:10px;display:<?=$display?>;">
								<button class="button" style="width:140px; height:25px;" type="button" onClick="javascript:popup('<?=base_url()?>index.php/laporan/profile_pkb_pdf');">Cetak PDF</button>
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