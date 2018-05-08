<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
  /**
   * Save a state/province.
   *
   * @param  Request  $request
   * @return state
   */

  public static function insertState($request) {

    $state             = new State;
    $state->name       = $request['name'];
    $state->country_id = $request['country_id'];
    $state->active     = true;
    if ($state->save()) {
      return $state;
    }
  }

  /**
   * Save a state/province edited.
   *
   * @param  Request  $request
   * @return state
   */

  public static function saveEdit($request, $state_id) {

    $state             = State::find($state_id);
    $state->name       = ucwords($request['name']);
    $state->country_id = $request['country_id'];
    if ($state->save()) {
      return $state;
    }
  }

  /**
   * Activate/Deactivate a state/province.
   *
   * @param  state_id
   * @return $state
   */
  public static function activeDeactive($state_id) {

    $state             = State::find($state_id);
    if ($state->active == true) {
      $state->active   = false;
    } else {
      $state->active   = true;
    }
    if ($state->save()) {
      return $state;
    }
  }
}