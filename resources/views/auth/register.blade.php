<x-layouts.app >
@vite(['resources/css/style_registro.css',])

<div class="container-body">
    <div class="container-page">
        <div class="registro-container" id="registroContainer">
            <div class="registro-cebecera">
                <a class="navbar-brand" href="#">
                  <img src="/img/log2.png" alt="" width="50" height="50">
                </a>
                <h1>Registro de Usuario</h1>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- User name-->
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping"><img src="/img/icon/icon_userF.png" alt="iconoUserFem" width="20" height="20"></span>
                    <input  id="username" name="username" type="text" class="input-line form-control @error('username') is-invalid @enderror" value="{{ old('name') }}" placeholder="Nombre de Usuario" aria-label="username" aria-describedby="addon-wrapping" required autocomplete="username" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                </div>
                <!-- Contraseñas -->
                <div class="input-group mt-3">
                    <span id="togglePasswordIcon" class="input-group-text togglePasswordIcon">
                        <img src="/img/icon/icon_eye.png" alt="iconEye" width="20" height="20">
                        <img src="/img/icon/icon_eyeClose.png" alt="iconEyeClose" width="20" height="20" style="display: none;">
                    </span>
                    <span class="input-group-text"><img src="/img/icon/icon_candado.png" alt="iconCandado" width="20" height="20"></span>
                    <input id="password" name="password" type="password" class="input-line form-control @error('password') is-invalid @enderror" placeholder="Contraseña" aria-label="Contraseña" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <span class="input-group-text" style="margin-left: 3px;"><img src="/img/icon/icon_candado.png" alt="iconCandado" width="20" height="20"></span>
                    <input  id="password_confirmation" name="password_confirmation" type="password" class="input-line form-control" placeholder="Confirmar Contraseña" aria-label="Confirmar Contraseña" required autocomplete="new-password">
                </div>

                <!-- Datos Personales -->
                <!--Nombre -->
                <div class="input-group flex-nowrap mt-3">
                    <span class="input-group-text" id="addon-wrapping">Datos Personales</span>
                    <input  id="name" name="name" type="text" class="input-line form-control @error('name') is-invalid @enderror" placeholder="Nombre" aria-label="Nombres" aria-describedby="addon-wrapping" value="{{ old('name') }}" required autocomplete="name">
                    @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                <!--Apellidos-->
                <div class="input-group mt-3">
                    <input id="apePaterno" name="apePaterno" type="text" class="form-control  @error('apePaterno') is-invalid @enderror input-line" placeholder="Apellido Paterno" aria-label="apePa" value="{{ old('apePaterno') }}" required autocomplete="apePaterno">
                    @error('apePaterno')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <input id="apeMaterno" name="apeMaterno" type="text" class="form-control  @error('apeMaterno') is-invalid @enderror input-line" placeholder="Apellido Materno" aria-label="apeMa" value="{{ old('apeMaterno') }}" required autocomplete="apeMaterno">
                    @error('apeMaterno')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                <!-- Genero -->
                <div class="input-group mt-3">
                    <label class="input-group-text" for="sexo">Sexo</label>
                    <select class="form-select input-line @error('sexo') is-invalid @enderror" id="sexo" name="sexo" required>
                        <option value="" selected>Elija</option>
                        <option value="Femenino" {{ old('sexo') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                        <option value="Masculino" {{ old('sexo') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                        <option value="Otro" {{ old('sexo') == 'Otro' ? 'selected' : '' }}>Otro</option>
                    </select>
                    @error('sexo')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <!-- CI  y fecha nacimiento-->
                <div class="input-group mt-3">
                    <span class="input-group-text">CI</span>
                    <input id="ci" name="ci" type="text" class="form-control input-line @error('ci') is-invalid @enderror" placeholder="CI" aria-label="CI" value="{{ old('ci') }}" required autocomplete="ci">
                    <span class="input-group-text" style="margin-left: 3px;"><img src="/img/icon/icon_pastel.png" alt="iconPastel" width="20" height="20"></span>
                    <input id="fechaNac" name="fechaNac" type="date" class="form-control input-line" placeholder="Fecha de Nacimiento" aria-label="Fecha de Nacimiento" value="{{ old('fechNac') }}" required autocomplete="fechaNac">
                </div>
                @error('ci')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <!-- Estado Civil -->
                @php
                    $estadoCivil = DB::table('ESTADOS_CIVILES')->get();
                @endphp
                <div class="input-group mt-3">
                    <label class="input-group-text" for="estadoCi">Estado Civil</label>
                    <select class="form-select input-line @error('estadoCi') is-invalid @enderror" id="estadoCi" name="estadoCi" required>
                        <option selected>Elija su estado civil</option>
                        @foreach ( $estadoCivil as $estado)
                        <option value="{{ $estado->id }}" >{{ $estado->tipo }}</option>
                        @endforeach
                    </select>
                </div>
                @error('estadoCi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <!-- Celular -->
                <div class="input-group mt-3">
                    <span class="input-group-text"><img src="/img/icon/icon_cel.png" alt="iconCel" width="20" height="20"></span>
                    <input id="number" name="number" type="number" class="form-control input-line @error('number') is-invalid @enderror" placeholder="Número Celular" aria-label="Celular" value="{{ old('numer') }}" required autocomplete="number">
                    @error('number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <span class="input-group-text" style="margin-left: 3px;"><img src="/img/icon/icon_correo.png" alt="iconCorreo" width="20" height="20"></span>
                    <input  id="email" name="email" type="email" class="form-control input-line @error('email') is-invalid @enderror" placeholder="Correo Electrónico" aria-label="Correo" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <!-- Direcciones  -->
                <div class="input-group mt-3">
                    <span class="input-group-text">Ciudad</span>
                    <input id="ciudad" name="ciudad" type="text" class="form-control input-line @error('ciudad') is-invalid @enderror" placeholder="Ciudad" aria-label="Ciudad" value="{{ old('ciudad') }}" required autocomplete="ciudad">
                    @error('ciudad')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <span class="input-group-text" style="margin-left: 3px;">Dirección</span>
                    <input  id="direccion" name="direccion" type="text" class="form-control input-line @error('direccion') is-invalid @enderror" placeholder="Dirección" aria-label="Dirección" value="{{ old('direccion') }}" required autocomplete="direccion">
                    @error('direccion')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>



                <div class="footer-Reg">
                    <input type="submit" value="registro" id="registro" class="button-registro">
                    <a value="Cancelar" class="button-registro " style="margin-left: 10px;  text-decoration: none;" >Cancelar</a>
                </div>


            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#togglePasswordIcon").click(function() {
                var passwordField = $("#password");
                var passwordConfirmField = $("#password_confirmation");
                var togglePasswordIcon = $("#togglePasswordIcon img");

                // Alternar el tipo de campo de contraseña entre "password" y "text"
                if (passwordField.attr("type") === "password") {
                    passwordField.attr("type", "text");
                    passwordConfirmField.attr("type", "text");
                    // Mostrar el ícono "eyeClose"
                    togglePasswordIcon.toggle();
                } else {
                    passwordField.attr("type", "password");
                    passwordConfirmField.attr("type", "password");
                    // Mostrar el ícono "eye"
                    togglePasswordIcon.toggle();
                }
            });
        });
        </script>



</x-layouts.app>
