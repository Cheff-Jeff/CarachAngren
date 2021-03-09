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
    <div class="scrollTop hidden">
        <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="arrow-alt-circle-up" class="svg-inline--fa fa-arrow-alt-circle-up fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor" d="M256 504c137 0 248-111 248-248S393 8 256 8 8 119 8 256s111 248 248 248zm0-448c110.5 0 200 89.5 200 200s-89.5 200-200 200S56 366.5 56 256 145.5 56 256 56zm20 328h-40c-6.6 0-12-5.4-12-12V256h-67c-10.7 0-16-12.9-8.5-20.5l99-99c4.7-4.7 12.3-4.7 17 0l99 99c7.6 7.6 2.2 20.5-8.5 20.5h-67v116c0 6.6-5.4 12-12 12z">
            </path>
        </svg>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title">
                    <h1><?=$txt1?></h1>
                </div>
            </div>
        </div>
        <div id="topLocation" class="filter">
            <a class="btn-filter" id="All">All</a>
            <?php foreach($categories as $category): ?>
                <?php if($category['name'] != 'Uncategorized'): ?>
                    <a class="btn-filter <?php if($category['name'] == 'Upcoming'){echo 'active';} ?>" id="<?=$category['name']?>"><?=$category['name']?></a>
                <?php endif; ?>
            <?php endforeach; ?>
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
                            <p><?=$txtNoShow?></p>
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
    include($root."/pages/templates/bottom.php")
?>