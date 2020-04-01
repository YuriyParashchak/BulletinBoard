<?php


namespace App\Custom;


use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class StorageSaveImage
{

    static function saveImageStorage($file, $patch='image', $with = 230, $height = 280)
    {
        $fileName = $file->getClientOriginalName();
        $path = storage_path('app/public/' . $patch . '/' . $fileName);
        $resizedImage = Image::make($file->getRealPath())->resize($with, $height, function ($constraint) {
            $constraint->aspectRatio();
        })->save($path);
        Storage::put('public/' . $patch . '/' . $fileName, $resizedImage);
    }

}
