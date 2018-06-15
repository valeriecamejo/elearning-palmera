<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\StoreUpdateRequest;
use App\IncentivePlan;
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
    return view('incentive_plan.list', compact('incentive_plans'));
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
}