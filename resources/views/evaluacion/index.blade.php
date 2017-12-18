@extends('layouts.app')

@section('content')
<div class="container">
@include('flash::message')
            <form class="form-horizontal" method="GET" 
            action="{{ route('evaluacion.index')}}">
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="buscar">Buscar</label>
                        <input type="text" id="buscar" name="s" placeholder="busqueda por nombres" class="form-control" autocomplete="off">
                    </div>
                    <div class="col-md-1">
                        <label for="buscar">Buscar</label>
                        <button class="btn btn-success" type="submit">Buscar</button>
                    </div>
                </div>
            </form> 
            <br>  
            <div class="panel panel-primary">
                <div class="panel-heading">LIstado Usuario</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>R.U.N</th>
                                <th>NOMBRE</th>
                                <th>EMPRESA</th>
                                <th>CARGO</th>
                                <th>EVALUAR</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($usu as $row)
                                <tr>
                                    <td> {{ $row->runCompleto() }} </td>
                                    <td>{{ $row->nombreCompleto() }}  </td>
                                    <td>{{ $row->empresa->nombre }}  </td>
                                    <td>{{ $row->cargo->nombre }}  </td>
                                    <td>
                                        <a href="{{ route('evaluacion.show',$row->id) }}" class="btn btn-success justify-content-center">
                                            <span class="glyphicon glyphicon-heart"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $usu->links() }}
                    </div>
                </div>
            </div>            
</div>
@endsection  		