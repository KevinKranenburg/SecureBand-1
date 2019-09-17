<?php $this->layout('standard_layout') ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/public/assets/css/podcast.css">
<?php $this->stop('css') ?>

<?php $this->start('page_title') ?>
<?=htmlspecialchars($podcast['title'])?> - Hello Internet
<?php $this->stop('page_title') ?>

<div class="player">
	<div class="player__play">
		<svg class="play" viewBox="0 0 18 18">
			<path id="play" d="M0,0 18,9 0,18" />
			<path style="display:none" id="pause" d="M1,0 1,18 6,18 6,0 M12,0 12,18 17,18 17,0" />
			<path style="display:none" id="rewind" d="M 9.2744666,4.3583596 V 1.0752592 L 4.6551498,5.1791347 9.2744666,9.2830101 V 5.9999097 c 3.0487484,0 5.5431804,2.216093 5.5431804,4.9246513 0,2.708558 -2.494432,4.92465 -5.5431804,4.92465 -3.0487491,0 -5.5431803,-2.216092 -5.5431803,-4.92465 H 1.8835597 c 0,3.611409 3.3259081,6.5662 7.3909069,6.5662 4.0649984,0 7.3909064,-2.954791 7.3909064,-6.5662 0,-3.611411 -3.325908,-6.5662014 -7.3909064,-6.5662014 z" />
		</svg>
	</div>
	<div class="player__body">
		<div class="player__title-container">
			<span class="player__title"><?=htmlspecialchars($podcast['title'])?></span>
		</div>
		<div class="timer">
			<span id="currentTime">00:00</span> <span style="color:var(--secondary-text-color)">/</span> <span id="duration">00:00</span>
		</div>
		<div class="player__volume">
			<svg class="volume" viewBox="0 0 18 18">
				<path id="mute" d="M0,6 0,12 4,12 8,18 8,0 4,6" />
				<path id="v1" d="M10 3 C 10 2, 15 9, 10 15" />
				<path id="v2" d="M14 2 C 14 1, 19 9, 14 17" />
			</svg>
			<input class="volume-bar" type="range" oninput="changeVolume()" id="volume-bar" min="0" step="0.01" max="1" value="1">
		</div>
	</div>
</div>
<div class="about">
	<div class="about__title-container">
		<h1 class="about__podcast-title"><?=htmlspecialchars($podcast['title'])?></h1>
	</div>
	<div class="about__desc-container">
		<h2 class="about__title">Description</h2>
		<p class="about__desc"><?=htmlspecialchars($podcast['description'])?></p>
	</div>
	<div class="about__sponsors">
		<h2 class="about__title">Sponsors</h2>
		<div class="container">
			<?php foreach($sponsors as $sponsor): ?>
				<a href="<?=$sponsor['link']?>" target="_about" class="text-link"><?=htmlspecialchars($sponsor['text'])?></a>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="about__notes">
		<h2 class="about__title">Notes</h2>
		<div class="container">
			<?php foreach($notes as $note): ?>
				<a href="<?=$note['link']?>" target="_about" class="text-link"><?=htmlspecialchars($note['text'])?></a>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<audio style="display:none;visibility:none;" id="audio" src="/assets/audio/<?=$podcast['id']?>.mp3"></audio>
<script src="/assets/js/player.js"></script>