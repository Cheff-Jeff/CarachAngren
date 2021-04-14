<?php 
    $Page = "Home";
    $CSS = "home";
    $JS = $CSS;
    if(is_null($root)){
        include('../config.php');
    }
    include($root. "/src/php/pages/index.php");
    include($root."/pages/templates/top.php");
?>
<section class="home section overTopImg" id="home">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="inner">
                    <div class="img-wrapper">
                        <img src="<?=$Logo?>" alt="logo">
                    </div>
                    <div class="content">
                        <?=$txt1?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="Band-wrap">
    <div class="background">
        <div id="bannerImg" class="img BandMemberImgJS" style="background-image: url('<?= $img1 ?>');">
        </div>
    </div>
    <div id="band" class="content section overTopImg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title-line-wrapper inner text-center">
                        <div class="inner inner2 title">
                            <h1><?=$txt2?></h1>
                            <?=$txt3?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php foreach($members as $member): ?>
                    <div class="col-lg-4 col-md-6 member-wrap">
                        <div class="img-wrapper">
                            <img src="<?= $member['imageURL']['large']; ?>">
                        </div>
                        <div class="name text-center">
                            <?= $member['title']['rendered'] ?>
                        </div>
                        <div class="info text-center">
                            <?= $member['content']['rendered'] ?>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>

<section id="releases" class="Releases section overTopImg">
    <div class="container">
        <div class="row">
            <div class="title-line-wrapper">
                <div class="inner">
                    <h2><?=$txt4?></h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php foreach($releases as $releas): ?>
                <div class="col-lg-4 col-md-6 releas-wrap">
                    <div class="img-wrap">
                        <img src="<?= $releas['imageURL']['large']; ?>">
                    </div>
                    <div class="info-wrap">
                        <div class="inner">
                            <div class="name text-center">
                                <?= $releas['title']['rendered'] ?>
                            </div>
                            <div class="date text-center">
                                <?= $releas['acf']['releases_date'] ?>
                            </div>
                            <div class="details">
                                <?= $releas['content']['rendered'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>

<section id="releas-popup">
    <div class="popUp-container">
        <div id="PopBox" class="wrapper">
            <div class="close-popup">
            <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="times-circle" class="svg-inline--fa fa-times-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path></svg>
            </div>
            <div class="inner-img">
                <img src="">
            </div>
            <div class="inner-name">
                <p></p>
                <span></span>
            </div>
            <div class="inner-details">
            </div>
        </div>
    </div>
</section>

<section class="overlay">
</section>

<section class="Shop">
    <div class="background">
        <div class="img newAlbumImgJS" style="background-image: url('<?= $img2 ?>');"></div>
    </div>
    <div id="shop" class="content section overTopImg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title-line-wrapper inner text-center">
                        <div class="inner inner2">
                            <h3><?= $txt5 ?></h3>
                            <?=$txt6?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="videos" class="Videos section overTopImg">
    <div class="container">
        <div class="row">
            <div class="title-line-wrapper">
                <div class="inner">
                    <h4><?=$txt7?></h4>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center mt-md-5">
            <?php foreach($videos as $video): ?>
                <div class="col-lg-6 col-md-12">
                    <p class="video-title text-center">
                        <?= $video['title']['rendered'] ?>
                    </p>
                    <div class="video">
                        <?= $video['content']['rendered'] ?>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
<?php 
    include($root."/pages/templates/bottom.php")
?>