<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
{
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
   * @return void
   */
  public function index() {
    return view('content.list');
  }

/**
   * Show view for create a content.
   *
   * @return view
   */
  public function create() {
    return view('content.create');
  }
}
