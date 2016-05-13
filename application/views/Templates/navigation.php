<div id="nav">
	<a id="home" href="<?= base_url() . 'membersArea/index'?>"><img src="<?= base_url() . 'assets/imgs/home_inverted.png';?>" alt="home_button"></a>
	<ul>
		<li><a href="<?= base_url() . 'membersArea/about'?>">About</a></li>
		<li><a href="<?= base_url() . 'membersArea/sendEmail'?>">Send Email</a></li>
		<li><a href="<?= base_url() . 'membersArea/contact'?>">Contact</a></li>
	</ul>
</div>

<p id="logout"><a href="<?= base_url() . 'membersArea/logout'?>">Logout</a></p>
<span><?= $this->session->userdata['username'] ? $this->session->userdata['username'] . '|' : '';?></span>