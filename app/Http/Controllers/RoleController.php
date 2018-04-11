<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{

  /**
  * Show the application List for Roles.
     *
     * @return view(role/list)`
     */
    public function list()
    {
      $roles = Role::all();
      return view('role/list', compact('roles'));
    }

    /**
     * Shows view to create new role.
     *
     * @return view(role/create)
     */
    public function create() {
        return view('role/create');
    }

    /**
     * Create new role.
     *
     * @return void
     */
    public function store() {

      $new_role = Role::insertRole($_POST);
      if ($new_role) {
        Session::flash('message', 'Rol registrado correctamente.');
        Session::flash('class', 'success');
        } else {
        Session::flash('message', 'Error al registrar los datos.');
        Session::flash('class', 'danger');
        }
      return redirect()->to('roles/create');
    }
}
?>
