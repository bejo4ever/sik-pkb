<!DOCTYPE html>
<html lang="en">
<head>
<?= $inc; ?>
</head>
<body style="overflow: hidden;">

    <div id="loading"> 
        <script type = "text/javascript"> 
            document.write("<div id='container'><p id='content'>" +
                           "<img id='loadinggraphic' width='16' height='16' src='<?= base_url() ?>images/ajax-loader-eeeeee.gif' /> " + "Loading...</p></div>");
        </script> 
    </div>

		<center>
		<img src="<?=base_url()?>images/logos.png" style="margin-top:30px;">
		
		<div style="margin-top:100px;">	  
			<button class="button ui-button-default" style="width:110px; height:50px; margin:10px 15px 10px 15px" data-icon-primary="ui-icon-extlink" onClick="location.href='<?=base_url()?>index.php/home/index/2';">
			Pendaftaran</button>
			
			<button class="button ui-button-default" style="width:110px; height:50px; margin:10px 15px 10px 15px" data-icon-primary="ui-icon-extlink" onClick="location.href='<?=base_url()?>index.php/home/index/3';">
			Pembayaran</button>
			
			<button class="button ui-button-default" style="width:110px; height:50px; margin:10px 15px 10px 15px" data-icon-primary="ui-icon-extlink" onClick="location.href='<?=base_url()?>index.php/home/index/4';">
			Pengujian</button>
			
			<button class="button ui-button-default" style="width:110px; height:50px; margin:10px 15px 10px 15px" data-icon-primary="ui-icon-extlink" onClick="location.href='<?=base_url()?>index.php/home/index/5';">
			Pengesahan</button>
			
			<button class="button ui-button-default" style="width:110px; height:50px; margin:10px 15px 10px 15px" data-icon-primary="ui-icon-extlink" onClick="location.href='<?=base_url()?>index.php/home/index/1';">
			Administrator</button>
		</div>
		</center>
			
</body>
</html>