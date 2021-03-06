<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $table = 'cities';
  protected $fillable = [
    'name', 'state_id'
  ];

     /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [];

  public static function insertCity($request) {
    $city               = new City;
    $city->name         = ucwords($request['name']);
    $city->state_id     = $request['state_id'];
    $city->active       = true;
    if ($city->save()) {
      return $city;
    }
  }

  /**
  * Save city edited.
  *
  * @return city
  */
  public static function saveEdit($request, $city_id) {

    $city            = City::find($city_id);
    $city->name      = ucwords($request['name']);
    $city->state_id  = $request['state_id'];
    if ($city->save()) {
      return $city;
    }
  }

  /**
   * Activate/Deactivate a City.
   *
   * @param  city_id
   * @return $city
   */
  public static function activeDeactive($city_id) {

    $city             = City::find($city_id);
    if ($city->active == true) {
      $city->active   = false;
    } else {
      $city->active   = true;
    }
    if ($city->save()) {
      return $city;
    }
  }
}
