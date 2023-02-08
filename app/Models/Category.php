<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    private static $category, $image, $directory, $imageName, $imageUrl;

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'category-image/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory . self::$imageName;
    }

    public static function newCategory($request)
    {
        self::$category = new Category();
        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->image = self::getImageUrl($request);
        self::$category->save();
    }

    public static function updateCategory($request)
    {
        // return $request->name;
        self::$category = Category::find($request->id);
        if ($request->file('image')) {
            // return 'ggggg';
            // if (file_exists(self::$category->image)) {
            //     unlink(self::$category->image);
            // }
            self::$imageUrl = self::getImageUrl($request);
        } else {
            self::$imageUrl = self::$category->image;
        }
        // return self::$category->image;
        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->image = self::$imageUrl;
        self::$category->save();
    }

    public static function deleteCategory($id)
    {
        self::$category = Category::find($id);
        if (file_exists(self::$category->image)) {
            unlink(self::$category->image);
        }
        self::$category->delete();
    }
}
