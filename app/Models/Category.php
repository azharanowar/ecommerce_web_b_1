<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    private static $category, $image,$imageNewName,$directory,$imgUrl;

    public static function saveCategory($request){
        if ($request->cat_id){
            self::$category =Category::find($request->cat_id);
        }else{
            self::$category =new Category();
        }
        self::$category->category_name = $request->category_name;
        if ($request->file('image')){
            if (self::$category->image){
                if (file_exists(self::$category->image)){
                    unlink(self::$category->image);
                }
            }
            self::$category->image = self::getImageUrl($request);
        }
        self::$category->save();
    }
    private static function getImageUrl($request){
       self::$image = $request->file('image');
       self::$imageNewName=rand().'.'.self::$image->getClientOriginalExtension();
       self::$directory='adminAsset/category-image/';
       self::$imgUrl=self::$directory.self::$imageNewName;
       self::$image->move(self::$directory,self::$imageNewName);
       return self::$imgUrl;
    }

    public static function status($id){
        self::$category = Category::find($id);
        if (self::$category->status == 1){
            self::$category->status = 0;
        }else{
            self::$category->status = 1;
        }
        self::$category->save();
    }

    public static function categoryDelete($request){
        self::$category =Category::find($request->cat_id);
        if (self::$category->image){
            if (file_exists(self::$category->image)){
                unlink(self::$category->image);
            }
        }
        self::$category->delete();
    }

    public function products() {
        return $this->hasMany(Product::class);
    }

}
