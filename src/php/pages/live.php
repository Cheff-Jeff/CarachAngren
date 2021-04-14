<?php
if(!function_exists('getData')){
    include_once($root."/src/php/functions/dataLoader.php");
}
$link = $api."live";
$data = getData($link);

for($i = 0; $i < count($data); $i++){
    switch ($data[$i]['slug']){
        case 'page-tile':
            $PageTitle = strip_tags($data[$i]['content']['rendered']);
            break;
        case 'page-description':
            $pageDescription = strip_tags($data[$i]['content']['rendered']);
            break;
        case 'live':
            $txt1 = $data[$i]['title']['rendered'];
            break;
        case 'no-shows':
            $txtNoShow = $data[$i]['content']['rendered'];
            break;
        default:
            break;
    }
}

$link = $api."categories";
$categories = getData($link);

//Dev
include_once($root."/src/php/functions/getShows.php");
GetShows($host, $api, $root);
 
$Shows = $_SESSION['Shows'];   
$categorys = $_SESSION['Categorys'];

//Live
// if(!empty($_SESSION['Shows'])){
//     $Shows = $_SESSION['Shows'];
//     $categorys = $_SESSION['Categorys'];
// }
// else{
//     include_once($root."/src/php/functions/getShows.php");
//     GetShows($host, $api, $root);
//     $Shows = $_SESSION['Shows'];   
//     $categorys = $_SESSION['Categorys'];    
// }