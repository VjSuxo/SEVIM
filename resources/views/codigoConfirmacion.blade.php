<x-layouts.app>
    @vite(['resources/css/style_login.css'])
    <div class="container-body">
        <div class="container-page" id="container">
          <div class="login-container" id="LoginContainer">
              <div class="login-cebecera">
                <a class="navbar-brand" href="#">
                  <img src="/img/log2.png" alt="" width="80" height="80">
                </a>
                <h1>INGRESE CODIGO</h1>
              </div>
              <form  method="POST" action="{{ route('enviarCodigo') }}">
                @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-D" id="digit_1" name="digits[]" required maxlength="1">
                            <input type="text" class="form-control input-D" id="digit_2" name="digits[]" required maxlength="1">
                            <input type="text" class="form-control input-D" id="digit_3" name="digits[]" required maxlength="1">
                            <input type="text" class="form-control input-D" id="digit_4" name="digits[]" required maxlength="1">
                            <input type="text" class="form-control input-D" id="digit_5" name="digits[]" required maxlength="1">
                        </div>
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
