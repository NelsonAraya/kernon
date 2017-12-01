<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Cargo;
use App\Usuario;
class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Usuario::orderBy('nombres','ASC')->paginate(10);
        return view('registro.index',['usu'=>$usuario,'ActiveMenu'=>'registro']);
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
                ->with('ActiveMenu','registro')
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
        list($usuario->run, $usuario->dv)= explode('-',$request->run);
        /*
        $run=explode('-',$request->run)[0];
        $dv=explode('-',$request->run)[1];
        $usuario->run=$run;
        $usuario->dv=$dv;
        */
        $usuario->password= bcrypt($usuario->run);
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
}
