<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\State;
use App\Country;

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
    $states = State::paginate(15);
    return view('state.list', compact('states'));
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
   * Save a state.
   *
   * @param  Request  $request
   * @return void
   */
  public function store(Request $request) {

    $state = State::insertState($request->all());
    if ($state) {
      Session::flash('message', 'Estado registrado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al registrar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('/states/create');
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
  public function saveEdit(Request $request, $state_id) {

    $state = State::saveEdit($request->all(), $state_id);
    if ($state) {
      Session::flash('message', 'Rol actualizado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al actualizar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('states/edit/'.$state_id);
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
