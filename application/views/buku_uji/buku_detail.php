<!DOCTYPE html>

<html lang="en">

<head>
<link href="<?= base_url(); ?>css/tables.css" media="screen" rel="stylesheet" type="text/css" >
<?= $inc; ?>

	<style>
		table { font-size:11px; }
		table tr { height:25px; }
		.itlc { margin:-5px 0 0 0; font-style:italic; }
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

                    <div class="main-content" style="min-height:555px">
                        <header>
                            <h2>
                                Buku Uji Kendaraan
                            </h2>
                        </header>
                        
                        <section class="container_6 clearfix" style="margin-top:-20px">
                            <!-- === isi === -->
                            <!-- Tabs Section -->
                            <div class="grid_6 leading">
                                <div class="tabs">
                                    <ul>
                                        <li><a href="#pane-1"><img src="<?= base_url() ?>images/icons/hal.png"/>&nbsp;Hal 2 - 3</a></li>
                                        <li><a href="#pane-2"><img src="<?= base_url() ?>images/icons/hal.png"/>&nbsp;Hal 4 - 5</a></li>
                                        <li><a href="#pane-3"><img src="<?= base_url() ?>images/icons/hal.png"/>&nbsp;Hal 6 - 7</a></li>
                                        <li><a href="#pane-4"><img src="<?= base_url() ?>images/icons/hal.png"/>&nbsp;Hal 8 - 9</a></li>
                                        <li><a href="#pane-5"><img src="<?= base_url() ?>images/icons/hal.png"/>&nbsp;Hal 10 - 11</a></li>
                                        <li><a href="#pane-6"><img src="<?= base_url() ?>images/icons/hal.png"/>&nbsp;Hal 12 - 13</a></li>
                                    </ul>


                                    <!-- =============== tab pane-1 =============== -->
                                    <section id="pane-1">
                                     <div class="grid_6 clearfix" style="width:47%">   
                                       
										<!-- halaman 2 -->
                                		<div class="portlet">
                                    	
										<header><h2>Halaman 2</h2></header>
										
                                        <section>
                                            <!-- isi hal 2 --> 
                                        	<div align="center">
                                        		<h3><u>IDENTIFIKASI KENDARAAN DAN PEMILIK</u>
												<br><p class="itlc">IDENTIFICATION OF VEHICLE AND OWNER</p></h3>
                                    		</div><br/>

                                            <div class="clearfix">
											<label><b><u>PEMILIK</u><br><p class="itlc">(OWNER)</p></b></label><br>
											<table width="100%">
												<tr>
													<td width="50%">
													<b><u>Nomor Uji Berkala</u></b><br>
													<p class="itlc">(Periodical Inspection Number)</p></td>
													<td width="2%">:</td><td>-----</td>
												</tr>
												<tr>
													<td>
													<b><u>Nomor Kendaraan</u></b><br>
													<p class="itlc">(Vehicle Registration Number)</p>
													</td>
													<td>:</td><td>-----</td>
												</tr>
												<tr>
													<td>
													<b><u>Nama Pemilik Kendaraan</u></b><br><p class="itlc">(Name of Owner)</p>
													</td>
													<td>:</td><td>-----</td>
												</tr>
												<tr>
													<td>
													<b><u>Alamat Pemilik Kendaraan</u></b><br>
													<p class="itlc">(Address of Owner)</p>
													</td>
													<td>:</td><td>-----<br><br>-----<br><br>-----<br><br></td>
												</tr>
												<tr>
													<td>
													<b><u>Kartu Identitas Diri</u></b><br>
													<p class="itlc">(ID Card)</p>
													</td>
													<td>:</td><td>-----</td>
												</tr>
                                            </table>
                                            </div>
                                        <!-- end isi hal 2 -->
                                     </section>

                                    </div>
                                  	</div>
										
                                    <!-- halaman 3 -->
                                		<div class="grid_6 clearfix" style="width:47%">   
                                		<div class="portlet">

                                    	<header><h2>Halaman 3</h2></header>

                                        <section>
                                            
                                            <div align="center" style="margin-top:-20px">
                                        	<h3><u>URAIAN DATA KENDARAAN</u><br><p class="itlc">DESCRIPTION OF VEHICLE</p></h3>                                     		</div>
                                        
                                            <div align="left" style="margin:-5px 0 0 0; font-size:10px;">
                                                <b>IDENTITAS KENDARAAN <i>(IDENTITY OF VEHICLE)</i></b>
                                            </div>
                                            <br>
                                            <!-- isi hal 3 -->
                                            
                                            <div class="clearfix">
											<table width="100%">
												<tr>
													<td width="60%"><b>Merek</b> <span class="itlc">(Brand)</span></td>
													<td width="2%">:</td><td>-----</td>
												</tr>
												<tr>
													<td><b>Tipe</b> <span class="itlc">(Type)</span></td>
													<td>:</td><td>-----</td>
												</tr>
												<tr>
													<td><b>Jenis</b> <span class="itlc">(Category)</span></td>
													<td>:</td><td>-----</td>
												</tr>
												<tr>
													<td><b>Isi Silinder</b> <span class="itlc">(Cylinder Volume)</span></td>
													<td>:</td><td>-----</td>
												</tr>
												<tr>
													<td><b>Daya Motor</b> <span class="itlc">(Power)</span></td>
													<td>:</td><td>-----</td>
												</tr>
												<tr>
													<td><b>Bahan Bakar</b> <span class="itlc">(Fuel)</span></td>
													<td>:</td><td>-----</td>
												</tr>
												<tr>
													<td><b>Tahun Pembuatan</b> <span class="itlc">(Year of Manufactured)</span></td>
													<td>:</td><td>-----</td>
												</tr>
												<tr>
													<td><b>Status Penggunaan</b> <span class="itlc">(Usage Status)</span></td>
													<td>:</td><td>-----</td>
												</tr>
												<tr>
													<td><b>Nomor Rangka Landasan</b> <span class="itlc">(Chassis Number)</span></td>
													<td>:</td><td>-----</td>
												</tr>
												<tr>
													<td><b>Nomor Mesin</b> <span class="itlc">(Engine Number)</span></td>
													<td>:</td><td>-----</td>
												</tr>
												<tr>
													<td>
													<b><u>Nomor dan Tanggal Sertifikasi Uji Tipe dan Sertifikat Registrasi Uji Tipe</u></b><br>
													<p class="itlc">(Number and Date of Type Approval Certificate and Type Approval Certificate Registration)</p></td>
													<td>:</td><td>-----</td>
												</tr>
											</table>
        									<!-- end isi hal 3 -->
											</section>
											
											</div>
											 <br><div class="form-action clearfix" align="right">
                                                <button class="button" style="width:100px; height:30px" type="submit" data-icon-primary="ui-icon-print">Print</button>     
                                            </div>
											
                                    
                                    	</div>
                                    	<div class="clearfix"></div>
     						
                                    </section> 
                                    
                                    <!-- =============== tab pane-2 =============== -->
                                    <section id="pane-2">
                                    
                                     <div class="grid_6 clearfix" style="width:50%">   
                                    
                                    <!-- halaman 4 -->
										
                                		<div class="portlet">

                                    	<header><h2>Halaman 4</h2></header>

                                        <section>
                                            <div align="center">
                                                <b>UKURAN KENDARAAN<i>(VEHICLE DIMENSIONS)</i></b>
                                            </div>
                                            
                                            <table width="100%" class="tbl2">
											<tr>
												<td><b>a. Ukuran Utama<i> (Main Dimension)</i></b></td>
											</tr>
											<tr>
												<td>
												
													<table width="100%">
													<tr>
														<td><b>Panjang</b> <span class="itlc">(Length)</span></td>
														<td>:</td><td>-----</td>
													</tr>
													<tr>
														<td><b>Lebar</b> <span class="itlc">(Width)</span></td>
														<td>:</td><td>-----</td>
													</tr>
													<tr>
														<td><b>Tinggi</b> <span class="itlc">(Height)</span></td>
														<td>:</td><td>-----</td>
													</tr>
													<tr>
														<td><b>Julur Belakang</b> <span class="itlc">(Rear Over Hang)/ROH</span></td>
														<td>:</td><td>-----</td>
													</tr>
													<tr>
														<td><b>Julur Depan</b> <span class="itlc">(Front Over Hang)/FOH</span></td>
														<td>:</td><td>-----</td>
													</tr>
													</table>
													
												</td>
											</tr>
											<tr>
												<td><b>b. Jarak Sumbu<i> (Wheel Base)</i></b></td>
											</tr>
											<tr>
												<td>
												
													<table width="100%">
													<tr>
														<td><b>Sumbu I-II</b> <span class="itlc">(Axie I-II)</span></td>
														<td>:</td><td>-----</td>
													</tr>
													<tr>
														<td><b>Sumbu II-III</b> <span class="itlc">(Axie II-III)</span></td>
														<td>:</td><td>-----</td>
													</tr>
													<tr>
														<td><b>Sumbu III-IV</b> <span class="itlc">(Axie III-IV)</span></td>
														<td>:</td><td>-----</td>
													</tr>
													<tr>
														<td><b>Q</b> <span class="itlc">(Jarak Titik Berat)</span></td>
														<td>:</td><td>-----</td>
													</tr>
													</table>
													
												</td>
											</tr>
											<tr>
												<td><b>c. Dimensi Bak Muatan<i> (Mobil Barang Bak Terbuka/Bak Tertutup/Box)</i></b></td>
											</tr>
											<tr>
												<td>
												
													<table width="100%">
													<tr>
														<td><b>Panjang</b></td>
														<td>:</td><td>-----</td>
													</tr>
													<tr>
														<td><b>Lebar</b></td>
														<td>:</td><td>-----</td>
													</tr>
													<tr>
														<td><b>Tinggi</b></td>
														<td>:</td><td>-----</td>
													</tr>
													<tr>
														<td><b>Bahan Bak</b></td>
														<td>:</td><td>-----</td>
													</tr>
													</table>
													
												</td>
											</tr>
											<tr>
												<td><b>c1. Dimensi Tangki</b></td>
											</tr>
											<tr>
												<td>
												
													<table width="100%">
													<tr>
														<td><b>Panjang</b></td>
														<td>:</td><td>-----</td>
													</tr>
													<tr>
														<td><b>Lebar</b></td>
														<td>:</td><td>-----</td>
													</tr>
													<tr>
														<td><b>Tinggi</b></td>
														<td>:</td><td>-----</td>
													</tr>
													<tr>
														<td><b>Volume</b></td>
														<td>:</td><td>-----</td>
													</tr>
													<tr>
														<td><b>Jenis Muatan</b></td>
														<td>:</td><td>-----</td>
													</tr>
													<tr>
														<td><b>Berat Jenis Muatan</b></td>
														<td>:</td><td>-----</td>
													</tr>
													<tr>
														<td><b>Bahan Tamgki</b></td>
														<td>:</td><td>-----</td>
													</tr>
													</table>
													
												</td>
											</tr>
											<tr>
												<td><b><u>PEMAKAIAN BAN YANG DIIJINKAN</u></b><p class="itlc">(PERMISSIBLE TIRE USED)</p></td>
											</tr>
											<tr>
												<td>
												
													<table width="100%">
													<tr>
														<td><b>a. Sumbu Ke-1</b> <span class="itlc">(First Axie)</span></td>
														<td>:</td><td>-----</td>
													</tr>
													<tr>
														<td><b>b. Sumbu Ke-2</b> <span class="itlc">(Second Axie)</span></td>
														<td>:</td><td>-----</td>
													</tr>
													<tr>
														<td><b>c. Sumbu Ke-3</b> <span class="itlc">(Third Axie)</span></td>
														<td>:</td><td>-----</td>
													</tr>
													<tr>
														<td><b>d. Sumbu Ke-4</b> <span class="itlc">(Fourth Axie)</span></td>
														<td>:</td><td>-----</td>
													</tr>
													</table>
													
												</td>
											</tr>
											<tr>
												<td><b><u>KONFIGURASI SUMBU</u></b><p class="itlc">(AXLE CONFIGURATION)</p></td>
											 </tr>
											 <tr>
											 	<td><b><u>Jumlah Berat Yang Diperbolehkan (JBB)</u></b><p class="itlc">Gross Vehicle Weight(GVW)</p></td>
											</tr>
											<tr>
												<td><b><u>Jumlah Berat Kombinasi Yang Diperbolehkan (JBKB)</u></b><p class="itlc">Gross Combination Weight (GCW)</p></td>
											</tr>
											</table>
   
                                            </section>

                                    </div>
                                    	
                                    	</div>
                                    	
        														
                                    <!-- halaman 5 -->

                                		<div class="grid_6 clearfix" style="width:45%">   
                                       
										
                                		<div class="portlet">

                                    	<header>

                                        	<h2>Halaman 5</h2>
										
                                    	</header>

                                            <section>
                                            
                                            <!-- isi hal 5 -->
                                            
        									<p>&nbsp;&nbsp;<b>BERAT KOSONG</b><i>&nbsp;(KERB WEIGHT)</i></p>
                                              
											  <table width="100%">
											  <tr>
											  	<td><b>Sumbu Ke-1</b> <span class="itlc">(First Axie)</span></td>
												<td>:</td><td>-----</td>
											 </tr>
											  <tr>
											  	<td><b>Sumbu Ke-2</b> <span class="itlc">(Second Axie)</span></td>
												<td>:</td><td>-----</td>
											 </tr>
											  <tr>
											  	<td><b>Sumbu Ke-3</b> <span class="itlc">(Third Axie)</span></td>
												<td>:</td><td>-----</td>
											 </tr> 
											 <tr>
											  	<td><b>Sumbu Ke-4</b> <span class="itlc">(Fourth Axie)</span></td>
												<td>:</td><td>-----</td>
											 </tr>      
                                           	<tr>
											  	<td><b>Jumlah (Total)</b></td>
												<td>:</td><td>-----</td>
											 </tr> 
											 <tr>
											 	<td colspan="2"><b>DAYA ANGKUT</b><i>&nbsp;(PAY LOAD)</i></td>
											</td>
											</tr>
											 <tr>
											  	<td><b>Orang</b> <span class="itlc">(Persons)</span></td>
												<td>:</td><td>-----</td>
											 </tr> 
											<tr>
											  	<td><b>Barang</b> <span class="itlc">(Goode)</span></td>
												<td>:</td><td>-----</td>
											 </tr>
											 <tr>
											  	<td><b>Jumlah Berat Yang diijinkan (JBI)</b> <span class="itlc">Gross Permissible Vehicle Weight(GPVW)</span></td>
												<td>:</td><td>-----</td>
											 </tr>
											 <tr>
											  	<td><b>Jumlah Berat Kombinasi Yang Diijinkan (JBKI)</b> <span class="itlc">Gross Permissible Combination Weight (GPCW)</span></td>
												<td>:</td><td>-----</td>
											 </tr>
											 <tr>
											  	<td><b>Muatan Sumbu Terberat (MST)</b> <span class="itlc">(Permissible Axie Load)</span></td>
												<td>:</td><td>-----</td>
											 </tr>	
											 <tr>
											  	<td><b>Muatan Sumbu Terberat (MST)</b> <span class="itlc">(Permissible Axie Load)</span></td>
												<td>:</td><td>-----</td>
											 </tr>
											 <tr>
											  	<td><b>Kelas Jalan Yang Boleh Dilalui</b> <span class="itlc">(The Lowes Road Category)</span></td>
												<td>:</td><td>-----</td>
											 </tr>
                                          	</table>
                                            <!-- end isi hal 5 -->
                                            </section>

                                    </div>
                                  			
											<br><div class="form-action clearfix" align="right">
                                                <button class="button" style="width:100px; height:30px" type="submit" data-icon-primary="ui-icon-print">Print</button></div>
                                    	
                                    	</div>
                                    	<div class="clearfix"></div>
									</section>
        								
        														
        							<!-- =============== tab pane-3 =============== -->
                                    <form class="form has-validation">
                                    <section id="pane-3">
                                    <div class="grid_6 clearfix">   
                                        <!-- halaman 6 -->
											
                                		<div class="portlet">

                                    	<header>

                                        	<h2>Halaman 6</h2>
										
                                    	</header>

                                            <section>
                                            
                                            <!-- Isi hal 6 -->
                                            
                                      <table class="datatable tablesort selectable paginate full">
                                        <thead>
                                            <tr>
                                                <th width="18%">ITEM UJI<br/><i>TESTING</i></th>
                                                <th width="30%">AMBANG BATAS<br/><i>THRESSHOLD</i></th>
                                                <th width="27%">HASIL UJI<br/><i>TEST RESULT</i></th>    
                                                <th width="25%">KETERANGAN<br/><i>REMARK</i></th>
                                            </tr>
                                        </thead>
                                
								
                                    <!-- === EDITABLE === -->
                                            <tbody>
                                              
                                                <tr>
                                                    <td><b>REM UTAMA <br><i>(BRAKE)</i></b></td>
                                                    
                                                    <td colspan="2">
                                                    	
                                                    <table width="100%">
                                                    <tr>
                                                    <td>Total Gaya Pengereman &ge; 50% x total berat<br> sumbu (kg)</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;kg</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>Selisih Gaya Pengereman</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px">I</td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;%</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>Roda Kiri dan Roda Kanan</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px">II</td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;%</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>Dalam Satu Sumbu</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px">III</td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;%</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>Maksimum 8%</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px">IV</td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;%</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    
                                                    </table>
                                                    
                                                    </td>
                                                    <td>Lulus / Tidak Lulus Uji Berkala<br/><br/>Tempat dan Tanggal Pengujian</td>
                                                </tr>
                                                
                                                
                                                
                                                <tr>
                                                    <td><b>LAMPU UTAMA <br><i>(HEAD LAMP)</i></b></td>
                                                    
                                                    <td colspan="2">
                                                    	
                                                    <table width="100%">
                                                    <tr>
                                                    <td>Kekuatan pancar lampu kanan 12.000 cd&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>(lampu jauh)</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td><input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;cd</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>Kekuatan pancar lampu kiri 12.000 cd&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>(lampu jauh)</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td><input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;cd</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>Penyimpangan ke kanan 0&deg; 34'</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td>
                                                                <input  type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;&deg;<br/>
                                                                <input  type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;'</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>Penyimpangan ke kiri 1&deg; 09'</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td>
                                                                <input  type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;&deg;<br/>
                                                                <input  type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;'</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    
                                                    </table>
                                                    
                                                    </td>
                                                    <td>Berlaku sampai dengan</td>
                                                </tr>
                                                
                                                
                                                <tr>
                                                    <td><b>EMISI <br><i>(EMISSION)</i></b></td>
                                                    
                                                    <td colspan="2">
                                                    	
                                                    <table width="100%">
                                                    <tr>
                                                    <td>Asap (bahan bakar solar) 70%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;%</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>Bahan Bakar Bensin</td>
                                                    <td>
                                                    	
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>
                                                    	a.&nbsp;Tahun Pembuatan &lt; 2007
                                                    </td>
                                                    <td>
                                                    	
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>&nbsp;&nbsp;&nbsp;&minus;&nbsp;CO : 4,5%</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;%</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>&nbsp;&nbsp;&nbsp;&minus;&nbsp;HC : 1.200 ppm</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;ppm</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>
                                                    	b.&nbsp;Tahun Pembuatan &ge; 2007
                                                    </td>
                                                    <td>
                                                    	
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>&nbsp;&nbsp;&nbsp;&minus;&nbsp;CO : 1,5%</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;%</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>&nbsp;&nbsp;&nbsp;&minus;&nbsp;HC : 200 ppm</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;ppm</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    </table>
                                                    
                                                    </td>
                                                    <td>Tanda Tangan / Nama Penguji<br>No. Reg. Penguji</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                            
        									<!-- end isi hal 6 -->
                                            </section>

                                    </div>
                                    	
   	  </div>
                                    	
        														
                                    <!-- halaman 7 -->
										
                                		<div class="grid_6 clearfix">   
                                       <br/>
										
                                		<div class="portlet">

                                    	<header>

                                        	<h2>Halaman 7</h2>
										
                                    	</header>

                                            <section>
                                            <!-- isi hal 7 -->
                                        <table class="datatable tablesort selectable paginate full">
                                        <thead>
                                            <tr>
                                                <th width="18%">ITEM UJI<br/><i>TESTING</i></th>
                                                <th width="30%">AMBANG BATAS<br/><i>THRESSHOLD</i></th>
                                                <th width="27%">HASIL UJI<br/><i>TEST RESULT</i></th>    
                                                <th width="25%">KETERANGAN<br/><i>REMARK</i></th>
                                            </tr>
                                        </thead>
                                
								
                                    <!-- === EDITABLE === -->
                                            <tbody>
                                              
                                                <tr>
                                                    <td><b>REM UTAMA <br><i>(BRAKE)</i></b></td>
                                                    
                                                    <td colspan="2">
                                                    	
                                                    <table width="100%">
                                                    <tr>
                                                    <td>Total Gaya Pengereman &ge; 50% x total berat<br> sumbu (kg)</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;kg</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>Selisih Gaya Pengereman</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px">I</td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;%</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>Roda Kiri dan Roda Kanan</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px">II</td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;%</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>Dalam Satu Sumbu</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px">III</td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;%</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>Maksimum 8%</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px">IV</td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;%</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    
                                                    </table>
                                                    
                                                    </td>
                                                    <td>Lulus / Tidak Lulus Uji Berkala<br/><br/>Tempat dan Tanggal Pengujian</td>
                                                </tr>
                                                
                                                
                                                
                                                <tr>
                                                    <td><b>LAMPU UTAMA <br><i>(HEAD LAMP)</i></b></td>
                                                    
                                                    <td colspan="2">
                                                    	
                                                    <table width="100%">
                                                    <tr>
                                                    <td>Kekuatan pancar lampu kanan 12.000 cd&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>(lampu jauh)</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td><input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;cd</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>Kekuatan pancar lampu kiri 12.000 cd&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>(lampu jauh)</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td><input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;cd</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>Penyimpangan ke kanan 0&deg; 34'</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td>
                                                                <input  type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;&deg;<br/>
                                                                <input  type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;'</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>Penyimpangan ke kiri 1&deg; 09'</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td>
                                                                <input  type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;&deg;<br/>
                                                                <input  type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;'</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    
                                                    </table>
                                                    
                                                    </td>
                                                    <td>Berlaku sampai dengan</td>
                                                </tr>
                                                
                                                
                                                <tr>
                                                    <td><b>EMISI <br><i>(EMISSION)</i></b></td>
                                                    
                                                    <td colspan="2">
                                                    	
                                                    <table width="100%">
                                                    <tr>
                                                    <td>Asap (bahan bakar solar) 70%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;%</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>Bahan Bakar Bensin</td>
                                                    <td>
                                                    	
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>
                                                    	a.&nbsp;Tahun Pembuatan &lt; 2007
                                                    </td>
                                                    <td>
                                                    	
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>&nbsp;&nbsp;&nbsp;&minus;&nbsp;CO : 4,5%</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;%</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>&nbsp;&nbsp;&nbsp;&minus;&nbsp;HC : 1.200 ppm</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;ppm</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>
                                                    	b.&nbsp;Tahun Pembuatan &ge; 2007
                                                    </td>
                                                    <td>
                                                    	
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>&nbsp;&nbsp;&nbsp;&minus;&nbsp;CO : 1,5%</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;%</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>&nbsp;&nbsp;&nbsp;&minus;&nbsp;HC : 200 ppm</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;ppm</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    </table>
                                                    
                                                    </td>
                                                    <td>Tanda Tangan / Nama Penguji<br>No. Reg. Penguji</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                            <div class="form-action clearfix" align="right">
												<br/>
                                                <button class="button" style="width:140px; height:30px" type="submit" data-icon-primary="ui-icon-print">Print</button>
                                                
                                            </div>
                                                                                        
        									<!-- end isi hal 7 -->
                                            </section>

                                    </div>
                                    	
                                    	</div>
                                    	<div class="clearfix"></div>
			    					</section></form>
        														
        														<!-- =============== tab pane-4 =============== -->
                                     <form class="form has-validation">
                                    <section id="pane-4">
                                    <div class="grid_6 clearfix">   
                                        <!-- halaman 8 -->
											
                                		<div class="portlet">

                                    	<header>

                                        	<h2>Halaman 6</h2>
										
                                    	</header>

                                            <section>
                                            
                                            <!-- Isi hal 8 -->
                                            
                                      <table class="datatable tablesort selectable paginate full">
                                        <thead>
                                            <tr>
                                                <th width="18%">ITEM UJI<br/><i>TESTING</i></th>
                                                <th width="30%">AMBANG BATAS<br/><i>THRESSHOLD</i></th>
                                                <th width="27%">HASIL UJI<br/><i>TEST RESULT</i></th>    
                                                <th width="25%">KETERANGAN<br/><i>REMARK</i></th>
                                            </tr>
                                        </thead>
                                
								
                                    <!-- === EDITABLE === -->
                                            <tbody>
                                              
                                                <tr>
                                                    <td><b>REM UTAMA <br><i>(BRAKE)</i></b></td>
                                                    
                                                    <td colspan="2">
                                                    	
                                                    <table width="100%">
                                                    <tr>
                                                    <td>Total Gaya Pengereman &ge; 50% x total berat<br> sumbu (kg)</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;kg</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>Selisih Gaya Pengereman</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px">I</td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;%</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>Roda Kiri dan Roda Kanan</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px">II</td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;%</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>Dalam Satu Sumbu</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px">III</td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;%</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>Maksimum 8%</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px">IV</td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;%</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    
                                                    </table>
                                                    
                                                    </td>
                                                    <td>Lulus / Tidak Lulus Uji Berkala<br/><br/>Tempat dan Tanggal Pengujian</td>
                                                </tr>
                                                
                                                
                                                
                                                <tr>
                                                    <td><b>LAMPU UTAMA <br><i>(HEAD LAMP)</i></b></td>
                                                    
                                                    <td colspan="2">
                                                    	
                                                    <table width="100%">
                                                    <tr>
                                                    <td>Kekuatan pancar lampu kanan 12.000 cd&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>(lampu jauh)</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td><input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;cd</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>Kekuatan pancar lampu kiri 12.000 cd&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>(lampu jauh)</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td><input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;cd</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>Penyimpangan ke kanan 0&deg; 34'</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td>
                                                                <input  type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;&deg;<br/>
                                                                <input  type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;'</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>Penyimpangan ke kiri 1&deg; 09'</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td>
                                                                <input  type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;&deg;<br/>
                                                                <input  type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;'</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    
                                                    </table>
                                                    
                                                    </td>
                                                    <td>Berlaku sampai dengan</td>
                                                </tr>
                                                
                                                
                                                <tr>
                                                    <td><b>EMISI <br><i>(EMISSION)</i></b></td>
                                                    
                                                    <td colspan="2">
                                                    	
                                                    <table width="100%">
                                                    <tr>
                                                    <td>Asap (bahan bakar solar) 70%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;%</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>Bahan Bakar Bensin</td>
                                                    <td>
                                                    	
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>
                                                    	a.&nbsp;Tahun Pembuatan &lt; 2007
                                                    </td>
                                                    <td>
                                                    	
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>&nbsp;&nbsp;&nbsp;&minus;&nbsp;CO : 4,5%</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;%</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>&nbsp;&nbsp;&nbsp;&minus;&nbsp;HC : 1.200 ppm</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;ppm</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>
                                                    	b.&nbsp;Tahun Pembuatan &ge; 2007
                                                    </td>
                                                    <td>
                                                    	
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>&nbsp;&nbsp;&nbsp;&minus;&nbsp;CO : 1,5%</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;%</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>&nbsp;&nbsp;&nbsp;&minus;&nbsp;HC : 200 ppm</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;ppm</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    </table>
                                                    
                                                    </td>
                                                    <td>Tanda Tangan / Nama Penguji<br>No. Reg. Penguji</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                            
        									<!-- end isi hal 8 -->
                                            </section>

                                    </div>
                                    	
   	  </div>
                                    	
        														
                                    <!-- halaman 9 -->
										
                                		<div class="grid_6 clearfix">   
                                       <br/>
										
                                		<div class="portlet">

                                    	<header>

                                        	<h2>Halaman 9</h2>
										
                                    	</header>

                                            <section>
                                            <!-- isi hal 9 -->
                                        <table class="datatable tablesort selectable paginate full">
                                        <thead>
                                            <tr>
                                                <th width="18%">ITEM UJI<br/><i>TESTING</i></th>
                                                <th width="30%">AMBANG BATAS<br/><i>THRESSHOLD</i></th>
                                                <th width="27%">HASIL UJI<br/><i>TEST RESULT</i></th>    
                                                <th width="25%">KETERANGAN<br/><i>REMARK</i></th>
                                            </tr>
                                        </thead>
                                
								
                                    <!-- === EDITABLE === -->
                                            <tbody>
                                              
                                                <tr>
                                                    <td><b>REM UTAMA <br><i>(BRAKE)</i></b></td>
                                                    
                                                    <td colspan="2">
                                                    	
                                                    <table width="100%">
                                                    <tr>
                                                    <td>Total Gaya Pengereman &ge; 50% x total berat<br> sumbu (kg)</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;kg</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>Selisih Gaya Pengereman</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px">I</td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;%</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>Roda Kiri dan Roda Kanan</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px">II</td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;%</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>Dalam Satu Sumbu</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px">III</td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;%</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>Maksimum 8%</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px">IV</td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;%</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    
                                                    </table>
                                                    
                                                    </td>
                                                    <td>Lulus / Tidak Lulus Uji Berkala<br/><br/>Tempat dan Tanggal Pengujian</td>
                                                </tr>
                                                
                                                
                                                
                                                <tr>
                                                    <td><b>LAMPU UTAMA <br><i>(HEAD LAMP)</i></b></td>
                                                    
                                                    <td colspan="2">
                                                    	
                                                    <table width="100%">
                                                    <tr>
                                                    <td>Kekuatan pancar lampu kanan 12.000 cd&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>(lampu jauh)</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td><input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;cd</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>Kekuatan pancar lampu kiri 12.000 cd&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>(lampu jauh)</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td><input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;cd</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>Penyimpangan ke kanan 0&deg; 34'</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td>
                                                                <input  type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;&deg;<br/>
                                                                <input  type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;'</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>Penyimpangan ke kiri 1&deg; 09'</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td>
                                                                <input  type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;&deg;<br/>
                                                                <input  type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;'</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    
                                                    </table>
                                                    
                                                    </td>
                                                    <td>Berlaku sampai dengan</td>
                                                </tr>
                                                
                                                
                                                <tr>
                                                    <td><b>EMISI <br><i>(EMISSION)</i></b></td>
                                                    
                                                    <td colspan="2">
                                                    	
                                                    <table width="100%">
                                                    <tr>
                                                    <td>Asap (bahan bakar solar) 70%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;%</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>Bahan Bakar Bensin</td>
                                                    <td>
                                                    	
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>
                                                    	a.&nbsp;Tahun Pembuatan &lt; 2007
                                                    </td>
                                                    <td>
                                                    	
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>&nbsp;&nbsp;&nbsp;&minus;&nbsp;CO : 4,5%</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;%</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>&nbsp;&nbsp;&nbsp;&minus;&nbsp;HC : 1.200 ppm</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;ppm</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>
                                                    	b.&nbsp;Tahun Pembuatan &ge; 2007
                                                    </td>
                                                    <td>
                                                    	
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>&nbsp;&nbsp;&nbsp;&minus;&nbsp;CO : 1,5%</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;%</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>&nbsp;&nbsp;&nbsp;&minus;&nbsp;HC : 200 ppm</td>
                                                    <td>
                                                    	<table>
                                                    		<tr>
                                                            	<td width="20px"></td>
                                                            	<td>&nbsp;&nbsp;<input type="text" id="form-name" name="name" required="required" />                                                    	&nbsp;ppm</td>
                                                            </tr>
                                                    	</table>
                                                    </td>
                                                    </tr>
                                                    
                                                    </table>
                                                    
                                                    </td>
                                                    <td>Tanda Tangan / Nama Penguji<br>No. Reg. Penguji</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                            <div class="form-action clearfix" align="right">
												<br/>
                                                <button class="button" style="width:140px; height:30px" type="submit" data-icon-primary="ui-icon-print">Print</button>
                                                
                                            </div>
                                                                                        
        									<!-- end isi hal 7 -->
                                            </section>

                                    </div>
                                    	
                                    	</div>
                                    	<div class="clearfix"></div>
			    					</section></form>
        														<!-- =============== tab pane-5 =============== -->
                                    <section id="pane-5">
                                     <div class="grid_6 clearfix" style="width:45%">   
                                        <!-- halaman 10 -->
										
                                		<div class="portlet">

                                    	<header>

                                        	<h2>Halaman 10</h2>
										
                                    	</header>

                                            <section>
                                            <!-- isi hal 10 -->
                                            
                                            <p>Catatan :</p>
                                            <textarea name="deskripsi" id="editor1" rows="22">isi disini</textarea>
                                            
                                            
        									<!-- end hal 10 -->
                                            </section>

                                    </div>
                                    	
                                    	</div>
                                    	
        														
                                    <!-- halaman 11 -->

                                		<div class="grid_6 clearfix" style="width:45%">   
                                       
										
                                		<div class="portlet">

                                    	<header>

                                        	<h2>Halaman 11</h2>
										
                                    	</header>

                                            <section>
                                            
                                            
                                            
        
                                            </section>

                                    </div>
                                    	
                                    	</div>
                                    	<div class="clearfix"></div>

                           
																	
        														</section>

																		<!-- =============== tab pane-6 =============== -->
                                    <section id="pane-6">
                                     <div class="grid_6 clearfix" style="width:48%">   
                                        <!-- halaman 12 -->
										
                                		<div class="portlet">

                                    	<header>

                                        	<h2>Halaman 12</h2>
										
                                    	</header>

                                            <section>
                                            
                                            
                                            
        
                                            </section>

                                    </div>
                                    	
                                    	</div>
                                    	
        														
                                    <!-- halaman 13 -->

                                		<div class="grid_6 clearfix" style="width:45%">   
                                       
										
                                		<div class="portlet">

                                    	<header>

                                        	<h2>Halaman 13</h2>
										
                                    	</header>

                                            <section>
                                            
                                            
                                            
        
                                            </section>

                                    </div>
                                    	
                                    	</div>
                                    	<div class="clearfix"></div>

                           
																	
        														</section>
																		
    														</div>
  													</div>
  													<div class="clearfix"></div>
  											</section>
  									</div>
										
    						</section>
    						
    				</div>
    				
    		</section>
    </div>

    <?= $footer; ?>



</body>

</html>