<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    private static $category, $image, $imageNewName, $directory, $imageURL;

    public static function saveCategory($request) {

        if ($request->category_id) {
            self::$category = Category::find($request->category_id);
            if (file_exists(self::$category->image)) {
                unlink(self::$category->image);
            }
        } else {
            self::$category = new Category();
        }

        self::$category->category_name = $request->category_name;

        if ($request->file('image')) {
            self::$category->image = self::getImageURL($request);
        }

        self::$category->save();
    }

    private static function getImageURL($request) {
        self::$image = $request->file('image');
        self::$imageNewName = rand() . '.' . self::$image->getClientOriginalExtension();
        self::$directory = 'backEndAssets/category-images/';
        self::$imageURL = self::$directory . self::$imageNewName;
        self::$image->move(self::$directory, self::$imageNewName);

        return self::$imageURL;
    }

    public static function changeCategoryStatus($id) {
        self::$category = new Category();
        self::$category = self::$category->find($id);

        if (self::$category->status == 0) {
            self::$category->status = 1;
        } else {
            self::$category->status = 0;
        }

        self::$category->save();
    }

    public static function deleteCategory($request) {
        self::$category = Category::find($request->category_id);

        if (file_exists(self::$category->image)) {
            unlink(self::$category->image);
        }

        self::$category->delete($request->category_id);
    }
}
