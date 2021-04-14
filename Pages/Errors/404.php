<?php 
    $Page = "404";
    $CSS = "404";
    $JS = $CSS;
    if(is_null($root)){
        include('../../config.php');
    }
    include($root. "/src/php/pages/errors/404.php");
    include($root."/pages/templates/top.php");
?>
<section class="errorWrapper">
    <div class="background">
        <img src="<?=$img1?>" alt="Background">
    </div>
    <div class="content">
        <div class="inner">
            <h1><?=$txt1?></h1>
            <?=$txt2?>
        </div>
    </div>
</section>
<?php 
    include($root."/pages/templates/bottom.php")
?>