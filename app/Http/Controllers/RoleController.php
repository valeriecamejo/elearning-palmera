<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use App\Role;
use App\Module;

class RoleController extends Controller
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
  * Show the application List for Roles.
     *
     * @return view(role/list)`
     */
    public function list()
    {
      $roles   = Role::paginate(8);
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
    public function store(RoleRequest $request) {

      $modules = Module::all();
      $role = Role::insertRole($request, $modules);
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
     * Consult permissions for a Role.
     *
     * @return void
     */
    public function permission($role_id) {

      $permissions = Role::find($role_id);
      $role_name   = $permissions->name;
      return view('/permission/create', compact('role_name', 'role_id'));
    }

    /**
     * Permissions of a role.
     *
     * @return void
     */
    public function indexPermission($role_id) {

      $role = Role::find($role_id);
      $role_permissions = $role->permission;
      return json_decode($role_permissions);
    }

    /**
     * Add permission for a Role.
     *
     * @return void
     */
    public function storePermission(Request $request, $id) {

      var_dump("llegue", $id, $request->all());exit();
    }

}
?>

