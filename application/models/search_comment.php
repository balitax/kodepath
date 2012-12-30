<?php class Search_comment extends CI_Model {
function Search_comment(){
//parent::Model();
}
function get_comment($id){
    $query = $this->db->query("SELECT comment  
      FROM comments WHERE comment_id = '$id'");
    return $query->row()->comment;//check later
}
}
?>