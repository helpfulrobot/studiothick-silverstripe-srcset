<?php

class ImageSrcSetExtension extends DataExtension
{
    function SrcSetAttribute() {
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
            $sizes = array();
            for($i = 0; $i < 3; ++$i) {
                $w = $basew / ($i + 1);
                if($w < $basew) {
                    $sizes[] = $getsize($w);
                }
            }

            $sizes[] = "$url {$basew}w";

            $srcs = implode(", ", $sizes);
        }
    }

    function SrcSet() {
        $img = $this->owner;

        if($this->owner->exists()) {
            $url = $img->getURL();
            $srcs = $this->SrcSetAttribute();
            return "<img src='$url' srcset='$srcs' />";
        } else {
            return null;
        }
    }
}
