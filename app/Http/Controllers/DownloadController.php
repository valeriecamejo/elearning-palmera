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
   * Show the application List.
   *
   * @return downloads
   */
  //TODO: consultar todos los archivos
    public function index($product_id) {

      $downloads = Download::where('brand_id', Auth::user()->brand_id)
                           ->where('product_id', $product_id)
                           ->paginate(15);
      return view('download.list', compact('downloads', 'product_id'));
    }

  /**
   * Upload new file.
   *
   * @return view
   */
    public function create($product_id) {
      return view('download.create', compact('product_id'));
    }

    /**
   * Show the application Create.
   *
   * @param  Request  $request
   * @return \Illuminate\Http\Response
   */
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
   * Show a country.
   *
   * @param  country_id
   * @return $country, $country_id
   */
    public function show($download_id) {

      $download = Download::find($download_id);
      return view('download.show', compact('download'));
    }

    /**
   * Delete a File.
   *
   * @param  download_id
   * @return view
   */
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
   *
   * @param  download_id
   * @return $download
   */
    public function edit($download_id, $product_id) {

      $download = Download::find($download_id);
        return view('download.edit', compact('download', 'product_id'));
    }

    /**
   * Save country edited.
   *
   * @param  Request $request, id
   * @return $id
   */
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
   * Save country edited.
   *
   * @param  id
   * @return $id
   */
    public function downloadByProduct($product_id) {

      $downloads   = Download::where('brand_id', Auth::user()->brand_id)
                           ->where('product_id', $product_id)
                           ->paginate(20);
      return response()->json($downloads);
    }
}
