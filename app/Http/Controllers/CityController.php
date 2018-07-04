<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityUpdateRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CityRequest;
use Illuminate\Http\Request;
use App\Country;
use App\State;
use App\City;
use App\Role;
Use DB;

class CityController extends Controller {
  /**
   * Create a new controller instance.
   *
   * @return void
   **/
    public function __construct() {
      $this->middleware('auth');
    }

  /**
   * Shows the view of the list of cities.
   * @param  $id
   * @return $cities, $permissions, $country, $states
   **/
  public function index() {
    $cities      = City::paginate(15);
    $countries   = Country::paginate(15);
    $states      = State::paginate(15);
    $permissions = Role::userPermissions('/cities', 15);
    return view('city.list', compact('cities', 'permissions', 'countries', 'states'));
  }

  /**
   * View for Create new city.
   * @param  void
   * @return void
   **/
    public function create() {
      return view('city.create');
    }

  /**
   * Show all cities.
   * @param  void
   * @return $cities
   **/
    public function allCities() {
      $cities = City::all();
      return $cities;
    }

  /**
   * View for Create new city.
   * @param  $state_id
   * @return $state, $country
   **/
    public function createByState($state_id) {
      $state = State::find($state_id);
      $country  = Country::find($state->country_id);
      return view('city.createByState', compact('state', 'country'));
    }

  /**
   * Save a new city.
   * @param  Request  $request
   * @return void
   **/
  public function store(CityRequest $request) {
    $city = City::insertCity($request->all());
    if ($city) {
      Session::flash('message', 'Ciudad creada exitosamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al registrar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('/cities');
  }

  /**
   * Show a city.
   * @param  $city_id
   * @return $city, $state, $country
   **/
  public function show($city_id) {
    $city     = City::find($city_id);
    $state    = State::find($city->state_id);
    $country  = Country::find($state->country_id);
    return view('city.show', compact('city', 'state', 'country'));
  }

  /**
   * Edit a city.
   * @param  $city_id
   * @return $city, $state, $country
   **/
  public function edit($city_id) {

    $city    = City::find($city_id);
    $state   = State::find($city->state_id);
    $country = Country::find($state->country_id);
    return view('city.edit', compact('city', 'state', 'country'));
  }

  /**
   * Activate/Deactivate a City.
   * @param  $city_id
   * @return void
   **/
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
   * Save an edited city.
   * @param  Request $request, id
   * @return void
   **/
  public function saveEdit(CityUpdateRequest $request, $id) {
    $city = City::saveEdit($request->all(), $id);
    if ($city) {
      Session::flash('message', 'Rol actualizado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al actualizar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('/cities');
  }

}
