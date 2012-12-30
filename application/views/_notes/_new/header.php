<?php 
	$grav=$this->Search_email->get_email("$user_id");
	$profil_gravatar = $this->gravatar->get_gravatar($grav);
?>
<!DOCTYPE HTML>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title></title>
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width,initial-scale=1">

	<link rel="stylesheet" href="<?php echo base_url();?>style/bootstrap/css/bootstrap.css">

	<script src="<?php echo base_url();?>js/libs/modernizr-2.0.6.min.js" /></script>


</head>
<body>
	<div id="header-container">
		<header class="wrapper clearfix">
        <nav>
				<ul class="Info">
				  <!--<div class="kode"><h1>Kode#</h1></div>-->
                  <div class="logo"><img src="<?php echo base_url();?>style/images/logo.png" width="350" alt=""/></div>
                 <!-- <img src="<?php echo $profil_gravatar; ?>" width="40" alt=""/> Hi, -->
                  <strong>
				  <?php echo anchor('data/users/'.$user_id, $username);?>
                  </strong>! 
                  You are logged in now. <?php echo anchor('/auth/logout/', 'Logout  '); ?>  
              </ul>
		  </nav>
        </header>
	</div>

<body>
</body>
</html>
