<?php
if (!isset($_COOKIE['theme'])) setcookie("theme", "light");
?>
<!doctype html>
<html lang="en" data-theme="<?php if (isset($_COOKIE['theme'])) echo htmlspecialchars($_COOKIE['theme']); else echo "light"; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#343434">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <?=$this->section('css')?>

    <title><?=$this->section('page_title', 'Hello Internet')?></title>
</head>
<body>
    <nav class="nav">
        <input type="checkbox" id="hamburger" style="display:none;visibility:hidden;">
        <label for="hamburger" class="hamburger">
            <div class="line-1 line"></div>
            <div class="line-2 line"></div>
            <div class="line-3 line"></div>
        </label>
        <div class="nav__overlay">
			<a href="<?=url('/')?>" class="nav__overlay-link">Back to site</a>
			<a href="<?=url('/admin/')?>" class="nav__overlay-link">Archive</a>
			<a href="<?=url('/admin/patreons')?>" class="nav__overlay-link">Patreons</a>
			<a href="<?=url('/admin/upload')?>" class="nav__overlay-link">Upload</a>
            <?php if (loggedIn()): ?><a href="<?=url('/admin/logout')?>" class="nav__overlay-link">Logout</a><?php endif; ?>
        </div>
        <div class="nav__links">
			<a href="<?=url('/')?>" class="nav__link">Back to site</a>
			<a href="<?=url('/admin/')?>" class="nav__link">Archive</a>
			<a href="<?=url('/admin/patreons')?>" class="nav__link">Patreons</a>
			<a href="<?=url('/admin/upload')?>" class="nav__link">Upload</a>
            <?php if (loggedIn()): ?><a href="<?=url('/admin/logout')?>" class="nav__link">Logout</a><?php endif; ?>
        </div>
    </nav>
    <main class="main">
        <?=$this->section('content') ?>
    </main>
    <script src="/public/assets/js/inputs.js"></script>
</body>
</html>
