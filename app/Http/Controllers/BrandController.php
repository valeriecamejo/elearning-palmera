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
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application List brands.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $brands = Brand::paginate(15);
    $permissions = Role::userPermissions('/brands', 5);
    return view('brand.list', compact('brands', 'permissions'));
  }
  /**
   * Show the application Create brand.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('brand.create');
  }
  /**
   * Show the application Create brand.
   *
   * @param  Request  $request
   * @return \Illuminate\Http\Response
   */
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
   * Show the application show.
   *
   * @return \Illuminate\Http\Response
   */
  public function show($id) {
    $brand      = Brand::find($id);
    return view('brand.show', compact('brand'));
  }

    /**
   * Show the application Edit.
   *
   * @return \Illuminate\Http\Response
   */
  public function edit($id) {
    $brand       = Brand::find($id);
    return view('brand.edit', compact('brand'));
  }

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
   * Show the application Active Deactive.
   *
   * @return \Illuminate\Http\Response
   */
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
