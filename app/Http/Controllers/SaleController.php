<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use Illuminate\Support\Facades\Session;

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
    return view('sale.create');
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
    return redirect()->to('sales/create');
  }

      /**
   * Show the application show.
   *
   * @return \Illuminate\Http\Response
   */
  public function show($id) {
    $sale      = Sale::find($id);
    return view('sale.show', compact('sale'));
  }

    /**
   * Show the application Edit.
   *
   * @return \Illuminate\Http\Response
   */
  public function edit($id) {
    $sale       = Sale::find($id);
    return view('sale.edit', compact('sale'));
  }

    /**
   * Show the application Active Deactive.
   *
   * @return \Illuminate\Http\Response
   */
  public function approveDisapprove($id) {
    $sale = Sale::approveDisapprove($id);
    if ($sale) {
      Session::flash('message', 'Actualizado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al actualizar.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('sales');
  }
}
