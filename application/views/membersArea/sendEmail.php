<div id="sendemail_content">
	<h1>Send Email</h1>
	<hr>
	
	<div id="user_email">Your email address: <p><?= $_SESSION['userEmail'] ?></p>
	<a href="<?= base_url() . 'account/changeemail' ?>">Change</a>
</div>

	<?= form_open('email/sendEmail'); ?>

	<?= form_label('To:'); ?>
	<?= form_input('email_to', $this->input->post('email_to')); ?>
	<?= form_error('email_to'); ?>

	<?= form_label('Subject:'); ?>
	<?= form_input('subject', $this->input->post('subject')); ?>
	<?= form_error('subject'); ?>
<?php
	$textAreaData = array(
	'name'	=> 'message',
	'id'	=> 'message',
	'value'	=> $this->input->post('message'),
	'rows'	=> '15',
	'cols'	=> '77'
	);
	?>

	<?= form_label('Message:'); ?>
	<?= form_textarea($textAreaData); ?>
	<?= form_error('message'); ?>
	<?= form_submit('sendEmail', 'Send'); ?>

<?= form_close(); ?>
</div>