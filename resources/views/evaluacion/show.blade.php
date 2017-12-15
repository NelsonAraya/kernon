@extends('layouts.app')

@extends('layouts.nav')

@section('content')
<div class="container">
@include('flash::message')
            <h3>FICHAS DEL USUARIO {{ $usu->nombreCompleto() }}</h3>
            <form class="form-horizontal" method="GET" action="{{ route('evaluacion.buscar')}}">
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="buscar">Buscar</label>
                        <input type="text" id="buscar" name="s" placeholder="keyword" class="form-control" autocomplete="off">
                    </div>
                    <div class="col-md-1">
                        <label for="buscar">Buscar</label>
                        <button class="btn btn-success" type="submit">Buscar</button>
                    </div>
                    <div class="col-md-1">
                        <label>Nuevo</label>
                        <a href="{{ route('evaluacion.edit',$usu->id) }}" class="btn btn-info" role="button">Nueva Ficha</a>
                    </div>   
                </div>
            </form> 
            <br>
            <div class="panel panel-primary">
                <div class="panel-heading">LIstado de Fichas</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>FECHA FICHA</th>
                                <th>ACCION</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($ficha as $row)
                                <tr>
                                    <td> {{ $row->fecha_ficha }} </td>
                                    <td>
                                        <a href="{{ route('evaluacion.editar',$row->id) }}" class="btn btn-success justify-content-center">
                                            <span class="glyphicon glyphicon-heart"></span>
                                        </a>
                                        <a href="" class="btn btn-danger justify-content-center">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $ficha->render() }}
                    </div>
                </div>
            </div>              
</div>
@endsection  		