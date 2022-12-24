<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    private static $category, $image, $imageNewName, $directory, $imageURL;

    public static function saveCategory($categoryData) {
        self::$category = new Category();

        self::$category->category_name = $categoryData->category_name;

        if ($categoryData->file('image')) {
            self::$category->image = self::getImageURL($categoryData);
        }

        self::$category->save();
    }

    private static function getImageURL($categoryData) {
        self::$image = $categoryData->file('image');
        self::$imageNewName = rand() . '.' . self::$image->getClientOriginalExtension();
        self::$directory = 'backEndAssets/category-images/';
        self::$imageURL = self::$directory . self::$imageNewName;
        self::$image->move(self::$directory, self::$imageNewName);

        return self::$imageURL;
    }
}
