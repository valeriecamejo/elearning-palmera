<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Store extends Model
{
    protected $table = 'stores';
    protected $fillable = [
                         'country_id',
                         'state_id',
                         'brand_id',
                         'name',
                         'address',
                         'description',
                         'active',
                         'deactive_description',
                         'user_id_deactive',
                      ];

  /**
   * Save a state/province.
   *
   * @param  Request  $request
   * @return state
   */

  public static function insertStore($request) {

    $store                       =  new Store;
    $store->country_id           =  $request['country_id'];
    $store->state_id             =  $request['state_id'];
    $store->brand_id             =  Auth::user()->brand_id;
    $store->name                 =  ucwords($request['name']);
    $store->address              =  $request['address'];
    $store->active               =  true;
    $store->deactive_description =  '';
    $store->user_id_deactive     =  0;
    if (isset($request['description'])) {
      $store->description          =  $request['description'];
    }
    if ($store->save()) {
      return $store;
    }
  }

  /**
   * Active/Deactive a store.
   *
   * @param  Request  $request
   * @return state
   */
  public static function activeDeactive($store_id) {
    $store             = Store::find($store_id);
    if ($store->active == true) {
      $store->active   = false;
    } else {
      $store->active               = true;
      $store->deactive_description =  '';
      $store->user_id_deactive     = Auth::user()->id;
    }
    if ($store->save()) {
      return $store;
    }
  }

  /**
   * Save deactive's description.
   *
   * @param  Request  $request
   * @return state
   */

  public static function saveDeactive($request) {
    $store                       =  Store::find($request['store_id']);
    $store->deactive_description =  $request['description'];
    $store->active               =  false;
    $store->user_id_deactive     =  Auth::user()->id;
    if ($store->save()) {
      return $store;
    }
  }

  /**
   * Save a store edited.
   *
   * @param  Request  $request
   * @return state
   */

  public static function saveEdit($request, $store_id) {

    $store                       =  Store::find($store_id);
    $store->country_id           =  $request['country_id'];
    $store->state_id             =  $request['state_id'];
    $store->name                 =  $request['name'];
    $store->address              =  $request['address'];
    if(isset($request['description'])) {
      $store->description        =  $request['description'];
    }
    if ($store->save()) {
      return $store;
    }
  }
}