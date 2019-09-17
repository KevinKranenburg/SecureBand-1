<?php $this->layout('standard_layout') ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/public/assets/css/support.css">
<?php $this->stop('css') ?>

<?php $this->start('page_title') ?>
Support the show - Hello Internet
<?php $this->stop('page_title') ?>

<div class="actions">
	<div class="action">
		<h2 class="action__title"><?=$content[0]["title"]?>!</h2>
		<p class="action__text"><?=$content[0]["content"]?></p>
	</div>
	<div class="action">
		<h2 class="action__title"><?=$content[1]["title"]?>!</h2>
		<p class="action__text"><?=$content[1]["content"]?></p>
	</div>
	<div class="action">
		<h2 class="action__title"><?=$content[2]["title"]?>!</h2>
		<p class="action__text"><?=$content[2]["content"]?></p>
	</div>
	<div class="action">
		<h2 class="action__title"><?=$content[3]["title"]?>!</h2>
		<p class="action__text"><?=$content[3]["content"]?></p>
	</div>
	<div class="action">
		<h2 class="action__title"><?=$content[4]["title"]?>!</h2>
		<p class="action__text"><?=$content[4]["content"]?></p>
	</div>
</div>