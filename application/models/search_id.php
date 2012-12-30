<?php class Search_id extends CI_Model {
function Search_id(){
//parent::Model();
}
function get_id($usename){
    $query = $this->db->query("SELECT id  
      FROM users WHERE username = '$usename'");
    return $query->row()->id;//check later
}
}
?>