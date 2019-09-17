<?php $this->layout('admin_layout') ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/public/assets/css/admin_index.css">
<?php $this->stop('css') ?>

<?php $this->start('page_title') ?>
Archive - Hello Internet
<?php $this->stop('page_title') ?>

<?php $error[1] ? require __DIR__.'/../../includes/error.php' : "" ?>

<div class="podcasts">
	<?php 
	if (!$podcasts) echo "No podcasts found.";
	else foreach($podcasts as $podcast): ?>
	<div class="podcast">
		<a href="<?=url('/podcast/'.$podcast['id'])?>" class="podcast__title"><?=htmlspecialchars($podcast['title'])?></a>
		<span class="podcast__author">Hello Internet</span>
		<p class="podcast__desc"><?=htmlspecialchars($podcast['description'])?></p>
		<div class="podcast__footer">
			<span class="podcast__footer__time">00:00</span> <span style="color:var(--secondary-text-color)">•</span> <span class="podcast__footer__date"><?=date('F d, Y', strtotime($podcast['date']))?></span>
		</div>
	</div>
	<?php endforeach; ?>
</div>