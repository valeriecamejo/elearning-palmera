<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model {
  protected $fillable = [
    'name', 'description', 'model', 'version', 'category_id', 'brand_id', 'photo', 'price', 'valoration', 'active'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [];

  public static function insertProduct($request) {
    $product = new Product;
    if(isset($request['photo'])){
      // antes de hacer esto por primera vez hay que hacer php artisan storage:link
      // obtenemos el campo file definido en el formulario
      $file = $request['photo'];
      // obtenemos el nombre del archivo
      $name = $file->getClientOriginalName();
      // indicamos que queremos guardar en la carpeta public de storage
      $file->storeAs('public/', $name);
      $product->photo      = $name;
    }
    $product->name         = $request['name'];
    $product->description  = $request['description'];
    $product->model        = $request['model'];
    $product->version      = $request['version'];
    $product->category_id  = $request['category_id'];
    $product->brand_id     = $request['brand_id'];
    $product->price        = $request['price'];
    $product->valoration   = $request['valoration'];
    if ($product->save()) {
      return $product;
    }
  }

  public static function saveUpdate($request, $id) {
    $product = Product::find($id);
    if(isset($request['photo'])){
      // antes de hacer esto por primera vez hay que hacer php artisan storage:link
      // obtenemos el campo file definido en el formulario
      $file = $request['photo'];
      // obtenemos el nombre del archivo
      $name = $file->getClientOriginalName();
      // indicamos que queremos guardar en la carpeta public de storage
      $file->storeAs('public/', $name);
      $product->photo        = $name;
    }
    $product->name         = $request['name'];
    $product->description  = $request['description'];
    $product->model        = $request['model'];
    $product->version      = $request['version'];
    $product->category_id  = $request['category_id'];
    $product->brand_id     = $request['brand_id'];
    $product->price        = $request['price'];
    $product->valoration   = $request['valoration'];
    if ($product->save()) {
      return $product;
    }
  }

  public static function activeDeactive($id) {
    $product           = Product::find($id);
    if ($product->active == true) {
      $product->active = false;
    } else {
      $product->active = true;
    }
    if ($product->save()) {
      return $product;
    }
  }
}
