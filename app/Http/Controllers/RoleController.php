<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleUdpateRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use App\Module;
use App\Role;
use DB;

class RoleController extends Controller
{
  /**
   * Create a new controller instance.
   * @return void
   */
  public function __construct() {
    $this->middleware('auth');
  }

  /**
  * All Roles
  * @param  void
  * @return $roles, $modules, $permissions
  **/
    public function list() {
      $roles   = Role::paginate(8);
      $modules = Module::all();
      $permissions = Role::userPermissions('/roles', 12);
      return view('role/list', compact('roles', 'modules', 'permissions'));
    }

  /**
   * Show view to create a role.
   * @param  void
   * @return void
   **/
    public function create() {
        return view('role/create');
    }

    /**
     * Save a new role.
     * @param  Request  $request
     * @return void
     **/
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
     * @param  $role_id
     * @return $role_name, $role_id
     **/
      public function permission($role_id) {
        $permissions = Role::find($role_id);
        $role_name   = $permissions->name;
        return view('/permission/create', compact('role_name', 'role_id'));
      }

    /**
     * Permissions of a role.
     * @param  $role_id
     * @return $role_permissions
     **/
      public function indexPermission($role_id) {
        $role = Role::find($role_id);
        $role_permissions = $role->permission;
        return json_decode($role_permissions);
      }

    /**
     * Add permission for a Role.
     * @param  Request $request, $role_id
     * @return $permission
     **/
      public function storePermission(Request $request, $role_id) {
        $permission = Role::insertPermission($request, $role_id);
        return response()->json($permission);
      }

    /**
     * Edit permission for a Role.
     * @param  $role_id
     * @return $role_name, $role_id
     **/
      public function showPermission($role_id) {
        $permissions = Role::find($role_id);
        $role_name   = $permissions->name;
        return view('/permission/edit', compact('role_name', 'role_id'));
      }

    /**
     * Save edited permission.
     * @param  Request $request, $role_id
     * @return $permission
     **/
    public function storeEditedPermission(Request $request, $role_id) {

      $permission = Role::storeEditedPermission($request, $role_id);
      return response()->json($permission);
    }

    /**
     * Edit a role.
     * @param  $role_id
     * @return $role, $role_id
     */
      public function editRole($role_id) {
        $role = Role::find($role_id);
        return view('role/edit', compact('role', 'role_id'));
      }

    /**
     * Edit a role.
     * @param  Request $request, $id
     * @return void
     */
    public function saveEditRole(RoleUdpateRequest $request, $id) {
     $role = Role::saveEditRole($request->all(), $id);
     if ($role) {
       Session::flash('message', 'Rol actualizado correctamente.');
       Session::flash('class', 'success');
     } else {
       Session::flash('message', 'Error al actualizar los datos.');
       Session::flash('class', 'danger');
     }
     return redirect()->to('/roles');
    }

    /**
     * Show a role.
     * @param  Request $role_id
     * @return $role, $role_id
     **/
      public function showRole($role_id) {
        $role      = Role::find($role_id);
        return view('role.show', compact('role', 'role_id'));
      }

    /**
     * All roles.
     * @param  void
     * @return $roles
     */
    public function allRoles() {

      if(Auth::user()->role_id == 1) {
        $roles = Role::paginate(20);
      } else {
        $roles = DB::table('roles')
                      ->where('roles.id', '>=' ,3)
                      ->paginate(20);
      }
      return response()->json($roles);
    }

    /**
     * All user's permissions.
     * @param  void
     * @return $data
     */
    public function usersPermission() {

      $permissions = DB::table('roles')
                      ->where('roles.id', Auth::user()->role_id)
                      ->get();
      $modules     = Module::all();
      $data        = [];
      array_push($data, $permissions);
      array_push($data, $modules);
      return response()->json($data);
    }

}
?>

