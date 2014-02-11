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
                 <?php $userLevel=$this->session->userdata('id_level'); ?> 
				 <?php if($userLevel=="1"){ ?>    
                    <nav class="collapsed">
					<a class="chevron" href="#">&raquo;</a>
						<ul>
							<li class="current"><a href="<?=base_url()?>index.php/user/editAccount" class="navicon-id-card">My Account</a></li>
							<li><a href="<?=base_url()?>index.php/user" class="navicon-table">User Data</a></li>
						</ul>
					</nav>
				 <?php } ?>
                    <div class="main-content">
                        <header>
                            <h2>
                                Edit My Account
                            </h2>
                        </header>
                        <section class="container_6 clearfix">
                            <div class="grid_6 clearfix" style="width:98%;">
                               <form class="form has-validation" action="<?=base_url()?>index.php/user/saveEdit" method="post">
			
			<?php foreach($dUser as $row): ?>
			<input type="hidden" name="id" value="<?=$row->id_uer?>">
		   <table width="100%">
			<tr><td colspan="2">
				<div class="clearfix">
					<label for="nip" class="form-label">NIP <em>*</em></label>
					<div class="form-input">
						<input type="text" name="nip" id="nip" required="required" value="<?=$row->NIP?>" style="width:220px" />
					</div>
				</div>
			</td></tr>
			
			<tr><td colspan="2">
				<div class="clearfix">
					<label for="nama" class="form-label">Nama User <em>*</em></label>
					<div class="form-input">
						<input type="text" name="nama" id="nama" value="<?=$row->nama_asli?>" required="required" style="width:220px" />
					</div>
				</div>
			</td></tr>
			
			<!--<tr><td colspan="2">
				<div class="clearfix">
					<label for="username" class="form-label">Username <em>*</em></label>
					<div class="form-input">
						<input type="text" name="username" id="username" value="<?=$row->username?>" required="required" style="width:220px" />
					</div>
				</div>
			</td></tr>-->
			
			<tr><td colspan="2">
				<div class="clearfix">
					<label for="pass1" class="form-label">Password Lama<em>*</em></label>
					<div class="form-input">
						<input type="password" name="pass1" id="pass1" required="required" style="width:220px" />
					</div>
				</div>
			</td></tr>
			
			<tr><td colspan="2">
				<div class="clearfix">
					<label for="pass1" class="form-label">Password Baru<em>*</em></label>
					<div class="form-input">
						<input type="password" name="pass2" id="pass2" required="required" style="width:220px" />
					</div>
				</div>
			</td></tr>
			
			<tr><td colspan="2">
				<div class="clearfix">
					<label for="pass1" class="form-label">User Tipe<em>*</em></label>
					<div class="form-input" style="width:20%">
					<?php
						switch($row->id_level)
						{
							case"2"; $r1="selected"; break;
							case"3"; $r2="selected"; break;
							case"4"; $r3="selected"; break;
							case"5"; $r4="selected"; break; 
						}
					?>
						<select name="level">
							<option value="2" <?=$r1?> >Pendaftaran</option>
							<option value="3" <?=$r2?> >Pembayaran</option>
							<option value="4" <?=$r3?> >Penguji</option>
							<option value="5" <?=$r4?> >Pencetak</option>
						</select>
					</div>
				</div>
			</td></tr>
			
			<tr><td colspan="2">
			<hr>
				<div class="form-action clearfix" align="right">
					<button class="button" style="width:80px; height:25px" type="submit" data-icon-primary="ui-icon-circle-check">Simpan</button>
					<button class="button" style="width:80px; height:25px" type="button" onClick="$('#editForm' ).dialog('close');">Batalkan</button>
				</div>
			</td></tr>
			
			</table>
			<?php endforeach; ?>
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