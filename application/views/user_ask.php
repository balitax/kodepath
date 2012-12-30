<?php
    $grav = $this->Search_email->get_email("$user_id");
    $profil_gravatar = $this->gravatar->get_gravatar($grav);
    echo $query;
?>
<?php $this->load->view('editor_view'); ?>

