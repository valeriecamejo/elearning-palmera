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

    $role  = new Role;
    $role->name = $request['name'];
    $role->permission = "";
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
