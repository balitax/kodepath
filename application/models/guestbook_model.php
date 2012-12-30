<?php
class Guestbook_model extends Model {
	function view() {
		$sql = "SELECT * FROM ". $this->table." ORDER BY comment_id DESC";
		$query = $this->db->query( $sql );
		return $query->result_array();
	}
	function insert( $data = array() ) {
		$data["name"] = $this->db->escape_str($data["name"]);
		$data["url"] = $this->db->escape_str($data["url"]);
		$data["comment"] = $this->db->escape_str($data["comment"]);
		$data["name"] = htmlspecialchars( $data["name"] );
		$data["url"] = htmlspecialchars( $data["url"] );
		$data["comment"] = htmlspecialchars( $data["comment"] );
		$sql = "INSERT INTO ". $this->table." (comment_id,name,url,comment) VALUES ('null','". $data["name"] ."','". $data["url"] ."','". $data["comment"] ."')";
		return $this->db->query( $sql );
	}
}
?>