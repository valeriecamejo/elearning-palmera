<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
     /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'description', 'active'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [];

  public static function insertCategory($request) {
    $category               = new Category;
    $category->name         = $request['name'];
    $category->description  = $request['description'];
    if ($category->save()) {
      return $category;
    }
  }

  public static function saveUpdate($request, $id) {
    $category               = Category::find($id);
    $category->name         = $request['name'];
    $category->description  = $request['description'];
    if ($category->save()) {
      return $category;
    }
  }

  public static function activeDeactive($id) {
    $category           = Category::find($id);
    if ($category->active == true) {
      $category->active = false;
    } else {
      $category->active = true;
    }
    if ($category->save()) {
      return $category;
    }
  }
}
