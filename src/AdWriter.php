<?php
namespace classified;
class AdWriter
{
    /**
     * @param $ad
     */
    public function writeHtml($ad)
    {

        echo '<div>';
        echo <<<ad
    <h2>$ad->type</h2>
    <p><strong>$ad->teaser</strong><br>
    $ad->description</p>
    <p>$ad->price</p>
ad;
        /** @var ClassifiedAd $ */
        echo "<p>{$ad->makeContactInfo()}</p>";
        $this->writePictureHtml($ad->pics, $ad->teaser);
        echo '</div>';

    }

    public function writePictureHtml($pics, $teaser)
    {
        if ($pics !== null){
            foreach($pics as $pic)
            {
                echo <<<PIC
<a href="$pic[fullPic]"><img src="$pic[thumb]" alt="$teaser" $pic[size]></a>&nbsp;
PIC;

            }
        }
    }

}