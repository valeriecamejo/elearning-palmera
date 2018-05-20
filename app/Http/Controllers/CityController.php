<?php

namespace App\Http\Controllers;

Use DB;
use Illuminate\Http\Request;
use App\City;
use App\State;
use App\Country;
use App\Http\Requests\CityUpdateRequest;
use Illuminate\Support\Facades\Session;

class CityController extends Controller {
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
   * @return cities
   */
  public function index() {
    $cities = City::paginate(15);
    return view('city.list', compact('cities'));
  }

  /**
   * View for Create new city.
   *
   * @return view
   */
    public function create() {
      return view('city.create');
    }

  /**
   * Save a new city.
   *
   * @param  Request  $request
   * @return view
   */
  public function store(Request $request) {
    $city = City::insertCity($request->all());
    if ($city) {
      Session::flash('message', 'Ciudad creada exitosamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al registrar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('cities/create');
  }

  /**
   * Show a city.
   *
   * @param  city_id
   * @return city, state, country
   */
  public function show($city_id) {
    $city     = City::find($city_id);
    $state    = State::find($city->state_id);
    $country  = Country::find($state->country_id);
    return view('city.show', compact('city', 'state', 'country'));
  }

  /**
   * Edit a city.
   *
   * @param  country_id
   * @return $country
   */
  public function edit($city_id) {

    $city    = City::find($city_id);
    $state   = State::find($city->state_id);
    $country = Country::find($state->country_id);
    return view('city.edit', compact('city', 'state', 'country'));
  }

  /**
   * Activate/Deactivate a Country.
   *
   * @return \Illuminate\Http\Response
   */
  public function activeDeactive($city_id) {
    $city = City::activeDeactive($city_id);
    if ($city) {
      Session::flash('message', 'Ciudad actualizada correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al actualizar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('cities');
  }

  /**
   * Save city edited.
   *
   * @param  Request $request, id
   * @return $id
   */
  public function saveEdit(CityUpdateRequest $request, $id) {
    $city = City::saveEdit($request->all(), $id);
    if ($city) {
      Session::flash('message', 'Rol actualizado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al actualizar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('cities/edit/'.$id);
  }

}
