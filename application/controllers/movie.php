<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');
	class Movie extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('table');
			$this->load->model('basic_model','bmodel');
		}
		// mproducers	mdistributors	msite
		public function index($offset=NULL)
		{
			$limit=3;
			if (! isset($offset))
			{
				$offset = $this->uri->segment(3);
			}
			//pagination
			$this->load->library('pagination');
			$config['uri_segment']=3;
			$config['base_url']=site_url('movie/index');//_
			$config['total_rows']=$this->bmodel->count_table_rows('movie');
			$config['per_page']= $limit;
			$config['num_link']=2;
			$config['fist_link']='<small>&lt;&lt;Awal</small>';
			$config['last_link']='<small>Akhir&gt;&gt;</small>';
			$this->pagination->initialize($config);
			
			$data = array ('query' => $this->bmodel->get_movie_list($limit, $offset)
			,'page_title' => 'Daftar Film'
			,'pagination' => $this->pagination->create_links());
			
			$this->load->view('movie_list', $data);
		}
	}
	
	
//memanggil judul dan time release
			/*$query = $this->db->query('SELECT mtitle
										,mrelease_date
										,mproducers
										,mdistributors
										,msite FROM srt_movie 
										ORDER BY mrelease_date 
										DESC');
			
			//Judul Kolom Tabel
			$this->table->set_heading('TITLE', 'RELEASE', 'PRODUCER','DISTRIBUTOR','SITE');
			//Data Untuk View
			$data = array('query' => $this->table->generate($query),'page_title' => 'Daftar Film');
			//Data lempar ke View	
			*/
			
			//Memanggil Query


?>