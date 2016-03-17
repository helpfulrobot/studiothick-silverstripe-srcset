<?php

class ImageSrcSetExtension extends DataExtension
{
    /**
     * @config
     */
    private static $target_sizes = array(
                300, 800, 1024, 1280, 1600, 1920, 2560
            );


    function SrcSet() {
        $img = $this->owner;
        if($img->exists()) {
            $url = $img->getURL();
            $basew = $img->getWidth();

            $getsize = function($w) use ($img) {
                $w = floor($w);
                $url = $img->ScaleWidth($w)->getURL();
                return "$url {$w}w";
            };

            // generate some size options for this display
            $targets = Config::inst()->get('ImageSrcSetExtension', 'target_sizes');
            $sizes = array();
            for($i = 0; $i < sizeof($targets); ++$i) {
                $w = $targets[$i];
                if($w < $basew) {
                    $sizes[] = $getsize($w);
                }
            }

            // add the full size
            $sizes[] = "$url {$basew}w";

            return implode(", ", $sizes);
        } else {
            return '';       
        }
    }
}
