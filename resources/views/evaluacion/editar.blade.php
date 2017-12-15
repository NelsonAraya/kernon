@extends('layouts.app')

@extends('layouts.nav')

@section('content')
<div class="container">
@include('flash::message')
	<H3>FICHA  DE {{ $ficha->usuario->nombreCompleto() }}</H3>
 	<div class="panel panel-primary">
  		<div class="panel-heading"> COMPOSICION CORPORAL Y CONDICION FISICA (DIAGNOSTICO)</div>
  			<div class="panel-body">
  				<form class="form-horizontal" method="POST" action="{{ route('evaluacion.crear',$ficha->id) }}">
  					 {{ csrf_field() }}
  					<div class="form-group row">
  						<div class="col-md-2">
  							<label for="fecha">FECHA</label>
                <br>
                <label>{{ $ficha->fecha_ficha }}</label>
  						</div>
  						<div class="col-md-1">
  							<label for="pesso">PESO</label>
  							<br>
                <label>{{ $ficha->peso }}</label>
  						</div>
  						<div class="col-md-1">
  							<label for="estatura">ESTATURA</label>
  							<br>
                <label>{{ $ficha->estatura }}</label>
  						</div>
  						<div class="col-md-1">
  							<label for="imc">IMC</label>
  							<br>
                <label>{{ $ficha->imc }}</label>
  						</div>
  						<div class="col-md-1">
  							<label for="bicipital">BICIPITAL</label>
  							<br>
                <label>{{ $ficha->bicipital }}</label>
  						</div>
  						<div class="col-md-1">
  							<label for="tricipital">TRICIPITAL</label>
  							<br>
                <label>{{ $ficha->tricipital }}</label>
  						</div>
  						<div class="col-md-1">
  							<label for="subescapular">SUBESCAPULAR</label>
  							<br>
                <label>{{ $ficha->subescapular }}</label>
  						</div>
  					</div>
  					<div class="form-group row">
  						<div class="col-md-1">
  							<label for="suprailiaco">SUPRAILIACO</label>
  							<br>
                <label>{{ $ficha->suprailiaco }}</label>
  						</div>
  						<div class="col-md-1">
  							<label for="masa">MASA</label>
  							<br>
                <label>{{ $ficha->masa }}</label>
  						</div>
  						<div class="col-md-1">
  							<label for="cadera">CADERA</label>
  							<br>
                <label>{{ $ficha->cadera }}</label>
  						</div>
  						<div class="col-md-1">
  							<label for="riesgo">RIESGO</label>
  							<br>
                <label>{{ $ficha->riesgo }}</label>
  						</div>
  						<div class="col-md-1">
  							<label for="flexibilidad">FLEXIBILIDAD</label>
  							<br>
                <label>{{ $ficha->flexibilidad }}</label>
  						</div>
              <div class="col-md-4 pull-right">
                <label>REALIZADO POR</label>
                <br>
                <label>{{ $ficha->profesional->nombreCompleto() }}</label>
              </div>
  					</div>
  					<div class="form-group row">
  						<div class="col-md-4">
  							<label for="registrar">Seguimiento Fisico</label>
  							 <a href="{{ route('evaluacion.seguimiento1',$ficha->id) }}" 
                  class="btn btn-info" role="button">Registrar</a>
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Fecha</th>
                        <th>ACCION</th>
                      </tr>
                    </thead>
                      <tbody>
                        @foreach ($seg1 as $row)
                        <tr>
                          <td> {{ $row->fecha_ficha }} </td>
                          <td>
                          <a href="{{ route('evaluacion.verseguimiento1',$row->id) }}" class="btn btn-success justify-content-center">
                            <span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span></a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  {{ $seg1->render() }}
  						</div>
              <div class="col-md-4">
                <label for="registrar">Seguimiento Nutricionista</label>
                <a href="{{ route('evaluacion.seguimiento2',$ficha->id) }}" 
                  class="btn btn-success" role="button">Registrar</a>
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Fecha</th>
                        <th>ACCION</th>
                      </tr>
                    </thead>
                  </table>
              </div>
              <div class="col-md-4">
                <label for="registrar">Seguimiento Kinesiologia</label>
                <a href="{{ route('evaluacion.seguimiento3',$ficha->id) }}" 
                  class="btn btn-warning" role="button">Registrar</a>
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Fecha</th>
                        <th>ACCION</th>
                      </tr>
                    </thead>
                  </table>
              </div>
  					</div>
  				</form>
  			</div>
	</div>          
</div>
@endsection  		