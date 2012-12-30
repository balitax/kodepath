<?php

error_reporting(E_ERROR | E_PARSE);

//Basic_Model
//Fungsi dasar pengambilan infformasi dari database
class Basic_model extends CI_Model {

    var $output_table = '';

    public function __construct() {
        $this->load->database();
        $this->load->library('table');
        $this->load->helper(array('text', 'url', 'nonull', 'array'));
        $this->config->load('category');
		$this->load->library('tank_auth');
		$this->load->library('gravatar');
		$this->load->library('tablediv');

    }

    //Fungsi dasar untuk mengambil data
    private function make_query($fields='', $table='', $where=array(), $limit=NULL, $offset='', $order=array('field' => NULL, 'sort' => 'ASC')) {
        $this->db->select($fields);
        if (!is_null($order['field'])) {
            $this->db->order_by($order['field'], $order['sort']);
        }
        return $this->db->get_where($table, $where, $limit, $offset);
    }

    //Fungsi menampilkan data Movie yang terekam
    public function get_movie_list($limit=NULL, $offset='', $order=array('field' => 'mrelease_date', 'sort' => 'DESC')) {

        $query = $this->make_query('mtitle
								, mtitle_identifier
								, msinopsis
								, mdirectors
								, mauthors
								, msite
								, mrelease_date'
                        , 'srt_movie'
                        , array()
                        , $limit
                        , $offset
                        , $order);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $value) {


                $release_date = dnull_to_default($value->mrelease_date);
                if (!$release_date) {
                    $release_date = strftime('%d/%b/%Y', strtotime
                                            ($value->mrelease_date));
                }

                $this->table->add_row('<h4>' . strtoupper($value->mtitle));
                //sinopsis using world-limiter
                $this->table->add_row(ascii_to_entities
                                (word_limiter(null_to_default($value->msinopsis, 30))));
                $this->table->add_row('<br />');
                $this->table->add_row(
                        'Sutradara       : ' . $value->mdirectors
                        . ' | Penulis Naskah  : ' . null_to_default($value->mauthors)
                        . ' | Tanggal Release : '
                        . $release_date);
                //strftime('%d/%m/%Y',strtotime($value->mrelease_date))
                //Lihat_detail
                $this->table->add_row(anchor('data/detail/'
                                . $value->mtitle_identifier, '<hr>Lihat Rincian'));
                $this->output_table .=$this->table->generate();
                $this->output_table .='<br/>';
                $this->table->clear();
            }
            return $this->output_table;
        } else {
            return FALSE;
        }
    }

    public function count_table_rows($table='') {
        return $this->db->count_all($table);
    }

    //Fungsi Detail Film
    public function get_movie_detail($str_id = '') {
        if ($str_id == '') {
            return FALSE;
        }

        $query = $this->make_query('mtitle
					, mtitle_identifier
					, msinopsis
					, mdirectors
					, mauthors
					, mrelease_date
					, mproducers
					, mdistributors
					, msite
					, mcategory'
                        , 'srt_movie'
                        , array('mtitle_identifier' => $str_id));
        if ($query->num_rows() == 1) {
            $value = $query->row();
            $release_date = dnull_to_default($value->mrelease_date);
            if (!$release_date) {
                $release_date = strftime('%d/%b/%Y', strtotime
                                        ($value->mrelease_date));
            }
            
			$this->output_table.='<h2>' . strtoupper($value->mtitle) . '</h2>';
            $this->table->add_row('<div class="table_comment">');
			$this->table->add_row("<u>Director</u> \t :"
                    . null_to_default($value->mdirectors));
            $this->table->add_row("<u>Author</u> \t :"
                    . null_to_default($value->mauthors));
            $this->table->add_row("<u>Category</u> \t :"
                    . $this->assoc_category(null_to_default($value->mcategory)));
            $this->table->add_row("<u>Release date</u> \t :"
                    . $release_date);
            $this->table->add_row("<u>Sites</u> :"
                    . null_to_default($value->msite));
            $this->table->add_row("<u>Sinopsis</u><br />"
                    . null_to_default($value->msinopsis . '<hr color="#000000">'));
            $this->table->add_row('</div>');
            $this->output_table .=$this->table->generate(); //<hr>
            $this->output_table .='<br/>';
            $this->table->clear();
            //related movie category
            $this->related_movie($value->mtitle_identifier, $value->mcategory);
            return $this->output_table;
			
        } else {
            return FALSE;
        }
    }

    //ASSOC CATEGORY
    public function assoc_category($category_id='') {
        return element($category_id, $this->config->item('movie_categories'),
                "<em>- Unknow Category -</em>");
    }
	//RELATED MOVIE
    public function related_movie($midetifier='', $category_id='') {
        $fields = 'mtitle, mtitle_identifier, msinopsis, mrelease_date';
        $query = $this->make_query($fields
                        , 'srt_movie'
                        , array('mtitle_identifier !=' => $midetifier
                    , 'mcategory' => $category_id));

        if ($query->num_rows() > 0) {
            $this->output_table .='<h3>Film lain di Category '
                    . $this->assoc_category($category_id) . '</h3>';
            foreach ($query->result() as $value) {
                $release_date = dnull_to_default($value->mrelease_date);
                if (!$release_date) {
                    $release_date = strftime('%d/%d/%Y'. strtotime($value->mrelease_date));
                }
                
				 $this->tablediv->column=1;

       	 		$this->tablediv->tbl_style="background-color: #a1d2f1; ";
        		$this->tablediv->head_cell_style="font-family: verdana; height: 5px";
        		$this->tablediv->body_row_cell_style="font-family: verdana";
        		$this->tablediv->tbl_row_style="font-family: verdana; ";

        		//apply css
        		//$this->tablediv->css();
        		//start table
        		$this->tablediv->start();$this->tablediv->start_row();
        		$this->tablediv->cell_row($value->mtitle.'-'.anchor('data/detail/'.$value->mtitle_identifier,''.'Lihat Detail'));
        		$this->tablediv->stop_row();
				//finalize table
                $this->tablediv->close();
				//get html
        		
				
				/*
				
				$this->tablediv->column=1;
       	 		$this->tablediv->tbl_style="background-color: #a1d2f1; ";
        		$this->tablediv->head_cell_style="font-family: verdana; height: 5px";
        		$this->tablediv->body_row_cell_style="font-family: verdana";
        		$this->tablediv->tbl_row_style="font-family: verdana; ";
        		$this->tablediv->start();$this->tablediv->start_row();
        		$this->tablediv->cell_row($value->mtitle.'-'.anchor('data/detail/'.$value->mtitle_identifier,''.'Lihat Detail'));
        		$this->tablediv->stop_row();
				$this->tablediv->close();
				
				$this->table->add_row(strtoupper($value->mtitle).'<small>'.anchor('data/detail/'.$value->mtitle_identifier,''
				.'Lihat Detail').'</small>');
                $this->table->add_row(ascii_to_entities(word_limiter(null_to_default($value->msinopsis), 15)));
                $this->table->add_row(' ' . 'Release date: ' . $value->mrelease_date);
                $this->output_table .=$this->table->generate();
                $this->output_table .='<br />';
                $this->table->clear();
				*/
				
            }
			echo $this->tablediv->get();
				
           // return $this->output_table;
        } else {
            return FALSE;
        }
    }

    public function get_profile($user_id='') {
        $fields = 'id, username, email';
        $query = $this->make_query($fields, 'users', array('id' => $user_id));
        if ($query->num_rows() == 1) {

            $value = $query->row();
            $this->output_table .='<h2>Hi! ' . ($value->username) . ' edit profile ' . anchor('#', 'here') . '</h2>';
            $this->table->add_row($value->email); //"<u>Email :</u>:".
            $this->output_table .=$this->table->generate();
            $this->output_table .='<br />';
            $this->table->clear();
            return $this->output_table;
        } else {
            return FALSE;
        }
    }
	//SAVE COMMENT
    public function save_movie_comment($str_id="", $user_id) {
        $num_id = '';
        //mencari data id Film
        $query = $this->make_query('mid', 'srt_movie', array('mtitle_identifier' => $str_id));
        if ($query->num_rows == 1) {
            $row = $query->row();
            $num_id = $row->mid;
        } else {
            return FALSE;
        }
		$user_id = $this->tank_auth->get_user_id();
        $query2 = $this->make_query('id, username, email', 'users', array('id' => $user_id));
        if ($query2->num_rows() == 1) {
            $value = $query2->row();
            $username = $value->username;
            $email = $value->email;
        } else {
            return FALSE;
        }

        $post['mid'] = $num_id;
        $post['comvisitor'] = $username;
        $post['comemail'] = $email;
        $post['comcomment'] = $this->input->post('comment');
        $post['comdate_create'] = date("Y-m-d H:i:s");
		$post['kode'] = $this->input->post('kode');
        $post['comapprove'] = 0;

        //inserting unutk Engine InnoDB
        $this->db->trans_start();
        $this->db->insert('srt_movie_comments', $post);
        $this->db->trans_complete();
        if ($this->db->trans_status() == FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }
        redirect('data/detail/' . $str_id, 'location');
    }
	//SHOW MOVIE COMMNET
    public function show_movie_comments($str_id="") {
        $this->output_table = "";
        $num_id = "";
        $query = $this->make_query('mid', 'srt_movie', array('mtitle_identifier' => $str_id));
        if ($query->num_rows() == 1) {
            $rows = $query->row();
            $num_id = $rows->mid;
        } else {
            return FALSE;
        }
        $query2 = $this->make_query('comvisitor, comemail, comcomment, comdate_create, kode'
		, 'srt_movie_comments'
		, array('mid' => $num_id, 'comapprove' => 0),3,'', array('field' => 'comdate_create', 'sort' => 'DESC'));
        if ($query2->num_rows() > 0) {
            $this->output_table .= heading('Komentar', 3);
            foreach ($query2->result() as $value) {
				$email = $value->comemail;
				$prof_comment = $this->gravatar->get_gravatar($email);
				$create_date = '<small>' . strftime('%d/%b/%Y %H:%M:%S', strtotime($value->comdate_create)) . '</small>';
                $this->table->add_row($create_date . ' - ' . '<small>' . anchor('/data/users/'.$value->$value->comvisitor, $value->comvisitor)
				.'</small>');//<hr>
                $this->table->add_row($value->comcomment);
				$this->table->add_row("<hr><div class=detil_profile_comment><img src=$prof_comment  width=40 /></div>");
				$this->output_table .=$this->table->generate();
                $this->output_table .='<br />';
                $this->table->clear();
            }
            return $this->output_table;
        }
        else {
            return FALSE;
        }
    }

}
?>


















































