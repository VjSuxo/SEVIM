<x-layouts.app >
    @vite(['resources/css/style_login.css'])
    <div class="container-body">
        <div class="container-page" id="container">
          <div class="login-container" id="LoginContainer">
              <div class="login-cebecera">
                <a class="navbar-brand" href="#">
                  <img src="/img/log2.png" alt="" width="80" height="80">
                </a>
                <h1>Iniciar Sesión</h1>
              </div>
              <form  method="POST" action="{{ route('enviarCodigo') }}">
                @csrf
                  <div class="input-line-container">
                      <span class="name-input">Correo Electronico</span>
                      <input id="email" type="email" class="input-line form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="input-line-container">
                      <span class="name-input">Contraseña</span>
                      <input id="password" type="password" class="input-line form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                      @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                  @if (session('bloqueo'))
                  {{session('bloqueo')}}
                    <!--
                    <div class="alert alert-danger">
                       <a href="{{route('recuperar')}}">Recuperar Cuenta</a>
                    </div>
                    -->

                    @endif
                    <div class="g-recaptcha" data-sitekey="6LfoQZQoAAAAAAxAAZWLCyeIpDMsoWOw5rwH-djF"></div>
                    <br/>
                  <input type="submit" value="login" class="button-login">
              </form>
              <div class="login-footer">
                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Olvidaste tu contraseña?') }}
                </a>
                 @endif
                  <a href="{{ route('register') }}">Registrate</a>
              </div>
          </div>
        </div>
      </div>

      <script>
        @if(session('error'))
            alert("{{ session('error') }}"); // Muestra la alerta con el mensaje de error
        @endif
        @if(session('bloqueo'))
            alert("{{ session('bloqueo') }}"); // Muestra la alerta con el mensaje de error
        @endif
    </script>


</x-layouts.app>
