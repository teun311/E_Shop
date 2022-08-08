<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected static $product;
    protected static $image;
    protected static $imageName;
    protected static $imagePath;
    protected static $imageUrl;

    public static function createProduct ($request)
    {
        self::$image = $request->file('image');
        self::$imageName = time().rand(10,1000).'.'.self::$image->getClientOriginalExtension();
        self::$imagePath = 'admin-assets/image/product/';
        self::$image->move(self::$imagePath,self::$imageName);
        self::$imageUrl = self::$imagePath.self::$imageName;

        self::$product = new Product();
        self::$product->name    = $request->name;
        self::$product->category_name    = $request->category_name;
        self::$product->brand_name    = $request->brand_name;
        self::$product->description    = $request->description;
        self::$product->image    = self::$imageUrl;
        self::$product->status  = $request->status;
        self::$product->save();
    }

    public static function updateProduct ($request, $id)
    {

        self::$product = Product::find($id);

        self::$image = $request->file('image');
        if (self::$image)
        {
            if (file_exists(self::$product->image))
            {
                unlink(self::$product->image);
            }
            self::$imageName = time().rand(10,1000).'.'.self::$image->getClientOriginalExtension();
            self::$imagePath = 'admin-assets/image/product/';
            self::$image->move(self::$imagePath,self::$imageName);
            self::$imageUrl = self::$imagePath.self::$imageName;
        } else {
            self::$imageUrl = self::$product->image;
        }


        self::$product->name    = $request->name;
        self::$product->category_name    = $request->category_name;
        self::$product->brand_name    = $request->brand_name;
        self::$product->description    = $request->description;
        self::$product->image    = self::$imageUrl;
        self::$product->status  = $request->status;
        self::$product->save();
    }
}
