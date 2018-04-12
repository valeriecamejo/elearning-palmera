<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Session;
use App\Brand;
use App\Country;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct() {
    $this->middleware('auth');
  }

  /**
   * Show the application List Users.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $users = User::paginate(15);
    return view('user.list', compact('users'));
  }
  /**
   * Show the application Create Users.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    $brands    = Brand::all();
    $countries = Country::all();
    return view('user.create', compact('brands','countries'));
  }
  /**
   * Show the application Create Users.
   *
   * @param  Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(UserRequest $request) {
    $user = User::insertUser($request->all());
    if ($user) {
      Session::flash('message', 'Usuario registrado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al registrar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('users/create');
  }

    /**
   * Show the application Profile.
   *
   * @return \Illuminate\Http\Response
   */
  public function profile() {
    $user      = User::find(Auth::user()->id);
    $brands    = Brand::all();
    $countries = Country::all();
    return view('user.profile', compact('user','brands','countries'));
  }

    /**
   * Show the application Profile.
   *
   * @param  Request  $request
   * @return \Illuminate\Http\Response
   */
  public function saveProfile(UserProfileRequest $request) {
    $user = User::saveProfile($request->all());
    if ($user) {
      Session::flash('message', 'Actualizado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al guardar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('users/profile');
  }

}
