<?php 
    $Page = "Live";
    $CSS = "live";
    $JS = $CSS;
    if(is_null($root)){
        include('../config.php');
    }
    include($root. "/src/php/api/live.api.php");
    include($root."/pages/templates/top.php");
?>
<section class="Live">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title">
                    <h1><?=$txt1?></h1>
                </div>
            </div>
        </div>
        <div class="filter">
            <a class="btn-filter" id="All">All</a>
            <a class="btn-filter" id="Past">Past</a>
            <a class="btn-filter active" id="Upcoming">Upcomming</a>
        </div>
        <div class="shows">
            <?php $upcomming = 0; ?>
            <?php foreach($Shows as $Show): ?>
                <div class="row Show <?=$Show['category']?> <?php if($Show['category'] == 'Past'){ echo "hide"; }else{$upcomming++;} ?>">
                    <div class="col-lg-2 order-lg-1 col-md-6 order-md-1 col-12 order-1 date">
                        <div class="innerDate">
                            <p><?=$Show['data']?></p>
                            <p><?=$Show['time']?></p>
                        </div>
                    </div>
                    <div class="col-lg-2 order-lg-2 col-md-3 order-md-4 col-12 order-3 venue">
                        <div class="innerVenue">
                            <?php if($Show['showVenueLink'] == ""): ?>
                                <p><?=$Show['venue']?></p>
                            <?php else: ?>
                                <a href="<?=$Show['showVenueLink']?>" target="_blank">
                                    <span><?=$Show['venue']?></span> 
                                </a>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="col-lg-2 order-lg-3 col-md-3 order-md-3 col-12 order-2 country">
                        <div class="innerCountry">
                            <p><?=$Show['city']?>,</p>
                            <p><?=$Show['country']?></p>
                        </div>
                    </div>
                    <div class="col-lg-3 order-lg-4 col-md-6 order-md-5 col-12 order-5 info">
                        <div class="innerInfo">
                            <?php if($Show['showMore'] != ''): ?>
                                <a href="<?=$Show['showMore']?>" target="_blank" class="button">
                                    <p>More information</p>
                                </a>
                            <?php else: ?>
                                <p>No more information available.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-3 order-lg-5 col-md-6 order-md-2 col-12 order-4 tickets">
                        <div class="innerTickets">
                            <?php if($Show['tickets'] != ''): ?>
                                <a href="<?=$Show['tickets']?>" target="_blank" class="button">
                                    <span>Tickets</span>
                                </a>
                            <?php else: ?>
                                <p>No tickets available.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            <?php if($upcomming == 0): ?>
                <div class="row Show showTxt Upcoming">
                    <div class="col-12">
                        <div class="noShow">
                            <p>There are no Upcomming live shows yet. Come back another time.</p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="loadingWrap">
                    <a href="#" class="more btnLoading">Load more</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
    include($root."/Pages/Templates/bottom.php")
?>