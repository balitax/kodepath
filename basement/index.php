<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
// kita punya $data_to_load = array($header,$content) dari controller (nantinya akan kita buat)
 
// load view header.php dengan beban data $data_to_load[0] alias $header
$this->load->view('header',$data_to_load[0]);
 
// load view header.php dengan beban data $data_to_load[1] alias $content
$this->load->view('content',$data_to_load[1]);
 
// load view footer.php tanpa beban data
$this->load->view('footer');
?>