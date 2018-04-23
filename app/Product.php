<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Product extends Model {
  protected $fillable = [
    'name', 'description', 'model', 'version', 'category_id', 'brand_id', 'photo', 'price', 'valoration'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [];

  public static function insertProduct($request) {
    $product               = new Product;
    $product->name         = $request['name'];
    $product->description  = $request['description'];
    $product->model        = $request['model'];
    $product->version      = $request['version'];
    $product->category_id  = $request['category_id'];
    $product->brand_id     = $request['brand_id'];
    $product->photo        = $request['photo'];
    $product->price        = $request['price'];
    $product->valoration   = $request['valoration'];
    if ($product->save()) {
      return $product;
    }
  }
}
