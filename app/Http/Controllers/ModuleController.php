<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Module;

class ModuleController extends Controller
{

  /**
  * Show the application List for Modules.
     *
     * @return view(role/list)`
     */
    public function list()
    {
      $modules = Module::all();
      return view('role/list', compact('modules'));
    }

}
?>