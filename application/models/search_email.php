<?php

class Search_email extends CI_Model {

    function Search_email() {
//parent::Model();
    }

    function get_email($user_id) {
        $query = $this->db->query("SELECT email FROM users WHERE id = '$user_id'");
        return $query->row()->email; 
    }
    function get_information($user_id, $country='', $prof_email='', $web='') {
        $query = $this->db->query("SELECT * from user_profiles where user_id ='$user_id'");
        if ($query->num_rows()>0){
            foreach ($query->result() as $key) {
               $listinfo = array('country' => $key->country, 'prof_email' =>$key->profile_email, 'web' => $key->website);
            }
        }
        return $listinfo;
    }
}

?>