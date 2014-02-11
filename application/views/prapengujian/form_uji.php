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
                    
                    <div class="main-content" style="min-height:255px">
                        <header>
                            <h2>Input Data Hasil Pra Pengujian</h2>
                        </header>
                        <section class="container_6 clearfix">
                            <div class="grid_6 leading">
    
							<form class="form has-validation" action="#" method="post">			 
								<!-- form hasil uji -->
								 <div class="tabs" style="margin-top:-30px;">
                                    <ul>
                                        <li><a href="#pane-1">Detail Kendaraan & Pemilik</a></li>
										<li><a href="#pane-2">Uraian Kendaraan</a></li>
                                        <li><a href="#pane-3">Uji Fisik</a></li>
										<li><a href="#pane-4">Uji Mekanis</a></li>
									</ul>
									
									<section id="pane-1">
			
			<div class="clearfix">
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
									
			<section id="pane-2">
			<div class="clearfix">
				
				<table width="100%">
				<tr>
					<td>
						<fieldset style="margin:5px 5px 5px 5px;">
						<legend>Ukuran Utama</legend>
						<table width="100%">
							<tr>
								<td>Panjang</td>
								<td><input type="text" style="width:50px" name="uu1" /> mm</td>
							</tr>
							<tr>
								<td>Lebar</td>
								<td><input type="text" style="width:50px" name="uu2" /> mm</td>
							</tr>
							<tr>
								<td>Tinggi</td>
								<td><input type="text" style="width:50px" name="uu3" /> mm</td>
							</tr>
							<tr>
								<td>Julur Belakang</td>
								<td><input type="text" style="width:50px" name="uu4" /> mm</td>
							</tr>
							<tr>
								<td>Julur Depan</td>
								<td><input type="text" style="width:50px" name="uu5" /> mm</td>
							</tr>
						</table>
						</fieldset>
					</td>
					<td>
						<fieldset style="margin:5px 5px 5px 5px;">
						<legend>Jarak Sumbu</legend>
						<table width="100%">
							<tr>
								<td>Sumbu I-II</td>
								<td><input type="text" style="width:50px" name="js1" /> mm</td>
							</tr>
							<tr>
								<td>Sumbu II-III</td>
								<td><input type="text" style="width:50px" name="js2" /> mm</td>
							</tr>
							<tr>
								<td>Sumbu III-IV</td>
								<td><input type="text" style="width:50px" name="js3" /> mm</td>
							</tr>
							<tr>
								<td>Q (Jarak Titik Berat)</td>
								<td><input type="text" style="width:50px" name="js4" /> mm</td>
							</tr>
						</table>
						</fieldset>
					</td>
					<td>
						<fieldset style="margin:5px 5px 5px 5px;">
						<legend>Dimensi Bak Muatan</legend>
						<table width="100%">
							<tr>
								<td>Panjang</td>
								<td><input type="text" style="width:50px" name="dbm1" /> mm</td>
							</tr>
							<tr>
								<td>Lebar</td>
								<td><input type="text" style="width:50px" name="dbm2" /> mm</td>
							</tr>
							<tr>
								<td>Tinggi</td>
								<td><input type="text" style="width:50px" name="dbm3" /> mm</td>
							</tr>
							<tr>
								<td>Bahan Bak</td>
								<td><input type="text" style="width:50px" name="dbm4" /> mm</td>
							</tr>
						</table>
						</fieldset>
					</td>
				</tr>
				<tr>
					<td>
					<fieldset style="margin:5px 5px 5px 5px;">
						<legend>Dimensi Tangki</legend>
						<table width="100%">
							<tr>
								<td>Panjang</td>
								<td><input type="text" style="width:50px" name="dt1" /> mm</td>
							</tr>
							<tr>
								<td>Lebar</td>
								<td><input type="text" style="width:50px" name="dt2" /> mm</td>
							</tr>
							<tr>
								<td>Tinggi</td>
								<td><input type="text" style="width:50px" name="dt3" /> mm</td>
							</tr>
							<tr>
								<td>Volume</td>
								<td><input type="text" style="width:50px" name="dt4" /> ltr</td>
							</tr>
							<tr>
								<td>Jenis Muatan</td>
								<td><input type="text" style="width:100px" name="dt5" /></td>
							</tr>
							<tr>
								<td>Berat Jenis Muatan</td>
								<td><input type="text" style="width:50px" name="dt6" /> kg/dm3</td>
							</tr>
							<tr>
								<td>Bahan Tangki</td>
								<td><input type="text" style="width:100px" name="dt7" /></td>
							</tr>
						</table>
					</fieldset>
					</td>
					<td width="40%">
					<fieldset style="margin:5px 5px 5px 5px;">
						<legend>Pemakaian Ban yang diijinkan</legend>
						<table width="100%">
							<tr>
								<td>Sumbu I</td>
								<td><input type="text" style="width:100px" name="pb1" /></td>
							</tr>
							<tr>
								<td>Sumbu II</td>
								<td><input type="text" style="width:100px" name="pb2" /></td>
							</tr>
							<tr>
								<td>Sumbu III</td>
								<td><input type="text" style="width:100px" name="pb3" /></td>
							</tr>
							<tr>
								<td>Sumbu IV</td>
								<td><input type="text" style="width:100px" name="pb4" /></td>
							</tr>
						</table>
					
					
						<table width="100%">
						<tr>
							<td width="75%"><label>Konfigurasi Sumbu</label></td>
							<td><input type="text" style="width:50px" name="pb5" /></td>
						</tr>
						<tr>
							<td><label>Jumlah Berat Yang diperbolehkan (JBB)</label></td>
							<td><input type="text" style="width:50px" name="pb6" /> kg</td>
						</tr>
						<tr>
							<td><label>Jumlah Berat Kombinasi Yang diperbolehkan (JBKB)</label></td>
							<td><input type="text" style="width:50px" name="pb7" /> kg</td>
						</tr>
						</table>
					</fieldset>	
					</td>
					<td>
					<fieldset style="margin:5px 5px 5px 5px;">
						<legend>Berat Kosong</legend>
						<table width="100%">
							<tr>
								<td>Sumbu I</td>
								<td><input type="text" style="width:100px" name="bk1" /> kg</td>
							</tr>
							<tr>
								<td>Sumbu II</td>
								<td><input type="text" style="width:100px" name="bk2" /> kg</td>
							</tr>
							<tr>
								<td>Sumbu III</td>
								<td><input type="text" style="width:100px" name="bk3" /> kg</td>
							</tr>
							<tr>
								<td>Sumbu IV</td>
								<td><input type="text" style="width:100px" name="bk4" /> kg</td>
							</tr>
						</table>
					</fieldset>
					</td>
				</tr>
				<tr>
					<td colspan="3">
					<fieldset style="margin:5px 5px 5px 5px;">
						<legend>Daya Angkut</legend>
						<table width="100%">
							<tr>
								<td width="40%">
									<table width="100%">
										<tr>
											<td>Orang</td>
											<td><input type="text" style="width:100px" name="da1" /> Penumpang</td>
										</tr>
										<tr>
											<td>Barang</td>
											<td><input type="text" style="width:100px" name="da2" /> kg</td>
										</tr>
									</table> 
								</td>
								<td>
									<table width="100%">
										<tr>
											<td>Jumlah Berat Yang diijinkan (JBI)</td>
											<td><input type="text" style="width:100px" name="da3" /> kg</td>
										</tr>
										<tr>
											<td>Jumlah Berat Kombinasi Yang diijinkan (JBKI)</td>
											<td><input type="text" style="width:100px" name="da4" /> kg</td>
										</tr>
										<tr>
											<td>Muatan Sumbu Terberat (MST)</td>
											<td><input type="text" style="width:100px" name="da5" /> kg</td>
										</tr>
										<tr>
											<td>Kelas Jalan Terendah yang Boleg dilalui</td>
											<td><input type="text" style="width:100px" name="da6" /></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</fieldset>
					</td>
				</tr>
				</table>
		
				
			</div>
			</section>
					
			<section id="pane-3">
			<div class="clearfix">						
			<table width="100%">
            <tr>
				<td width="37%">
					
					<fieldset style="margin:10px 0 5px 0;">
					<legend>1. Identitas Kendaraan</legend>
						<div class="clearfix">
							<table width="100%">
							<tr>
								<td width="3%">a.</td><td>Nomor Uji/Nomor Pendaftaran</td>
								<td width="30%" rowspan="2" valign="middle" align="center"><small><b><i>Sesuai Buku Uji</i></b></small></td>
								<td width="22%" align="center">
									<input type="radio" title="Lulus" name="u1" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u1" value="TL">TL
								</td>
							</tr>
							<tr>
								<td>b.</td><td>Nomor Rangka / Nomor Mesin</td>
								<td align="center">
									<input type="radio" title="Lulus" name="u2" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u2" value="TL">TL
								</td>
							</tr>
							</table>
						</div>
					</fieldset>
					
					<fieldset style="margin:10px 0 5px 0;">
					<legend>2. Sistem Penerangan</legend>
						<div class="clearfix">
							<table width="100%">
							<tr>
								<td width="3%">a.</td><td>Lampu Penunjuk Arah</td>
								<td width="30%" rowspan="4" valign="middle" align="center"><small><b><i>Menyala</i></b></small></td>
								<td width="22%" align="center">
									<input type="radio" title="Lulus" name="u3" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u3" value="TL">TL
								</td>
							</tr>
							<tr>
								<td>b.</td><td>Lampu Rem</td>
								<td align="center">
									<input type="radio" title="Lulus" name="u4" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u4" value="TL">TL
								</td>
							</tr>
							<tr>
								<td>c.</td><td>Lampu Mundur</td>
								<td align="center">
									<input type="radio" title="Lulus" name="u5" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u5" value="TL">TL
								</td>
							</tr>
							<tr>
								<td>d.</td><td>Lampu Posisi</td>
								<td align="center">
									<input type="radio" title="Lulus" name="u6" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u6" value="TL">TL
								</td>
							</tr>
							</table>
						</div>
					</fieldset>
					
					<fieldset style="margin:10px 0 5px 0;">
					<legend>3. Rumah dan Body</legend>
						<div class="clearfix">
							<table width="100%">
							<tr>
								<td width="3%">a.</td><td>Kondisi rumah / body</td>
								<td width="30%" align="center" valign="middle"><small><b><i>Baik, tidak keropos</i></b></small></td>
								<td width="22%" align="center">
									<input type="radio" title="Lulus" name="u7" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u7" value="TL">TL
								</td>
							</tr>
							<tr>
								<td>b.</td><td>Perisai Kolong</td>
								<td align="center"><small><b><i>ada</i></b></small></td>
								<td align="center">
									<input type="radio" title="Lulus" name="u8" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u8" value="TL">TL
								</td>
							</tr>
							<tr>
								<td>c.</td><td>Samb. tempelan/gandengan</td>
								<td align="center"><small><b><i>Tidak aus</i></b><b><i></small></td>
								<td align="center">
									<input type="radio" title="Lulus" name="u9" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u9" value="TL">TL
								</td>
							</tr>
							</table>
						</div>
					</fieldset>
					
					<fieldset style="margin:10px 0 5px 0;">
					<legend>4. Roda-Roda</legend>
						<div class="clearfix">
							<table width="100%">
							<tr>
								<td width="3%">a.</td><td>Ukuran Ban Sumbu I</td>
								<td width="30%" align="center" rowspan="4" valign="middle"><small><b><i>Sesuai Buku Uji/Spesifikasi Pabrik</i></b></small></td>
								<td width="22%" align="center">
									<input type="radio" title="Lulus" name="u10" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u10" value="TL">TL
								</td>
							</tr>
							<tr>
								<td>b.</td><td>Ukuran Ban Sumbu II</td>
								<td align="center">
									<input type="radio" title="Lulus" name="u11" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u11" value="TL">TL
								</td>
							</tr>
							<tr>
								<td>c.</td><td>Ukuran Ban Sumbu III</td>
								<td align="center">
									<input type="radio" title="Lulus" name="u12" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u12" value="TL">TL
								</td>
							</tr>
							<tr>
								<td>d.</td><td>Ukuran Ban Sumbu IV</td>
								<td align="center">
									<input type="radio" title="Lulus" name="u13" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u13" value="TL">TL
								</td>
							</tr>
							<tr>
								<td>e.</td><td>Kedalaman alur ban luar</td>
								<td align="center"><small><b><i>1 mm (min)</i></b><b><i></small></td>
								<td align="center">
									<input type="radio" title="Lulus" name="u14" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u14" value="TL">TL
								</td>
							</tr>
							<tr>
								<td>f.</td><td>Penguatan roda</td>
								<td align="center"><small><b><i>Tidak kendor</i></b><b><i></small></td>
								<td align="center">
									<input type="radio" title="Lulus" name="u15" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u15" value="TL">TL
								</td>
							</tr>
							</table>
						</div>
					</fieldset>
					
				</td>
				<td>
				
					<fieldset style="margin:10px 0 0 5px;">
					<legend>5. Dimensi Kendaraan</legend>
						<div class="clearfix">
							<table width="100%">
							<tr><td>a.</td><td colspan="3"><b>Ukuran Utama</b></td></tr>
							<tr>
								<td width="3%" align="right"> -&nbsp;</td><td>Panjang</td>
								<td width="30%" rowspan="5" valign="middle"></td>
								<td width="25%" align="center">
									<input type="radio" title="Lulus" name="u16" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u16" value="TL">TL
								</td>
							</tr>
							<tr>
								<td align="right"> -&nbsp;</td><td>Lebar</td>
								<td align="center">
									<input type="radio" title="Lulus" name="u17" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u17" value="TL">TL
								</td>
							</tr>
							<tr>
								<td align="right"> -&nbsp;</td><td>Tinggi</td>
								<td align="center">
									<input type="radio" title="Lulus" name="u18" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u18" value="TL">TL
								</td>
							</tr>
							<tr>
								<td align="right"> -&nbsp;</td><td>Julur Depan (FOH)</td>
								<td align="center">
									<input type="radio" title="Lulus" name="u19" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u19" value="TL">TL
								</td>
							</tr>
							<tr>
								<td align="right"> -&nbsp;</td><td>Julur Belakang (ROH)</td>
								<td align="center">
									<input type="radio" title="Lulus" name="u20" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u20" value="TL">TL
								</td>
							</tr>
							<tr><td>b.</td><td colspan="3"><b>Jarak Sumbu</b></td></tr>
							<tr>
								<td align="right"> -&nbsp;</td><td>Sumbu I-II</td>
								<td rowspan="3" valign="middle"><small><b><i>Sesuai Buku Uji / Ketentuan</i></b><b><i></small></td>
								<td align="center">
									<input type="radio" title="Lulus" name="u21" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u21" value="TL">TL
								</td>
							</tr>
							<tr>
								<td align="right"> -&nbsp;</td><td>Sumbu II-III</td>
								<td align="center">
									<input type="radio" title="Lulus" name="u22" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u22" value="TL">TL
								</td>
							</tr>
							<tr>
								<td align="right"> -&nbsp;</td><td>Sumbu III-IV</td>
								<td align="center">
									<input type="radio" title="Lulus" name="u23" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u23" value="TL">TL
								</td>
							</tr>
							<tr><td>c.</td><td colspan="3"><b>Dimensi Bak Muatan</b></td></tr>
							<tr>
								<td align="right"> -&nbsp;</td><td>Panjang</td>
								<td rowspan="3" valign="middle"><small><b><i>Spesifikasi</i></b><b><i></small></td>
								<td align="center">
									<input type="radio" title="Lulus" name="u24" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u24" value="TL">TL
								</td>
							</tr>
							<tr>
								<td align="right"> -&nbsp;</td><td>Lebar</td>
								<td align="center">
									<input type="radio" title="Lulus" name="u25" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u25" value="TL">TL
								</td>
							</tr>
							<tr>
								<td align="right"> -&nbsp;</td><td>Tinggi</td>
								<td align="center">
									<input type="radio" title="Lulus" name="u26" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u26" value="TL">TL
								</td>
							</tr>
							<tr><td>d.</td><td colspan="3"><b>Dimensi Tangki</b></td></tr>
							<tr>
								<td align="right"> -&nbsp;</td><td>Panjang</td>
								<td rowspan="6" valign="middle"><small><b><i>Sesuai tera / Kapasitas</i></b><b><i></small></td>
								<td align="center">
									<input type="radio" title="Lulus" name="u27" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u27" value="TL">TL
								</td>
							</tr>
							<tr>
								<td align="right"> -&nbsp;</td><td>Lebar</td>
								<td align="center">
									<input type="radio" title="Lulus" name="u28" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u28" value="TL">TL
								</td>
							</tr>
							<tr>
								<td align="right"> -&nbsp;</td><td>Tinggi</td>
								<td align="center">
									<input type="radio" title="Lulus" name="u29" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u29" value="TL">TL
								</td>
							</tr>
							<tr>
								<td align="right"> -&nbsp;</td><td>Volume</td>
								<td align="center">
									<input type="radio" title="Lulus" name="u30" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u30" value="TL">TL
								</td>
							</tr>
							<tr>
								<td align="right"> -&nbsp;</td><td>Jenis Muatan</td>
								<td align="center">
									<input type="radio" title="Lulus" name="u31" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u31" value="TL">TL
								</td>
							</tr>
							<tr>
								<td align="right"> -&nbsp;</td><td>Berat Jenis Muatan</td>
								<td align="center">
									<input type="radio" title="Lulus" name="u32" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u32" value="TL">TL
								</td>
							</tr>
							</table>
						</div>
					</fieldset>
				</td>
				<td width="31%">
					<fieldset style="margin:10px 0 0 5px;">
					<legend>6. Peralatan dan Perlengkapan</legend>
						<div class="clearfix">
							<table width="100%">
							<tr>
								<td width="3%">a.</td><td>Penghapus kaca depan</td>
								<td valign="middle" align="center"><small><b><i>ada & berfungsi</i></b></small></td>
								<td width="27%" align="center">
									<input type="radio" title="Lulus" name="u33" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u33" value="TL">TL
								</td>
							</tr>
							<tr>
								<td>b.</td><td>Kaca Spion</td>
								<td align="center"><small><b><i>ada & lengkap</i></b></small></td>
								<td align="center">
									<input type="radio" title="Lulus" name="u34" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u34" value="TL">TL
								</td>
							</tr>
							<tr>
								<td>c.</td><td>Dongkrak</td>
								<td align="center"><small><b><i>ada & berfungsi</i></b></small></td>
								<td align="center">
									<input type="radio" title="Lulus" name="u35" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u35" value="TL">TL
								</td>
							</tr>
							<tr>
								<td>d.</td><td>Alat - alat / kunci</td>
								<td align="center"><small><b><i>ada & lengkap</i></b></small></td>
								<td align="center">
									<input type="radio" title="Lulus" name="u36" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u36" value="TL">TL
								</td>
							</tr>
							<tr>
								<td>e.</td><td>Ban pengganti / cadangan</td>
								<td align="center"><small><b><i>ada</i></b></small></td>
								<td align="center">
									<input type="radio" title="Lulus" name="u37" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u37" value="TL">TL
								</td>
							</tr>
							<tr>
								<td>f.</td><td>Tanda segitiga pengaman</td>
								<td align="center"><small><b><i>ada & lengkap</i></b></small></td>
								<td align="center">
									<input type="radio" title="Lulus" name="u38" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u38" value="TL">TL
								</td>
							</tr>
							<tr>
								<td>g.</td><td>Sabuk keselamatan / kotak obat</td>
								<td align="center"><small><b><i>ada & berfungsi</i></b></small></td>
								<td align="center">
									<input type="radio" title="Lulus" name="u39" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u39" value="TL">TL
								</td>
							</tr>
							<tr>
								<td>h.</td><td>Engine break / rem gas buang</td>
								<td align="center"><small><b><i>ada & berfungsi</i></b></small></td>
								<td align="center">
									<input type="radio" title="Lulus" name="u40" value="L">L &nbsp;
									<input type="radio" title="Tidak Lulus" name="u40" value="TL">TL
								</td>
							</tr>
							</table>
						</div>
					</fieldset>
				
				</td>
			</tr>
			</table>
			</div>
							
									
									</section>
									
									<section id="pane-4">
			
			<table width="100%">
			<tr>
			<td width="50%">
			<fieldset style="margin:10px 0 0 5px;">
			<legend>Kebisingan Suara</legend>
				<div class="clearfix">
				<table width="100%">
				<tr>
					<td>Klakson</td>
					<td align="center"><small><b><i>90 dBA - 118 dBA</i></b></small></td>
					<td align="right"><input type="text" name=""  style="width:50px"> dBA &nbsp;</td>
					<td width="10%" align="right"> 
						<select name="">
						<option>Penguji 1</option>
						<option>Penguji 2</option>
						</select>
					</td>
				</tr>
				</table>
				</div>
			</fieldset>
			
			<fieldset style="margin:10px 0 0 5px;">
			<legend>Emisi Gas Buang</legend>
				<div class="clearfix">
				<table width="100%">
				<tr>
					<td>a.</td>
					<td>Mesin Diesel</td>
					<!--<td rowspan="2"><small><b><i>(Ketebalan Asap)</i></b></small></td>-->
					<td align="center"><small><b><i>< <?=date('Y')-1?> 70 %, > <?=date('Y')-1?> 50 %</i></b></small></td>
					<td align="right"><input type="text" name="" style="width:50px"> %&nbsp;&nbsp;&nbsp;</td>
					<td rowspan="2" width="10%" align="right">
						<select name="">
						<option>Penguji 1</option>
						<option>Penguji 2</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>b.</td>
					<td>Mesin Bensin</td>
					<td align="center"><small><b><i>< <?=date('Y')-4?> C0 = 4,5% , HCL = 1200 Ppm <br> > <?=date('Y')-4?> C0 = 1,5% , HCL = 200 Ppm</i></b></small></td>
					<td align="right">
						CO = <input type="text" name="" style="width:50px"> %&nbsp;&nbsp; <br>
						HCL = <input type="text" name="" style="width:50px"> Ppm</td>
				</tr>
				</table>
				</div>
			</fieldset>
			
			<fieldset style="margin:10px 0 0 5px;">
			<legend>Bawah Kendaraan</legend>
				<div class="clearfix">
				<table width="100%">
				<tr height="30px">
					<td>a.</td>
					<td>Sistem Kemudi</td>
					<td><small><b><i>Tingkat Keausan</i></b></small></td>
					<td width="20%">
						<input type="radio" title="Lulus" name="u33" value="L">L &nbsp;
						<input type="radio" title="Tidak Lulus" name="u33" value="TL">TL
					</td>
					<td rowspan="7">
						<select name="">
						<option>Penguji 1</option>
						<option>Penguji 2</option>
						</select>
					</td>
				</tr>
				<tr height="30px">
					<td>b.</td>
					<td>Sistem Suspensi</td>
					<td><small><b><i>Berfungsi</i></b></small></td>
					<td>
						<input type="radio" title="Lulus" name="u33" value="L">L &nbsp;
						<input type="radio" title="Tidak Lulus" name="u33" value="TL">TL
					</td>
				</tr>
				<tr height="30px">
					<td>c.</td>
					<td>Saluran Sistem Rem</td>
					<td><small><b><i>Tidak Bocor</i></b></small></td>
					<td>
						<input type="radio" title="Lulus" name="u33" value="L">L &nbsp;
						<input type="radio" title="Tidak Lulus" name="u33" value="TL">TL
					</td>
				</tr>
				<tr height="30px">
					<td>d.</td>
					<td>Sistem Penerus Daya</td>
					<td><small><b><i>Tingkat Keausan</i></b></small></td>
					<td>
						<input type="radio" title="Lulus" name="u33" value="L">L &nbsp;
						<input type="radio" title="Tidak Lulus" name="u33" value="TL">TL
					</td>
				</tr>
				<tr height="30px">
					<td>e.</td>
					<td>Mesin dan Transmisi</td>
					<td><small><b><i>Tidak Bocor</i></b></small></td>
					<td>
						<input type="radio" title="Lulus" name="u33" value="L">L &nbsp;
						<input type="radio" title="Tidak Lulus" name="u33" value="TL">TL
					</td>
				</tr>
				<tr height="30px">
					<td>f.</td>
					<td>Tangki dan Sistem Bahan Bakar</td>
					<td><small><b><i>Tidak Bocor</i></b></small></td>
					<td>
						<input type="radio" title="Lulus" name="u33" value="L">L &nbsp;
						<input type="radio" title="Tidak Lulus" name="u33" value="TL">TL
					</td>
				</tr>
				<tr height="30px">
					<td>g.</td>
					<td>Saluran pada Gas Buang</td>
					<td><small><b><i>Tidak Bocor dan Arah Sesuai</i></b></small></td>
					<td>
						<input type="radio" title="Lulus" name="u33" value="L">L &nbsp;
						<input type="radio" title="Tidak Lulus" name="u33" value="TL">TL
					</td>
				</tr>
				</table>
				</div>
			</fieldset>
			
			<fieldset style="margin:10px 0 0 5px;">
			<legend>Lampu Utama</legend>
				<div class="clearfix">
				<table width="100%">
				<tr>
					<td>a.</td>
					<td>Kuat Pancar Lampu <br>Utama (Jauh)</td>
					<td><small><b><i>> 12.000 cd</i></b></small></td>
					<td width="30%" align="right"> 
					Kiri <input type="text" name="" style="width:50px"> cd <br>
					Kanan <input type="text" name="" style="width:50px"> cd&nbsp;</td>
					<td width="25%" rowspan="3" align="right">
						<select name="">
						<option>Penguji 1</option>
						<option>Penguji 2</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>b.</td>
					<td>Sudut Deviasi Kanan</td>
					<td><small><b><i> 0&deg; 34&acute; (max) <br> 1&deg; 09&acute; (min)</i></b></small></td>
					<td align="right"> <input type="text" name="" style="width:50px"> &deg; &nbsp;&nbsp; <br>
					 <input type="text" name="" style="width:50px"> &acute; &nbsp;&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td>c.</td>
					<td>Sudut Deviasi Kiri</td>
					<td><small><b><i> 0&deg; 34&acute; (max) <br> 1&deg; 09&acute; (min)</i></b></small></td>
					<td align="right"> <input type="text" name="" style="width:50px"> &deg; &nbsp;&nbsp;&nbsp;<br>
					 <input type="text" name="" style="width:50px"> &acute; &nbsp;&nbsp;&nbsp;</td>
				</tr>
				</table>
				</div>
			</fieldset>
			
			</td><td>
			
			<fieldset style="margin:10px 0 0 5px;">
			<legend>Kincup Roda</legend>
				<div class="clearfix">
				<table width="100%">
				<tr>
					<td>Kincup Roda (max)</td>
					<td><small><b><i> [+/-] 5 mm / meter</i></b></small></td>
					<td align="right"><input type="text" name="" style="width:50px"> mm / meter &nbsp;</td>
					<td width="15%" align="right">
						<select name="">
						<option>Penguji 1</option>
						<option>Penguji 2</option>
						</select>
					</td>
				</tr>
				</table>
				</div>
			</fieldset>
			
			<fieldset style="margin:10px 0 0 5px;">
			<legend>Berat Sumbu</legend>
				<div class="clearfix">
				<table width="100%">
				<tr>
					<td>Berat Sumbu (KG)</td>
					<td><small><b><i> Sesuai Buku Uji / Hasil penimbangan</i></b></small></td>
					<td align="right"><input type="text" name="" style="width:50px"> KG &nbsp;</td>
					<td width="15%" align="right">
						<select name="">
						<option>Penguji 1</option>
						<option>Penguji 2</option>
						</select>
					</td>
				</tr>
				</table>
				</div>
			</fieldset>
			
			<fieldset style="margin:10px 0 0 5px;">
			<legend>Sistem REM</legend>
				<div class="clearfix">
				<table width="100%">
				<tr>
					<td rowspan="4">a.</td>
					<td rowspan="4">Rem Utama (KG)</td>
					<td rowspan="4" align="center"><small><b><i>Gaya rem <br> >= 50%  berat sumbu (kg)</i></b></small></td>
					<td width="25%" align="right">S1 = <input type="text" name="" style="width:50px"> %</td>
					<td rowspan="9" width="22%" align="right">
						<select name="">
						<option>Penguji 1</option>
						<option>Penguji 2</option>
						</select>
					</td>
				</tr>
				<tr align="right">
					<td>S2 = <input type="text" name="" style="width:50px"> %</td>
				</tr>
				<tr align="right">
					<td>S3 = <input type="text" name="" style="width:50px"> %</td>
				</tr>
				<tr align="right">
					<td>S4 = <input type="text" name="" style="width:50px"> %</td>
				</tr>
				<tr>
					<td rowspan="4">b.</td>
					<td rowspan="4">Selisih gaya rem roda <br> kiri dan kanan dalam <br> satu sumbu (%)</td>
					<td rowspan="4" align="center"><small><b><i>8% (maksimal)</i></b></small></td>
					<td align="right">S1 = <input type="text" name="" style="width:50px"> %</td>
				</tr>
				<tr align="right">
					<td>S2 = <input type="text" name="" style="width:50px"> %</td>
				</tr>
				<tr align="right">
					<td>S3 = <input type="text" name="" style="width:50px"> %</td>
				</tr>
				<tr align="right">
					<td>S4 = <input type="text" name="" style="width:50px"> %</td>
				</tr>
				<tr>
					<td>c.</td>
					<td>Efisiensi rem parkir (Hpb)</td>
					<td align="center"><small><b><i>Mbl. Penumpang <br> Min 12 %, <br> Mbl. Barang Min 16 %</i></b></small></td>
					<td align="right"><input type="text" name="" style="width:50px"> %</td>
				</tr>
				</table>
				</div>
			</fieldset>
			
			<fieldset style="margin:10px 0 0 5px;">
			<legend>Speedometer</legend>
				<div class="clearfix">
				<table width="100%">
				<tr>
					<td>Speedometer [+/-]</td>
					<td><small><b><i>36 km/j s/d 45 km/j</i></b></small></td>
					<td><input type="text" name="" style="width:100px"> km/j</td>
					<td>
						<select name="">
						<option>Penguji 1</option>
						<option>Penguji 2</option>
						</select>
					</td>
				</tr>
				</table>
				</div>
			</fieldset>
			
			</td>
			</tr>
			</table>
									</section>
									
								</div>	
								
				<div class="form-action clearfix" align="right" style="margin:10px 0 0 0;">
				
				<label>Tanggal Pra Pengujian</label>
				<input type="date" style="width:80px" name="tgl_periksa" value="<?=date('Y-m-d')?>"/>
		 
				<button class="button" style="width:90px; height:30px" type="submit" data-icon-primary="ui-icon-circle-check">Simpan</button>
				<button type="button" onClick="location.href='<?=base_url()?>index.php/prapengujian';" class="button" style="width:90px; height:30px"  data-icon-primary="ui-icon-circle-close">Cancel</button>
				</div>
								
						</form>
							
							
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
