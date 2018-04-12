<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Http\Requests\BrandRequest;
use Illuminate\Support\Facades\Session;

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
    return view('brand.list', compact('brands'));
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
    return redirect()->to('brands/create');
  }
}
