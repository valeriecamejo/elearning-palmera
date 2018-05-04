<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Http\Requests\CountryRequest;
use App\Http\Requests\CountryUpdateRequest;
use Illuminate\Support\Facades\Session;

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
   * Show the application List.
   *
   * @return countries
   */
    public function index() {
      $countries = Country::paginate(15);
      return view('country.list', compact('countries'));
    }

  /**
   * Show the application Create.
   *
   * @return view
   */
    public function create() {
      return view('country.create');
    }

  /**
   * Show the application Create.
   *
   * @param  Request  $request
   * @return view
   */
    public function store(CountryRequest $request) {
      $country = Country::insertCountry($request->all());
      if ($country) {
        Session::flash('message', 'País creado correctamente.');
        Session::flash('class', 'success');
      } else {
        Session::flash('message', 'Error al registrar los datos.');
        Session::flash('class', 'danger');
      }
      return redirect()->to('countries/create');
    }

  /**
   * Edit a country.
   *
   * @param  country_id
   * @return $country
   */
    public function edit($country_id) {

      $country = Country::find($country_id);
        return view('country.edit', compact('country'));
    }

  /**
   * Save country edited.
   *
   * @param  Request $request, id
   * @return $id
   */
    public function saveEdit(CountryUpdateRequest $request, $id) {
      // var_dump($request);exit();
      $country = Country::saveEdit($request->all(), $id);
      if ($country) {
        Session::flash('message', 'Rol actualizado correctamente.');
        Session::flash('class', 'success');
      } else {
        Session::flash('message', 'Error al actualizar los datos.');
        Session::flash('class', 'danger');
      }
      return redirect()->to('countries/edit/'.$id);
    }

  /**
   * Show a country.
   *
   * @param  country_id
   * @return $country, $country_id
   */
    public function show($country_id) {

      $country = Country::find($country_id);
      return view('country.show', compact('country', 'country_id'));
    }

   /**
   * Activate/Deactivate a Country.
   *
   * @param  id
   * @return $role_name, $role_id
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
