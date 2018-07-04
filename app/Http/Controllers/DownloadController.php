<?php

namespace App\Http\Controllers;

use App\Http\Requests\DownloadUpdateRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\DownloadRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Download;
Use DB;


class DownloadController extends Controller {
  /**
   * Create a new controller instance.
   *
   * @return void
   */
    public function __construct() {
      $this->middleware('auth');
    }

  /**
   * Show the view to list all the evaluations.
   * @param  product_id
   * @return downloads
   **/
    public function index($product_id) {
      $downloads = Download::where('brand_id', Auth::user()->brand_id)
                           ->where('product_id', $product_id)
                           ->paginate(15);
      return view('download.list', compact('downloads', 'product_id'));
    }

  /**
   * Show view to create a new file.
   * @param  $product_id
   * @return $product_id
   **/
    public function create($product_id) {
      return view('download.create', compact('product_id'));
    }

  /**
   * Save to a new file.
   * @param  Request  $request, $product_id
   * @return $product_id
   **/
  public function store(DownloadRequest $request, $product_id) {
    $download = Download::insertDownload($request->all(), $product_id);
    if ($download) {
      Session::flash('message', 'Archivo creado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al guardar los datos.');
      Session::flash('class', 'danger');
    }
    return view('download.create', compact('product_id'));
  }

  /**
   * Show a file.
   * @param  $download_id
   * @return $download
   **/
    public function show($download_id) {
      $download = Download::find($download_id);
      return view('download.show', compact('download'));
    }

  /**
   * Delete a File.
   * @param  $product_id
   * @return void
   **/
  public function delete($download_id, $product_id) {
    $download = Download::deleteDownload($download_id);
    if ($download) {
      Session::flash('message', 'Actualizado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al eliminar el archivo.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('downloads/' . $product_id);
  }

   /**
   * Edit a file.
   * @param  $download_id, $product_id
   * @return $download, $product_id
   **/
    public function edit($download_id, $product_id) {
      $download = Download::find($download_id);
        return view('download.edit', compact('download', 'product_id'));
    }

  /**
   * Save edited file
   * @param  Request $request, $download_id, $product_id
   * @return void
   **/
    public function saveEdit(DownloadUpdateRequest $request, $download_id, $product_id) {
      $download = Download::saveEdit($request->all(), $download_id, $product_id);
      if ($download) {
        Session::flash('message', 'Archivo actualizado correctamente.');
        Session::flash('class', 'success');
      } else {
        Session::flash('message', 'Error al actualizar los datos.');
        Session::flash('class', 'danger');
      }
      return redirect()->to('downloads/edit/' . $download_id . '/' . $product_id);
    }

  /**
   * All the files of a product.
   * @param  $product_id
   * @return $downloads
   **/
    public function downloadByProduct($product_id) {
      $downloads   = Download::where('brand_id', Auth::user()->brand_id)
                           ->where('product_id', $product_id)
                           ->paginate(20);
      return response()->json($downloads);
    }
}
