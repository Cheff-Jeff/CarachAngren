<?php
if(!function_exists('getData')){
    include_once($root."/src/php/functions/dataLoader.php");
}
$link = $api."contact_info";
$contacts = getData($link);

$link = $api."socials";
$socials = getData($link);

function GetFooter($host, $api, $root)
{
    $link = $api."footer";
    $FooterItems = getData($link);
    $footerTxts = array();

    for($i = 0; $i < count($FooterItems); $i++){
        switch ($FooterItems[$i]['slug']){
            case 'contact':
                $footerTxt = $FooterItems[$i]['title']['rendered'];
                $footerTxt2 = $FooterItems[$i]['content']['rendered'];
                $footerTxts['contact'] = [
                    'Title' => $footerTxt,
                    'content' => $footerTxt2
                ];
                break;
            case 'socials':
                $footerTxt3 = $FooterItems[$i]['title']['rendered'];
                $footerTxts['socials'] = [
                    'Title' => $footerTxt3
                ];
                break;
            default:
                break;
        }
    }

    $_SESSION['footer'] = $footerTxts;
}