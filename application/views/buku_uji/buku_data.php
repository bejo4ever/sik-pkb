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

                    <div class="main-content" style="min-height:555px">
                        <header>
                            <ul class="action-buttons clearfix">
                                <li><a href="<?= base_url() ?>index.php/pendaftaran/addData" class="button" data-icon-primary="ui-icon-plusthick">Tambah Data Pemohon</a></li>
                                <!--<li><a href="../documentation/index.html" class="button help" rel="#overlay" data-icon-primary="ui-icon-help" data-icon-only="true">Help</a></li>-->
                            </ul>
                            <h2>
                                Daftar Permohonan Uji Kendaraan
                            </h2>
                        </header>
                        <section class="container_6 clearfix">
                            <div class="grid_6">
                                <table class="display">
                                    <thead>
                                        <tr>
                                            <th class="ui-state-default">No.</th>
                                            <th class="ui-state-default">Tanggal Daftar</th>
                                            <th class="ui-state-default">Nama Pemilik</th>
                                            <th class="ui-state-default">No. Pemeriksaan</th>
                                            <th class="ui-state-default">No. Kendaraan</th>
                                            <!--<th class="ui-state-default">Tempat</th>-->
                                            <th class="ui-state-default">Tgl. Awal</th>
                                            <th class="ui-state-default">Tgl. Akhir</th>
                                            <th width="5%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        	<td>1</td>
                                            <td>17-06-2011 | 12:00</td>
                                            <td>Findyasti</td>
                                            <td>BOO. 48017</td>
                                            <td>F.8565.D</td>
                                            <!--<td>TAJUR</td>-->
                                            <td>23-06-04</td>
                                            <td>29-03-10</td>
                                            <td>
                                            <a href="<?= base_url() ?>index.php/pendaftaran/lhp" target="_blank" class="button" title="Lembar Hasil Pemeriksaan" data-icon-primary="ui-icon-note" data-icon-only="true">&nbsp;</a>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                        	<td>2</td>
                                            <td>17-06-2011</td>
                                            <td>R. MOCH PRIBADI SE</td>
                                            <td>BOO. 48017</td>
                                            <td>F.8565.D</td>
                                            <!--<td>TAJUR</td>-->
                                            <td>23-06-04</td>
                                            <td>29-03-10</td>
                                            <td>
                                             <a href="<?= base_url() ?>index.php/pendaftaran/lhp" target="_blank" class="button" title="Lembar Hasil Pemeriksaan" data-icon-primary="ui-icon-note" data-icon-only="true">&nbsp;</a>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                        	<td>3</td>
                                            <td>17-06-2011</td>
                                            <td>R. MOCH PRIBADI SE</td>
                                            <td>BOO. 48017</td>
                                            <td>F.8565.D</td>
                                            <!--<td>TAJUR</td>-->
                                            <td>23-06-04</td>
                                            <td>29-03-10</td>
                                            <td>
                                            <a href="<?= base_url() ?>index.php/pendaftaran/lhp" target="_blank" class="button" title="Lembar Hasil Pemeriksaan" data-icon-primary="ui-icon-note" data-icon-only="true">&nbsp;</a>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                        	<td>4</td>
                                            <td>17-06-2011</td>
                                            <td>R. MOCH PRIBADI SE</td>
                                            <td>BOO. 48017</td>
                                            <td>F.8565.D</td>
                                            <!--<td>TAJUR</td>-->
                                            <td>23-06-04</td>
                                            <td>29-03-10</td>
                                            <td>
                                            <a href="<?= base_url() ?>index.php/pendaftaran/lhp" target="_blank" class="button" title="Lembar Hasil Pemeriksaan" data-icon-primary="ui-icon-note" data-icon-only="true">&nbsp;</a>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                        	<td>5</td>
                                            <td>17-06-2011</td>
                                            <td>R. MOCH PRIBADI SE</td>
                                            <td>BOO. 48017</td>
                                            <td>F.8565.D</td>
                                            <!--<td>TAJUR</td>-->
                                            <td>23-06-04</td>
                                            <td>29-03-10</td>
                                            <td>
                                            <a href="<?= base_url() ?>index.php/pendaftaran/lhp" target="_blank" class="button" title="Lembar Hasil Pemeriksaan" data-icon-primary="ui-icon-note" data-icon-only="true">&nbsp;</a>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                        	<td>6</td>
                                            <td>17-06-2011</td>
                                            <td>R. MOCH PRIBADI SE</td>
                                            <td>BOO. 48017</td>
                                            <td>F.8565.D</td>
                                           <!--<td>TAJUR</td>-->
                                            <td>23-06-04</td>
                                            <td>29-03-10</td>
                                            <td>
                                            <a href="<?= base_url() ?>index.php/pendaftaran/lhp" target="_blank" class="button" title="Lembar Hasil Pemeriksaan" data-icon-primary="ui-icon-note" data-icon-only="true">&nbsp;</a>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                        	<td>7</td>
                                            <td>17-06-2011</td>
                                            <td>R. MOCH PRIBADI SE</td>
                                            <td>BOO. 48017</td>
                                            <td>F.8565.D</td>
                                            <!--<td>TAJUR</td>-->
                                            <td>23-06-04</td>
                                            <td>29-03-10</td>
                                            <td>
                                            <a href="<?= base_url() ?>index.php/pendaftaran/lhp" target="_blank" class="button" title="Lembar Hasil Pemeriksaan" data-icon-primary="ui-icon-note" data-icon-only="true">&nbsp;</a>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                        	<td>8</td>
                                            <td>17-06-2011</td>
                                            <td>R. MOCH PRIBADI SE</td>
                                            <td>BOO. 48017</td>
                                            <td>F.8565.D</td>
                                            <!--<td>TAJUR</td>-->
                                            <td>23-06-04</td>
                                            <td>29-03-10</td>
                                            <td>
                                            <a href="<?= base_url() ?>index.php/pendaftaran/lhp" target="_blank" class="button" title="Lembar Hasil Pemeriksaan" data-icon-primary="ui-icon-note" data-icon-only="true">&nbsp;</a>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                        	<td>9</td>
                                            <td>17-06-2011</td>
                                            <td>R. MOCH PRIBADI SE</td>
                                            <td>BOO. 48017</td>
                                            <td>F.8565.D</td>
                                            <!--<td>TAJUR</td>-->
                                            <td>23-06-04</td>
                                            <td>29-03-10</td>
                                            <td>
                                            <a href="<?= base_url() ?>index.php/pendaftaran/lhp" target="_blank" class="button" title="Lembar Hasil Pemeriksaan" data-icon-primary="ui-icon-note" data-icon-only="true">&nbsp;</a>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                        	<td>10</td>
                                            <td>17-06-2011</td>
                                            <td>R. MOCH PRIBADI SE</td>
                                            <td>BOO. 48017</td>
                                            <td>F.8565.D</td>
                                            <!--<td>TAJUR</td>-->
                                            <td>23-06-04</td>
                                            <td>29-03-10</td>
                                            <td>
                                            <a href="<?= base_url() ?>index.php/pendaftaran/lhp" target="_blank" class="button" title="Lembar Hasil Pemeriksaan" data-icon-primary="ui-icon-note" data-icon-only="true">&nbsp;</a>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                        	<td>11</td>
                                            <td>17-06-2011</td>
                                            <td>R. MOCH PRIBADI SE</td>
                                            <td>BOO. 48017</td>
                                            <td>F.8565.D</td>
                                            <!--<td>TAJUR</td>-->
                                            <td>23-06-04</td>
                                            <td>29-03-10</td>
                                            <td>
                                            <a href="<?= base_url() ?>index.php/pendaftaran/lhp" target="_blank" class="button" title="Lembar Hasil Pemeriksaan" data-icon-primary="ui-icon-note" data-icon-only="true">&nbsp;</a>
                                            </td>
                                        </tr>
                                        
                                        
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