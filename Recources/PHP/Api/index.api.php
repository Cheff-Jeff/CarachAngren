<?php
$link = $host."/wordpress/wp-json/wp/v2/home";
$dataPrep = file_get_contents($link);
$data = json_decode($dataPrep, true);

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

$link2 = $host."wordpress/wp-json/wp/v2/members";
$dataPrep = file_get_contents($link2);
$members = json_decode($dataPrep,true);

$link3 = $host."wordpress/wp-json/wp/v2/releases";
$dataPrep = file_get_contents($link3);
$releases = json_decode($dataPrep,true);

$link4 = $host."wordpress/wp-json/wp/v2/videos";
$dataPrep = file_get_contents($link4);
$videos = json_decode($dataPrep,true);