<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditBrandRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\BrandRequest;
use Illuminate\Http\Request;
use App\Brand;
use App\Role;

class BrandController extends Controller {
  /**
   * Create a new controller instance.
   *
   * @return void
  **/
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the view to list all the brands.
   * @param  void
   * @return $brands, $permissions
  **/
  public function index() {
    $brands = Brand::paginate(15);
    $permissions = Role::userPermissions('/brands', 5);
    return view('brand.list', compact('brands', 'permissions'));
  }

  /**
   * View to create a brand.
   * @param  void
   * @return void
  **/
  public function create()
  {
    return view('brand.create');
  }

  /**
   * Method to save a brand.
   *
   * @param  Request  $requests
   * @return void
  **/
  public function store(BrandRequest $request)
  {
    $brands = Brand::insertBrand($request->all());
    if ($brands) {
      Session::flash('message', 'Marca creada correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al registrar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('brands');
  }

  /**
   * View to show a brand.
   * @param  $id
   * @return $brand
   */
  public function show($id) {
    $brand      = Brand::find($id);
    return view('brand.show', compact('brand'));
  }

  /**
   * View to edit a brand.
   * @param  $id
   * @return $brand
  **/
  public function edit($id) {
    $brand       = Brand::find($id);
    return view('brand.edit', compact('brand'));
  }

  /**
   * Method to save an edited brand.
   * @param  $requests, $id
   * @return void
  **/
  public function saveUpdate(EditBrandRequest $request, $id) {
    $brand = Brand::saveUpdate($request->all(), $id);
    if ($brand) {
      Session::flash('message', 'Actualizado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al guardar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('brands/show/'.$id);
  }
  /**
   * Active/Deactive a brand.
   * @param  $id
   * @return void
   **/
  public function activeDeactive($id) {
    $brand = Brand::activeDeactive($id);
    if ($brand) {
      Session::flash('message', 'Actualizado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al actualizar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('brands');
  }
}
