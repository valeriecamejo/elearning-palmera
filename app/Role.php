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
    $role->name = ucwords($request['name']);
    foreach ($modules as $module){
      $permission = ['module_id' => $module->id, 'is_active' => false, 'permissions' => ['crear' => false, 'editar' => false, 'ver' => false, 'eliminar' => false]];
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
  * @param  int  $request
  * @return $role_permission
  */
  public static function insertPermission($request, $role_id) {

    $role             = Role::find($role_id);
    $permissions      = json_encode($request->permissions);
    $role->permission = $permissions;

    if($role->save()) {
      return $role;
    }
  }

  /**
  * Modify permissions.
  *
  * @param  int  $role_id
  * @return $role_permission
  */
  public static function storeEditedPermission($request, $role_id) {

    $role             = Role::find($role_id);
    $permissions      = json_encode($request->permissions);
    $role->permission = $permissions;

    if($role->save()) {
      return $role;
    }
  }

  /**
  * Save modified role.
  *
  * @param  int  $role_id
  * @return $role_permission
  */
  public static function saveEditRole($request, $role_id) {

    $role        = Role::find($role_id);
    $role->name = ucwords($request['name']);
    $role->level = $request['level'];
    $role->save();

    if($role->save()) {
      return $role;
    }
  }
}
