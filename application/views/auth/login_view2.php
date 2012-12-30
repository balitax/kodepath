<script type="text/javascript" src="//www.hellobar.com/hellobar.js"></script>
<script type="text/javascript">
    new HelloBar(53760,76479);
</script>	

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
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kodepath</title>
<link href="<?php echo base_url();//style/style_view.css?>style/bootstrap/css/bootstrap_login_view.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();//style/style_view.css?>style/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
</head>
    
<div class="fbg">
    <div class="fbg_resize">
      <!--Logo-->
      <form id="form1" name="form1" method="post" action="">    
        <table>
            <tr>
              <td width="20"><?php echo form_label($login_label, $login['id']); ?></td>
              <td width="20"><?php echo form_input($login); ?></td>
              <td width="20" style="color: red;">
                <?php echo form_error($login['name']); ?>
                <?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>
              </td>
            </tr>

            <tr>
              <td><?php echo form_label('<i class=icon-lock></i>', $password['id']); ?></td>
              <td><?php echo form_password($password); ?></td>
              <td style="color: red;">
        		  <?php echo form_error($password['name']); ?> 
        		  <?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?>
              </td>
            </tr>

            <tr>
              <td><?php echo form_label('<i class=icon-bookmark></i>', $password['id']); ?></td>
              <td><?php echo form_checkbox($remember); ?><?php echo form_label('<abbr title=attribute><b>Remember Me<b></abbr>', $remember['id']); ?></td>
            </tr>

            <tr>
              <td>&nbsp;</td>
              <td>
               <?php //echo anchor('/auth/forgot_password/', '<abbr title=attribute><b>Forgot password</b></abbr>'); ?>
               <?php if ($this->config->item('allow_registration', 'tank_auth')) //echo anchor('/auth/register/', 'Register'); ?>
               <?php echo form_close(); ?> 
              </td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td>
                  <input class="btn btn-large btn-block btn-primary" type="submit" name="Log in" id="Masuk Log" value="Login" />
                </td>
            </tr>

<?php if ($show_captcha) {
		if ($use_recaptcha) { ?>
        <tr>
          <td colspan="2"><div id="recaptcha_image"></div></td>
          <td><a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
            <div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
            <div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div></td>
        </tr>
        <tr>
          <td><div class="recaptcha_only_if_image">Enter the words above</div>
            <div class="recaptcha_only_if_audio">Enter the numbers you hear</div></td>
          <td><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></td>
          <td style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></td>
          <?php echo $recaptcha_html; ?></tr>
        <?php } else { ?>
        <tr>
          <td colspan="3"><p>Enter the code exactly as it appears:</p>
            <?php echo $captcha_html; ?></td>
        </tr>
        <tr>

          <td><?php echo form_label('Confirmation Code', $captcha['id']); ?></td>
          <td><?php echo form_input($captcha); ?></td>
          <td style="color: red;"><?php echo form_error($captcha['name']); ?></td>
        </tr>
        <?php }
	} ?>
       
      </table>

      </form>
    </div>
  </div>
</div>
</body>
</html>
