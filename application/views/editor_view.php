<?php
session_cache_expire(60 * 24 * 12);
session_start();
error_reporting(0);
$grav = $this->Search_email->get_email("$user_id");
$profil_gravatar = $this->gravatar->get_gravatar($grav);
$this->load->database();
$this->load->library('identifier');
$id_user = $user_id;

$default_tags = 'agile ajax apache api apml applescript architecture auth autocomplete beautify bug bugs C canvas cheatsheet closure Cocoa code codedump comet compiler compression compressor Computer crossdomain csrf css3 D dashcode debug debugger debugging development dom ext firebug firefox flash flex framework functions greasemonkey hack hacks howto html html5 ie iframe iframes innerhtml input Java javascript jquery js js2 keycodes keypress LAMP language languages leak leaks livesearch memory memoryleak minify moo mootools namespace nu oauth obfuscate obfuscator objective-c onload oop opml optimisation optimised optimization pack packer performance perl php plugin plugins programming prototype prototyping rail rails regexp replacehtml reserved rest ruby scripting scroll scrolling sdk snippet';
if (!@$_SESSION['existing_tags']) {
    $_SESSION['existing_tags'] = $default_tags;
}

$existing_tags = $_SESSION['existing_tags'];
$tags = explode(' ', $default_tags);

// hit via ajax
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && @$_GET['tag']) {
    $match = array();
    foreach ($tags as $tag) {
        if (stripos($tag, $_GET['tag']) === 0) {
            $match[] = $tag;
        }
    }

    echo json_encode($match);

    exit;
}

if (isset($_POST['input'])) {
    $question = $_POST['question'];
    $chronology = $_POST['chronology'];
    $create_identifier = $this->identifier->identifier_param($id_user);
    $date = date_create();
    $get_date = date_timestamp_get($date);
    $date_time = date('Y-m-d H:i:s', $get_date);
    echo $date_time;
    //Tagging Procces Slicing
    $tags = trim($_POST['tags']);
    $piece_of_tags = explode(' ', $tags);
    $length = count($piece_of_tags);
    for ($i = 0; $i <= $length; $i++) {
        $datatag = array(
            'tag_id' => '',
            'tag_name' => $piece_of_tags[$i],
            'tag_description' => ''
        );

        if (isset($piece_of_tags[$i])) {
            $querytag = $this->db->insert('tag', $datatag);
            $runtag = mysql_query($querytag);
        }
    }
    //INSERT 
    $data = array(
        'user_id' => $id_user,
        'mtitle_identifier' => $create_identifier,
        'mtitle' => $question,
        'msinopsis' => $chronology,
        'mrelease_date' => $date_time,
        'mtags' => $tags
    );

    $query = $this->db->insert('srt_movie', $data);
    if ($query) {
         redirect('/data/detail/' . $create_identifier);
         
    } else {
        echo "NO";
    }
}
echo $date_time;
?>

<script type="text/javascript" src="<? echo base_url(); ?>js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
    tinyMCE.init({
        mode : "textareas",
        theme : "advanced",
        plugins : "pagebreak,style,table,save,advhr,advimage,advlink,emotions,inlinepopups,insertdatetime,preview,media,searchreplace,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,wordcount,advlist,syntaxhl",
 
        // Theme options
        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,pagebreak,|,syntaxhl,|,sub,sup,media,bullist, ,numlist,|,blockquote,|,image,preview",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,
 
        // Example content CSS (should be your site CSS)
        content_css : "css/content.css",
 
        // Drop lists for link/image/media/template dialogs
        template_external_list_url : "lists/template_list.js",
        external_link_list_url : "lists/link_list.js",
        external_image_list_url : "lists/image_list.js",
        media_external_list_url : "lists/media_list.js",
 
        // Style formats
        style_formats : [
            {title : 'Bold text', inline : 'b'},
            {title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
            {title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
            {title : 'Example 1', inline : 'span', classes : 'example1'},
            {title : 'Example 2', inline : 'span', classes : 'example2'},
            {title : 'Table styles'},
            {title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
        ],
 
        // Replace values for the template plugin
        template_replace_values : {
            username : "Some User",
            staffid : "991234"
        }
    });
</script>
<form method="post" name="aks_form">
    <div class="alert alert-postask">
        <b>Asking question need to be member</b><hr>
        <?php echo "<i class=icon-question-sign></i><strong>Question</strong>" ?><input type="text" name="question">
    </div>
    <textarea name="chronology" rows="10" cols="20" style="overflow:hidden;"></textarea>


    <div class="alert">

        <style type="text/css" media="screen">
            <!--


            SPAN.tagMatches {
                margin-left: 10px;
                max-width: 700px;
            }

            SPAN.tagMatches SPAN {
                padding: 2px;
                margin-right: 4px;
                background-color: #0000AB;
                color: #fff;
                cursor: pointer;
            }

            PRE {
                background: #ddd;
                font-family: Courier;
                padding: 5px;
                overflow: auto;
            }
            -->
        </style>
        <script type="text/javascript">
            <!--
            $(function () {
                $('#tags').tagSuggest({
                    tags: <?= json_encode($tags) ?>
                });
                $('#tags-ajax').tagSuggest({
                    url: 'tagging.php',
                    delay: 250
                });
            });
            //-->
        </script>
        <label for="tags">Tags:</label>
        <input style="width:300px" class="wide" type="text" name="tags" value="" id="tags" />
        <h2>All tagging is based on the following tags in this example:</h2>   

        <button type="button" class="close">
            <img src="<?php echo base_url(); ?>style/images/hands_up.png" class="hands_up">    
        </button>

        <center><input class="btn-info" type="submit" name="input" value="submit"/></center>

        <strong>Prosedur Bertanya!</strong><br> Fist check yo topic, 
        bertanya menggunakan bahasa yang sopan. 
        Tanyalah secara spesifik dan jelas mengenai topic yang ditanyakan. 
        Setiap pertanyaan yang diteriman akan mendapatkan reputasi.
        <br>
        Angkatlah tanganmu dan katakan "<i><strong>I have a question</strong></i>"!
    </div>
</form>
<?php //include '_riset.php'; ?>
