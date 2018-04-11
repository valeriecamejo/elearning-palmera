<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
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
        return view('user.create');
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
}
