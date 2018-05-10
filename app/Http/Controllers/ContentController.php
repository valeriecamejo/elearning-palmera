<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Content;
use App\Product;
use DB;

class ContentController extends Controller
{
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
   * @return void
   */
  //TODO: SUSTITUIR EL VALOR DE PRODUCT_ID
  public function index() {
    $contents = Content::paginate(15);
    $product  = Product::find(1);
    return view('content.list', compact('contents', 'product'));
  }

/**
   * Show view for create a content.
   *
   * @return view
   */
  public function create() {
    return view('content.create');
  }

  /**
   * Show the application Create.
   *
   * @param  Request  $request, product_id
   * @return view
   */
  public function store(Request $request, $product_id) {
    // var_dump($request->all());exit();
    $content = Content::insertContent($request->all(), $product_id);
    if ($content) {
      Session::flash('message', 'Contenido guardado exitosamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al guardar contenido.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('contents/create');
  }

  /**
   * Show a content.
   *
   * @param  country_id
   * @return $country, $country_id
   */
  public function show($content_id) {

    $content = Content::find($content_id);
    return view('content.show', compact('content'));
  }

  /**
   * Edit a content.
   *
   * @param  content_id
   * @return $content
   */
  public function edit($content_id) {

    $content = Content::find($content_id);
      return view('content.edit', compact('content'));
  }

  /**
   * Save content edited.
   *
   * @param  Request $request, id
   * @return $id
   */
  public function saveEdit(Request $request, $content_id) {
    $content = Content::saveEdit($request->all(), $content_id);
    if ($content) {
      Session::flash('message', 'Contenido actualizado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al actualizar el contenido.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('contents/edit/'.$content_id);
  }

  /**
   * Activate/Deactivate a Content.
   *
   * @param  content_id
   * @return view
   */
  public function delete($content_id) {

    $content = Content::deleteContent($content_id);
    if ($content) {
      Session::flash('message', 'Actualizado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al eliminar el contenido.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('contents');
  }
}
