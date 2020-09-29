<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RolValidation;
use App\Models\Admin\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $datas = Rol::orderBy('id')->get();
    return view('admin.rol.index', compact('datas'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.rol.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(RolValidation $request)
  {
    Rol::create($request->all());
    return redirect(route('rol'))->with('message', 'Rol creado con exito');
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
    /**
     * El metodo find or fail de laravel busca un elemento
     * pero si no lo encuentra falla y me genera un 404
     */
    $data = Rol::findOrFail($id);
    return view('admin.rol.edit', compact('data'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(RolValidation $request, $id)
  {
    Rol::findOrFail($id)->update($request->all());
    return redirect(route('rol'))->with('message', 'Rol actualizado con exito');
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
