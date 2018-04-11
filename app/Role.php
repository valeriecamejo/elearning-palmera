<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Role extends Model
{
  protected $table = 'roles';
  protected $fillable = [
                         'name',
                         'permission',
                         'level'
                      ];

  /**
  * Show the profile for the given user.
  *
  * @param  int  $id
  * @return Response
  */
  public static function insertRole($request) {

    $all_level  = Role::all();
    $last_level = $all_level->last();
    $level      = $last_level['level'];

    $role  = new Role;
    $role->name = $request['name'];
    $role->permission = $request['modulo'];
    $role->level = ++$level;
    $role->save();

    if ($role->save()) {
      return $role;
    }
  }
}
