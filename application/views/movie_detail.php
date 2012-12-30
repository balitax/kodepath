<?php
echo $value->mtitle;
echo $query;
?>

<?php $this->load->view('editor_answer'); ?>
<!--Tulis Komentar-->
<?php $this->load->view('litle_comment'); ?>
<!-- awal form komentar -->
<?php
echo $comments;
?>

<h3>Answer</h3>
<?php $req = '<sup>*</sup>'; ?>
<?php echo validation_errors(); ?>
<?php echo form_open('data/detail/' . $id, array('name' => 'movie_comment')); ?>
<?php echo form_label('Komentar' . $req . '<small><i>minimal 3 karakter, maksimal 250 karakter</i></small>', 'for="comment"'); ?><br />
<?php echo form_textarea(array('name' => 'comment', 'cols' => '45', 'rows' => '8', 'maxlength' => '250', 'size' => '100'), set_value('comment')); ?><br />
<?php echo form_hidden('title_id', $id); ?>
<center><button class="btn btn-large" type="submit" name="submit"><b>Post Answer</button></center>
<?php// echo form_submit('submit', 'post', 'class="btn btn-primary" data-loading-text="Loading..."'); ?>
<?php echo form_close(); ?>
