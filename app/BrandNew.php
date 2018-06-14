<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
Use DB;

class BrandNew extends Model {
    /**
   * The attributes that are mass assignable.
   *
   * @return brand_new
   */
  protected $table = 'brand_news';
  protected $fillable = [
                          'brand_id',
                          'name',
                          'active',
                          'data'
  ];

    /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */

  public static function insertBrandNew($request) {
    $brand_new             = new BrandNew;
    $brand_new->brand_id   = Auth::user()->brand_id;
    $brand_new->name       = ucwords($request['name']);
    $brand_new->data       = $request['editor1'];
    $brand_new->active     = false;
    if ($brand_new->save()) {
      return $brand_new;
    }
  }

  /**
  * Save content edited.
  *
  * @return brand_new
  */
  public static function saveEdit($request, $brand_new_id) {

    $brand_new        = BrandNew::find($brand_new_id);
    $brand_new->name  = ucwords($request['name']);
    $brand_new->data  = $request['editor1'];

    if ($brand_new->save()) {
      return $brand_new;
    }
  }

  /**
   * Delete a content.
   *
   * @param  content_id
   * @return $content
   */
  public static function deleteBrandNew($brand_new_id) {

    $brand_new = DB::table('brand_news')->where('id', '=', $brand_new_id)->delete();
    return $brand_new;
  }

  public static function activeDeactive($brand_new_id) {
    $brand_new           = BrandNew::find($brand_new_id);
    if ($brand_new->active == true) {
      $brand_new->active = false;
    } else {
      $brand_new->active = true;
    }
    if ($brand_new->save()) {
      return $brand_new;
    }
  }
}
