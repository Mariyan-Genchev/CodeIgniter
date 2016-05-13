<div id="signup_section">
	<div class="signup_head">
		<h1>Sign up</h1>
		<img id="mail_icon" src="<?= base_url() . '/assets/imgs/blue-mail-send-icon.png'?>" alt="email_icon">
		<p><a href="<?= base_url() . 'home/index'?>">Back</a></p>
	</div>
	<div class="signup_body">
		<div class="signup_form">
			<?= form_open('account/signUp'); ?>

			<?= form_label('Username:'); ?>
			<?= form_input('username', $this->input->post('username')); ?>
			<?= form_error('username'); ?>

			<?= form_label('Email:'); ?>
			<?= form_input('email', $this->input->post('email')); ?>
			<?= form_error('email'); ?>

			<?= form_label('Password:'); ?>
			<?= form_password('password'); ?>
			<?= form_error('password'); ?>

			<?= form_label('Confirm Password:'); ?>
			<?= form_password('confirm_password'); ?>
			<?= form_error('confirm_password'); ?>
			
			<?= form_submit('signup_submit', 'Sign up'); ?>
			<?= form_close(); ?>
		</div>
	</div>
	<p class="signup_footer">Page rendered in <strong>{elapsed_time}</strong> seconds.</p>
</div>