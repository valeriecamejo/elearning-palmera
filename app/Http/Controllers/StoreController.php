<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreRequest;
use Illuminate\Http\Request;
use App\Country;
use App\Store;
use App\State;
use App\User;
use App\Role;
Use DB;

class StoreController extends Controller
{
  /**
   * Create a new controller instance.
   * @return void
   */
  public function __construct() {
    $this->middleware('auth');
  }

  /**
   * Show the view to list all the stores.
   * @param  void
   * @return $stores, $permissions
   **/
  public function index() {
    $stores      = Store::paginate(15);
    $permissions = Role::userPermissions('/stores', 9);
    return view('store.list', compact('stores', 'permissions'));
  }
  /**
   * Show view to create a new store.
   * @param  void
   * @return void
   **/
    public function create() {
      return view('store.create');
    }

  /**
   * Save a store.
   * @param  Request $request
   * @return void
   **/
    public function store(StoreRequest $request) {

      $store = Store::insertStore($request->all());
      if ($store) {
        Session::flash('message', 'Tienda registrada correctamente.');
        Session::flash('class', 'success');
      } else {
        Session::flash('message', 'Error al registrar los datos.');
        Session::flash('class', 'danger');
      }
      return redirect()->to('/stores');
    }

   /**
   * Show a store.
   * @param  state_id
   * @return $store, $country, $state, $user
   **/
    public function show($store_id) {

      $store   = Store::find($store_id);
      $country = Country::find($store->country_id);
      $state   = State::find($store->state_id);
      $user    = User::find($store->user_id_deactive);
      return view('store.show', compact('store', 'country', 'state', 'user'));
    }

  /**
   * Show view to confirm deactivation of a store.
   * @param  $store_id
   * @return void
   */
    public function editDeactive($store_id) {
      $store     = Store::find($store_id);
      if ($store->active == true) {
        return view('store.deactive_description', compact('store'));
      } else {
        $store = Store::activeDeactive($store_id);
        if ($store) {
          Session::flash('message', 'Actualizado correctamente.');
          Session::flash('class', 'success');
        } else {
          Session::flash('message', 'Error al actualizar los datos.');
          Session::flash('class', 'danger');
        }
        return redirect()->to('stores');
      }
    }

  /**
   * Save deactive's description.
   * @param  Request $request
   * @return void
   **/
    public function saveDeactive(Request $request) {
      $store = Store::saveDeactive($request);
      if ($store) {
        Session::flash('message', 'Actualizado correctamente.');
        Session::flash('class', 'success');
      } else {
        Session::flash('message', 'Error al actualizar los datos.');
        Session::flash('class', 'danger');
      }
      return redirect()->to('/stores');
    }

  /**
   * View for edit store.
   * @param  $store_id
   * @return $state, $country, $store
   **/
    public function edit($store_id) {
      $store     = Store::find($store_id);
      $country   = Country::find($store->country_id);
      $state     = State::find($store->country_id);
      return view('store.edit', compact('state', 'country', 'store'));
    }

   /**
   * Save edited store.
   * @param  Request $request, $store_id
   * @return void
   **/
    public function saveEdit(StoreUpdateRequest $request, $store_id) {
      $store = Store::saveEdit($request->all(), $store_id);
      if ($store) {
        Session::flash('message', 'Tienda actualizada correctamente.');
        Session::flash('class', 'success');
      } else {
        Session::flash('message', 'Error al actualizar los datos.');
        Session::flash('class', 'danger');
      }
      return redirect()->to('/stores');
    }
}