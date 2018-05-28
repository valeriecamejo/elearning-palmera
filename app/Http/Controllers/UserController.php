<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserProfileRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Session;
use App\Brand;
use App\Country;
use App\Role;
use App\UserEvaluation;
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
    $roles     = Role::all();
    return view('user.create', compact('brands','countries','roles'));
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

    /**
   * Show the application show.
   *
   * @return \Illuminate\Http\Response
   */
  public function show($id) {
    $user      = User::find($id);
    $brand     = Brand::find($user->brand_id);
    $country   = Country::find($user->country_id);
    $role      = Role::find($user->role_id);
    return view('user.show', compact('user','brand','country','role'));
  }

    /**
   * Show the application Edit.
   *
   * @return \Illuminate\Http\Response
   */
  public function edit($id) {
    $user       = User::find($id);
    $brands     = Brand::all();
    $countries  = Country::all();
    $roles      = Role::all();
    return view('user.edit', compact('user','brands','countries','roles'));
  }

  public function saveUpdate(UserUpdateRequest $request, $id) {
    $user = User::saveUpdate($request->all(), $id);
    if ($user) {
      Session::flash('message', 'Actualizado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al guardar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('users/edit/'.$id);
  }
    /**
   * Show the application Active Deactive.
   *
   * @return \Illuminate\Http\Response
   */
  public function activeDeactive($id) {
    $user = User::activeDeactive($id);
    if ($user) {
      Session::flash('message', 'Actualizado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al actualizar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('users');
  }
  /**
   * Show the application show.
   *
   * @return \Illuminate\Http\Response
   */
  public function userEvaluations($id) {
    $user         = User::find($id);
    $evaluations  = UserEvaluation::join('evaluations', 'user_evaluations.evaluation_id', '=', 'evaluations.id')
    ->where('user_id', '=', $id)
    ->select('evaluations.*', 'user_evaluations.id as user_evaluation_id',
    'user_evaluations.score as user_evaluation_score', 'user_evaluations.approved')
    ->paginate(15);
    // select('id', 'answer', 'question_id', 'correct'   )
    return view('user.evaluations',
    compact('user','evaluations'));
  }


}
