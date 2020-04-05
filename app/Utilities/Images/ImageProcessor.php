<?php

namespace App\Utilities\Images;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class ImageProcessor
{
    static $AVATAR_PATH  = 'avatars';
    static $COVER_IMAGE_PATH  = 'cover_images';
    static $TRIX_IMAGES  = 'trix';
    /**
     * Resize images and save them to specified path
     *
     * @param File $file The file from the request
     * @param String $name The file from the request
     * @param Int $width new width
     * @param Int $height New image height
     * @param String $path Directory image should be saved
     * @param File $file The file from the request
     * @return $save_path
     **/
    public function resize($file, $name, $width, $height, $path)
    {
        $resize_image = Image::make($file->getRealPath());
        $resize_image->resize($width, $height);
        $save_path = $path . $name . $this->extension($resize_image->mime());
        $resize_image->save(storage_path('app/public/' . $save_path));
        return env('APP_URL') . '/' . $save_path;
    }

    protected function extension($mime)
    {
        if ($mime == 'image/jpeg')
            $extension = '.jpg';
        elseif ($mime == 'image/png')
            $extension = '.png';
        else
            $extension = '';

        return $extension;
    }
}
