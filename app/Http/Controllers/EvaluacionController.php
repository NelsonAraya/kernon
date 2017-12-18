<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Ficha;
use App\SeguimientoFisico;
class EvaluacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuario = Usuario::Search($request->s)->paginate(10);
        //$usuario = Usuario::orderBy('nombres','ASC')->paginate(10);
        return view('evaluacion.index',['usu'=>$usuario]);
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
       // dd($request->1);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usu = Usuario::find($id);
        $ficha = Ficha::where('usuario_id',$id)->orderBy('fecha_ficha','ASC')->paginate(10);
        return view('evaluacion.show')->with('usu',$usu)->with('ficha',$ficha);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usu = Usuario::find($id);
        return view('evaluacion.edit')->with('usu',$usu);
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

    public function buscar(Request $request){

         $usuario = Usuario::orderBy('nombres','ASC')
                    ->Search($request->s)
                    ->paginate(10);
        return view('evaluacion.index',['usu'=>$usuario]);  
    }

    public function crear(Request $request,$id)
    {
        $ficha = new Ficha($request->all());
        $ficha->usuario_id=$id;
        $ficha->profesional_id=auth()->user()->id;
        $ficha->save();
        flash('Ficha Creada')->info();

        return redirect()->route('evaluacion.show',$id);
    }

    public function editar($id){

        $ficha = Ficha::find($id);
        $seg1 = SeguimientoFisico::where('usuario_id',$ficha->usuario->id)
        ->orderBy('fecha_ficha','DESC')->paginate(3,['*'],'fisico');
        return view('evaluacion.editar')->with('ficha',$ficha)
        ->with('seg1',$seg1);
    }

    public function seguimiento1($id){

        $ficha = Ficha::find($id);
        return view('evaluacion.seguimiento1')->with('ficha',$ficha);
    }
    
    public function seguimiento2($id){

    }
    public function seguimiento3($id){

    }


    public function crearSeguimiento1(Request $request,$id)
    {
        $ficha = Ficha::find($id);
        $seg = new SeguimientoFisico($request->all());
        $seg->usuario_id=$ficha->usuario->id;
        $seg->profesional_id=auth()->user()->id;
        $seg->ficha_id=$id;
        $seg->save();

        flash('Seguimiento Creado')->info();

        return redirect()->route('evaluacion.editar',$id);
    }

    public function verseguimiento1($id){

        $ficha = SeguimientoFisico::find($id);
        return view('evaluacion.ver1')->with('ficha',$ficha);
    }

      

}
