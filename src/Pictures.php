<?php
namespace classified;
class Pictures
{

    const PATH = "../img/";
    public $pics;

    public function __construct($pics)
    {
        $this->pics = $pics;
    }

    public function makeAdPictures()
    {
        $pictures = array();
        foreach($this->pics as $key=>$val)
        {
            for ($i = 1; $i < count($val) / 2 + 1; $i++) {
                $path = self::PATH . $key . '/' . $i;
                $size = getimagesize($path . 't.jpg');
                $pictures[$key][$i] = array('thumb' => $path . 't.jpg',
                    'fullPic' => $path . '.jpg',
                    'size' => $size[3]);
            }
        }

        return $pictures;
    }

}