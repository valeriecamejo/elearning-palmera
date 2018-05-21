<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Evaluation;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EvaluationRequest;
use App\Http\Requests\EditEvaluationRequest;
use App\Question;
use App\Answer;

class EvaluationController extends Controller {
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct() {
    $this->middleware('auth');
  }

  /**
   * Show the application List.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    if(Auth::user()->role_id == 1) {
      $evaluations = Evaluation::paginate(15);
    } else {
      $evaluations = Evaluation::join('products', 'evaluations.product_id', '=', 'products.id')
      ->where('products.brand_id','=', Auth::user()->brand_id)
      ->paginate(15);
    }
    return view('evaluation.list', compact('evaluations'));
  }
    /**
   * Show the application Create.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    if(Auth::user()->role_id == 1) {
      $products = Product::all();
    } else {
      $products = Product::where('brand_id','=', Auth::user()->brand_id)
      ->get();
    }
    return view('evaluation.create', compact('products'));
  }
  /**
   * Show the application Create.
   *
   * @param  Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(EvaluationRequest $request) {
    $evaluation = Evaluation::insertEvaluation($request->all());
    if ($evaluation) {
      Session::flash('message', 'Evaluación creada correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al registrar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('evaluations/create');
  }
  /**
   * Show the application show.
   *
   * @return \Illuminate\Http\Response
   */
  public function show($id) {
    $evaluation = Evaluation::find($id);
    $questions  = Question::where('evaluation_id', '=', $id)->paginate(10);
    $product    = Product::find($evaluation->product_id);
    return view('evaluation.show', compact('evaluation','questions','id', 'product'));
  }

   /**
   * Show the application Edit.
   *
   * @return \Illuminate\Http\Response
   */
  public function edit($id) {
    $evaluation = Evaluation::find($id);
    $products    = Product::all();
    return view('evaluation.edit', compact('evaluation','products'));
  }

  public function saveUpdate(EditEvaluationRequest $request, $id) {
    $evaluation = Evaluation::saveUpdate($request->all(), $id);
    if ($evaluation) {
      Session::flash('message', 'Actualizado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al guardar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('evaluations/show/'.$id);
  }

    /**
   * Show the application show.
   *
   * @return \Illuminate\Http\Response
   */
  public function allEvaluationsByProduct($product_id) {
    $evaluations  = Evaluation::where('product_id', '=', $product_id)->paginate(10);
    $product      = Product::find($product_id);
    return view('evaluation.evaluation_list', compact('evaluations','product_id', 'product'));
  }

  
    /**
   * Show the application show.
   *
   * @return \Illuminate\Http\Response
   */
  public function EvaluationByProduct($id) {
    $evaluation   = Evaluation::find($id);
    $questions    = Question::where('evaluation_id', '=', $id)->get();
    $questions_answers = [];

    foreach($questions as $question){
      $answers    = Answer::select('id', 'answer', 'question_id', 'correct'   )->where('question_id', '=', $question->id)->get()->toArray();
      $construct_array = ['question' => $question->question,'question_id' => $question->id, 'type_question_id' => $question->type_question_id, 'answers' => $answers];
      array_push($questions_answers, $construct_array);
      $construct_array = '';
    }
    return view('evaluation.evaluation', compact('evaluation','questions_answers','id'));
  }

  public function saveEvaluationByProduct(Request $request, $id) {
    $question    = Evaluation::saveEvaluationByProduct($request, $id);
    if ($question) {
      Session::flash('message', 'Respuestas guardadas correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al guardadar las Respuestas.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('/catalogs');
  }
}
