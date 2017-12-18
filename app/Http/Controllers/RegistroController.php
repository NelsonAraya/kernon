<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Cargo;
use App\Usuario;
use App\Role;
class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuario = Usuario::Search($request->s)->paginate(10);
        return view('registro.index',['usu'=>$usuario]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresa = Empresa::pluck('nombre','id');
        $cargo = Cargo::pluck('nombre','id');
        return view('registro.create')
                ->with('cargo',$cargo)
                ->with('empresa',$empresa);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = new Usuario($request->all());
        
        $run = str_replace('.','',$request->run);
        $run = str_replace('-','',$request->run);

        $dv = substr($run, -1);
        $id = substr($run, 0, -1);

        $usuario->id=$id;
        $usuario->dv= $dv;
        $usuario->nombres=strtolower($usuario->nombres);
        $usuario->apellidop=strtolower($usuario->apellidop);
        $usuario->apellidom=strtolower($usuario->apellidom);
        $usuario->password= bcrypt($usuario->id);
        $usuario->save();
        flash('Usuario Registrado')->success();

        return redirect()->route('registro.index');
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
    public function roles($id){
        
        $usu = Usuario::find($id);
        $rol = Role::pluck('descripcion','id');
        return view('registro.role')->with('usu',$usu)->with('roles',$rol);
    }

    public function permisos(Request $request,$id){

        $usu = Usuario::find($id);
        $usu->roles()->detach();

        foreach ((array)$request->roles as $row){
              $usu->roles()->attach($row);
        }
        flash('ermisos Actualizados Correctamente')->info();

        return redirect()->route('registro.roles',$usu->id);
        
    }
}
