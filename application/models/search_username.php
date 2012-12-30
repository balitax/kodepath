<?php class Search_username extends CI_Model {
function search_by($id){
    $query = $this->db->query("SELECT username, email  
      FROM users WHERE id = '$id'");
    return $query->row()->username;//check later
	}
}
?>