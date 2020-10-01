<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Menu;
use App\Models\Admin\Rol;
use Illuminate\Http\Request;

class RolHasMenuController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
    $roles = Rol::orderBy('id')->pluck('name', 'id')->toArray();
    $menus = Menu::getMenus();
    $menuHasRol = Menu::with('roles')
      ->get()
      ->pluck('roles', 'id')
      ->toArray();
    // dd($menuHasRol);
    return view('admin.rol-has-menu.index', compact('roles', 'menus', 'menuHasRol'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    if ($request->ajax()) {
      $menus = new Menu();
      $message = "";
      /**
       * input() ya que los datos se envia por ajax es un input
       * Luego lo que hace es buscar el menú segun el id para
       * posteriormente por medio de la relaciones roles del modelo menu 
       * attach: Crea la relacion
       * detach: Elimina la relacion
       */
      if ($request->input('estado') == 1) {
        $menus->find($request->input('menu_id'))->roles()->attach($request->input('rol_id'));
        $message = "El rol se asigno correctamente";
      }else{
        $menus->find($request->input('menu_id'))->roles()->detach($request->input('rol_id'));
        $message = "El rol se eliminó correctamente";
      }

      return response()->json(['message' => $message]);
    } else {
      abort(404);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
