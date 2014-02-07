<!DOCTYPE html>

<html lang="en">

<head>

	<?= $inc; ?>
	<script> 
	$(document).ready(function(){
    	$.tools.validator.fn("#username", function(input, value) {
	        return value!='Username' ? true : {     
            	en: "Silahkan masukan Username Anda..!!"
        	};
    	});
	    $.tools.validator.fn("#password", function(input, value) {
    	    return value!='Password' ? true : {     
        	    en: "Silahkan masukan Password Anda..!!"
        	};
    	});

	    var form = $("#form").validator({ 
    		position: 'bottom left', 
	    	offset: [5, 0],
    		messageClass:'form-error',
	    	message: '<div><em/></div>' // em element is the arrow
	    }).attr('novalidate', 'novalidate');
	});
	</script> 

	<!-- LOADING SCRIPT -->
	<script>
	$(window).load(function(){
	    $("#loading").fadeOut(function(){
	        $(this).remove();
        	$('body').css('overflow', 'auto');
    	});
	});
	</script>

	<style type = "text/css">
	    body{overflow: hidden;}
	    #container {position: absolute; top:50%; left:50%;}
	    #content {width:800px; text-align:center; margin-left: -400px; height:50px; margin-top:-25px; line-height: 50px;}
	    #content {font-family: "Helvetica", "Arial", sans-serif; font-size: 18px; color: black; text-shadow: 0px 1px 0px white; }
	    #loadinggraphic {margin-right: 0.2em; margin-bottom:-2px;}
	    #loading {background-color: #eeeeee; overflow:hidden; width:100%; height:100%; position: absolute; top: 0; left: 0; z-index: 9999;}
	</style> 
	<!-- LOADING SCRIPT END -->

</head>

<body class="login">
	<div id="loading"> 
		<script type = "text/javascript"> 
			document.write("<div id='container'><p id='content'>" + "<img id='loadinggraphic' width='16' height='16' src='<?= base_url() ?>images/ajax-loader-eeeeee.gif' /> " + "Loading...</p></div>");
		</script> 
	</div>
	
	<center>
		<!--img src="<?=base_url()?>images/logos.png" style="margin-top:30px;"-->
	</center>
	
	<?php $error=validation_errors(); 
		if($error!=""){ ?>
	 		<center>
			<div class="ui-widget message closeable" style="width:50%" align="center">
			<div class="ui-state-error ui-corner-all"> 
				<p>
				<span class="ui-icon ui-icon-alert"></span> 
				<?php echo validation_errors(); ?>
				</p>
			</div>
			</div>
			</center>
	<?php } ?>							

    <div class="login-box main-content" style="width:400px">
		<header>
			<h2>User Login</h2> 
		</header>

		<section>
			<img src="<?= base_url() ?>images/logo.png"/>
			<form id="form" action="<?= base_url() ?>index.php/home/" method="post" class="clearfix">
				<p>
				<input type="hidden" name="id" value="<?=$id?>">
				<input type="text" id="username" class="large" value="" name="username" required="required" placeholder="Username" style="width:300px"/><br/><br/>
				<input type="password" id="password" class="large" value="" name="password" required="required" placeholder="Password" style="width:300px"/><br/><br/>
				<button class="large button-gray ui-corner-all fr" type="submit">Login</button>
                </p>

				<p class="clearfix">
					<span class="fl">
						<input type="checkbox" id="remember" class="" value="1" name="remember"/>
						<label class="choice" for="remember">Remember</label>
					</span>
				</p>
			</form>
		</section>
	</div>

</body>

</html>