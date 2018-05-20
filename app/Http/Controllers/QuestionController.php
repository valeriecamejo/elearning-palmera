<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluation;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\QuestionRequest;
use App\Http\Requests\EditQuestionRequest;
use App\Http\Requests\EditAnswerRequest;
use App\Question;
use App\Answer;

class QuestionController extends Controller {
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct() {
    $this->middleware('auth');
  }
    /**
   * Show the application Create.
   *
   * @return \Illuminate\Http\Response
   */
  public function create($id) {
    $evaluation = Evaluation::find($id);
    $questions  = Question::where('evaluation_id', '=', $id)->paginate(10);
    return view('question.create', compact('evaluation','questions','id'));
  }

    /**
   * Show the application Create.
   *
   * @param  Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(QuestionRequest $request, $id) {
    $question    = Question::insertQuestion($request, $id);
    if ($question) {
      Session::flash('message', 'Pregunta creada correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al registrar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('/evaluations/'.$id.'/questions/create');
  }
    /**
   * Show the application show.
   *
   * @return \Illuminate\Http\Response
   */
  public function show($id, $question_id) {
    $question   = Question::find($question_id);
    $answers    = Answer::where('question_id', '=', $question_id)->paginate(10);
    return view('question.show', compact('answers','question','id','question_id'));
  }

   /**
   * Show the application Edit.
   *
   * @return \Illuminate\Http\Response
   */
  public function edit($id, $question_id) {
    $question   = Question::find($question_id);
    $answers    = Answer::where('question_id', '=', $question_id)->paginate(10);
    return view('question.edit', compact('answers','question','id','question_id'));
  }
   /**
   * Show the application Edit.
   *
   * @return \Illuminate\Http\Response
   */
  public function answer_edit($id, $question_id, $answer_id) {
    $answer   = Answer::find($answer_id);
    return view('question.answer_edit', compact('answer','id','answer_id', 'question_id'));
  }

  public function saveUpdate(EditQuestionRequest $request, $id, $question_id) {
    $question = Question::saveUpdate($request->all(), $id, $question_id);
    if ($question) {
      Session::flash('message', 'Actualizado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al guardar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('/evaluations/'.$id.'/questions/show/'.$question_id);
  }

  public function answer_saveUpdate(EditAnswerRequest $request, $id, $question_id, $answer_id) {
    $answer = Question::answer_saveUpdate($request->all(), $id, $answer_id);
    if ($answer) {
      Session::flash('message', 'Actualizado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al guardar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('/evaluations/'.$id.'/questions/show/'.$question_id);
  }
}
