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
        <input type="checkbox" id="theme" style="display:none;visibility:hidden;">
        <label for="hamburger" class="hamburger">
            <div class="line-1 line"></div>
            <div class="line-2 line"></div>
            <div class="line-3 line"></div>
        </label>
        <div class="nav__overlay">
            <a href="<?=url('/')?>" class="nav__overlay-link">home</a>
            <a href="<?=url('/itunes')?>" class="nav__overlay-link">itunes</a>
            <a href="<?=url('/support')?>" class="nav__overlay-link">support the show</a>
            <a href="<?=url('/patreons')?>" class="nav__overlay-link">patreons</a>
            <a href="<?=url('/archive')?>" class="nav__overlay-link">archive</a>
            <label for="theme" class="theme-btn">
                <div class="ball" <?php if (isset($_COOKIE['theme']) && $_COOKIE['theme'] == "dark") echo 'style="transform:translateX(35px);"'; ?>></div>
            </label>
        </div>
        <a href="<?=url('/')?>" class="nav__logo">Hello Internet</a>
        <div class="nav__links">
            <a href="<?=url('/')?>" class="nav__link">home</a>
            <a href="<?=url('/itunes')?>" class="nav__link">itunes</a>
            <a href="<?=url('/support')?>" class="nav__link">support the show</a>
            <a href="<?=url('/patreons')?>" class="nav__link">patreons</a>
            <a href="<?=url('/archive')?>" class="nav__link">archive</a>
        </div>
        <label for="theme" class="theme-btn theme-btn--in-nav">
            <div class="ball" <?php if (isset($_COOKIE['theme']) && $_COOKIE['theme'] == "dark") echo 'style="transform:translateX(35px);"'; ?>></div>
        </label>
    </nav>
    <main class="main">
        <?=$this->section('content') ?>
    </main>
    <aside class="aside">
        <div class="aside__logo">
            <svg viewBox="0 0 100px 100px">
                <path d="M10,10 10,90 30,90 30,60 40,60 40,90 60,90 60,10 40,10 40,40 30,40 30,10"></path>
                <path d="M70,10 70,90 90,90 90,10"></path>
            </svg>
        </div>
        <div class="aside__links">
            <a class="aside__link" target="_about" href="https://twitter.com/hellointernetfm">@HellointernetFM</a>
            <a href="https://www.youtube.com/channel/UCwez9XDNV_wS0WNDZteXjgw" target="_about" class="aside__link">Hello Internet YouTube</a>
            <a href="https://standard.tv/collections/hello-internet" target="_about" class="aside__link">New Merch!</a>
            <a href="http://www.cgpgrey.com/" target="_about" class="aside__link">CGP Grey</a>
            <a href="http://www.bradyharan.com/" target="_about" class="aside__link">Brady Haran</a>
        </div>
    </aside>
    <script src="/public/assets/js/theme.js"></script>
    <script src="/public/assets/js/inputs.js"></script>
    <script src="/public/assets/js/ajax.js"></script>
</body>
</html>
