<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    private static $blog, $image, $directory, $imageExtension, $imageName, $imageUrl;

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        //self::$imageName = self::$image->getClientOriginalName();
        self::$imageExtension = self::$image->getClientOriginalExtension();
        self::$imageName = time().'.'.self::$imageExtension;
        self::$directory = 'blog-image/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function newBlog($request)
    {
        self::saveBasicInfO(new Blog(), $request, self::getImageUrl($request));
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function updateBlog($request, $id)
    {
        self::$blog = Blog::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$blog->image))
            {
                unlink(self::$blog->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$blog->image;
        }
       self::saveBasicInfO(self::$blog, $request, self::$imageUrl);
    }
    public static function deleteBlog($id)
    {
        self::$blog = Blog::find($id);
        if (file_exists(self::$blog->image))
        {
            unlink(self::$blog->image);
        }
        self::$blog->delete();

    }


    public static function saveBasicInfO($blog, $request, $imageUrl)
    {
        $blog->category_id       = $request->category_id;
        $blog->title             = $request->title;
        $blog->short_description = $request->short_description;
        $blog->long_description  = $request->long_description;
        $blog->image             = self::$imageUrl;
        $blog->save();
    }



}
