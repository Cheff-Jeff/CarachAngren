<?php
function GetShows($host)
{
    $page = 1;
    $ShowItems = array();
    $categorys = array();

    do{
        $linkShows = $host."wordpress/wp-json/wp/v2/shows?per_page=100&page=".$page;
        if (!$dataPrepShows = @file_get_contents($linkShows)) { 
            break;
        }
        $ShowsDatas = json_decode($dataPrepShows, true);
        $page++;

        foreach($ShowsDatas as $ShowsData){
            if(!empty($ShowsData['acf']['date'])){
                $showDate = $ShowsData['acf']['date'];
            }else{
                $showDate = "";
            }
            if(!empty($ShowsData['acf']['time'])){
                $showTime = $ShowsData['acf']['time'];
            }else{
                $showTime = "";
            }
            if(!empty($ShowsData['acf']['city'])){
                $showCity = $ShowsData['acf']['city'];
            }else{
                $showCity = "";
            }
            if(!empty($ShowsData['acf']['venue_name'])){
                $showVenue = $ShowsData['acf']['venue_name'];
            }else{
                $showVenue = "";
            }
            if(!empty($ShowsData['acf']['venue_link'])){
                $showVenueLink = $ShowsData['acf']['venue_link'];
            }else{
                $showVenueLink = "";
            }
            if(!empty($ShowsData['acf']['country'])){
                $showCountry = $ShowsData['acf']['country'];
            }else{
                $showCountry = "";
            }
            if(!empty($ShowsData['acf']['more_info'])){
                $showMore = $ShowsData['acf']['more_info'];
            }else{
                $showMore = "";
            }
            if(!empty($ShowsData['acf']['tickets_link'])){
                $showTickets = $ShowsData['acf']['tickets_link'];
            }else{
                $showTickets = "";
            }
            if(!empty($ShowsData['categoryName'])){
                $category = $ShowsData['categoryName'][0]['name'];
            }else{
                $category = "";
            }

            $ShowItems[$ShowsData['slug']] = [
                'data'          => $showDate,
                'time'          => $showTime,
                'city'          => $showCity,
                'venue'         => $showVenue, 
                'showVenueLink' => $showVenueLink,
                'country'       => $showCountry,
                'showMore'      => $showMore,
                'tickets'       => $showTickets,
                'category'      => $category
            ];
            if($category != ""){
                $categorys[$category] = [
                    'category'  => $category
                ];
            }
        }
    }while($dataPrepShows == true);
    
    $_SESSION['Shows'] = $ShowItems;
    $_SESSION['Categorys'] = $categorys;
}