<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Product;
use App\Content;
Use DB;

class CatalogController extends Controller {
    /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct() {
    $this->middleware('auth');
  }

  /**
   * Show the view to list all the catalogs.
   * @param  void
   * @return void
   */
  public function index() {

    return view('catalog.list');
  }

  /**
   * List of all products.
   * @param  void
   * @return $products
   */
  public function allProducts() {

    if(Auth::user()->role_id == 1) {
      $products = Product::paginate(10);
    } else {
      $products = DB::table('products')
                    ->where('products.active', true)
                    ->where('products.brand_id', Auth::user()->brand_id)
                    ->paginate(10);
    }
    return response()->json($products);
  }
}