<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/styles.css" />
    </head>
    
    <body>
        <header>
        </header>
        <nav id="filter"></nav>
        <section id="container">
        	<ul id="stage">
                <?php echo $getallusers;?>
            </ul>
        </section>        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.quicksand.js"></script>
        <script src="<?php echo base_url();?>assets/js/script.js"></script>
    

    </body>
</html>
