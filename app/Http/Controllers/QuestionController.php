<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluation;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\QuestionRequest;
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
  public function store(Request $request, $id) {
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
}
