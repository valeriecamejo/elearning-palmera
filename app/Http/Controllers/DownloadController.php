<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Http\Requests\DownloadRequest;
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
    public function index() {
      $downloads = Download::paginate(15);
      return view('download.list', compact('downloads'));
    }

  /**
   * Upload new file.
   *
   * @return view
   */
    public function create() {
      return view('download.create');
    }

    /**
   * Show the application Create.
   *
   * @param  Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(DownloadRequest $request) {
    $download = Download::insertDownload($request->all());
    if ($download) {
      Session::flash('message', 'Archivo creado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al guardar los datos.');
      Session::flash('class', 'danger');
    }
    return view('download.create');
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

}
