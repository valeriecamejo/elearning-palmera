<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryUpdateRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Category;
use App\Role;
use DB;

class CategoryController extends Controller {
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
    $categories = Category::paginate(15);
    $permissions = Role::userPermissions('/categories', 10);
    return view('category.list', compact('categories', 'permissions'));
  }
  /**
   * Show the application Create.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    return view('category.create');
  }
  /**
   * Show the application Create.
   *
   * @param  Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CategoryRequest $request) {
    $category = Category::insertCategory($request->all());
    if ($category) {
      Session::flash('message', 'Categoría creada correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al registrar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('categories');
  }

      /**
   * Show the application show.
   *
   * @return \Illuminate\Http\Response
   */
  public function show($id) {
    $category      = Category::find($id);
    return view('category.show', compact('category'));
  }

    /**
   * Show the application Edit.
   *
   * @return \Illuminate\Http\Response
   */
  public function edit($id) {
    $category       = Category::find($id);
    return view('category.edit', compact('category'));
  }

  public function saveUpdate(CategoryUpdateRequest $request, $id) {
    $category = Category::saveUpdate($request->all(), $id);
    if ($category) {
      Session::flash('message', 'Actualizado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al guardar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('/categories');
  }
    /**
   * Show the application Active Deactive.
   *
   * @return \Illuminate\Http\Response
   */
  public function activeDeactive($id) {
    $category = Category::activeDeactive($id);
    if ($category) {
      Session::flash('message', 'Actualizado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al actualizar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('categories');
  }

  /**
   * All active categories for the catalog view.
   *
   * @return \Illuminate\Http\Response
   */
  public function allCategories() {
    $categories = DB::table('categories')
                    ->where('categories.active', true)
                    ->get();
    return $categories;
  }
}
