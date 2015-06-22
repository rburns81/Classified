<?php
namespace classified;
class AdsBook
{

    public function fetchAllAds()
    {
        $data = new DataFetcher();
        $ads = $data->fetchData();
        return $ads;
    }

    public function fetchAllPics($ads)
    {
        $data = new DataFetcher();
        $picData = $data->fetchPictures($ads);
        $pictures = new Pictures($picData);
        $pics = $pictures->makeAdPictures();
        return $pics;
    }

    public function makeAds($ads,$pics)
    {
        $finalAds = array();
        foreach($ads as $ad)
        {
            $pics[$ad['Id']] = empty($pics[$ad['Id']]) ? null : $pics[$ad['Id']];
            $finalAds[] = new ClassifiedAd($ad['Id'],$ad['Type'],$ad['Teaser'],$ad['Description'], $ad['Price'],
                $ad['AdOwner'], $ad['Contact1'],$ad['Contact2'], $pics[$ad['Id']]);
        }
        return $finalAds;
    }
}