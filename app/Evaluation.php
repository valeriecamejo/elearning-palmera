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
    $evaluation->photo        = $request['photo'];
    if ($evaluation->save()) {
      return $evaluation;
    }
  }
}
