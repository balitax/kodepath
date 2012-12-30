<div id="badan_utama">
<div id="wrapper">
<div class="header-wrap">
    <div class="header-container">
        <div class="navbar">
            <div class="navbar-inner">
                <div id="menu">
			        <ul  class="breadcrumb">
			                <li><?php echo anchor('data/daftar','<center><strong>Kode#path</strong></center>');?></li>|
			                <li><?php echo anchor('data/daftar','<center><strong>Team Groups</strong></center>');?></li>|
			                <li><?php echo anchor('data/daftar','<center><strong>Jobs</strong></center>');?></li>|
			                <li><?php echo anchor('data/ask/'.$user_id,'<center><strong>Ask Questions</strong></center>');?></li>|
			                <li><?php echo anchor('data/tags/','<center><strong>Tags</strong></center>');?></li>|
			                <li><?php echo anchor('data/allusers/','<center><strong>Users</strong></center>');?></li>
			                <li class="rata_kanan">
			                <strong><?php echo anchor('data/users/'.$user_id, $username);?></strong>!
			                You are logged in now. <?php echo anchor('/auth/logout/', 'Logout  '); ?>
			                </li>
			        </ul> 
			    </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
        <?php
			if (isset($page_content))
			{
				$this->load->view($page_content);
			}
		?>
    </div>
    <div class="clear"></div>
</div>
<br />

<div class="sidebar">

		<ul class="thumbnails">

  			<li class="span4">
    			<div class="thumbnail">
      				<img src="http://placehold.it/300x200" alt="">
      				<div class="alert">
  						<strong>Warning!</strong>Best check yo self.
					</div>
          <br>
          <center><img src="<?php echo base_url();?>style/images/logo_en.png" width="150" alt=""></center>
          <br>
          <div class="alert alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
              <h4>Tags</h4>
              <?php
                $query  = $this->db->get('tagging');
                  foreach ($query->result() as $row)
                  {
                    echo '<span class="label label-inverse">'.$row->tag_name.'</span> x '.$row->ctag.'<br />';
                  }
              ?>  
          </div>
    			</div>
  			</li>
		</ul>
</div>
</div>

	<div class="bersih"></div>
	<div id="footer">
		 <center><?php echo $pagination;?></center>
		 <div id="footerbig">
        <!--footer start -->
          <div id="footer">
				<p>Copyrioht © Kodepath 2012 All Rights Reserved</p>
				<p>Powered by <a href="http://localhost/kodepath" target="_blank" title="kodepath">Kodepath</a></p>
          </div>
        <!--footer end -->
    </div> 
	</div>    
</body>
</html>   


