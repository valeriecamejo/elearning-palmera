<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
}
