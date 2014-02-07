<!DOCTYPE html>
<html lang="en">
<head>

<?= $inc; ?>
<style>
		table { font-size:11px; }
		table tr { height:30px; }
		small { font-size:9px; color:#999999; }
</style>
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
                    
					<?= $submenu; ?>
					
                    <div class="main-content" style="min-height:255px;">
                        <header>
                            <h2>Detail Kendaraan</h2>
                        </header>
                        <section class="container_6 clearfix" style="margin-top:-30px;">
                            <div class="grid_6 leading">
    
							<?php foreach($data as $dat): ?>
							<table width="100%">
							<tr>
								<td width="50%">
								<fieldset style="margin:0 10px 0 0;">
								<legend>Identitas Pemilik</legend>
									<div class="clearfix">
									<table width="100%">
									<tr height="30px">
										<td align="center" width="2%">a.</td>
										<td width="30%">&nbsp; Nama Pemilik</td>
										<td align="center" width="3%">:</td>
										<td><?=$dat->nama?></td>
										<!--<input type="text" style="width:200px" name="pemilik" value="" />-->
									</tr>	
									<tr height="30px">
										<td align="center">b.</td>
										<td>&nbsp; Alamat</td>
										<td align="center" width="3%">:</td>
										<td><?=$dat->alamat?></td>
										<!--<textarea name="alamat" cols="30" rows="3"></textarea>-->
									</tr>
									<tr height="30px">
										<td align="center">c.</td>
										<td>&nbsp; Kartu Identitas</td>
										<td align="center" width="3%">:</td>
										<td><?=$dat->Id_card?></td>
									</tr>
									<tr height="30px">
										<td align="center">d.</td>
										<td>&nbsp;  No Telp</td>
										<td align="center" width="3%">:</td>
										<td><?=$dat->no_telp?></td>
									</tr>
									<tr height="30px">
										<td align="center">e.</td>
										<td>&nbsp; No HP</td>
										<td align="center" width="3%">:</td>
										<td><?=$dat->no_hp?></td>
									</tr>
									<tr height="30px">
										<td align="center">f.</td>
										<td>&nbsp; Email</td>
										<td align="center" width="3%">:</td>
										<td><?=$dat->email?></td>
									</tr>
									</table>
									</div>
								</fieldset>
								</td><td>
								
								<fieldset style="margin:0 0 0 5px;">
								<legend>Identitas Kendaraan</legend>
									<div class="clearfix">
									<table width="100%">
									<tr height="30px">
										<td align="center" width="2%">a.</td>
										<td width="30%">&nbsp; Nomor Uji</td>
										<td align="center" width="3%">:</td>
										<td><?=$dat->no_uji?></td>
									</tr>
									<tr height="30px">
										<td align="center">b.</td>
										<td>&nbsp; Nomor Kendaraan</td>
										<td align="center" width="3%">:</td>
										<td width="30%"><?=$dat->no_kendaraan?></td>
									</tr>
									<tr height="30px">
										<td align="center">c.</td>
										<td>&nbsp; Merek</td>
										<td align="center" width="3%">:</td>
										<td><?=$dat->merek?></td>
									</tr>
									<tr height="30px">
										<td align="center">d.</td>
										<td>&nbsp; Tipe</td>
										<td align="center" width="3%">:</td>
										<td><?=$dat->tipe?></td>
									</tr>
									<tr height="30px">
										<td align="center">e.</td>
										<td>&nbsp; Jenis Kendaraan</td>
										<td align="center" width="3%">:</td>
										<td><?=$this->master_model->namaJenis($dat->id_jeniskendaraan)?></td>
									</tr>
									<tr height="30px">
										<td align="center">f.</td>
										<td>&nbsp; Isi Silinder</td>
										<td align="center" width="3%">:</td>
										<td><?=$dat->merek?></td>
									</tr>
									<tr height="30px">
										<td align="center">g.</td>
										<td>&nbsp; Daya Motor</td>
										<td align="center" width="3%">:</td>
										<td><?=$dat->tipe?></td>
									</tr>
									<tr height="30px">
										<td align="center">h.</td>
										<td>&nbsp; Bahan Bakar</td>
										<td align="center" width="3%">:</td>
										<td><?=$dat->bahan_bakar?></td>
									</tr>
									<tr height="30px">
										<td align="center">i.</td>
										<td>&nbsp; Tahun Pembuatan</td>
										<td align="center" width="3%">:</td>
										<td><?=$dat->tahun_buat?></td>
									</tr>
									<tr height="30px">
										<td align="center">j.</td>
										<td>&nbsp; Status Penggunaan</td>
										<td align="center" width="3%">:</td>
										<td><?=$this->master_model->namaTipe($dat->id_statuskendaraan)?></td>
									</tr>
									<tr height="30px">
										<td align="center">k.</td>
										<td>&nbsp; Nomor Rangka Landasan</td>
										<td align="center" width="3%">:</td>
										<td><?=$dat->no_chassis?></td>
									</tr>
									<tr height="30px">
										<td align="center">l.</td>
										<td>&nbsp; Nomor Mesin</td>
										<td align="center" width="3%">:</td>
										<td><?=$dat->no_mesin?></td>
									</tr>
									<tr height="30px">
										<td align="center">m.</td>
										<td>&nbsp; No Uji Tipe</td>
										<td align="center" width="3%">:</td>
										<td><?=$dat->no_ujitipe?></td>
									</tr>
									<tr height="30px">
										<td align="center">n.</td>
										<td>&nbsp; Tgl Uji Tipe</td>
										<td align="center" width="3%">:</td>
										<td><?=$dat->tgl_ujitipe?></td>
									</tr>
									<tr height="30px">
										<td align="center">o.</td>
										<td>&nbsp; Nomor Sertifikasi Registrasi Uji Tipe</td>
										<td align="center" width="3%">:</td>
										<td><?=$dat->no_srut?></td>
									</tr>
									<tr height="30px">
										<td align="center">p.</td>
										<td>&nbsp; Tgl Sertifikasi Registrasi Uji Tipe</td>
										<td align="center" width="3%">:</td>
										<td><?=$dat->tgl_srut?></td>
									</tr>
									</table>
									</div>
								</fieldset>
								
								</td>
							</tr>
				
							</table>
							<?php endforeach; ?>
							
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