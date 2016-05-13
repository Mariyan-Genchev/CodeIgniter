<div id="change_email_content">
	<h1>Change your email</h1>
	<hr>
	
	<div id="current_email">Your current email address: <p><?= $_SESSION['userEmail'] ?></p></div>
	<?= form_open('account/changeEmail'); ?>
	
	<?= form_label('New email address:'); ?>
	<?= form_input('newEmail', $this->input->post('newEmail')); ?>
	<?= form_error('newEmail'); ?>
	<?= form_label('Enter your password:'); ?>
	<?= form_password('password'); ?>
	<?= form_error('password'); ?>
	
	<?= form_submit('change', 'Change'); ?>
	
	<p class="err_msg"><?= $this->session->flashdata('errmsg');?></p>
	<?= form_close(); ?>
</div>