<?php
$link5 = $host."wordpress/wp-json/wp/v2/contact_info";
$dataPrep = file_get_contents($link5);
$contacts = json_decode($dataPrep,true);

$link6 = $host."wordpress/wp-json/wp/v2/socials";
$dataPrep = file_get_contents($link6);
$socials = json_decode($dataPrep,true);

function GetFooter($host)
{
    $linkFooter = $host."wordpress/wp-json/wp/v2/footer";
    $dataPrep = file_get_contents($linkFooter);
    $FooterItems = json_decode($dataPrep, true);
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