<?php
$grav = $this->Search_email->get_email("$user_id");
$profil_gravatar = $this->gravatar->get_gravatar($grav);
?>
<!DOCTYPE HTML>
<head>
    <link rel="icon" href="<?= base_url() ?>style/images/favicon.gif" type="image/gif">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>js/syntaxhighlighter/styles/shCoreDefault.css"/>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/sticky/sticky.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/syntaxhighlighter/scripts/shCore.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/syntaxhighlighter/scripts/shBrushPhp.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/syntaxhighlighter/scripts/shBrushXml.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/syntaxhighlighter/scripts/shBrushCss.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/syntaxhighlighter/scripts/shBrushJscript.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/syntaxhighlighter/scripts/shBrushPlain.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/syntaxhighlighter/scripts/shBrushSql.js"></script>
    <script type="text/javascript">SyntaxHighlighter.all();</script>
    <!--<script type="text/javascript" src="<?php echo base_url(); ?>js/tags/jquery.js" ></script>-->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/tags/tag.js" ></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>style/bootstrap/js/bootstrap.js" ></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>style/bootstrap/js/bootstrap.min.js" ></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>style/bootstrap/js/bootstrap-popover.js" ></script>
    <!--start textbox-->

    <title><?php echo $page_title; ?></title>
    <?php
    $meta = array(array("name" => "author", "content" => "G.A.S")
        , array("name" => 'description', 'content' => 'KODE#')
        , array("name" => 'keyword', 'content' => 'Movie, Music, Indonesia')
        , array('name' => 'robots', 'content' => 'noindex, follow')
        , array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv'));

    // menampilkan meta
    echo meta($meta);
    //css
    //echo link_tag('style2/style.css');
    echo link_tag('style/bootstrap/css/bootstrap.css');
    ?>
</head>
<body>
    <div id="badan_utama">
        <div id="wrapper">
            <script>
                $('.sticky-close').click(function()
                { $('#' + $(this).attr('rel')).dequeue().fadeOut(settings['speed']); });
                $('#sticky-note').ready(function() {
                    $.sticky('<strong>Hi!</strong>');
                });
            </script>


            <div class="header-wrap">
                <div class="header-container">
                    <div class="navbar">
                        <div class="navbar-inner">
                            <div id="menu">
                                <ul  class="breadcrumb">
                                    <li><?php echo anchor('data/daftar', '<center><strong>Kode#path</strong></center>'); ?></li>|
                                    <li><?php echo anchor('data/daftar', '<center><strong>Team Groups</strong></center>'); ?></li>|
                                    <li><?php echo anchor('data/daftar', '<center><strong>Jobs</strong></center>'); ?></li>|
                                    <li><?php echo anchor('data/ask/' . $user_id, '<center><strong>Ask Questions</strong></center>'); ?></li>|
                                    <li><?php echo anchor('data/tags/', '<center><strong>Tags</strong></center>'); ?></li>|
                                    <li><?php echo anchor('data/allusers/', '<center><strong>Users</strong></center>'); ?></li>
<!--                                        <li class="rata_kanan"><img src="<?php echo $profil_gravatar ?>" width="25"></li>-->
                                    <li class="rata_kanan">                                             
                                        <strong><?php echo anchor('data/users/' . $user_id, $username); ?></strong>!
                                        You are logged in now. <?php echo anchor('/auth/logout/', 'Logout  '); ?>
                                    </li>
                                </ul> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
