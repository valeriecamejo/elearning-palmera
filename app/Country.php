<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model {
    /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $table = 'countries';
  protected $fillable = [
    'name', 'nickname'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [];

  public static function insertCountry($request) {
    $country               = new Country;
    $country->name         = $request['name'];
    $country->nickname     = $request['nickname'];
    if ($country->save()) {
      return $country;
    }
  }


}
