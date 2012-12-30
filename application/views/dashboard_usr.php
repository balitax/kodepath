        <link rel="stylesheet" href="<?php echo base_url();?>style/4userprofile/960.css" type="text/css" media="screen" charset="utf-8" />
        <link rel="stylesheet" href="<?php echo base_url();?>style/4userprofile/template.css" type="text/css" media="screen" charset="utf-8" />
        <link rel="stylesheet" href="<?php echo base_url();?>style/4userprofile/colour.css" type="text/css" media="screen" charset="utf-8" />
        <!--[if IE]><![if gte IE 6]><![endif]-->
        <script src="<?php echo base_url();?>js/4userprofile/core.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>js/4userprofile/widgets.js" type="text/javascript"></script>
        <link href="<?php echo base_url();?>js/4userprofile/widgets.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript">
            glow.ready(function(){
                new glow.widgets.Sortable(
                '#content .grid_5, #content .grid_6',
                {
                    draggableOptions : {
                        handle : 'h2'
                    }
                }
            );
            });
        </script>
        <!--[if IE]><![endif]><![endif]-->
    </head>
    <body>
        <div id="content" class="container_16 clearfix">
            <div class="grid_5">
                <div class="box">
                    <h2>Mathew</h2>
                    <div class="utils">
                        <a href="#">View More</a>
                    </div>
                    <p><strong>Last Signed In : </strong> Wed 11 Nov, 7:31<br /><strong>IP Address : </strong> 192.168.1.101</p>
                </div>
                <div class="box">
                    <h2>Files</h2>
                    <div class="utils">
                        <a href="#">View More</a>
                    </div>
                    <table>
                        <tbody>
                            <tr>
                                <td>Newton 2</td>
                                <td>8/10</td>
                            </tr>
                            <tr>
                                <td>Wicked Twister</td>
                                <td>9/10</td>
                            </tr>
                            <tr>
                                <td>Forester</td>
                                <td>9.12/10</td>
                            </tr>
                            <tr>
                                <td>Sabertooth</td>
                                <td>8.9/10</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="box">
                    <h2>Messages</h2>
                    <div class="utils">
                        <a href="#">Inbox</a>
                    </div>
                    <p class="center">Have have <a href="#">10</a> unread messages.</p>
                </div>
                <div class="box">
                    <h2>CMS Updates</h2>
                    <div class="utils">
                        <a href="#">Check</a>
                    </div>
                    <p class="center">You are running the latest version.</p>
                </div>
            </div>
            <div class="grid_6">
                <div class="box">
                    <h2>At a Glance</h2>
                    <div class="utils">
                        <a href="#">View More</a>
                    </div>
                    <table>
                        <tbody>
                            <tr>
                                <td>1 Post</td>
                                <td>2 Comments</td>
                            </tr>
                            <tr>
                                <td>1 Page</td>
                                <td>2 Approved</td>
                            </tr>
                            <tr>
                                <td>1 Categories</td>
                                <td>0 Pending</td>
                            </tr>
                            <tr>
                                <td>0 Tags</td>
                                <td>0 Spam</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="box">
                    <h2>Quick Post</h2>
                    <div class="utils">
                        <a href="#">Advanced</a>
                    </div>
                    <form action="#" method="post">
                        <p>
                            <label for="title">Title <small>Alpha-numeric characters only.</small> </label>
                            <input type="text" name="title" />
                        </p>
                        <p>
                            <label for="post">Post <small>Parsed by Markdown.</small> </label>
                            <textarea name="post"></textarea>
                        </p>
                        <p>
                            <input type="submit" value="post" />
                        </p>
                    </form>
                </div>
            </div>

        </div>
    </body>
</html>