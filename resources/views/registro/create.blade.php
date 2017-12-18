@extends('layouts.app')

@section('content')
<div class="container">
	<div class="panel panel-primary">
  		<div class="panel-heading">Registro de Usuarios</div>
  			<div class="panel-body">
  				<form class="form-horizontal" method="POST" action="{{ route('registro.store') }}">
  					 {{ csrf_field() }}
  					<div class="form-group row">
  						<div class="col-md-2">
  							<label for="run">R.U.N</label>
  							<input type="text" id="run" name="run" class="form-control" autocomplete="off" required>
  						</div>
  						<div class="col-md-4">
  							<label for="nombres">Nombres</label>
  							<input type="text" id="nombres" name="nombres" class="form-control" autocomplete="off" required>
  						</div>
  						<div class="col-md-3">
  							<label for="paterno">Paterno</label>
  							<input type="text" id="paterno" name="apellidop" class="form-control" autocomplete="off" required>
  						</div>
  						<div class="col-md-3">
  							<label for="materno">Materno</label>
  							<input type="text" id="materno" name="apellidom" class="form-control" autocomplete="off" required>
  						</div>
  					</div>
  					<div class="form-group row">
  						<div class="col-md-2">
  							<label for="sexo">Sexo</label>
  							<select id="sexo" name="sexo" class="form-control" required>
  								<option value="">-- Seleccione --</option>
  								<option value="M">Masculino</option>
  								<option value="F">Femenino</option>
  							</select>
  						</div>
  						<div class="col-md-2">
  							<label for="nacimiento">Fecha Nacimiento</label>
  							<input type="date" id="nacimiento" name="fecha_nacimiento" class="form-control" required>
  						</div>
  						<div class="col-md-3">
  							<label for="mail">Mail</label>
  							<input type="email" id="mail" name="email" class="form-control" autocomplete="off" required>
  						</div>
  						<div class="col-md-2">
  							<label for="telefono">Telefono</label>
  							<input type="text" id="telefono" name="telefono" class="form-control" autocomplete="off" required>
  						</div>
  						<div class="col-md-3">
  							<label for="empresa">Empresa</label>
  							<select id="empresa" name="empresa_id" class="form-control" required>
  								<option value="">-- Seleccione --</option>
  								@foreach($empresa as $key => $row)
  									<option value="{{ $key }}"> {{ $row }}</option>
  								@endforeach
  							</select>
  						</div>
  					</div>
  					<div class="form-group row">
  						<div class="col-md-3">
  							<label for="cargo">Cargo</label>
  							<select id="cargo" name="cargo_id" class="form-control" required>
  								<option value="">-- Seleccione --</option>
  								@foreach($cargo as $key => $row)
  									<option value="{{ $key }}"> {{ $row }}</option>
  								@endforeach
  							</select>
  						</div>
  						<div class="col-md-4">
  							<label for="direccion">Direccion</label>
  							<input type="text" id="direccion" name="direccion" class="form-control" autocomplete="off" required>
  						</div>
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