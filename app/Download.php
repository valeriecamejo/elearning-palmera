<?php

namespace App;
use DB;
use App\Download;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class Download extends Model {
  protected $fillable = [
    'brand_id', 'name', 'description', 'from_content'
  ];

  /**
   * Save a File.
   *
   * @var array
   */
  protected $hidden = [];

  public static function insertDownload($request) {
    // var_dump();exit();
    $download = new Download;
    $download->name         = $request['name'];
    $download->description  = $request['description'];
    $download->brand_id     = Auth::user()->brand_id;
    $download->from_content = $request['from_content'];
    if ($download->save()) {
      if(isset($request['file'])){
        $download_file = Download::find($download->id);
        // antes de hacer esto por primera vez hay que hacer php artisan storage:link
        // obtenemos el campo file definido en el formulario
        $file = $request['file'];
        // obtenemos el nombre del archivo y le concatenamos el id al inicio
        $name = $download->id . '_' . $file->getClientOriginalName();
        // var_dump($name);exit();
        //Almacenamos en folder el id de la marca que sera el nombre de la carpeta a guardar el archivo
        $folder = Auth::user()->brand_id;
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
