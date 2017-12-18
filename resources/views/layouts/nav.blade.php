        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @auth
                        @if(Auth::user()->hasRole('registro'))
                            <li class="@if(Route::currentRouteName()=='registro.index' OR 
                                           Route::currentRouteName()=='registro.create' OR 
                                           Route::currentRouteName()=='registro.roles')active @endif">
                                <a href="{{ route('registro.index') }}">Registro</a>
                            </li>
                        @endif   
                        @if(Auth::user()->hasRole('informe'))         
                                 <li class="dropdown 
                                 @if(Route::currentRouteName()=='informe.create' OR
                                     Route::currentRouteName()=='informe.buscar' )active @endif ">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Informes <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('informe.create') }}">Asistencia</a></li>
                                    </ul>
                                </li>
                         @endif 
                         @if(Auth::user()->hasRole('evaluacion'))      
                                 <li class="
                                 @if(Route::currentRouteName()=='evaluacion.index' OR
                                     Route::currentRouteName()=='evaluacion.show' OR 
                                     Route::currentRouteName()=='evaluacion.edit' OR 
                                     Route::currentRouteName()=='evaluacion.editar'
                                 )active @endif">
                                <a href="{{ route('evaluacion.index')}}">Evaluacion</a>
                                </li>
                        @endif
                        @if(Auth::user()->hasRole('asistencia'))        
                                <li class="@if(@$ActiveMenu=='asistencia')active @endif">
                                <a href="{{ route('asistencia.index') }}" target="_blank" >Asistencia</a>
                                </li>
                         @endif       
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->nombreSimple() }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
