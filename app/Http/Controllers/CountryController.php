<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryUpdateRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CountryRequest;
use Illuminate\Http\Request;
use App\Country;
use App\Role;
Use DB;

class CountryController extends Controller {
  /**
   * Create a new controller instance.
   *
   * @return void
   */
    public function __construct() {
      $this->middleware('auth');
    }

  /**
   * Show the view to list all the countries.
   * @param  void
   * @return $countries, $permissions
   **/
    public function index() {
      $countries = Country::paginate(15);
      $permissions = Role::userPermissions('/countries', 13);
      return view('country.list', compact('countries', 'permissions'));
    }

  /**
   * All countries.
   * @param  void
   * @return $countries
   **/
    public function allCountries() {
      $countries = DB::table('countries')->where('active', true)->get();
      return $countries;
    }

  /**
   * Show view to create a country.
   * @param  void
   * @return void
   **/
    public function create() {
      return view('country.create');
    }

  /**
   * Save a new country.
   * @param  Request  $request
   * @return void
   **/
    public function store(CountryRequest $request) {
      $country = Country::insertCountry($request->all());
      if ($country) {
        Session::flash('message', 'País creado correctamente.');
        Session::flash('class', 'success');
      } else {
        Session::flash('message', 'Error al registrar los datos.');
        Session::flash('class', 'danger');
      }
      return redirect()->to('/countries');
    }

  /**
   * Edit a country.
   * @param  $country_id
   * @return $country
   **/
    public function edit($country_id) {
      $country = Country::find($country_id);
        return view('country.edit', compact('country'));
    }

  /**
   * Save edited country.
   * @param  Request $request, id
   * @return void
   **/
    public function saveEdit(CountryUpdateRequest $request, $id) {
      $country = Country::saveEdit($request->all(), $id);
      if ($country) {
        Session::flash('message', 'Rol actualizado correctamente.');
        Session::flash('class', 'success');
      } else {
        Session::flash('message', 'Error al actualizar los datos.');
        Session::flash('class', 'danger');
      }
      return redirect()->to('/countries');
    }

  /**
   * Show a country.
   * @param  $country_id
   * @return $country, $country_id
   **/
    public function show($country_id) {
      $country = Country::find($country_id);
      return view('country.show', compact('country', 'country_id'));
    }

   /**
   * Activate/Deactivate a Country.
   * @param  country_id
   * @return void
   */
  public function activeDeactive($country_id) {
    $country = Country::activeDeactive($country_id);
    if ($country) {
      Session::flash('message', 'Actualizado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al descativar el pais.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('countries');
  }

}
