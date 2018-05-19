<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use DB;

class Content extends Model {
    /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $table = 'contents';
  protected $fillable = [
    'product_id', 'name'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */

  public static function insertContent($request, $product_id) {
    $content             = new Content;
    $content->product_id = $product_id;
    $content->name       = ucwords($request['name']);
    $content->data       = $request['editor1'];
    if ($content->save()) {
      return $content;
    }
  }

  /**
  * Save content edited.
  *
  * @return content
  */
  public static function saveEdit($request, $content_id) {

    $content        = Content::find($content_id);
    $content->name  = ucwords($request['name']);
    $content->data  = $request['editor1'];

    if ($content->save()) {
      return $content;
    }
  }

  /**
   * Delete a content.
   *
   * @param  content_id
   * @return $content
   */
  public static function deleteContent($content_id) {

    $content = DB::table('contents')->where('id', '=', $content_id)->delete();
    return $content;
  }

  /**
   * Content by Product.
   *
   * @param  content_id
   * @return $content
   */
  public static function contentByProduct($product_id) {

    $contents = DB::table('contents')->where('product_id', '=', $product_id)->get();
    return $contents;
  }
}
