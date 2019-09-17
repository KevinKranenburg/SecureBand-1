<?php $this->layout('standard_layout') ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/public/assets/css/patreons.css">
<?php $this->stop('css') ?>

<?php $this->start('page_title') ?>
Patreons - Hello Internet
<?php $this->stop('page_title') ?>

<p>A special thanks to our Patreons!</p>

<div class="patreons">
	<?php 
	if (!$patreons) echo "No patreons found.";
	else foreach($patreons as $patreon): ?>
	<div class="patreon-container">
		<span class="patreon-container__patreon"><?=htmlspecialchars($patreon['patreon'])?></span>
	</div>
	<?php endforeach; ?>
</div>