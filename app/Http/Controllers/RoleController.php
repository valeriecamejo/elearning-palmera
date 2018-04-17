<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Role;
use App\Module;

class RoleController extends Controller
{

  /**
  * Show the application List for Roles.
     *
     * @return view(role/list)`
     */
    public function list()
    {
      $roles   = Role::paginate(15);
      $modules = Module::all();
      return view('role/list', compact('roles', 'modules'));
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

      $role = Role::insertRole($_POST);
      if ($role) {
        Session::flash('message', 'Rol registrado correctamente.');
        Session::flash('class', 'success');
        } else {
        Session::flash('message', 'Error al registrar los datos.');
        Session::flash('class', 'danger');
        }
      return redirect()->to('roles/create');
    }

    /**
     * Create new role.
     *
     * @return void
     */
    public function permission() {

      $permission = Role::insertPermission($_POST);
      return redirect()->to('roles/create');
    }
}
?>