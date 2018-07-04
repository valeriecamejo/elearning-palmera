<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandNewUpdateRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\BrandNewRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\BrandNew;
use App\Brand;
use App\Role;
use DB;

class BrandNewController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
  **/
  public function __construct() {
    $this->middleware('auth');
  }

  /**
   * Show the view to list all the brand's new.
   * @param  void
   * @return $brand_news, $permissions
  **/
  public function index() {
    if(Auth::user()->role_id == 1) {
      $brand_news = BrandNew::paginate(5);
    } else {
      $brand_news  = BrandNew::where('brand_id', Auth::user()->brand_id)->paginate(15);
    }
    $permissions = Role::userPermissions('/brand-new', 2);
    return view('brand_new.list', compact('brand_news', 'permissions'));
  }

  /**
   * view to create news of a brand.
   * @param  void
   * @return void
  **/
  public function create() {
    return view('brand_new.create');
  }

  /**
   * Method to save the news of a brand.
   * @param  Request  $request
   * @return void
  **/
  public function store(BrandNewRequest $request) {
    $brand_new = BrandNew::insertBrandNew($request->all());
    if ($brand_new) {
      Session::flash('message', 'Contenido guardado exitosamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al guardar contenido.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('/brand-news');
  }

  /**
   * Show the news of a brand.
   * @param  $brand_new_id
   * @return $brand_new
  **/
  public function show($brand_new_id) {
    $brand_new = BrandNew::find($brand_new_id);
    return view('brand_new.show', compact('brand_new'));
  }

  /**
   * Edit the news of a brand.
   * @param  brand_new_id
   * @return $brand_new
   */
  public function edit($brand_new_id) {
    $brand_new = BrandNew::find($brand_new_id);
      return view('brand_new.edit', compact('brand_new'));
  }

  /**
   * Save the new of an edited brand.
   * @param  Request $request, brand_new_id
   * @return void
   */
  public function saveEdit(BrandNewUpdateRequest $request, $brand_new_id) {
    $brand_new = BrandNew::saveEdit($request->all(), $brand_new_id);
    if ($brand_new) {
      Session::flash('message', 'Contenido actualizado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al actualizar el contenido.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('/brand-news');
  }

   /**
   * Delete the news of a brand.
   * @param  brand_new_id
   * @return brand_new
   */
  public function delete($brand_new_id) {
    $brand_new  = BrandNew::deleteBrandNew($brand_new_id);
    if ($brand_new) {
      Session::flash('message', 'Actualizado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al eliminar el contenido.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('/brand-news');
  }

  /**
   * Active/Deactive the news of a brand.
   * @param  $brand_new_id
   * @return void
   */
  public function activeDeactive($brand_new_id) {
    $brand_new = BrandNew::activeDeactive($brand_new_id);
    if ($brand_new) {
      Session::flash('message', 'Actualizado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al actualizar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('/brand-news');
  }
}
