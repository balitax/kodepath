<div class="sidebar">

    <ul class="thumbnails">

        <li class="span4">
            <div class="thumbnail">
                <img src="http://placehold.it/300x200" alt="">
                <div class="alert">
                    <strong>Warning!</strong>Best check yo self.
                </div>
                <br>
<!--                <center><img src="<?php echo base_url(); ?>style/images/logo_en.png" width="150" alt=""></center>-->
                <br>
                <div class="alert alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <h4>Tags</h4>
                    <?php
                    $query = $this->db->get('tagging');
                    foreach ($query->result() as $row) {
                        echo '<span class="label label-inverse">' . $row->tag_name . '</span> x ' . $row->ctag . '<br />';
                    }
                    ?>  
                </div>
            </div>
        </li>
    </ul>
    <div id="fb-root"></div>
    <!--
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=377580512331054";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <div class="fb-recommendations-bar" data-href="https://developers.facebook.com/docs/reference/plugins/recommendationsbar/" data-action="recommend" data-side="left" data-site="kodepath.co.id"></div>
    -->
</div>

