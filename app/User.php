<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable {
  use Notifiable;
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'last_name', 'username', 'email', 'dni', 'role_id', 'brand_id',
    'country_id', 'state_id', 'active', 'phone', 'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];

  public static function insertUser($request) {
    $user             = new User;
    $user->name       = $request['name'];
    $user->last_name  = $request['last_name'];
    $user->username   = $request['username'];
    $user->email      = $request['email'];
    $user->dni        = $request['dni'];
    $user->role_id    = $request['role_id'];
    $user->brand_id   = $request['brand_id'];
    $user->country_id = $request['country_id'];
    $user->state_id   = $request['state_id'];
    $user->phone      = $request['phone'];
    $user->password   = Hash::make($request['password']);
    $user->active     = 1;
    if ($user->save()) {
      return $user;
    }
  }

  public static function saveProfile($request) {
    $user             = User::find(Auth::user()->id);
    $user->username   = $request['username'];
    $user->phone      = $request['phone'];
    if($request['password']!= null) {
      $user->password = Hash::make($request['password']);
    }
    if ($user->save()) {
      return $user;
    }
  }

  public static function saveUpdate($request, $id) {
    $user             = User::find($id);
    $user->name       = $request['name'];
    $user->last_name  = $request['last_name'];
    $user->username   = $request['username'];
    $user->email      = $request['email'];
    $user->dni        = $request['dni'];
    $user->role_id    = $request['role_id'];
    $user->brand_id   = $request['brand_id'];
    $user->country_id = $request['country_id'];
    $user->state_id   = $request['state_id'];
    $user->phone      = $request['phone'];
    if($request['password']!= null) {
      $user->password = Hash::make($request['password']);
    }
    if ($user->save()) {
      return $user;
    }
  }

  public static function activeDeactive($id) {
    $user           = User::find($id);
    if ($user->active == true) {
      $user->active = false;
    } else {
      $user->active = true;
    }
    if ($user->save()) {
      return $user;
    }
  }
}
