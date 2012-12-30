
<?php
//information fields rules
if (isset($_POST['save'])) {
    $user_id = $this->uri->segment(3);
    $onlocation = $this->uri->segment(2);
    if ($onlocation == "users") {
        $data = array('user_id' => $user_id
            , 'real_name' => $_POST['real_name']
            , 'profile_email' => $_POST['prof_email']
            , 'country' => $_POST['country']
            , 'website' => $_POST['website']
            , 'department' => $_POST['department']
        );
        $check = $this->db->query("SELECT * FROM user_profiles WHERE user_id='$user_id'");
        if ($check->num_rows() == 0) {
            $this->db->insert('user_profiles', $data);
        } else {
            $this->db->where('user_id', $this->uri->segment(3));
            $this->db->update('user_profiles', $data);
        }
    } else {
        return FALSE;
    }
}

//get User information
$this->Search_email->get_information("$user_id", $country = '', $prof_email = '', $web = '');
$profil_gravatar = $this->gravatar->get_gravatar($grav);
$query = $this->db->query("SELECT * from user_profiles where user_id ='$user_id'");
if ($query->num_rows() > 0) {
    foreach ($query->result() as $key) {
        $real_name = $key->real_name;
        $country = $key->country;
        $prof_email = $key->profile_email;
        $web = $key->website;
        $department = $key->department;
    }
}

$this->notifications->notify('Complete your profile ' . $username);
?>
<div class="detil_profile"><img src="<?php echo $profil_gravatar; ?>"/><br></a>
    <address>
        <strong>Twitter, Inc.</strong><br>
        795 Folsom Ave, Suite 600<br>
        San Francisco, CA 94107<br>
        <abbr title="Phone">P:</abbr> (123) 456-7890<br><br>
        <strong><abbr title='attribute'><?php echo strtoupper($username); ?></abbr></strong><br>
        <a href="mailto:#"><?php echo $prof_email; ?></a>
    </address>
</div>
<form method="POST">
    <div class="content_right">
        <fieldset>
            <div class="control-group">

                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-user"></i></span>
                        <input class="lilcomment" name="real_name" placeholder="Your Name"type="text" value="<?php echo $real_name; ?>">
                    </div>
                </div>

                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-envelope"></i></span>
                        <input class="lilcomment" name="prof_email" placeholder="name@email.com"type="text" value="<?php echo $prof_email; ?>">
                    </div>
                </div>

                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-home"></i></span>
                        <input class="lilcomment" name="website" placeholder="your Homepage" type="text" value="<?php echo $web; ?>">
                    </div>
                </div>

                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-map-marker"></i></span>
                        <input class="lilcomment" name="country" placeholder="your country" type="text" value="<?php echo $country; ?>">
                    </div>
                </div>

                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-th-large"></i></span>
                        <input class="lilcomment" name="department" type="text" placeholder="your department" value="<?php echo $department; ?>">
                    </div>
                </div>
            </div>
            <input class="btn-info" data-loading-text="..." type="submit" name="save" value="save"/>
        </fieldset>
    </div>
</form>



