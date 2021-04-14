<?php
    if(!empty($_SESSION['menu'])){
        $menuItems = $_SESSION['menu'];
    }
    else{
        include($root."/src/php/functions/getMenu.php");
        GetMenu($host, $api, $root);
        $menuItems = $_SESSION['menu'];
    }
    if(!empty($_SESSION['subMenu'])){
        $subMenuItems = $_SESSION['subMenu'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- styles -->
    <link rel="stylesheet" href="/dist/style/<?=$CSS?>.css">
    <!-- end styles -->
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- end bootstrap -->
    <!-- fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Gentium+Basic:wght@400;700&display=swap" rel="stylesheet">
    <!-- end fonts -->
    <!-- recaptcha api -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- end recaptcha api -->
    <!-- icons -->
    <!-- Facebook -->
    <meta property="og:title" content="cheffjeff.nl">
    <meta property="og:image" content="/src/img/meta/1200x630.png">
    <meta property="og:image:type" content="image/png">
    <!-- endFacebook -->
    <link rel="icon" href="/src/img/meta/32x32.png" sizes="32x32">
    <link rel="icon" href="/src/img/meta/192x192.png" sizes="192x192">
    <link rel="shortcut icon" type="image/x-icon" href="/src/img/meta/64x64.png" />
    <link rel="apple-touch-icon-precomposed" href="/src/img/meta/180x180.png">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <meta name="msapplication-TileImage" content="/src/img/meta/270x270.png">
    <link href="/src/img/meta/120x120.png" rel="apple-touch-icon" />
    <link href="/src/img/meta/152x152.png" rel="apple-touch-icon" sizes="152x152" />
    <link href="/src/img/meta/76x76.png" rel="apple-touch-icon" sizes="76x76" />
    <link href="/src/img/meta/120x120.png" rel="apple-touch-icon" sizes="120x120" />
    <link href="/src/img/meta/310x480.png" rel="apple-touch-startup-image" />
    <meta name="msapplication-square70x70logo" content="/src/img/meta/70x70.png" />
    <meta name="msapplication-square150x150logo" content="/src/img/meta/150x150.png" />
    <meta name="msapplication-wide310x150logo" content="/src/img/meta/310x150.png" />
    <meta name="msapplication-square310x310logo" content="/src/img/meta/310x310.png" />
    <!-- end icons -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-touch-fullscreen" content="yes" />
    <meta name="theme-color" content="#000">
    <meta name="apple-mobile-web-app-status-bar-style" content="#0a0a0a" />
    <meta name="description" content="<?= $pageDescription ?>">
    <title><?= $PageTitle ?></title>
</head>
<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="mobile-head">
                    <div class="logo-wraper">
                        <a href="/">
                            <img src="/src/img/logo.png" alt="logo">
                        </a>
                    </div>
                    <div class="hamburger-menu">
                        <div class="hamburger">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
                <nav class="mainNav">
                    <ul>
                        <li class="logo">
                            <div class="logo-wrapper">
                                <a href="/">
                                    <img src="/src/img/logo.png" alt="logo">
                                </a>
                            </div>
                        </li>
                        <?php foreach($menuItems as $menuItem): ?>
                            <?php if($menuItem['parent'] == null): ?>
                                <li class="MenuItem <?php if($Page == $menuItem['Name']){echo "active";} ?>">
                                    <a href="<?=$menuItem['Link']?>">
                                        <span><?=$menuItem['Name']?></span>
                                    </a>
                                    <?php if(isset($subMenuItems) && $menuItem['hasChild'] == 1): ?>
                                        <ul>
                                            <?php foreach($subMenuItems as $subMenuItem): ?>
                                                <?php if($subMenuItem['parent'] == $menuItem['Name']): ?>
                                                    <li>
                                                        <a href="<?=$subMenuItem['Link']?>">
                                                            <span><?=$subMenuItem['Name']?></span>
                                                        </a>
                                                    </li>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </ul>
                                    <?php endif ?>
                                </li>
                            <?php endif ?>
                        <?php endforeach ?>
                    </ul>
                </nav>
                <div class="header-overlay">
                </div>
            </div>
        </div>
    </div>
</header>
<body>