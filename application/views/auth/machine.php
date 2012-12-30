<!---Machine-->
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
