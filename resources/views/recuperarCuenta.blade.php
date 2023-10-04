<x-layouts.app >
    @vite(['resources/css/style_login.css'])
    <div class="container-body">
        <div class="container-page">
            <div class="login-container">
                <form  method="POST" action="{{route('recobery')}}">
                    @csrf
                      <div class="input-line-container">
                          <span class="name-input">Enviar Correo Electronico</span>
                          <input id="email" type="email" class="input-line form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                      <input type="submit" value="Enviar Correo" class="button-login">
                  </form>
            </div>
        </div>
    </div>


</x-layouts.app>
