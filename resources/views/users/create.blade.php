@extends('layouts.app')

@section('css')
	<style>
		.padding{
			padding: 20px;
			border-top-left-radius: 100%;
			border-bottom-right-radius: 100%;
		}

		.encabezado-formularios{
			border-bottom: 1px solid gray;
		}
	</style>
@endsection

@section('content')

    <!--Cuerpo de Pagina (Body)-->
	<br>
	<div class="container">
		<div class="card">
			<div class="encabezado-formularios">
				<h1 align="center"> Registar Usuario </h1>
			</div>
            
			<div class="card-body">
				<div class="row">
					<div class="col-8">
						<div class="container">
			                <form method="POST" action="{{ route('users.store')}}">
                            @csrf
                                <div class="input-div one">
									<div class="i">
										<i class="fas fa-user"></i> Nombre
									</div>

                                    <div class="div">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Usuario">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
           		                </div><br>

                                <div class="row">
                                    <div class="col-5">

                                        <div class="input-div pass">
                                            <div class="i"> 
                                                <i class="fas fa-id-card"></i> Tipo Documento
                                            </div>

                                            <div for="tipo_doc" class="div">
                                                <Select class="form-control @error('tipo_doc') is-invalid @enderror" name="tipo_doc" value="{{ old('tipo_doc') }}" required autocomplete="tipo_doc" autofocus>
                                                    <option disabled selected value="">Tipo de Documento</option>
                                                    <option value='CC'>CC</option>
                                                    <option value='TI'>TI</option>
                                                    <option value='CE'>CE</option>
                                                </select>
                                                @error('tipo_doc')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-7">

                                        <div class="input-div one">
                                            <div class="i">
                                                <i class="fas fa-hashtag"></i> Número Documento 
                                            </div>

                                            <div for="nro_documento" class="div">
                                                <input id="nro_documento" type="text" class="form-control @error('nro_documento') is-invalid @enderror" name="nro_documento" value="{{ old('nro_documento') }}" required autocomplete="nro_documento" autofocus placeholder="Número de documento" maxlength="10">
                                                @error('nro_documento')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div><br>

                                    </div>
                                </div>
                                
                                <div class="input-div one">
									<div class="i">
										<i class="fa fa-envelope-square"></i> Correo
									</div>

                                    <div for="email"class="div">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo Electrónico">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
           		                </div><br>

                                <div class="row">
                                    <div class="col-5">

                                        <div class="input-div one">
                                            <div class="i">
                                                <i class="fa fa-lock"></i> Contraseña
                                            </div>

                                            <div for="password"class="div">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div><br>

                                    </div>
                                    <div class="col-7">
                                    
                                        <div class="input-div one">
                                            <div class="i">
                                                <i class="fa fa-lock"></i> Confirmar Contraseña
                                            </div>

                                            <div for="password-confirm" class="div">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar Contraseña">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div><br>

                                    </div>
                                </div>
                                

                                <div class="input-div pass">
                                    <div class="i">
                                        <i class="fas fa-id-card"></i> 
                                    </div>

                                    <div  for="tipo_doc" class="div">
                                        <Select class="form-control @error('tipo_doc') is-invalid @enderror" name="rol" value="{{ old('tipo_doc') }}" required autocomplete="tipo_doc" autofocus>
                                            <option disabled selected value="">Rol</option>
                                            <option value='1'>Administrador</option>
                                            <option value='2'>Usuario</option>
                                        </select>

                                        @error('tipo_doc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div><br>

                                <input type="hidden" name="Estado" value="habilitado" />
                                <button type="submit" class="btn btn-success">
                                    {{ __('Registrarse') }}
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection