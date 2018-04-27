<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {
  protected $fillable = [
    'name', 'description', 'product_id', 'score', 'photo'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [];

  public static function insertQuestion($request, $id) {
    $question                    = new Question;
    $question->question          = $request['question'];
    $question->type_question_id  = $request['type_question_id'];
    $question->evaluation_id     = $id;
    $question->score             = $request['score'];

    if ($question->save()) {
      if($question->type_question_id == 3){
        $answer                  = new Answer;
        $answer->answer          = 'Libre';
        $answer->question_id     = $id;
        $answer->correct         = true;
      } else {
        foreach ($request->input('answer') as $key => $value) {
          $answer                  = new Answer;
          $answer->answer          = $value;
          $answer->question_id     = $question->id;
          $answer_key              = intval($key);
          $answer->correct         = false;
          foreach ($request->input('correct') as $i => $correct) {
            $correct         = intval($correct - 1);
            if($answer_key == $correct){
              $answer->correct  = true;
            }
          }
        }
      }
      return $question;
    }
  }
}
