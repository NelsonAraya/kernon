@extends('layouts.app')

@extends('layouts.nav')

@section('content')
<div class="container">
@include('flash::message')
{{ @$usu }}
            <div class="panel panel-success">
                <div class="panel-heading">Buscador</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('informe.buscar') }}">
                         {{ csrf_field() }}
                         <div class="form-group row">
                             <div class="col-md-2">
                                 <label for="inicio">INICIO</label>
                                 <input type="date" id="inicio" name="inicio" class="form-control">
                             </div>
                             <div class="col-md-2">
                                 <label for="termino">TERMINO</label>
                                 <input type="date" id="termino" name="termino" class="form-control">
                             </div>
                            <div class="col-md-3">
                                <label for="empresa">Empresa</label>
                                <select id="empresa" name="empresa_id" class="form-control">
                                    <option value="">-- Seleccione --</option>
                                    @foreach($empresa as $key => $row)
                                        <option value="{{ $key }}"> {{ $row }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-1">
                                <label for="buscar">Buscar</label>
                                <button type="submit" class="btn btn-success">Buscar</button>
                            </div>
                         </div>
                    </form>     
                </div>
            </div>
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
                                <th>ASISTIDO</th>
                            </tr>
                            </thead>
                            <tbody>
                            @isset($usu)    
                            @foreach ($usu as $row)
                                <tr>
                                    <td> {{ $row->runCompleto() }} </td>
                                    <td>{{ $row->nombreCompleto() }}  </td>
                                    <td>{{ $row->empresa->nombre }}  </td>
                                    <td>{{ $row->cargo->nombre }}  </td>
                                    <td><b>{{ $row->cantidad }}</b></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $usu->links() }}
                        @endisset
                    </div>
                </div>
            </div>            
</div>
@endsection  		