<?php $this->layout('admin_layout') ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/public/assets/css/admin_patreons.css">
<?php $this->stop('css') ?>

<?php $this->start('page_title') ?>
Patreons - Hello Internet
<?php $this->stop('page_title') ?>

<?php $error[1] ? require __DIR__.'/../../includes/error.php' : "" ?>

<form method="post" style="margin-bottom:40px">
	<div class="input-container">
		<input type="text" name="patreon" class="input" id="patreon">
		<label for="patreon">Patreon Name</label>
	</div>
	<button type="submit" name="submit">Add Patreon</button>
</form>

<div class="patreons">
	<?php 
	if (!$patreons) echo "No patreons found.";
	else foreach($patreons as $patreon): ?>
	<div class="patreon-container">
		<span class="patreon-container__patreon"><?=htmlspecialchars($patreon['patreon'])?></span>
	</div>
	<?php endforeach; ?>
</div>