@extends('layouts.app')

@extends('layouts.nav')

@section('content')
<div class="container">
@include('flash::message')
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
                                <th>ACCIONES</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($usu as $row)
                                <tr>
                                    <td> {{ $row->runCompleto() }} </td>
                                    <td>{{ $row->nombres }}  </td>
                                    <td>{{ $row->empresa->nombre }}  </td>
                                    <td>{{ $row->cargo->nombre }}  </td>
                                    <td>
                                        <a href="" class="btn btn-success justify-content-center">
                                            <i class="fa fa-heartbeat" aria-hidden="true"></i>
                                        </a>
                                        <a href="" class="btn btn-danger justify-content-center">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
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