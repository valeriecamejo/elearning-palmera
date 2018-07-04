<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SaleRequest;
use Illuminate\Http\Request;
use App\Product;
use App\Store;
use App\Sale;
use App\Role;

class SaleController extends Controller {
  /**
   * Create a new controller instance.
   * @return void
   **/
  public function __construct() {
    $this->middleware('auth');
  }

  /**
   * Show the view to list all the sales.
   * @param  void
   * @return $sales, $permissions
   */
    public function index() {
      if(Auth::user()->role_id == 1) {
        $sales = Sale::paginate(15);
      } else {
        $sales = Sale::where('user_id', Auth::user()->brand_id)
                        ->get();
        $permissions = Role::userPermissions('/sales', 7);
      }
        return view('sale.list', compact('sales', 'permissions'));
    }

  /**
   * Show view to create a sale.
   * @param  void
   * @return $products, $stores
   **/
  public function create() {
    if(Auth::user()->role_id == 1) {
      $products = Product::all();
      $stores   = Store::where('active', '=', true)->get();
    } else {
      $products = Product::where('brand_id', '=', Auth::user()->brand_id)->get();
      $stores   = Store::where('active',   '=', true)
                       ->where('brand_id', '=', Auth::user()->brand_id)
                       ->where('state_id', Auth::user()->state_id)
                       ->get();
    }
    return view('sale.create', compact('products', 'stores'));
  }

  /**
   * Save a new sale.
   * @param  Request  $request
   * @return void
   **/
  public function store(Request $request) {
    $sale = Sale::insertSale($request->all());
    if ($sale) {
      Session::flash('message', 'Venta cargada correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al registrar la venta.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('/sales');

  }

  /**
   * Show a sale.
   * @param  $id
   * @return $sale, $product, $store
   **/
  public function show($id) {
    $sale      = Sale::find($id);
    $product   = Product::find($sale->product_id);
    $store     = Store::find($sale->store);
    return view('sale.show', compact('sale','product', 'store'));
  }

  /**
   * Show the application Active Deactive.
   * @param  $id, $value
   * @return void
   **/
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
