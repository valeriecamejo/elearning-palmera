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
  public static function insertRole($request, $modules) {

    $role_permission = [];
    $role  = new Role;
    $name = strtolower($request['name']);
    $role->name = ucwords($name);
    foreach ($modules as $module){
      $permission = ['modulo_id' => $module->id, 'is_active' => 0, 'permissions' => ['crear' => 0, 'editar' => 0, 'ver' => 0, 'eliminar' => 0]];
      array_push($role_permission, $permission);
      $permission = '';
    };
    $permissions = json_encode($role_permission);
    $role->permission = $permissions;
    $role->level = $request['level'];
    $role->save();

    if ($role->save()) {
      return $role;
    }
  }

  /**
  * Show the profile for the given user.
  *
  * @param  int  $id
  * @return Response
  */
  public static function insertPermission($request) {

    $permission = $request['modulo'];
    var_dump(permission);exit();

  }
}
