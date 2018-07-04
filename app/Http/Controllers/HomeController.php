<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\BrandNew;
use App\Brand;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   * @return void
   */
  public function __construct() {
    $this->middleware('auth');
  }

  /**
   * Show the view to list all the brand's new.
   * @param  void
   * @return $brand_news, $brand
   **/
  public function index() {
    $brand_news = BrandNew::where('brand_id', Auth::user()->brand_id)->where('active', true)->paginate(15);
    $brand      = Brand::find(Auth::user()->brand_id);
    return view('home', compact('brand_news', 'brand'));
  }
}
