<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Brand extends Model {
  use Notifiable;
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $table = 'brands';
  protected $fillable = [
    'name', 'navbar_color', 'logo', 'header'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [];

  public static function insertBrand($request) {
    $brand                    = new Brand;
    $brand->name              = $request['name'];
    $brand->navbar_color      = $request['navbar_color'];
    $brand->logo              = $request['logo'];
    $brand->header            = $request['header'];
    if ($brand->save()) {
      return $brand;
    }
  }
}
