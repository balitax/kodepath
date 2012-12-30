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
        $this->load->library('identifier');
        $this->load->library('wordtime');
        $this->load->model('hits');

        //FB Connect
        $this->load->library('facebook_connect');
        $this->load->library('notifications');
    }

    //Fungsi dasar untuk mengambil data
    private function make_query($fields='', $table='', $where=array(), $limit=NULL, $offset='', $order=array('field' => NULL, 'sort' => 'ASC')) {
        $this->db->select($fields);
        if (!is_null($order['field'])) {
            $this->db->order_by($order['field'], $order['sort']);
        }
        return $this->db->get_where($table, $where, $limit, $offset);
    }

    public function get_allusers($limit=NULL, $offset='') {
        $fields = 'user_id, real_name, profile_email';
        $query = $this->make_query($fields, 'user_profiles');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $value) {
                $this->table->add_row(
                        '<li class=span6 data-tags=' . $value->profile_email . '>
                        <div class=thumbnail>                            
                            
                                <strong><img src=' . $this->gravatar->get_gravatar($value->profile_email) . ' width="28" alt=phoprof/>' . $value->real_name . '</strong><a href=users/' . $value->user_id . '>. <i class=icon-star></i>
  
                        </div>
                    </li>'
                );
                $this->output_table .=$this->table->generate();
                $this->output_table .='<br/>';
                $this->table->clear();
            }
            return $this->output_table;
        } else {
            return FALSE;
        }
    }

    public function get_list_lilcomment($str_id="") {
        $this->output_table = "";
        $query = $this->make_query('mid', 'srt_movie', array('mtitle_identifier =' => $str_id));
        if ($query->num_rows() == 1) {
            $rows = $query->row();
            $num_id = $rows->mid;
        } else {
            return FALSE;
        }
        $fields = 'lilcomid, lilcomvisitor, lilcomment';
        $query2 = $this->make_query($fields, 'srt_movie_litlecomment', array('mid =' => $num_id));
        if ($query->num_rows() > 0) {
            foreach ($query2->result() as $key) {
                $commentor = $key->lilcomvisitor;
                $comment = $key->lilcomment;
                $id = $key->lilcomid;
                //$visitor ='<td>' . $commentor . '</td>';
                //$comment ='<td>' . $comment.'</td>';
                //$lilcomlist ='<td><strong><abbr title=attribute>' . $commentor . '</abbr></strong><i class=icon-comment></i></td><td>' . $comment.'</td>';
                //$this->output_table .=$this->table->generate();
                //$this->table->clear();
                $togtext = '"toggleText_' . $id . '"';
                $distext = '"displayText_' . $id . '"';

                $this->table->add_row('<table class=table table-hover>
                    <td>
                    <strong><a>' . ucwords(strtolower($commentor)) . '</a><i class=icon-comment></i></strong>                   
                    <abbr title=attribute>' . $comment . '</abbr>
                    </td>
                    <td width=50%>                    
                    <i class=icon-arrow-right></i>
                    <a id="displayText_' . $id . '" href=javascript:toggle();>show</a>
                    <div id="toggleText_' . $id . '" style="display: none"><h1><input class="sout" type="text" placeholder="Text input"></h1></div>
                    </td>
                    </table>');
                $this->output_table .=$this->table->generate();
                $this->output_table .='<br/>';
                $this->table->clear();
            }
            return $this->output_table;
            $togtext;
            $distext; //$lilcomlist = array('visitor'=>$visitor,'comment'=>$comment);//
        } else {
            return FALSE;
        }
    }

    //Fungsi menampilkan data Movie yang terekam
    public function get_movie_list($limit=NULL, $offset='', $order=array('field' => 'mrelease_date', 'sort' => 'DESC')) {

        $query = $this->make_query('mtitle
                    , user_id
                    , mtitle_identifier
                    , msinopsis
                    , mtags
                    , mrelease_date'
                , 'srt_movie'
                , array()
                , $limit
                , $offset
                , $order);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $value) {
                $user_id = $value->user_id;
                $key_identifi = $value->mtitle_identifier;

                $query2 = $this->make_query('username, email', 'users', array('id =' => $user_id));

                $thepizzais = trim($value->mtags);
                $pieces = explode(" ", $thepizzais);
                if (count($pieces) === 5) {
                    $show_tags = '<i class=icon-tags></i>
                                  <span class=label>' . $pieces[0] . '</span>
                                  <span class=label>' . $pieces[1] . '</span>
                                  <span class=label>' . $pieces[2] . '</span>
                                  <span class=label>' . $pieces[3] . '</span>
                                  <span class=label>' . $pieces[4] . '</span>
                                  ';
                } elseif (count($pieces) === 4) {
                    $show_tags = '<i class=icon-tags></i>
                                  <span class=label>' . $pieces[0] . '</span>
                                  <span class=label>' . $pieces[1] . '</span>
                                  <span class=label>' . $pieces[2] . '</span>
                                  <span class=label>' . $pieces[3] . '</span>
                                  ';
                } elseif (count($pieces) === 3) {
                    $show_tags = '<i class=icon-tags></i>
                                  <span class=label>' . $pieces[0] . '</span>
                                  <span class=label>' . $pieces[1] . '</span>
                                  <span class=label>' . $pieces[2] . '</span>
                                  ';
                } elseif (count($pieces) === 2) {
                    $show_tags = '<i class=icon-tags></i>
                                  <span class=label>' . $pieces[0] . '</span>
                                  <span class=label>' . $pieces[1] . '</span>
                                  ';
                } elseif (count($pieces) === 1) {
                    $show_tags = '<i class=icon-tag></i>
                                  <span class=label>' . $pieces[0] . '</span>
                                  ';
                }

                foreach ($query2->result() as $key) {
                    $username = $key->username;
                    $profile_pic = $this->gravatar->get_gravatar($key->email);
                }

                $release_date = dnull_to_default($value->mrelease_date);
                if (!$release_date) {
                    $release_date = strftime('%d/%b/%Y', strtotime
                                    ($value->mrelease_date));
                }
                $wordtime = $this->wordtime->relative_date(strtotime($value->mrelease_date));
                $this->table->add_row(
                        '<blockquote class=pull-left>
                           <div class=rata_kiri scroll-pane><i class="icon-question-sign"></i>
                           <h3><abbr title=attribute>'
                        . anchor('data/detail/' . $value->mtitle_identifier, $value->mtitle . '</abbr>') . '
                                   ' . word_limiter($value->msinopsis, 25) . '</div>
                           <small><div class=rata_kiri>' . $show_tags . ' <i class=icon-time></i>' . $wordtime .
                        "<small>
                            <div class=pagination>
                                <ul>
                                    <li><a href=#><i class=icon-heart></i><b>" . $this->hits->get_hits_view($key_identifi) . "</b></a></li>
                                    <li><a href=#><i class=icon-comment></i><b>" . $this->hits->get_hits_lilcomment($key_identifi) . "</b></a></li>
                                    <li><a href=#><i class=icon-check></i><b>" . $this->hits->get_hits_answer($key_identifi) . "</b></a></li>
                                </ul>
                            </div>
                            <img src='$profile_pic' width='35' title='user picture' alt='user picture' />" . 'Designer @<cite title="Source Title">Kodepath</cite>
                           </small></div></small>
                        </blockquote>');
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
                    , user_id
					, mtitle_identifier
					, msinopsis
					, mrelease_date
					, mtags'
                , 'srt_movie'
                , array('mtitle_identifier' => $str_id));
        if ($query->num_rows() == 1) {
            $value = $query->row();
            $release_date = dnull_to_default($value->mrelease_date);
            if (!$release_date) {
                $release_date = strftime('%d/%b/%Y', strtotime($value->mrelease_date));
            }
            $wordtime = $this->wordtime->relative_date(strtotime($value->mrelease_date));
            $name = $this->Search_username->search_by($value->user_id);
            $this->output_table.='';

            $this->table->add_row('<blockquote>
                                    <p><h1>10</h1></p>
                                    <small>Oct</small>
                                    <div class=pos_detailtitle>
                                    <strong>
                                            <abbr title=attribute>
                                                <h2><a href=' . $value->mtitle_identifier . '>' . $value->mtitle . '</a></h2>
                                            </abbr>
                                        </strong>
                                    </div>        
                                    </blockquote>');
            $this->table->add_row('<i class=icon-question-sign></i> Question<i class=icon-time></i> ' . $wordtime . '<i class=icon-user></i> ' . $name);
            $this->table->add_row(' 
                 <div id=scrollbar_container>
                    <div id=scrollbar_track><div id=scrollbar_handle></div></div>
                    <div id=scrollbar_content>
                    
                        <b><abbr title=attribute>' . null_to_default($value->msinopsis) . '</abbr></b>

                    </div>
                </div>   
                ');
            $this->table->add_row('<div class=rata_kanan>
                                    <i class=icon-share></i><b>
    <a href="#" rel="popover"  data-content="Its very engaging. right?" data-original-title="share">share</a></b></div>');
            $this->output_table .=$this->table->generate();
            $this->output_table .='<br/>';
            $this->table->clear();
            //related movie category
            //$this->related_movie($value->mtitle_identifier, $value->mcategory);
            return $this->output_table;
            //Detail Pembuat
            //$this->table->add_row("<u>Author</u> :".null_to_default($value->mauthors));
            //$this->table->add_row("<u>Category</u> \t :".$this->assoc_category(null_to_default($value->mcategory)));
            //$this->table->add_row(."<u>Release date</u> \t :".$release_date);
            //$this->table->add_row("<u>Sites</u> :".null_to_default($value->msite).'<hr>');
        } else {
            return FALSE;
        }
    }

    //ASSOC CATEGORY
    public function assoc_category($category_id='') {
        return element($category_id, $this->config->item('movie_categories'), "<em>- Unknow Category -</em>");
    }

    //RELATED MOVIE
    public function related_movie($midetifier='', $category_id='') {
        $fields = 'mtitle, mtitle_identifier, msinopsis, mrelease_date';
        $related_movie;
        $query = $this->make_query($fields
                , 'srt_movie'
                , array('mtitle_identifier !=' => $midetifier
            , 'mcategory' => $category_id));

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $value) {
                $release_date = dnull_to_default($value->mrelease_date);
                if (!$release_date) {
                    $release_date = strftime('%d/%d/%Y' . strtotime($value->mrelease_date));
                }
                /* $this->table->add_row('<strong>'.$value->mtitle.'</strong>');
                  $this->table->add_row(ascii_to_entities(word_limiter(null_to_default($value->msinopsis), 15)).'<br />'
                  .'- <small>'.anchor('data/detail/'.$value->mtitle_identifier,''.'Detail').'</small>');
                  $this->output_table .=$this->table->generate();
                  $this->output_table .='<br />';
                  $this->table->clear();
                 */
            }
            return $this->output_table;
        } else {
            return FALSE;
        }
    }

    public function get_profile($user_id='') {
        $query2profile = $this->make_query('country, website', 'user_profiles', array('user_id' => $user_id));
        if ($query2profile->num_rows() == 1) {
            $value = $query2profile->row();
            $data = array('country' => $value->country, 'website' => $value->website);
        } else {
            return FALSE;
        }

        $fields = 'id, username, email';
        $query = $this->make_query($fields, 'users', array('id' => $user_id));
        if ($query->num_rows() == 1) {

            $value = $query->row();
            //$this->output_table .='<h2>Hi! ' . ($value->username) . ' edit profile ' . anchor('#', 'here') . '</h2>';
            $this->table->add_row('<div class="alert alert-success">Hi! <strong><abbr title=attribute>'
                    . ($value->username) . '</abbr></strong> edit profile '
                    . anchor('#', 'here') . '<div class=rata_kanan><span class="badge badge-important">6</span><span class="badge">3</span><span class="badge badge-warning">1</span></div></div>');
            //$this->table->add_row($value->email); //"<u>Email :</u>:".
            $this->table->add_row();
            $this->output_table .=$this->table->generate();
            $this->output_table .='<br />';
            $this->table->clear();
            return $this->output_table;
        } else {
            return FALSE;
        }
    }

    public function ask_question($user_id='') {
        $fields = 'id, username, email';
        $query = $this->make_query($fields, 'users', array('id' => $user_id));
        if ($query->num_rows() == 1) {
            $value = $query->row();
        }
    }

    //SAVE COMMENT
    public function save_movie_comment($str_id="", $user_id) {
        $num_id = '';
        //mencari data id Film
        $query = $this->make_query('mid', 'srt_movie', array('mtitle_identifier' => $str_id));
        if ($query->num_rows() == 1) {
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
        $post['identifi'] = $str_id;
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
                , array('mid' => $num_id, 'comapprove' => 0), 15, '', array('field' => 'comdate_create', 'sort' => 'DESC'));
        if ($query2->num_rows() > 0) {
            $this->output_table .= heading('<strong>Jawaban</strong>', 3);
            foreach ($query2->result() as $value) {
                $email = $value->comemail;
                $prof_comment = $this->gravatar->get_gravatar($email);
                $create_date = '<small>' . strftime('%d/%b/%Y %H:%M:%S', strtotime($value->comdate_create)) . '</small>';
                $this->table->add_row(
                        '<blockquote>
                            <img src=' . $prof_comment . ' width=40 />
                            <p>' . $value->comcomment . '</p>
                            <small>
                                ' . $value->comvisitor . '@<cite title=Source Title>Source Title</cite>
                            </small>
                        </blockquote>'
                );
                //$this->table->add_row(
                //    "<hr><div class=detil_profile_comment><img src=$prof_comment  width=40 /></div><abbr title=attribute>"
                //    .$create_date . ' - ' . '<small>' . anchor('/data/users/'.$value->$value->comvisitor, $value->comvisitor)
                //    .'</abbr></small>'
                //);
                //$this->table->add_row($value->comcomment);
                $this->output_table .=$this->table->generate();
                $this->output_table .='<br />';
                $this->table->clear();
            }
            return $this->output_table;
        } else {
            return FALSE;
        }
    }

}
?>


















































