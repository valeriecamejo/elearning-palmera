<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Http\Requests\ModuleUpdateRequest;
use App\Http\Requests\ModuleRequest;
use Illuminate\Http\Request;
use App\Module;
use App\User;

class ModuleController extends Controller
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
    * Show the application List for Modules.
     *
     * @return $modules
     */
    public function index()
    {
      $modules = Module::paginate(10);
      return view('module.list', compact('modules'));
    }
    /**
    * Show the application List for Modules.
     *
     * @return view(module/list)`
     */
    public function list()
    {
      $modules = Module::all();
      return $modules;
    }

    /**
    * Create new module.
    *
    * @param  void
    * @return void
    */
    public function create() {
      return view('module.create');
    }

    /**
   * Save a module.
   *
   * @param  Request  $request
   * @return void
   */
  public function store(ModuleRequest $request) {

    $module = Module::insertModule($request->all());
    if ($module) {
      Session::flash('message', 'Modulo registrado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al registrar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('/modules');
  }

  /**
   * Show a module.
   *
   * @param  state_id
   * @return \Illuminate\Http\Response
   */
  public function show($module_id) {

    $module   = Module::find($module_id);
    $user     = User::find($module->user_id_deactive);
    return view('module.show', compact('module', 'user'));
  }

   /**
   * View for edit module.
   *
   * @param  module_id
   * @return module
   */
    public function edit($module_id) {

    $module    = Module::find($module_id);
    return view('module.edit', compact('module'));
  }

  /**
   * View for edit module.
   *
   * @param  state_id
   * @return void
   */
  public function saveEdit(ModuleUpdateRequest $request, $id) {

    $module = Module::saveEdit($request->all(), $id);
    if ($module) {
      Session::flash('message', 'Modulo actualizado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al actualizar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('/modules');
  }

  /**
   * View for edit state/province.
   *
   * @param  state_id
   * @return state
   */
  public function editDeactive($module_id) {

    $module     = Module::find($module_id);
    if ($module->active == true) {
      return view('module.deactive_description', compact('module'));
    } else {
      $module = Module::activeDeactive($module_id);
      if ($module) {
        Session::flash('message', 'Actualizado correctamente.');
        Session::flash('class', 'success');
      } else {
        Session::flash('message', 'Error al actualizar los datos.');
        Session::flash('class', 'danger');
      }
      return redirect()->to('modules');
    }
  }

   /**
   * Save deactive's description.
   *
   * @param  module_id
   * @return url
   */
  public function saveDeactive(Request $request) {

    $module = Module::saveDeactive($request);
    if ($module) {
      Session::flash('message', 'Actualizado correctamente.');
      Session::flash('class', 'success');
    } else {
      Session::flash('message', 'Error al actualizar los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('/modules');
  }
}
?>