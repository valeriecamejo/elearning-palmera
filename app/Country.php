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
    $country            = new Country;
    $name               = strtolower($request['name']);
    $country->name      = ucwords($name);
    $country->nickname  = strtoupper($request['nickname']);
    $country->active    = true;
    if ($country->save()) {
      return $country;
    }
  }

  /**
  * Save country edited.
  *
  * @return country
  */
  public static function saveEdit($request, $country_id) {

    $country           = Country::find($country_id);
    $name              = strtolower($request['name']);
    $country->name     = ucwords($name);
    $country->nickname = strtoupper($request['nickname']);

    if ($country->save()) {
      return $country;
    }
  }

  /**
   * Activate/Deactivate a Country.
   *
   * @param  country_id
   * @return $country
   */
  public static function activeDeactive($country_id) {

    $country             = Country::find($country_id);
    if ($country->active == true) {
      $country->active   = false;
    } else {
      $country->active   = true;
    }
    if ($country->save()) {
      return $country;
    }
  }

}
