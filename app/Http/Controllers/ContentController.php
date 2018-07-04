<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContentUpdateRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ContentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Download;
use App\Content;
use App\Product;
use DB;

class ContentController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   **/
  public function __construct() {
    $this->middleware('auth');
  }

  /**
   * Show the view to list all the contents.
   * @param  $product_id
   * @return $contents, $product, $product_id
   **/
  public function index($product_id) {
    $contents = Content::where('product_id', $product_id)->paginate(15);
    $product  = Product::find($product_id);
    return view('content.list', compact('contents', 'product', 'product_id'));
  }

  /**
   * Show view for create a content.
   * @param  $product_id
   * @return $product
   **/
  public function create($product_id) {
    $product = Product::find($product_id);
    return view('content.create', compact('product'));
  }

  /**
   * Save a new content.
   * @param  Request $request, $id
   * @return void
   **/
  public function store(ContentRequest $request, $id) {
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
   * @param  content_id
   * @return $content
   **/
  public function show($content_id) {
    $content = Content::find($content_id);
    return view('content.show', compact('content'));
  }

  /**
   * Edit a content.
   * @param  content_id
   * @return $content
   **/
  public function edit($content_id) {
    $content = Content::find($content_id);
      return view('content.edit', compact('content'));
  }

  /**
   * Save edited content.
   * @param  Request $request, $content_id
   * @return void
   **/
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
   * @param  $content_id, $product_id
   * @return void
   **/
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
   * Show saved images of a brand.
   * @param  $brand_id
   * @return images
   */
  public function contentImages($brand_id) {
    $images = Download::where('brand_id', $brand_id)
                      ->where('from_content', true)
                      ->paginate(15);
    return view('content.images', compact('images'));
  }

  /**
   * Show view to save new image.
   * @param  $brand_id
   * @return $brand_id
   **/
  public function newImage($brand_id) {
    return view('content.new_image', compact('brand_id'));
  }

  /**
   * Save edited image.
   * @param  Request $request, $brand_id
   * @return void
   **/
  public function saveNewImage(Request $request, $brand_id) {
    $newImage = Download::insertDownload($request->all(), $request['product_id']);
    if ($newImage) {
      Session::flash('message', 'Imagen agregada correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al actualizar el contenido.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('/contents/images/' . $brand_id);
  }

  /**
   * Shows contents by products.
   * @param  $product_id
   * @return json->contents
   **/
  public function contentByProduct($product_id) {
    $contents = DB::table('contents')
                  ->where('contents.product_id', $product_id)
                  ->paginate(15);
    return response()->json($contents);
  }
}
