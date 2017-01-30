<?php

/**
 * *  if ($folder->getPhoto()) {
 * ***  $file = sfConfig::get('sf_web_dir') . '/images/file/' . $folder->getPhoto();
 * ***  $thumbfile = sfConfig::get('sf_web_dir') . '/images/file/' . $folder->getPhoto();

 * ***  $thumb = new ThumbnailEntity($file, $thumbfile);
 * ***  $thumb->pasteThumb();
 * *  }
 */
class ThumbnailEntity
{

    private $image;
    private $quality = 100;
    private $mimetype;
    private $imageproperties = array();
    private $initialfilesize;
    private $thumbfile;

    public function __construct($file, $thumbfile, $thumbnailsize = 220, $thumbnailsize_height = 0)
    {
        ini_set('memory_limit', '100M');
        @set_time_limit(5 * 60);

        $this->thumbfile = $thumbfile;
        //check file	
        is_file($file) or die("File: $file doesn't exist.");

        $this->initialfilesize = filesize($file);
        $this->imageproperties = getimagesize($file) or die("Incorrect file_type.");

        // new function image_type_to_mime_type
        $this->mimetype = image_type_to_mime_type($this->imageproperties[2]);

        //create image
        switch ($this->imageproperties[2]) {
            case IMAGETYPE_JPEG:
                $this->image = imagecreatefromjpeg($file);
                break;
            case IMAGETYPE_GIF:
                $this->image = imagecreatefromgif($file);
                break;
            case IMAGETYPE_PNG:
                $this->image = imagecreatefrompng($file);
                break;
            default: die("Couldn't create image.");
        }
        if ($thumbnailsize_height != 0)
            $this->createThumbCustom($thumbnailsize, $thumbnailsize_height);
        else
            $this->createThumb($thumbnailsize);
    }

    private function createThumb($thumbnailsize)
    {
        //array elements for width and height
        $srcW = $this->imageproperties[0];
        $srcH = $this->imageproperties[1];

        //only adjust if larger than max
        if ($srcW > $thumbnailsize || $srcH > $thumbnailsize) {
            $reduction = $this->calculateReduction($thumbnailsize);
            //get proportions
            $desW = $srcW / $reduction;
            $desH = $srcH / $reduction;

            $copy = imagecreatetruecolor($desW, $desH);
            imagecopyresampled($copy, $this->image, 0, 0, 0, 0, $desW, $desH, $srcW, $srcH)
                    or die("Image copy failed.");
            //destroy original
            imagedestroy($this->image);
            $this->image = $copy;
        }
    }

    private function createThumbCustom($thumbnailsize, $thumbnailsize_height)
    {
        //array elements for width and height
        $srcW = $this->imageproperties[0];
        $srcH = $this->imageproperties[1];

        $newWidth = 0;
        $newHeight = 0;
        $x = 0;
        $y = 0;

        //only adjust if larger than max
        if ($srcW > $thumbnailsize && $srcH > $thumbnailsize_height) {
            // thumnail hiih bolomjtoi hemjeeg avi
            for ($i = 1; $i <= 100; $i++) {
                $newWidth = round($srcW * ($i / 100));
                $newHeight = round($srcH * ($i / 100));

                if ($thumbnailsize <= $newWidth && $thumbnailsize_height <= $newHeight) {

                    $zWidth = $newWidth - $thumbnailsize;
                    $zHeight = $newHeight - $thumbnailsize_height;

                    $x = floor($zWidth / 2);
                    $y = floor($zHeight / 2);

                    break;
                }
            }
            $copy = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresampled($copy, $this->image, 0, 0, 0, 0, $newWidth, $newWidth, $srcW, $srcH)
                    or die("Image copy failed.");
            //destroy original
            imagedestroy($this->image);
            $this->image = $copy;

            // crop hiine
            $copy = imagecreatetruecolor($thumbnailsize, $thumbnailsize_height);
            imagecopyresampled($copy, $this->image, 0, 0, $x, $y, $newWidth, $newHeight, $newWidth, $newHeight)
                    or die("Image copy failed.");
            //destroy original
            imagedestroy($this->image);
            $this->image = $copy;
        }
    }

    public function pasteThumb()
    {
        switch ($this->imageproperties[2]) {
            case IMAGETYPE_JPEG:
                imagejpeg($this->image, $this->thumbfile, $this->quality);
                break;
            case IMAGETYPE_GIF:
                imagegif($this->image, $this->thumbfile);
                break;
            case IMAGETYPE_PNG:
                imagepng($this->image, $this->thumbfile);
                break;
            default: die("Couldn't create image.");
        }
    }

    private function calculateReduction($thumbnailsize)
    {
        $srcW = $this->imageproperties[0];
        $srcH = $this->imageproperties[1];

        //adjust
        if ($srcW < $srcH) {
            $reduction = round($srcH / $thumbnailsize);
        } else {
            $reduction = round($srcW / $thumbnailsize);
        }
        return $reduction;
    }

    public function getImage()
    {
        header("Content-type: $this->mimetype");
        switch ($this->imageproperties[2]) {
            case IMAGETYPE_JPEG:
                imagejpeg($this->image, $this->thumbfile, $this->quality);
                break;
            case IMAGETYPE_GIF:
                imagegif($this->image, $this->thumbfile);
                break;
            case IMAGETYPE_PNG:
                imagepng($this->image, $this->thumbfile, $this->quality);
                break;
            default: die("Couldn't create image.");
        }
    }

    public function __destruct()
    {
        if (isset($this->image)) {
            imagedestroy($this->image);
        }
    }

    public function setQuality($quality)
    {
        if ($quality > 100 || $quality < 1) {
            $quality = 75;
            if ($this->imageproperties[2] == IMAGETYPE_JPEG ||
                    $this->imageproperties[2] == IMAGETYPE_PNG) {
                $this->quality = $quality;
            }
        }
    }

    public function getQuality()
    {
        $quality = null;

        if ($this->imageproperties[2] == IMAGETYPE_JPEG ||
                $this->imageproperties[2] == IMAGETYPE_PNG) {
            $quality = $this->quality;
        }
        return $quality;
    }

    public function getMimeType()
    {
        return $this->mimetype;
    }

    public function getInitialFileSize()
    {
        return $this->initialfilesize;
    }

}

?>