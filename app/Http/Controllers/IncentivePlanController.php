<?php

namespace App\Http\Controllers;

use App\Http\Requests\IncentivePlanUpdateRequest;
use App\Http\Requests\IncentivePlanRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\IncentivePlan;
use App\Evaluation;
use App\Product;
use App\Role;
Use DB;

class IncentivePlanController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct() {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return stores
   */
  public function index() {
    $incentive_plans = IncentivePlan::paginate(15);
    $permissions = Role::userPermissions('/incentive-plans', 6);
    return view('incentive_plan.list', compact('incentive_plans', 'permissions'));
  }

   /**
   * Create new store.
   *
   * @param  void
   * @return void
   */
  public function create() {
    return view('incentive_plan.create');
  }

   /**
   * Save a Incentive plans.
   *
   * @param  Request  $request
   * @return void
   */
  public function store(IncentivePlanRequest $request) {

    $incentive_plan = IncentivePlan::insertIncentivePlan($request->all());
    if ($incentive_plan) {
      Session::flash('message', 'Plan de incentivo registrado exitosamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al registrar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('/incentive-plans');
  }

  /**
   * View for edit Incentive plans.
   *
   * @param  incentive_plan_id
   * @return incentive_plan
   */
    public function edit($incentive_plan_id) {

    $incentive_plan    = IncentivePlan::find($incentive_plan_id);
    return view('incentive_plan.edit', compact('incentive_plan', 'incentive_plan_id'));
  }

  /**
   * View for edit Incentive plans.
   *
   * @param  incentive_plan_id
   * @return incentive_plan
   */
    public function dataEdit($incentive_plan_id) {

    $incentive_plan    = IncentivePlan::find($incentive_plan_id);
    return response()->json($incentive_plan);
  }

  /**
   * View for edit Incentive plans.
   *
   * @param  incentive_plan_id
   * @return void
   */
  public function saveEdit(IncentivePlanUpdateRequest $request, $id) {

    $incentive_plan = IncentivePlan::saveEdit($request->all(), $id);

    if ($incentive_plan) {
      Session::flash('message', 'Plan de Incentivo actualizado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al actualizar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('/incentive-plans');
  }

  /**
   * Show a Incentive plans.
   *
   * @param  incentive_plan_id
   * @return \Illuminate\Http\Response
   */
  public function show($incentive_plan_id) {
    $incentive_plan   = IncentivePlan::find($incentive_plan_id);
    $product_names    = [];
    $products         = [];
    $products         = json_decode($incentive_plan->products);
    $evaluation_names = [];
    $evaluations      = [];
    $evaluations      = json_decode($incentive_plan->evaluations);

    if (($incentive_plan->products != "") && ($incentive_plan->products != "all")) {
      foreach($products as $product){
        $find_product = Product::find($product->id);
        $name = $find_product->name;
        array_push($product_names, $name);
        $find_product = '';
        $name = '';
      }
    }
    if (($incentive_plan->evaluations != "") && ($incentive_plan->evaluations != "all")) {
      foreach($evaluations as $evaluation){
        $find_evaluation = Evaluation::find($evaluation->id);
        $name = $find_evaluation->name;
        array_push($evaluation_names, $name);
        $find_evaluation = '';
        $name = '';
      }
    }
    return view('incentive_plan.show', compact('incentive_plan', 'incentive_plan_id', 'product_names', 'evaluation_names'));
  }
  /**
   * Show the application Active Deactive.
   *
   * @return \Illuminate\Http\Response
   */
  public function activeDeactive($incentive_plan_id) {
    $incentive_plan = IncentivePlan::activeDeactive($incentive_plan_id);
    if ($incentive_plan) {
      Session::flash('message', 'Actualizado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al actualizar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('/incentive-plans');
  }

   /**
   * Show view for create a content.
   *
   * @return view
   */
  public function createContent($incentive_plan_id) {
    $incentive_plan = IncentivePlan::find($incentive_plan_id);
    return view('incentive_plan.create_content', compact('incentive_plan', 'incentive_plan_id'));
  }

  /**
   * View for edit Incentive plans.
   *
   * @param  incentive_plan_id
   * @return void
   */
  public function storeContent(Request $request, $incentive_plan_id) {
    $incentive_plan = IncentivePlan::storeContent($request->all(), $incentive_plan_id);

    if ($incentive_plan) {
      Session::flash('message', 'Términos y Condiciones actualizado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al actualizar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('/incentive-plans');
  }
}