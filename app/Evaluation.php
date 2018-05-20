<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model {
  protected $fillable = [
    'name', 'description', 'product_id', 'score', 'photo'];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [];

  public static function insertEvaluation($request) {
    $evaluation               = new Evaluation;
    $evaluation->name         = $request['name'];
    $evaluation->description  = $request['description'];
    $evaluation->product_id   = $request['product_id'];
    $evaluation->score        = $request['score'];
    if(isset($request['photo'])){
      // antes de hacer esto por primera vez hay que hacer php artisan storage:link
      // obtenemos el campo file definido en el formulario
      $file = $request['photo'];
      // obtenemos el nombre del archivo
      $name = $file->getClientOriginalName();
      // indicamos que queremos guardar en la carpeta public de storage
      $folder = "evaluation_".$sale->brand_id;
      $file->storeAs("public/$folder", $name);
      $evaluation->photo      = $name;
    }
    if ($evaluation->save()) {
      return $evaluation;
    }
  }
  public static function saveUpdate($request, $id) {
    $evaluation               = Evaluation::find($id);
    $evaluation->name         = $request['name'];
    $evaluation->description  = $request['description'];
    $evaluation->product_id   = $request['product_id'];
    $evaluation->score        = $request['score'];
    if(isset($request['photo'])){
      // antes de hacer esto por primera vez hay que hacer php artisan storage:link
      // obtenemos el campo file definido en el formulario
      $file = $request['photo'];
      // obtenemos el nombre del archivo
      $name = $file->getClientOriginalName();
      // indicamos que queremos guardar en la carpeta public de storage
      $folder = "evaluation_".$sale->brand_id;
      $file->storeAs("public/$folder", $name);
      $evaluation->photo      = $name;
    }
    if ($evaluation->save()) {
      return $evaluation;
    }
  }

  public static function activeDeactive($id) {
    $evaluation           = Evaluation::find($id);
    if ($evaluation->active == true) {
      $evaluation->active = false;
    } else {
      $evaluation->active = true;
    }
    if ($evaluation->save()) {
      return $evaluation;
    }
  }
}
