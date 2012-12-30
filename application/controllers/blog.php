<?php
class Blog extends CI_Controller{
	public function index()
	{
		$data['message'] = "Hello World";
		$this->load->view('homepage', $data);
		$this->load->helper();
		
	}
	public function indek()
	{
		echo'Hello Wurld!';
	}
	
	public function comments()
	{
		echo'Look at this!';
	}
}

?>