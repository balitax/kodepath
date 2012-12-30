<?php class Check_alamat extends CI_Model {
function Check_alamat(){
//parent::Model();
}
function lihat_alamat($pekerjaan){
    $query = $this->db->query("SELECT alamat  
      FROM pegawai WHERE pekerjaan = '$pekerjaan'");
    return $query->row()->alamat;//check later
}
}
?>