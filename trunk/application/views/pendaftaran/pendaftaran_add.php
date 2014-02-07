<!DOCTYPE html>

<html lang="en">

<head>

<?= $inc; ?>

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

                    <div class="main-content" >
                        <header>
                            <h2>
                                Form Permohonan Uji Berkala
                            </h2>
                            
                            <ul class="action-buttons clearfix">

              <!--li><a href="#" class="button">Register</a></li-->

              <li><a href="#" class="button" data-icon-primary="ui-icon-document">FORM MODEL PKB-1</a></li>

          </ul>
                            
                        </header>
                        <section class="container_6 clearfix">
                            
                                
                            <!-- ========== Forms Section ============= -->
                            <form class="form has-validation">
                            <table width="100%">
                            <tr><td>
								<fieldset style="width:38%; float:left; margin-right:10px">
								<legend>Jenis Kendaraan</legend>
									<div class="clearfix">
										<div>
											<input type="radio" name="gender" value="1" /> Mobil Penumpang <br>
											<input type="radio" name="gender" value="2" /> Mobil Bis <br>
											<input type="radio" name="gender" value="3" /> Mobil Barang <br>
											<input type="radio" name="gender" value="4" /> Kereta Gandengan <br>
											<input type="radio" name="gender" value="5" /> Kereta Tempelan <br>
											<input type="radio" name="gender" value="6" /> Traktor
										</div>
									</div>
								</fieldset>
								<fieldset style="width:40%">
									<legend>Tipe Kendaraan</legend>
									<div class="clearfix">
										<div>
											<input type="radio" name="gender2" value="1" /> Umum <br>
											<input type="radio" name="gender2" value="2" /> Tidak Umum <br>
											<input type="radio" name="gender2" value="3" /> Pemerintah
										</div>
									</div>
								</fieldset>
								</td>
								<td width="50%" rowspan="2">
								<fieldset>
									<legend>Tempat dan Tanggal</legend>
									<div>
										<label for="form-name" class="form-label">Lokasi <em>*</em><small>Pemeriksaan</small></label>
										<div class="form-input"><input type="text" style="width:190px" id="form-name" name="name" required="required" value="DINAS" /></div>
									</div>
									<div>
										<label for="form-birthday" class="form-label">Tanggal <em>*</em><small>Permohonan</small></label>
										<div class="form-input"><input type="date" style="width:120px" id="form-birthday" name="date" value="<?=date('Y-m-d')?>" /></div>
									</div>
									<div>
										<label for="form-name" class="form-label">Nomor Urut <em>*</em></label>
										<div class="form-input"><input type="text" style="width:80px" id="form-name" name="name" required="required" value="01" /></div>
									</div>
								</fieldset>
								</td></tr>
								
								<tr><td colspan="2"><hr></td></tr>
								
                             <tr><td colspan="2">
									<div class="clearfix">
										<label for="form-email" class="form-label">Nama dan Alamat <em>*</em><small>Pemilik / Pemegang Kuasa</small></label>
										<div class="form-input"><input type="email" id="form-email" required="required" style="width:300px" /></div>
									</div>
								</td></tr>
								
								<tr><td colspan="2">
									<div class="clearfix">
										<label for="form-email" class="form-label">Alamat Garasi <em>*</em></label>
										<div class="form-input"><input type="email" id="form-email" required="required" /></div>
									</div>
								</td></tr>
								
								<tr><td colspan="2">
									<div class="clearfix">
										<label for="form-timezone" class="form-label">Merek <em>*</em></label>
										<div class="form-input">
										<input type="email" id="form-email" required="required" style="width:200px" />
										Type <em>*</em> <input type="email" id="form-email" required="required" style="width:150px" />
										Tahun Pembuatan <em>*</em> <input type="email" id="form-email" required="required" style="width:80px" />
										</div>
									</div>
								</td></tr>
								
								<tr><td colspan="2">
									<div class="clearfix">
										<label for="form-email" class="form-label">Nomor Kendaraan <em>*</em></label>
										<div class="form-input"><input type="email" id="form-email" required="required" style="width:150px" /></div>
									</div>
								</td></tr>
								
								<tr><td colspan="2">
									<div class="clearfix">
										<label for="form-email" class="form-label">Nomor Pemeriksaan <em>*</em></label>
										<div class="form-input"><input type="email" id="form-email" required="required" style="width:150px" /></div>
									</div>
								</td></tr>
								
								<tr><td colspan="2">
									<div class="clearfix">
										<label for="form-email" class="form-label">Nomor Chasis<em>*</em></label>
										<div class="form-input"><input type="email" id="form-email" required="required" style="width:150px" /></div>
									</div>
								</td></tr>
								
								<tr><td colspan="2">
									<div class="clearfix">
										<label for="form-email" class="form-label">Nomor Mesin <em>*</em></label>
										<div class="form-input"><input type="email" id="form-email" required="required" style="width:150px" /></div>
									</div>
								</td></tr>
								
								<tr><td colspan="2">
									<div class="clearfix">
										<label for="form-email" class="form-label">Rumah - rumah <em>*</em></label>
										<div class="form-input">
										<label class="form-label" style="font-weight:100">a. Macam</label> <input type="email" id="form-email" required="required" style="width:150px" /><br>
										<label class="form-label" style="font-weight:100">b. Bahan</label> <input type="email" id="form-email" required="required" style="width:150px" /><br>
										<label class="form-label" style="font-weight:100">c. Keistimewaan</label> <input type="email" id="form-email" required="required" style="width:150px" />
										</div>
									</div>
								</td></tr>
								<tr><td colspan="2">
									<div class="clearfix" style="padding-left:0px">
										<label for="form-email" class="form-label">Tempat dan Tanggal<em>*</em></label>
										<div class="form-input">
										<label class="form-label" style="font-weight:100">Pengujian Awal</label><input type="email" id="form-email" required="required" style="width:350px" /> <br>
										<label class="form-label" style="font-weight:100">Pengujian Terakhir</label><input type="email" id="form-email" required="required" style="width:350px" /></p>
										</div>
									</div>
								</td></tr>
								
								<tr><td colspan="2">
                                            <div class="form-action clearfix" align="right">

                                                <button class="button" style="width:120px; height:30px" type="submit" data-icon-primary="ui-icon-circle-check">OK</button>

                                                <button class="button" style="width:120px; height:30px" type="reset">Reset</button>

                                            </div>
                               
								</td></tr>
                            
                               </table> 
                                </form>
								
                            <!-- End Forms Section -->
                                
                                
                            
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