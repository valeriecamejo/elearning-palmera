<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Module extends Model
{
    protected $table = 'modules';
    protected $fillable = [
                         'name',
                         'path',
                         'description',
                         'is_config',
                      ];

   /**
   * Save a module.
   *
   * @param  Request  $request
   * @return module
   */

  public static function insertModule($request) {
    $module                       =  new Module;
    $module->name                 =  ucwords($request['name']);
    $module->path                 =  strtolower($request['path']);
    $module->is_config            =  $request['is_config'];
    $module->active               =  true;
    $module->deactive_description =  '';
    $module->user_id_deactive     = 0;
		if(isset($request['description'])) {
			$module->description =  $request['description'];
		}
    if ($module->save()) {
      return $module;
    }
  }

  /**
   * Save a module edited.
   *
   * @param  Request  $request
   * @return module
   */

  public static function saveEdit($request, $module_id) {

    $module                       =  Module::find($module_id);
    $module->name                 =  ucwords($request['name']);
    $module->path                 =  strtolower($request['path']);
    $module->is_config            =  $request['is_config'];
    if(isset($request['description'])) {
			$module->description        =  $request['description'];
		}
    if ($module->save()) {
      return $module;
    }
  }

  /**
   * Active/Deactive a module.
   *
   * @param  Request  $request
   * @return module
   */
  public static function activeDeactive($module_id) {
    $module             = Module::find($module_id);
    if ($module->active == true) {
      $module->active   = false;
    } else {
      $module->active               = true;
      $module->deactive_description =  '';
      $module->user_id_deactive     = Auth::user()->id;
    }
    if ($module->save()) {
      return $module;
    }
  }

  /**
   * Save deactive's description.
   *
   * @param  Request  $request
   * @return module
   */

  public static function saveDeactive($request) {
    $module                       =  Module::find($request['module_id']);
    $module->deactive_description =  $request['description'];
    $module->active               =  false;
    $module->user_id_deactive     =  Auth::user()->id;
    if ($module->save()) {
      return $module;
    }
  }
}
