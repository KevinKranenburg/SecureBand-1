<?php $this->layout('admin_layout') ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/public/assets/css/admin_login.css">
<?php $this->stop('css') ?>

<?php $this->start('page_title') ?>
Log in - Hello Internet
<?php $this->stop('page_title') ?>

<?php $error[1] ? require __DIR__.'/../../includes/error.php' : "" ?>

<form method="POST">
	<div class="input-container">
		<input type="text" name="username" id="username" class="input">
		<label for="username">username</label>
	</div>
	<div class="input-container">
		<input type="password" name="password" id="password" class="input">
		<label for="password">password</label>
	</div>
	<button type="submit" name="submit">log in</button>
</form>