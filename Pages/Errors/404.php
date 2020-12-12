<?php 
    $Page = "404";
    $CSS = "404";
    include('../../config.php');
    include($root. "/Recources/PHP/Api/404.api.php");
    include($root."/Pages/Templates/top.php");
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
    include($root."/Pages/Templates/bottom.php")
?>