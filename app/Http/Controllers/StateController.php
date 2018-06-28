<?php

namespace App\Http\Controllers;

use App\Http\Requests\StateUpdateRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StateRequest;
use Illuminate\Http\Request;
use App\Country;
use App\State;
use App\Role;
Use DB;

class StateController extends Controller
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
   * @return states
   */
  public function index() {
    $states      = State::paginate(15);
    $countries   = Country::paginate(15);
    $permissions = Role::userPermissions('/states', 14);
    return view('state.list', compact('states', 'permissions', 'countries'));
  }

   /**
   * All states.
   *
   * @return states
   */
  public function states($country_id) {
    $states = DB::table('states')
                ->where('active', true)
                ->where('country_id' , $country_id)
                ->get();
    return $states;
  }

   /**
   * All states.
   *
   * @return states
   */
  public function allStates() {
    $states = State::all();
    return $states;
  }

  /**
   * View for states.
   *
   * @param  void
   * @return void
   */
  public function create() {
    return view('state.create');
  }

  /**
   * View for states.
   *
   * @param  void
   * @return void
   */
  public function createByCountry($country_id) {
    $country = Country::find($country_id);
    return view('state.createByCountry', compact('country'));
  }

  /**
   * Save a state.
   *
   * @param  Request  $request
   * @return void
   */
  public function store(StateRequest $request) {
    $state = State::insertState($request->all());
    if ($state) {
      Session::flash('message', 'Estado registrado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al registrar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('/states');
  }

  /**
   * Show a state.
   *
   * @param  state_id
   * @return \Illuminate\Http\Response
   */
  public function show($state_id) {

    $state     = State::find($state_id);
    $country   = Country::find($state->country_id);
    return view('state.show', compact('state', 'country'));
  }

  /**
   * View for edit state/province.
   *
   * @param  state_id
   * @return state
   */
  public function edit($state_id) {

    $state     = State::find($state_id);
    $country   = Country::find($state->country_id);
    return view('state.edit', compact('state', 'country'));
  }

  /**
   * View for edit state/province.
   *
   * @param  state_id
   * @return void
   */
  public function saveEdit(StateUpdateRequest $request, $state_id) {

    $state = State::saveEdit($request->all(), $state_id);
    if ($state) {
      Session::flash('message', 'Estado actualizado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al actualizar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('/states');
  }

  /**
   * View for edit state/province.
   *
   * @param  state_id
   * @return void
   */
  public function active_deactive($state_id) {

    $state = State::activeDeactive($state_id);
    if ($state) {
      Session::flash('message', 'Actualizado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al descativar el pais.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('states');
  }
}
