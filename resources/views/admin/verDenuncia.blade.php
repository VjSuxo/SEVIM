<x-layouts.adminApp>
    @vite(['resources/css/style_modalAU.css'])
<div class="container contenedor">
    <div class="row align-items-start">
        <div class="col">
          <h1>DENUNCIA</h1>
          <ul class="">
            <li class="">
                Fecha Denuncia : {{ $tiene->denunciaViolencia->fechaHechoDenuncia }}
            </li>
            <li class="">
                Relato : {{ $tiene->denunciaViolencia->relato }}
            </li>
            @if ($tiene->denunciaViolencia->urlArchivoPruebas != null)
            <li class="">
                Pruebas : <a href="{{ $tiene->denunciaViolencia->urlArchivoPruebas }}">Ver</a>
            </li>
            @endif
          </ul>
        </div>
        <div class="col">
          <h1>DENUNCIANTE</h1>
          <ul class="">
            <li class="">
                Nombre Completo : {{ $tiene->denunciante->nombre }} {{ $tiene->denunciante->apPat }} {{ $tiene->denunciante->apMat }}
            </li>
            <li class="">
                Fecha Nacimiento : {{ $tiene->denunciante->fechaNac }}
            </li>
            <li class="">
                Sexo : {{ $tiene->denunciante->sexo }}
            </li>
            <li class="">
                Celular : {{ $tiene->denunciante->celular }}
            </li>
            <li class="">
                Estado Civil : {{ $tiene->denunciante->estadoCivil->tipo }}
            </li>
          </ul>
        </div>
        <div class="col">
            <h1>DENUNCIADO</h1>
            <ul class="">
                <li class="">
                    Nombre Completo : {{ $tiene->denunciado->nombre }} {{ $tiene->denunciante->apPat }} {{ $tiene->denunciante->apMat }}
                </li>
                <li class="">
                    Fecha Nacimiento : {{ $tiene->denunciado->fechaNac }}
                </li>
                <li class="">
                    Sexo : {{ $tiene->denunciado->sexo }}
                </li>
                <li class="">
                    Celular : {{ $tiene->denunciado->celular }}
                </li>
                <li class="">
                    Estado Civil : {{ $tiene->denunciado->estadoCivil->tipo }}
                </li>
              </ul>
        </div>
        <a class="btn btn-primary" href="{{ route('admin.denuncias') }}">RERGRESAR</a>
      </div>
</div>
</x-layouts.adminApp>
