<?php

namespace App\ServiceUpdateFiles;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Config;
use Intervention\Image\Size;

// use Intervention\Image\Facades\Image;

class UpdateImage
{
    public static function CoverImageUser($urlFile)
    {
        $img = Image::make('.' . $urlFile);
        $size = config::get('image.user.size');
        //size setup in config image.php
        $img->fit($size);
        $img->save();
    }
    public static function UpdateImageUser($file, $username)
    {
        if ($file) {
            $fileName = $username . '-' . getDate()['mday'] . getDate()['month'] . getDate()['year'] . '-' . getDate()['hours'] . getDate()['seconds'] . '.png';
            $path = $file->storeAs('image/user', $fileName, 'public');
            $path = Storage::url($path);
            self::CoverImageUser($path);
            return $path;
        }
        return $path = '/storage/image/user/default-avatar.png';
    }
    public static function CoverImagePost($urlFile, $type)
    {
        $urlFile = 'storage/' . $urlFile;

        if ($type == 'thumbnail') {
            $img = Image::make($urlFile);
            $width = config::get('image.post.thumbnail.width');
            $height = config::get('image.post.thumbnail.height');
            $img->resize($width, $height)->save();
        } elseif ($type == 'label') {
            $img = Image::make($urlFile);
            $size = config::get('image.post.label.size');
            $img->fit($size)->save();
        }
    }
    public static function UpdateImagePost($file, $titlePost)
    {
        if ($file) {
            $fileName = $titlePost . '-' . getDate()['mday'] . getDate()['month'] . getDate()['year'] . '.png';
            //lưu 2 ảnh .
            //image/post/thumbnail lưu ảnh lớn .
            // image/post/label  lưu ảnh nhỏ.
            $pathThumbnail = $file->storeAs('image/post/thumbnail', $fileName, 'public');
            $pathLabel = $file->storeAs('image/post/label', $fileName, 'public');
            self::CoverImagePost($pathThumbnail, $type = 'thumbnail');
            self::CoverImagePost($pathLabel, $type = 'label');

            return '/storage/' . $pathLabel;
        }
        return $pathLabel = '/storage/image/post/label/default-post.png';
    }
}
