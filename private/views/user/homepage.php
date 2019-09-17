<?php $this->layout('standard_layout') ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/public/assets/css/index.css">
<?php $this->stop('css') ?>

<?php $this->start('page_title') ?>
Hello Internet
<?php $this->stop('page_title') ?>

<div class="about">
	<h1 class="about__title"><?=$content[0]["title"]?></h1>
	<p class="about__text"><?=$content[0]["content"]?></p>
</div>
<div class="actions">
	<div class="action">
		<h2 class="action__title"><?=$content[1]["title"]?>:</h2>
		<p class="action__text"><?=$content[1]["content"]?></p>
	</div>
	<div class="action">
		<h2 class="action__title"><?=$content[2]["title"]?>:</h2>
		<p class="action__text"><?=$content[2]["content"]?></p>
	</div>
</div>
<div class="latest-podcast">
	<h2 class="latest-podcast__title">Here's our latest podcast!</h2>
	<div class="podcast">
		<a href="<?=url('/podcast/'.$podcast['id'])?>" class="podcast__title"><?=htmlspecialchars($podcast['title'])?></a>
		<span class="podcast__author">Hello Internet</span>
		<p class="podcast__desc"><?=htmlspecialchars($podcast['description'])?></p>
		<div class="podcast__footer">
			<span class="podcast__footer__time">00:00</span> • <span class="podcast__footer__date"><?=date('F d, Y', strtotime($podcast['date']))?></span>
		</div>
	</div>
</div>