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
      $permission = '{"modulo_id": '.$module->id.',"permisos": {"crear": 0,"editar": 0,"ver": 0,"eliminar": 0}}';
    array_push($role_permission, ".$permission.");
    };
    $permissions = implode($role_permission);
    $role->permission = ".$permissions.";
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

    // $update_team = DB::table('team_user_players')
    // ->select('team_user_players.player_id', 'team_user_players.name', 'team_user_players.position', 'players.salary', 'team_user_players.last_name', 'team_user_players.name_opponent', 'team_user_players.name_team' )
    // ->join('players', 'players.id', '=', 'team_user_players.player_id')
    // ->where('team_user_id', '=', $team_id)
    // ->orderBy('team_user_players.id')
    // ->get();

    // return $update_team;

  }
}
