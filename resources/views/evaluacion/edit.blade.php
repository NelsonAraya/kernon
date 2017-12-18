@extends('layouts.app')

@extends('layouts.nav')

@section('content')
<div class="container">
@include('flash::message')
	<H3>FICHA  DE {{ $usu->nombreCompleto() }}</H3>
 	<div class="panel panel-primary">
  		<div class="panel-heading"> COMPOSICION CORPORAL Y CONDICION FISICA (DIAGNOSTICO)</div>
  			<div class="panel-body">
  				<form class="form-horizontal" method="POST" action="{{ route('evaluacion.crear',$usu->id) }}">
  					 {{ csrf_field() }}
  					<div class="form-group row">
  						<div class="col-md-2">
  							<label for="fecha">FECHA</label>
  							<input type="date" id="fecha" name="fecha_ficha" class="form-control" autocomplete="off" required>
  						</div>
  						<div class="col-md-1">
  							<label for="pesso">PESO</label>
  							<input type="text" id="peso" name="peso" class="form-control" autocomplete="off">
  						</div>
  						<div class="col-md-1">
  							<label for="estatura">ESTATURA</label>
  							<input type="text" id="estatura" name="estatura" class="form-control" autocomplete="off">
  						</div>
  						<div class="col-md-1">
  							<label for="imc">IMC</label>
  							<input type="text" id="imc" name="imc" class="form-control" autocomplete="off">
  						</div>
  						<div class="col-md-1">
  							<label for="bicipital">BICIPITAL</label>
  							<input type="text" id="bicipital" name="bicipital" class="form-control" autocomplete="off">
  						</div>
  						<div class="col-md-1">
  							<label for="tricipital">TRICIPITAL</label>
  							<input type="text" id="tricipital" name="tricipital" class="form-control" autocomplete="off">
  						</div>
  						<div class="col-md-1">
  							<label for="subescapular">SUBESCAPULAR</label>
  							<input type="text" id="subescapular" name="subescapular" class="form-control" autocomplete="off">
  						</div>
  					</div>
  					<div class="form-group row">
  						<div class="col-md-1">
  							<label for="suprailiaco">SUPRAILIACO</label>
  							<input type="text" id="suprailiaco" name="suprailiaco" class="form-control" autocomplete="off">
  						</div>
  						<div class="col-md-1">
  							<label for="masa">MASA</label>
  							<input type="text" id="masa" name="masa" class="form-control" autocomplete="off">
  						</div>
  						<div class="col-md-1">
  							<label for="cadera">CADERA</label>
  							<input type="text" id="cadera" name="cadera" class="form-control" autocomplete="off">
  						</div>
  						<div class="col-md-1">
  							<label for="riesgo">RIESGO</label>
  							<input type="text" id="riesgo" name="riesgo" class="form-control" autocomplete="off">
  						</div>
  						<div class="col-md-1">
  							<label for="flexibilidad">FLEXIBILIDAD</label>
  							<input type="text" id="flexibilidad" name="flexibilidad" class="form-control" autocomplete="off">
  						</div>
  					</div>
  					<div class="form-group row">
  						<div class="col-md-1">
  							<label for="registrar">Registrar</label>
  							<button type="submit" class="btn btn-success">Registrar</button>
  						</div>
  					</div>
  				</form>
  			</div>
	</div>          
</div>
@endsection  		
