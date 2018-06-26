<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Brand extends Model {
  use Notifiable;
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $table = 'brands';
  protected $fillable = [
    'name', 'navbar_color', 'logo', 'header'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  
  //TODO: modificar el nombre del logo y el header
  public static function insertBrand($request) {
    $brand                    = new Brand;
    $brand->name              = $request['name'];
    $brand->navbar_color      = $request['navbar_color'];
    if ($brand->save()) {
      $brand_images = Brand::find($brand->id);
      if(isset($request['logo'])){
        // antes de hacer esto por primera vez hay que hacer php artisan storage:link
        // obtenemos el campo file definido en el formulario
        $file   = $request['logo'];
        // obtenemos el nombre del archivo y le concatenamos el id al inicio
        $name   = $file->getClientOriginalName();
        //Almacenamos en folder el id de la marca que sera el nombre de la carpeta a guardar el archivo
        $folder = "marca_". Auth::user()->brand_id;
        // indicamos que queremos guardar en la carpeta public de storage seguido del id de la marca a la cual pertenece el usuario
        $file->storeAs("public/$folder", $name);
        $brand_images->logo = 'marca_1/' . $name;
      }
      if(isset($request['header'])){
        // antes de hacer esto por primera vez hay que hacer php artisan storage:link
        // obtenemos el campo file definido en el formulario
        $file   = $request['header'];
        // obtenemos el nombre del archivo y le concatenamos el id al inicio
        $name   = $file->getClientOriginalName();
        //Almacenamos en folder el id de la marca que sera el nombre de la carpeta a guardar el archivo
        $folder = "marca_". Auth::user()->brand_id;
        // indicamos que queremos guardar en la carpeta public de storage seguido del id de la marca a la cual pertenece el usuario
        $file->storeAs("public/$folder", $name);
        $brand_images->header = 'marca_1/' . $name;
      }
      if($brand_images->save()) {
        return $brand_images;
      } else {
        return $brand->save;
      }
    }
  }

  public static function saveUpdate($request, $id) {
    $brand               = Brand::find($id);
    $brand->name         = $request['name'];
    $brand->navbar_color = $request['navbar_color'];
    if ($brand->save()) {
      $brand_images = Brand::find($brand->id);
      if(isset($request['logo'])){
        // antes de hacer esto por primera vez hay que hacer php artisan storage:link
        // obtenemos el campo file definido en el formulario
        $file   = $request['logo'];
        // obtenemos el nombre del archivo y le concatenamos el id al inicio
        $name   = $file->getClientOriginalName();
        //Almacenamos en folder el id de la marca que sera el nombre de la carpeta a guardar el archivo
        $folder = "marca_". Auth::user()->brand_id;
        // indicamos que queremos guardar en la carpeta public de storage seguido del id de la marca a la cual pertenece el usuario
        $file->storeAs("public/$folder", $name);
        $brand_images->logo = 'marca_1/' . $name;
      }
      if(isset($request['header'])){
        // antes de hacer esto por primera vez hay que hacer php artisan storage:link
        // obtenemos el campo file definido en el formulario
        $file   = $request['header'];
        // obtenemos el nombre del archivo y le concatenamos el id al inicio
        $name   = $file->getClientOriginalName();
        //Almacenamos en folder el id de la marca que sera el nombre de la carpeta a guardar el archivo
        $folder = "marca_". Auth::user()->brand_id;
        // indicamos que queremos guardar en la carpeta public de storage seguido del id de la marca a la cual pertenece el usuario
        $file->storeAs("public/$folder", $name);
        $brand_images->header = 'marca_1/' . $name;
      }
      if($brand_images->save()) {
        return $brand_images;
      } else {
        return $brand->save;
      }
    }
  }

  public static function activeDeactive($id) {
    $brand           = Brand::find($id);
    if ($brand->active == true) {
      $brand->active = false;
    } else {
      $brand->active = true;
    }
    if ($brand->save()) {
      return $brand;
    }
  }
}
