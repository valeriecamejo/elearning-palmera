<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Brand;
use App\Role;

class ProductController extends Controller {
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
    if(Auth::user()->role_id == 1) {
      $products = Product::paginate(15);
    } else {
      $products = Product::where('brand_id','=', Auth::user()->brand_id)
      ->paginate(15);
    }
    $permissions = Role::userPermissions('/products', 4);
    return view('product.products', compact('products', 'permissions'));
  }
  /**
   * Show the application List.
   *
   * @return \Illuminate\Http\Response
   */
  public function list() {
    if(Auth::user()->role_id == 1) {
      $products = Product::paginate(15);
    } else {
      $products = Product::where('brand_id','=', Auth::user()->brand_id)
      ->paginate(15);
    }
    $permissions = Role::userPermissions('/products', 4);
    return view('product.list', compact('products', 'permissions'));
  }
  /**
   * Show the application Create.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    $brands     = Brand::all();
    $categories = Category::all();
    return view('product.create', compact('brands','categories'));
  }
  /**
   * Show the application Create.
   *
   * @param  Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(ProductRequest $request) {
    $product = Product::insertProduct($request->all());
    if ($product) {
      Session::flash('message', 'Producto creado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al registrar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('products');
  }

   /**
   * Show the application show.
   *
   * @return \Illuminate\Http\Response
   */
  public function show($id) {
    $brands     = Brand::all();
    $categories = Category::all();
    $product    = Product::find($id);
    return view('product.show', compact('brands','categories','product'));
  }

  /**
   * Show the application Edit.
   *
   * @return \Illuminate\Http\Response
   */
  public function edit($id) {
    $brands     = Brand::all();
    $categories = Category::all();
    $product    = Product::find($id);
    return view('product.edit', compact('brands','categories','product'));
  }

  public function saveUpdate(EditProductRequest $request, $id) {
    $product = Product::saveUpdate($request->all(), $id);
    if ($product) {
      Session::flash('message', 'Actualizado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al guardar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('products/show/'.$id);
  }
    /**
   * Show the application Active Deactive.
   *
   * @return \Illuminate\Http\Response
   */
  public function activeDeactive($id) {
    $product = Product::activeDeactive($id);
    if ($product) {
      Session::flash('message', 'Actualizado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al actualizar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('products/list');
  }

   /**
   * Content by Product.
   *
   * @param  product_id
   * @return view
   */
  public function findProduct($product_id) {
    $product  = Product::find($product_id);
    return view('catalog.product', compact('product', 'product_id'));
  }
}
