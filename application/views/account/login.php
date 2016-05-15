<div id="login_section">
	<div class="login_head">
		<h1>Login</h1>
		<img id="mail_icon" src="<?= base_url() . '/assets/imgs/green-mail-send-icon.png'?>" alt="email_icon">
		<p id="back"><a href="<?= base_url() . 'home/index'?>">Back</a></p>
	</div>
	<div class="login_body">
		<div class="login_form">
			<?= form_open('account/login'); ?>
			<?= form_label('Username:'); ?>
			<?= form_input('username', htmlentities($this->input->post('username'))); ?>
			<?= form_error('username'); ?>
			
			<?= form_label('Password:'); ?>
			<?= form_password('password'); ?>
			<?= form_error('password'); ?>
			
			<?= form_submit('login_submit', 'Login'); ?>
			
			<p class="err_msg"><?= $this->session->flashdata('errmsg');?></p>
			<?= form_close(); ?>
		</div>
	</div>
	<p class="login_footer">Page rendered in <strong>{elapsed_time}</strong> seconds.</p>
</div>