<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    private static $brand, $image, $imageUrl, $imageName, $directory;

    public static function getImageUrl($request)
    {
        self::$image     = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName(); // 1660114564.jpg
        self::$directory = 'brands-images/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function newBrand($request)
    {
        self::$brand = new Brand();
        self::$brand->name  = $request->name;
        self::$brand->image = self::getImageUrl($request);
        self::$brand->save();
    }

}
