@extends('layouts.app')

@extends('layouts.nav')

@section('content')
<div class="container">
@include('flash::message')
	<H3>SEGUIMIENTO DE {{ $ficha->ficha->usuario->nombreCompleto() }}</H3>
 	<div class="panel panel-primary">
  		<div class="panel-heading"> COMPOSICION CORPORAL Y CONDICION FISICA (SEGUIMIENTO)</div>
  			<div class="panel-body">
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
  			</div>
	</div>          
</div>
@endsection  		