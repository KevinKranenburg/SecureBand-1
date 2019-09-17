<?php $this->layout('admin_layout') ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/public/assets/css/admin_index.css">
<?php $this->stop('css') ?>

<?php $this->start('page_title') ?>
Upload - Hello Internet
<?php $this->stop('page_title') ?>

<?php $error[1] ? require __DIR__.'/../../includes/error.php' : "" ?>

<form method="POST" enctype="multipart/form-data">
	<div class="input-container">
		<input type="text" name="title" id="title" class="input">
		<label for="title">Title</label>
	</div>
	<div class="input-container textarea-container">
		<textarea type="text" name="description" id="description" class="input textarea"></textarea>
		<label for="description">Description</label>
	</div>
	<div class="input-container textarea-container">
		<textarea type="text" name="sponsors" id="sponsors" class="input textarea"></textarea>
		<label for="sponsors">Sponsors (title;link, etc)</label>
	</div>
	<div class="input-container textarea-container">
		<textarea type="text" name="notes" id="notes" class="input textarea"></textarea>
		<label for="notes">Notes (title;link, etc)</label>
	</div>
	<div style="margin-bottom:40px;display:flex;flex-direction:column;">
		<span>Podcast Audio File</span>
		<input type="file" name="file" id="file" accept="audio/*">
	</div>
	<button type="submit" name="submit">Upload</button>
</form>