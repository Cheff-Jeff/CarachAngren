<?php
    include($root."/Recources/PHP/Api/footer.api.php");
    if(!empty($_SESSION['footer'])){
        $footerTxt = $_SESSION['footer'];
    }
    else{
        GetFooter($host);
        $footerTxt = $_SESSION['footer'];   
    }
?>
<footer>
    <section id="contact" class="Contact section overTopImg">
        <div class="container">
            <div class="row">
                <div class="title-line-wrapper inner text-center">
                    <div class="inner inner2">
                        <h5><?=$footerTxt['contact']['Title']?></h5>
                        <?=$footerTxt['contact']['content']?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach($contacts as $contact): ?>
                    <div class="col-lg-4 col-md-6 contactInfo">
                        <div class="wrap">
                            <div class="title text-center">
                                <p><?= $contact['title']['rendered'] ?></p>
                            </div>
                            <div class="content text-center">
                                <?= $contact['content']['rendered'] ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
    <section id="socials" class="Socials overTopImg">
        <div class="container">
            <div class="row">
                <div class="title-line-wrapper inner text-center">
                    <div class="inner inner2">
                        <h6><?=$footerTxt['socials']['Title']?></h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="socials-inner">
                        <?php foreach($socials as $social): ?>
                            <a href="<?= strip_tags($social['content']['rendered']) ?>" target="_blank">
                                <?= $social['acf']['fontawesome'] ?>
                            </a>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>
<div class="copy overTopImg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="copy-inner">
                    <span>© 2020 Carach Angren All Rights Reserved - </span>
                    <span>Website realization by <a href="https://cheffjeff.nl" target="_black">CheffJeff.nl</a></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="overlay"></div>
</body>
    <!-- jquery -->
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- end jquery -->
    <script src="/Recources/JSmini/main.min.js"></script>
    <?php if(!empty($JS)): ?>
        <script src="/Recources/JSmini/<?= $JS?>.min.js"></script>
    <?php endif ?>
    <!-- plugin's -->
    <?php if(!empty($plugin)): ?>
        <script src="/Recources/JS/<?=$plugin?>" type="text/javascript"></script>
    <?php endif ?>
</html>