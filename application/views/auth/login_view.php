
<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($login_by_username AND $login_by_email) {
	$login_label = '<i class=icon-user></i>';//Email or 
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Mirrored from www.jochemgugelot.nl/ by HTTrack Website Copier/3.x [XR&CO'2010], Mon, 12 Nov 2012 11:42:55 GMT -->
<head>
	<script type="text/javascript">
		//Preload loading images
		var img = new Image;	
		img.src = '<?php echo base_url();//style/style_view.css?>style/resources/images/loading.gif';
		var img = new Image;	
		img.src = '<?php echo base_url();//style/style_view.css?>style/resources/images/logo.png';
		var backgrounds=new Array(); 
								backgrounds[0]="<?php echo base_url();//style/style_view.css?>style/resources/content/background_photo_9_foto_0012.html";
								backgrounds[1]="<?php echo base_url();//style/style_view.css?>style/resources/content/background_photo_7_ijsland_261_k3_k2_dsc_0175edit31.html";
								backgrounds[2]="<?php echo base_url();//style/style_view.css?>style/resources/content/background_photo_17_foto_010.html";
								backgrounds[3]="<?php echo base_url();//style/style_view.css?>style/resources/content/background_photo_11_foto_001.html";
								backgrounds[4]="<?php echo base_url();//style/style_view.css?>style/resources/content/background_photo_25_foto_020.html";
								backgrounds[5]="<?php echo base_url();//style/style_view.css?>style/resources/content/background_photo_2_portfolio_22.html";
								backgrounds[6]="<?php echo base_url();//style/style_view.css?>style/resources/content/background_photo_26_foto_021.html";
								backgrounds[7]="<?php echo base_url();//style/style_view.css?>style/resources/content/background_photo_18_foto_012.html";
								backgrounds[8]="<?php echo base_url();//style/style_view.css?>style/resources/content/background_photo_1_portfolio_10.html";
								backgrounds[9]="<?php echo base_url();//style/style_view.css?>style/resources/content/background_photo_19_foto_013.html";
								backgrounds[10]="<?php echo base_url();//style/style_view.css?>style/resources/content/background_photo_15_foto_005.html";
								backgrounds[11]="<?php echo base_url();//style/style_view.css?>style/resources/content/background_photo_8_work4.html";
								backgrounds[12]="<?php echo base_url();//style/style_view.css?>style/resources/content/background_photo_28_foto_007.html";
								backgrounds[13]="<?php echo base_url();//style/style_view.css?>style/resources/content/background_photo_23_foto_018.html";
								backgrounds[14]="<?php echo base_url();//style/style_view.css?>style/resources/content/background_photo_13_foto_0023.html";
								backgrounds[15]="<?php echo base_url();//style/style_view.css?>style/resources/content/background_photo_27_foto_006.html";
								backgrounds[16]="<?php echo base_url();//style/style_view.css?>style/resources/content/background_photo_16_foto_007.html";
								backgrounds[17]="<?php echo base_url();//style/style_view.css?>style/resources/content/background_photo_21_foto_016.html";
								backgrounds[18]="<?php echo base_url();//style/style_view.css?>style/resources/content/background_photo_20_foto_015.html";
								backgrounds[19]="<?php echo base_url();//style/style_view.css?>style/resources/content/background_photo_14_foto_004.html";
								backgrounds[20]="<?php echo base_url();//style/style_view.css?>style/resources/content/background_photo_10_foto_0013.html";
								backgrounds[21]="<?php echo base_url();//style/style_view.css?>style/resources/content/background_photo_3_wide_aiguilledemidi2.html";
								backgrounds[22]="<?php echo base_url();//style/style_view.css?>style/resources/content/background_photo_4_wide_lemmings.html";
								backgrounds[23]="<?php echo base_url();//style/style_view.css?>style/resources/content/background_photo_12_foto_0022.html";	
		var root = 'index.html';
	</script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Kodepath</title>
	<meta name="keywords" content="kodepath, code source" />
    <meta name="robots" content="index, follow" />
    <meta name="author" content="Jochem Gugelot" />
    <meta http-equiv="Content-Language" content="id,en" />
	<script src="<?php echo base_url();//style/style_view.css?>style/resources/js/functions.js" type="text/javascript"></script>    
    <link rel="shortcut icon" href="resources/images/#" type="image/x-icon" />   
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();//style/style_view.css?>style/resources/css/style.css" />
	<link href="<?php echo base_url();//style/style_view.css?>style/bootstrap/css/bootstrap_login_view.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo base_url();//style/style_view.css?>style/resources/js/jquery.js" type="text/javascript"></script>	
	<script type="text/javascript" src="<?php echo base_url();//style/style_view.css?>style/resources/js/animationc81e.js?2"></script><!-- Animation slide Background -->
	<script type="text/javascript" src="<?php echo base_url();//style/style_view.css?>style/resources/js/jquery/jquery.mousewheel.min.js"></script><!--Slide Show Background-->

</head>
<!--[if IE 6]>
<style type="text/css">
html { overflow-y: hidden; }
body { overflow-y: auto; }
#bg_image { position:absolute; z-index:-1; }
#content { position:static; }
</style>
<![endif]-->
<body onload="intro();">
<!-- Loading  -->
<div id="loading"> 
	<table style='width:100%;height:100%;' id='loading_content'>
		<tr>
			<td style='vertical-align:center;text-align:center;'>
					<img src='resources/images/logo.png' alt='logo' />
					<br /><br />
					<p style='text-align:center;'>BEZIG MET LADEN</p>
					<img src='<?php echo base_url();//style/style_view.css?>style/resources/images/loading.gif' id='image_loading' alt='loading'/>
			</td>
		</tr>
	</table>
</div>
<!-- (close) Loading  -->
<!-- bg_grid (Background dots)  -->
<div id="bg_grid"></div>
<!-- (close) bg_grid -->

<!-- Container  -->
<div id="container">	
	<!-- black_bar  -->
	<div id="black_bar" style="filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='images/background_black.html', sizingMethod='crop');">		
		<!-- black_bar_content  -->				
		<div id="black_bar_content">			
			<div id='black_bar_header'></div>
			<table style="width:100%;min-width:950px;">
			<tr>
			<td>
			<?php include 'machine.php';?>			
			<!-- content (Real content area)  -->				
			<div id="content">
				<script type="text/javascript">
						// Manual Google Analytics code
						$(document).ready(function(){
							var pageTracker = _gat._getTracker("UA-9690741-1"); 
							var url = 'index.html';
							pageTracker._trackPageview(url);
						});
					</script>
						<!--Here Login form Kodepath-->
					<script>
							var title = 'welcome!';
							$('#content_title').html(title);
							$('#black_bar_header').html(title);
							document.title = 'Kodepath | ' + title;
				</script>
								
			</div>
				<!-- (close) content  -->
			</td>
			<td style="vertical-align:center;width:200px; text-align:center;padding:20px;border-left:1px dotted #666666;">	
				<!-- Logo -->
				<img src="<?php echo base_url();//style/style_view.css?>style/resources/images/logo_en.png" width="180" alt='Home' border="0" onclick="changeContent('home');" style='cursor:pointer;' />
				<div id="backgrounds_buttons">
					<center><img id="btnNextSlide" src="<?php echo base_url();//style/style_view.css?>style/resources/images/icon_previous.png" alt="Vorige foto" />
					<img id="btnPrevSlide" src="<?php echo base_url();//style/style_view.css?>style/resources/images/icon_next.png" alt="Volgende foto" /></center>
				</div>
				<h1>Touch <b><abbr title="attribute">kodepath</abbr></b> & find your path</h1>
				<!-- (close) Logo -->	
			</td>
			
			
			
			</tr>
			</table>
		</div>
		<!-- (close) black_bar_content  -->
	</div>
	<!-- footer  -->
	<div id="footer">COPYRIGHT &copy; 2012 BY KODEPATH | SOEKMO WIBOWO GROUP | DESIGN BY JOCHEM GUGELOT | <a href='#' style='color:white;' title='Sitemap'>KODEPATH TEAM</a> | SITE BY <a href='http://www.wurldwide.web.id/' title='wurldwide.web.id' target='_blank' style='color:white;'>WURLDWIDE.WEB.ID</a>&nbsp;&nbsp;</div>
	<!-- (close) footer  -->
</div>
<!-- (close) Container  -->
<!-- background (Background images)  -->
<div id="backgrounds">
	<img src="#" alt="background image" id="background2"/>
	<img src="<?php echo base_url();//style/style_view.css?>style/resources/content/background_photo_12_foto_0022.html" alt="background image" id="background1"/>
</div>

<!-- (close) background (Background images)  -->
<div id="work_loader"><img src="<?php echo base_url();//style/style_view.css?>style/resources/images/loading2.png" alt="loading"/></div>
</body>
<!-- Mirrored from www.jochemgugelot.nl/ by HTTrack Website Copier/3.x [XR&CO'2010], Mon, 12 Nov 2012 11:49:32 GMT -->
</html>
