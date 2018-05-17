<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContentUpdateRequest;
use App\Http\Requests\ContentRequest;
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
  public function index($product_id) {
    $contents = Content::where('product_id', $product_id)->paginate(15);
    $product  = Product::find($product_id);
    return view('content.list', compact('contents', 'product'));
  }

/**
   * Show view for create a content.
   *
   * @return view
   */
  public function create($product_id) {
    return view('content.create', compact('product_id'));
  }

  /**
   * Show the application Create.
   *
   * @param  Request  $request, product_id
   * @return view
   */
  public function store(ContentRequest $request, $id) {
    // var_dump($request['title'], $request['editor1']);exit();
    $content = Content::insertContent($request->all(), $id);
    if ($content) {
      Session::flash('message', 'Contenido guardado exitosamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al guardar contenido.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('contents/create/'.$id);
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
  public function saveEdit(ContentUpdateRequest $request, $content_id) {

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
   * Delete a Content.
   *
   * @param  content_id
   * @return contents
   */
  public function delete($content_id, $product_id) {

    $content  = Content::deleteContent($content_id);
    $contents = Content::where('product_id', $product_id)->paginate(15);
    $product  = Product::find($product_id);
    if ($content) {
      Session::flash('message', 'Actualizado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al eliminar el contenido.');
      Session::flash('class', 'danger');
    }
    return redirect()->action(
      'ContentController@index', ['id' => $product_id]
    );
  }
  /**
   * Content by Product.
   *
   * @param  product_id
   * @return view
   */
  public function contentByProduct($product_id) {
    $contents = Content::contentByProduct($product_id);
    $product  = Product::find($product_id);
    return view('catalog.product', compact('contents', 'product'));
  }
}
