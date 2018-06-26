<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Download;
use DB;

class Download extends Model {
  protected $fillable = [
    'brand_id', 'name', 'description', 'from_content', 'product_id'
  ];

  /**
   * Save a File.
   *
   * @var array
   */

  public static function insertDownload($request, $product_id) {
    $download = new Download;
    $download->name         = ucwords($request['name']);
    $download->brand_id     = Auth::user()->brand_id;
    if(isset($request['product_id'])){
      $download->product_id   = $request['product_id'];
    }
    if(isset($request['description'])){
      $download->description  = $request['description'];
    }
    $download->from_content = $request['from_content'];
    if ($download->save()) {
      if(isset($request['file'])){
        $download_file = Download::find($download->id);
        // antes de hacer esto por primera vez hay que hacer php artisan storage:link
        // obtenemos el campo file definido en el formulario
        $file = $request['file'];
        // obtenemos el nombre del archivo y le concatenamos el id al inicio
        $name = $download->id . '_' . $file->getClientOriginalName();
        //Almacenamos en folder el id de la marca que sera el nombre de la carpeta a guardar el archivo
        $folder = "marca_". Auth::user()->brand_id;
        // indicamos que queremos guardar en la carpeta public de storage seguido del id de la marca a la cual pertenece el usuario
        $file->storeAs("public/$folder", $name);
        $download_file->file      = $name;
      }
      if($download_file->save()) {
        return $download_file;
      }
    }
  }

  /**
   * Delete a file.
   *
   * @param  download_id
   * @return $download
   */
  public static function deleteDownload($download_id) {

    $download = DB::table('downloads')->where('id', '=', $download_id)->delete();
    return $download;
  }

  /**
  * Save file edited.
  *
  * @return download
  */
  public static function saveEdit($request, $download_id, $product_id) {

    $download              = Download::find($download_id);
    $download->name        = ucwords($request['name']);
    $download->from_content = $request['from_content'];
    if(isset($request['description'])){
      $download->description  = $request['description'];
    }
    if ($download->save()) {
      if(isset($request['file'])){
        $download_file = Download::find($download->id);
        // antes de hacer esto por primera vez hay que hacer php artisan storage:link
        // obtenemos el campo file definido en el formulario
        $file = $request['file'];
        // obtenemos el nombre del archivo y le concatenamos el id al inicio
        $name = $download->id . '_' . $file->getClientOriginalName();
        //Almacenamos en folder el id de la marca que sera el nombre de la carpeta a guardar el archivo
        $folder = "marca_". Auth::user()->brand_id;
        // indicamos que queremos guardar en la carpeta public de storage seguido del id de la marca a la cual pertenece el usuario
        $file->storeAs("public/$folder", $name);
        $download_file->file      = $name;
      }
      if($download_file->save()) {
        return $download_file;
      }
    }
  }
}
