<?php
class DPegawai extends CI_Model{
	function select(){
		$this->db->select('nama, pekerjaan, alamat');
		$query = $this->db->get('pegawai');	
		foreach ($query->result() as $row)
		{
			$row = $query->row_array(); 
   			echo $row['nama'];
   			echo $row['pekerjaan'];
 			echo $row['alamat'];
		}
		return $query->result();
	}
}
?>