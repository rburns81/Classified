<?php
/**
 * Created by PhpStorm.
 * User: Richard
 * Date: 3/24/2015
 * Time: 5:52 PM
 * This page is for showing ads to end users
 */
require '../vendor/autoload.php';

$adBook = new classified\AdsBook();
$data = $adBook->fetchAllAds();
$pics = $adBook->fetchAllPics($data);

$ads = $adBook->makeAds($data, $pics);
$adWriter = new classified\AdWriter();

include 'header.php';
foreach ($ads as $ad){
    $adWriter->writeHtml($ad);
}
include 'footer.php';