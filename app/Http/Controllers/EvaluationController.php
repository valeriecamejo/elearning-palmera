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
}
