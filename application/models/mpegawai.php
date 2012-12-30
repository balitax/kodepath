<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MPegawai extends CI_Model{
var $table = 'pegawai';
function _construct(){
parent::_construct();
}

//fungsi untuk mendapatkan pegawai berdasarkan id
function getPegawai($id){
$data = array();
$this->db->where('id',$id);
$this->db->limit(1);
$query = $this->db->get($this->table);

if($query->num_rows() > 0)
{
$data = $query->row_array();
}
return $data;
}

//fungsi untuk mendapatkan semua data pegawai
function getAllPegawai(){
$this->db->order_by('nama','asc');
$query = $this->db->get($this->table);
if($query->num_rows() > 0)
{
return $query->result_array();
}

}

//fungsi untuk menambah data pegawai ke alam tabel dari form isian
function addPegawai(){
$data = array(
'nip' => $this->input->post('nip'),
'nama' => $this->input->post('nama'),
'pekerjaan' => $this->input->post('pekerjaan'),
'alamat' => $this->input->post('alamat')
);
$this->db->insert($this->table,$data);
}

//fungsi untuk mengedit data pegawai berdasarkan id
function editPegawai($id){
$data = array(
'nip' => $this->input->post('nip'),
'nama' => $this->input->post('nama'),
'pekerjaan' => $this->input->post('pekerjaan'),
'alamat' => $this->input->post('alamat')
);
$this->db->where('id',$id);
$this->db->update($this->table,$data);
}

//fungsi untuk menghapus data pegawai berdasarkan id pegawai
function deletePegawai($id){
$this->db->where('id',$id);
$this->db->delete($this->table);
}
}
?>