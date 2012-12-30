<?php
$this->load->library('form_validation');
$this->valid = $this->form_validation;
$this->valid->set_rules('ucap', 'ucap', 'required|xss_clean|min_length[3]|max_length[500]');
$this->load->database();
$this->load->helper(array('text', 'url', 'nonull', 'array'));


if (isset($_POST['save'])) {
    $str_id = $this->uri->segment(3);
    //ambil data mid dari srt_movie
    $query = $this->db->query("SELECT mid FROM srt_movie where mtitle_identifier = '" . $str_id . "'");
    $key = $query->row();
    $mid = $key->mid;       //1
    //ambil data emai dari users	
    $user_id = $this->tank_auth->get_user_id();
    $query2email = $this->db->query("SELECT email from users where id = '" . $user_id . "'");
    $key2email = $query2email->row();
    $email = $key2email->email;     //2	

    $username = $this->tank_auth->get_username(); //3
    $lilcomment = $_POST['lilcomment'];    //4
    $lilcomment_date = date("Y-m-d H:i:s");   //5
    $lilcomapprove = 0;        //6
    //INSERT
    $data = array('mid' => $mid
        , 'identifi' => $str_id
        , 'lilcomvisitor' => $username
        , 'lilcomemail' => $email
        , 'lilcomment' => $lilcomment
        , 'lilcomdate' => $lilcomment_date
        , 'lilcomapprove' => $lilcomapprove);

    $query2insert = $this->db->insert('srt_movie_litlecomment', $data);
    redirect('/data/detail/' . $str_id);
}
?>

<form method="POST">
    <div class="accordion" id="accordion2">
        <div class="accordion-group">
            <div class="">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                    <div class="alert-forcomment"><i class="icon-pencil"></i><b> Comments <span class="badge badge-important"><?php echo $this->hits->get_hits_lilcomment($this->uri->segment(3)) ?> </span><b></div>
                                </a>
                                </div>
                                <div id="collapseOne" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <form method="post" action="lilcomment_form">
                                            <input class="lilcomment" name="lilcomment" placeholder="say something.."/>
                                            <input class="btn-info" data-loading-text="..." type="submit" name="save" value="add+"/>                                        
                                                <?php echo $lilcomment; ?>                                                  
                                    </div>
                                </div>
                                </div>
                                <br>
                                <hr>


