<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Asistencia_usuario;
use App\Empresa;
class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('asistencia.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresa = Empresa::pluck('nombre','id');
        return view('asistencia.buscar')
                ->with('empresa',$empresa)
                ->with('ActiveMenu','info');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $run=explode('-',$request->run)[0];
        $obj= Usuario::where('run',$run)->get();
        $asistencia = new Asistencia_usuario();
        $asistencia->usuario_id=$obj[0]->id;
        $asistencia->save();

        flash('Asistencia Registrada')->success();

        return redirect()->route('asistencia.index');
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

    public function buscar (Request $request){

        $usu=Usuario::where('empresa_id',$request->empresa_id)->paginate(10);
        foreach ($usu as $key => $row) {
            $count = Asistencia_usuario::whereBetween('created_at',[$request->inicio, $request->termino.' 23:59:59'])
            ->where('usuario_id',$row->id)->count();
            $usu[$key]->cantidad = $count;
        }
        $empresa = Empresa::pluck('nombre','id');
        return view('asistencia.buscar')
                ->with('empresa',$empresa)
                ->with('usu',$usu);
    }
}
