@extends('layouts.app')

@extends('layouts.nav')

@section('content')
<div class="container">
@include('flash::message')
            <form class="form-horizontal" method="GET" 
            action="{{ route('registro.index')}}">
            
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="buscar">Buscar</label>
                        <input type="text" id="buscar" name="s" placeholder="busqueda por nombres" class="form-control" autocomplete="off">
                    </div>
                    <div class="col-md-1">
                        <label for="buscar">Buscar</label>
                        <button class="btn btn-success" type="submit">Buscar</button>
                    </div>
                    <div class="col-md-1">
                        <label>Registrar</label>
                        <a class="btn btn-info" href="{{ route('registro.create')}}">Registrar</a>
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
                                <th>EDITAR</th>
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
                                        <a href="{{ route('registro.roles',$row->id)}}" 
                                            class="btn btn-warning justify-content-center">
                                        <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                                        </a>
                                        <a href="" class="btn btn-success justify-content-center">
                                            <span class="glyphicon glyphicon-edit"></span>
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