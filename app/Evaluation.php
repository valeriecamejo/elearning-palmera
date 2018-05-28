<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\UserEvaluation;
use App\UserAnswer;
use App\Question;

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
      $folder = "evaluation_" . Auth::user()->brand_id;
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

  public static function saveEvaluationByProduct($request, $id) {
    $evaluation                    = Evaluation::find($id);
    $user_question                 = new UserEvaluation;
    $user_question->evaluation_id  = $id;
    $user_question->user_id        = Auth::user()->id;
    $user_question->score          = 0;
    $user_question->approved       = false;
    if ($user_question->save()) {
      $score_evaluation            = 0;
      foreach ($request->input('result') as $key => $result) {
        $score_question            = Question::score($key);
        $answer_corrects           = Question::answerCorrect($key);
        foreach ($result as $answer){
          foreach ($answer_corrects as $answer_correct){
            if(intval($answer_correct->id) == intval($answer)){
              $score_evaluation    = $score_evaluation + $score_question;
            }
          }
          $user_answer                  = new UserAnswer;
          $user_answer->evaluation_id   = $id;
          $user_answer->question_id     = $key;
          $user_answer->answer_id       = $answer;
          $user_answer->user_id         = Auth::user()->id;
          $user_answer->user_evaluation_id = $user_question->id;
          $user_answer->description     = false;
          $user_answer->save();
        }
      }
      $user_question->score = $score_evaluation;
      if(intval($evaluation->score) == $score_evaluation || intval($evaluation->score) == $score_evaluation - 2){
        $user_question->approved   = true;
      }
      if ($user_question->save()) {
        return $user_question;
      }
    }
  }
}
