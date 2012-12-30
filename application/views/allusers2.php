<?php 
	$grav = $this->Search_email->get_email("$user_id");
	$profil_gravatar = $this->gravatar->get_gravatar($grav);
?>

<form>
	<fieldset>
    	<legend>Search <i class="icon-search"></i></legend>
    		<input type="text" class="search-query" placeholder="Type something…">
    		<span class="help-block">Example block-level help text here.</span>
    		<label class="checkbox">
    			<input type="checkbox"> Check me out
    		</label>
    		<button type="submit" class="btn">Submit</button>
    </fieldset>
</form>
<?php
	echo $getallusers;
?>
