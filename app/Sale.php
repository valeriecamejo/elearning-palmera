<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class Sale extends Model {
     /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'description', 'user_id','product_id', 'brand_id','quantity','store', 'file','reference', 'is_approved', 'date'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [];

  public static function insertSale($request) {
    $sale               = new Sale;
    $sale->description  = $request['description'];
    $sale->user_id      = $request['user_id'];
    $sale->product_id   = $request['product_id'];
    $sale->date         = $request['date'];
    $sale->brand_id     = Auth::user()->brand_id;
    $sale->quantity     = $request['quantity'];
    $sale->store        = $request['store'];
    $sale->reference    = $request['reference'];
    if(isset($request['file'])){
      // antes de hacer esto por primera vez hay que hacer php artisan storage:link
      // obtenemos el campo file definido en el formulario
      $file = $request['file'];
      // obtenemos el nombre del archivo
      $name = $file->getClientOriginalName();
      // indicamos que queremos guardar en la carpeta public de storage
      $file->storeAs('public/', $sale->brand_id);
      $sale->file         = $name;
    }
    if ($sale->save()) {
      return $sale;
    }
  }


  public static function approveDisapprove($id) {
    $Sale           = Sale::find($id);
    if ($sale->is_approved == true) {
      $sale->is_approved    = false;
      $sale->supervisor_id  = Auth::user()->brand_id;
    } else {
      $sale->is_approved    = true;
      $sale->supervisor_id  = Auth::user()->brand_id;
    }
    if ($sale->save()) {
      return $sale;
    }
  }}
