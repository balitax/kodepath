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
        <a href="#"><img src="<?php echo base_url();?>style/images/pix1.jpg" width="58" height="58" alt="" /></a> <a href="#"><img src="<?php echo base_url();?>style/images/pix2.jpg" width="58" height="58" alt="" /></a> <a href="#"><img src="<?php echo base_url();?>style/images/pix3.jpg" width="58" height="58" alt="" /></a> <a href="#"><img src="<?php echo base_url();?>style/images/pix4.jpg" width="58" height="58" alt="" /></a> <a href="#"><img src="<?php echo base_url();?>style/images/pix5.jpg" width="58" height="58" alt="" /></a> <a href="#"><img src="<?php echo base_url();?>style/images/pix6.jpg" width="58" height="58" alt="" /></a> </div>
      <div class="col c2">
        <h2><span>Quadran?</span></h2>
        <table width="642" border="1">
          <tr>
            <td width="632"><table>
              <tr>
                <td><?php echo form_label($login_label, $login['id']); ?></td>
                <td><?php echo form_input($login); ?></td>
                <td style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></td>
              </tr>
              <tr>
                <td><?php echo form_label('Password', $password['id']); ?></td>
                <td><?php echo form_password($password); ?></td>
                <td style="color: red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></td>
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
                <?php echo $recaptcha_html; ?> </tr>
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
              <tr>
                <td colspan="3"><?php echo form_checkbox($remember); ?> <?php echo form_label('Remember me', $remember['id']); ?> <?php echo anchor('/auth/forgot_password/', 'Forgot password'); ?>
                  <?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Register'); ?></td>
              </tr>
            </table>
            <?php echo form_submit('submit', 'Let me in'); ?> <?php echo form_close(); ?></td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      </div>
      <div class="col c3">
        <h2><span>Contact</span></h2>
        <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue.</p>
        <p><a href="#">support@yoursite.com</a></p>
        <p>+1 (123) 444-5677<br />
          +1 (123) 444-5678</p>
        <p>Address: 123 TemplateAccess Rd1</p>
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

