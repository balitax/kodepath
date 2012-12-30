<?php if (!defined('BASEPATH')) exit ('No Direct access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class hits extends CI_Model {
    function get_hits_lilcomment($str_id) {
        $query = $this->db->query("SELECT COUNT(identifi) as hits_lilcomment from srt_movie_litlecomment where identifi = '$str_id'");
        return $query->row()->hits_lilcomment;
    }
    function get_hits_answer($str_id) {
        $query = $this->db->query("SELECT COUNT(identifi) as hits_answer from srt_movie_comments where identifi = '$str_id'");
        return $query->row()->hits_answer;
    }
    function get_hits_view($str_id) {
        $query = $this->db->query("SELECT count as hits_view from hits where page='$str_id'");
        return $query->row()->hits_view;
    }
    
}


?>
