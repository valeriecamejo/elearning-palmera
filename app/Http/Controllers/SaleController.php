<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaleRequest;
use App\Sale;
use App\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller {
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
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $sales = Sale::paginate(15);
    return view('sale.list', compact('sales'));
  }
  /**
   * Show the application Create.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    if(Auth::user()->role_id == 1) {
      $products = Product::all();
    } else {
      $products = Product::where('brand_id','=', Auth::user()->brand_id)
      ->get();
    }
    return view('sale.create', compact('products'));
  }
  /**
   * Show the application Create.
   *
   * @param  Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(SaleRequest $request) {
    $sale = Sale::insertSale($request->all());
    if ($sale) {
      Session::flash('message', 'Venta cargada correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al registrar la venta.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('sales/show/'.$sale->id);

  }

      /**
   * Show the application show.
   *
   * @return \Illuminate\Http\Response
   */
  public function show($id) {
    $sale      = Sale::find($id);
    $product   = Product::find($sale->product_id);
    return view('sale.show', compact('sale','product'));
  }

  /**
   * Show the application Active Deactive.
   *
   * @return \Illuminate\Http\Response
   */
  public function approveDisapprove($id, $value) {
    $sale = Sale::approveDisapprove($id, $value);
    if ($sale) {
      Session::flash('message', 'Actualizado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al actualizar.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('sales/show/'.$id);
  }
}
