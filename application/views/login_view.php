
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="<?php echo base_url();?>style/style.css" rel="stylesheet" type="text/css" />
</head>
<div class="fbg">
    <div class="fbg_resize">
      <div class="col c1">
        <h2><span>Image Gallery</span></h2>
        <a href="#"><img src="<?php echo base_url();?>style/images/pix1.jpg" width="58" height="58" alt="" /></a> 
        <a href="#"><img src="<?php echo base_url();?>style/images/pix2.jpg" width="58" height="58" alt="" /></a> 
        <a href="#"><img src="<?php echo base_url();?>style/images/pix3.jpg" width="58" height="58" alt="" /></a>
        <a href="#"><img src="<?php echo base_url();?>style/images/pix4.jpg" width="58" height="58" alt="" /></a> 
        <a href="#"><img src="<?php echo base_url();?>style/images/pix5.jpg" width="58" height="58" alt="" /></a> 
        <a href="#"><img src="<?php echo base_url();?>style/images/pix6.jpg" width="58" height="58" alt="" /></a> 
        </div>
      <div class="col c2">
        <h2><span>Quadran?</span></h2>
        <p>&nbsp;</p>
      </div>
      <div class="col c3">
        <h2><span>Masuk Log!</span></h2>
        <p>&nbsp;</p>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="footer">
    <div class="footer_resize">
      <p class="lf">Copyright &copy; 2010 <a href="#">SiteName</a> - All Rights Reserved</p>
      <p class="rf"><a href="http://www.free-css.com/">Free CSS Templates</a> by <a href="http://www.freewebsitetemplatez.com/">Free Website TemplateZ</a></p>
      <div class="clr"></div>
    </div>
  </div>
</div>
<!-- END PAGE SOURCE -->
</body>
</html>


<?php
$this->data['show_captcha'] = FALSE;
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
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

