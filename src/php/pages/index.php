<?php
if(!function_exists('getData')){
    include_once($root."/src/php/functions/dataLoader.php");
}
$link = $api."home";
$data = getData($link);

for($i = 0; $i < count($data); $i++){
    switch ($data[$i]['slug']){
        case 'page-tile':
            $PageTitle = strip_tags($data[$i]['content']['rendered']);
            break;
        case 'page-description':
            $pageDescription = strip_tags($data[$i]['content']['rendered']);
            break;
        case 'carach-angren':
            $txt1 = $data[$i]['content']['rendered'];
            $Logo = $data[$i]['imageURL']['large'];
            break;
        case 'band':
            $txt2 = $data[$i]['title']['rendered'];
            $txt3 = $data[$i]['content']['rendered'];
            $img1 = $data[$i]['imageURL']['large'];
            break;
        case 'releases':
            $txt4 = $data[$i]['title']['rendered'];
            break;
        case 'haunted-stuff':
            $txt5 = $data[$i]['title']['rendered'];
            $txt6 = $data[$i]['content']['rendered'];
            $img2 = $data[$i]['imageURL']['large'];
            break;
        case 'videos':
            $txt7 = $data[$i]['title']['rendered'];
            break;
        case 'contact':
            $txt8 = $data[$i]['title']['rendered'];
            $txt9 = $data[$i]['content']['rendered'];
            break;
        case 'socials':
            $txt10 = $data[$i]['title']['rendered'];
            break;
        default:
            break;
    }
}

$link = $api."members";
$members = getData($link);

$link = $api."releases";
$releases = getData($link);

$link = $api."videos";
$videos = getData($link);