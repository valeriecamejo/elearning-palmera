<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserProfileRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\UserEvaluation;
use App\Country;
use App\Brand;
use App\State;
use App\User;
use App\Role;
use DB;

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
   * Show the view to list all the users.
   * @param  void
   * @return $users, $permissions
   **/
    public function index() {
      if(Auth::user()->role_id == 1) {
        $users = User::paginate(15);
      } else {
        $users = DB::table('users')
                      ->where('users.brand_id', Auth::user()->brand_id)
                      ->paginate(15);
      }
      $permissions = Role::userPermissions('/users', 1);
      return view('user.list', compact('users', 'permissions'));
    }
  /**
   * Show view to create a user.
   * @param  void
   * @return $brands, $countries, $roles
   **/
    public function create() {
      $brands    = Brand::all();
      $countries = Country::all();
      $roles     = Role::all();
      return view('user.create', compact('brands','countries','roles'));
    }
  /**
   * Save a user.
   * @param  Request  $request
   * @return \Illuminate\Http\Response
   **/
    public function store(UserRequest $request) {
      $user = User::insertUser($request->all());
      if ($user) {
        Session::flash('message', 'Usuario registrado correctamente.');
        Session::flash('class', 'success');
      } else {
        Session::flash('message', 'Error al registrar los datos.');
        Session::flash('class', 'danger');
      }
      return redirect()->to('users');
    }

  /**
   * Show the application Profile.
   * @param  void
   * @return $user, $brands, $countries
   **/
    public function profile() {
      $user      = User::find(Auth::user()->id);
      $brands    = Brand::all();
      $countries = Country::all();
      return view('user.profile', compact('user','brands','countries'));
    }

  /**
   * Show the application Profile.
   * @param  Request  $request
   * @return void
   **/
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
   * Show a user.
   * @param  $id
   * @return $user, $brand, $country, $role, $state
   **/
    public function show($id) {
      $user      = User::find($id);
      $brand     = Brand::find($user->brand_id);
      $country   = Country::find($user->country_id);
      $role      = Role::find($user->role_id);
      $state     = State::find($user->state_id);
      return view('user.show', compact('user','brand','country','role', 'state'));
    }

  /**
   * Edit a user.
   * @param  $id
   * @return $user, $brand, $country, $role, $state
   **/
    public function edit($id) {
      $user       = User::find($id);
      $brands     = Brand::all();
      $country    = Country::find($user->country_id);
      $state      = State::find($user->state_id);
      $roles      = Role::all();
      return view('user.edit', compact('user','brands','country','roles', 'state'));
    }

  /**
   * Save edited user.
   * @param  Request $request, $id
   * @return void
   **/
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
   * @param  $id
   * @return void
   **/
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
   * @param  $id
   * @return $user, $evaluations
   **/
  public function userEvaluations($id) {
    $user         = User::find($id);
    $evaluations  = UserEvaluation::join('evaluations', 'user_evaluations.evaluation_id', '=', 'evaluations.id')
    ->where('user_id', '=', $id)
    ->select('evaluations.*', 'user_evaluations.id as user_evaluation_id',
    'user_evaluations.score as user_evaluation_score', 'user_evaluations.approved')
    ->paginate(15);

    return view('user.evaluations',
    compact('user','evaluations'));
  }


}
