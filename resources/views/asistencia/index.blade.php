@extends('layouts.app2')

@section('content')
    <style>
        .middlePage {
            width: 1200px;
            height: 400px;
            position: absolute;
            top:0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
        }
        .panel-height {
            height: 300px;
        }
    </style>
    <div class="middlePage">
        @include('flash::message')
        <div class="panel panel-info" style="background-image: url({{ asset('img/logo_osorio.png') }}); background-repeat: no-repeat; display: block; margin: auto">
            <div class="panel-body panel-height">
                <div class="row">
                    <div class="col-md-7" >
                    </div>
                    <div class="col-md-5" style="border-left:1px solid #ccc;height:270px">
                        <form id="form_asistencia" class="form-horizontal" method="post"  action="{{ route('asistencia.store') }}">
                             {{ csrf_field() }}
                            <fieldset>
                                <label for="run">R.U.N</label>
                                <input name="run" id="run" type="text" class="form-control" autocomplete="off" required>
                                <br>
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-primary btn-lg">INGRESO</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>
@endsection