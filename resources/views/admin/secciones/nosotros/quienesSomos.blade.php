<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    @vite(['resources/css/style_Edicion.css',])
    <title>Admin</title>
  </head>
<body
    style="
        background: url(/img/wallper/fondo_P.png) center center/cover no-repeat;
        background-position: center;
        background-size: cover;
        background-attachment: fixed;
        ">

    <div class="grid-container">
        <div id="div1">
                <section >
                    <div class="contenedor reveal cuerpo">
                        <div class="L1">
                         @foreach ( $nosotros as $nos )
                            @if ($nos->tipo == 'qSP')
                                <div class="card mt-1">
                                    <div class="card-body">
                                    <h5 class="card-title">Vista en la parte principal</h5>
                                    <p class="card-text">
                                        {{ $nos->resumen }}
                                    </p>
                                    <a style="max-height: 40px" class="editar-Resumen btn btn-primary"
                                        data-id="{{$nos->id}}"
                                        data-resumen="{{$nos->resumen}}"
                                        href="detallesInformacion.html">
                                            Editar
                                    </a>
                                    <form action="{{route('admin.deleteQS',$nos)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-primary" >Eliminar</button>
                                    </form>
                                    </div>
                                </div>
                            @endif
                            @if ($nos->tipo == 'qST')
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                  <div class="col-md-4">
                                    <img src="{{ $nos->urlFondo }}" class="img-fluid rounded-start" alt="...">
                                  </div>
                                  <div class="col-md-8">
                                    <div class="card-body">
                                      <h5 class="card-title">Vista La informacio</h5>
                                      <p class="card-text">{{ $nos->titulo }} <br> {{ $nos->texto }}</p>
                                        <a style="max-height: 40px" class="editar-Relleno btn btn-primary"
                                            data-id="{{$nos->id}}"
                                            data-titulo="{{$nos->titulo}}"
                                            data-texto="{{$nos->texto}}"
                                            href="detallesInformacion.html">
                                                Editar
                                        </a>
                                        <form action="{{route('admin.deleteQS',$nos)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-primary" >Eliminar</button>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            @endif
                            @if ($nos->tipo == 'qSF')
                                <div class="card mt-1">
                                    <div class="card-body">
                                    <h5 class="card-title">Vista de la Frase </h5>
                                    <p class="card-text">
                                        {{ $nos->titulo }}
                                        <br>
                                        {{ $nos->texto }}
                                    </p>
                                    <a style="max-height: 40px" class="editar-Frase btn btn-primary"
                                        data-id="{{$nos->id}}"
                                        data-titulo="{{$nos->titulo}}"
                                        data-texto="{{$nos->texto}}"
                                        href="detallesInformacion.html">
                                            Editar
                                    </a>
                                    <form action="{{route('admin.deleteQS',$nos)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-primary" >Eliminar</button>
                                    </form>
                                    </div>
                                </div>
                            @endif

                         @endforeach
                        </div>
                        <div class="L2">
                            @foreach ( $nosotros as $nos )
                                @if ($nos->tipo == 'qs_Pr')
                                <h1 class="Frase">{{$nos->titulo}}</h1>
                                <h3 class="creador">
                                    {{$nos->texto}}
                                </h3>
                                    <a id="editar-link2" class="btn btn-primary"
                                    data-id="{{$nos->id}}"
                                    data-titulo=""
                                    data-resumen="{{$nos->resumen}}"
                                    data-relleno=""
                                    data-frace="{{$nos->titulo}}"
                                    data-dicho="{{$nos->texto}}"
                                    >
                                    Editar
                                    </a>
                                @endif
                             @endforeach

                        </div>
                   </div>

                </section>
        </div>
        <div id="div2">
            <div class="bottons">
                <div class="crear">
                    <form method="POST" action="{{ route('admin.crearQS') }}" enctype="multipart/form-data">
                        @csrf <!-- Agrega el token CSRF para protección -->
                        <h3>Lo que se ve en el Inicio</h3>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Resumen</span>
                            <input type="text" class="form-control" id="resumen" name="resumen" placeholder="Resumen" aria-label="Resumen" aria-describedby="basic-addon1">
                        </div>
                        <h3>Lo que se ve al entrar al enlace</h3>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="urlFondo" name="urlFondo">
                            <label class="input-group-text" for="inputGroupFile02">Fondo</label>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Titulo</span>
                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" aria-label="Nombre" aria-describedby="basic-addon1">
                            @error('titulo')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Relleno</span>
                            <input type="text" class="form-control" id="relleno" name="relleno" placeholder="Relleno" aria-label="Relleno" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Frace</span>
                            <input type="text" class="form-control" id="frace" name="frace" placeholder="frace" aria-label="Nombre" aria-describedby="basic-addon1">
                            @error('frace')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Dicho Por</span>
                            <input type="text" class="form-control" id="dicho" name="dicho" placeholder="dicho" aria-label="Relleno" aria-describedby="basic-addon1">
                        </div>
                        <input  type="text" style="display: none" id="idV" name="idV">
                        <input  type="text" style="display: none" id="tipo" name="tipo" value="P">
                        <button type="submit">Enviar</button>
                    </form>
                </div>
                <div class="Frase" style="display: none;">
                    <form method="POST" action="{{ route('admin.updateQS') }}" enctype="multipart/form-data">
                        @csrf <!-- Agrega el token CSRF para protección -->

                        <h3>EDITAR FRASE</h3>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Frace</span>
                            <input type="text" class="form-control" id="tituloEF" name="titulo" placeholder="frace" aria-label="Nombre" aria-describedby="basic-addon1">
                            @error('frace')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Dicho Por</span>
                            <input type="text" class="form-control" id="textoEF" name="texto" placeholder="dicho" aria-label="Relleno" aria-describedby="basic-addon1">
                        </div>
                        <input  type="text" style="display: none" id="idEF" name="id">
                        <button type="submit">Enviar</button>
                    </form>
                </div>
                <div class="resumen" style="display: none;">
                    <form method="POST" action="{{ route('admin.updateQS') }}" enctype="multipart/form-data">
                        @csrf <!-- Agrega el token CSRF para protección -->
                        <h3>Editar Resumen</h3>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Resumen</span>
                            <input type="text" class="form-control" id="resumenER" name="resumen" placeholder="Resumen" aria-label="Resumen" aria-describedby="basic-addon1">
                        </div>
                        <input  type="text" style="display: none" id="idER" name="id">
                        <button type="submit">Enviar</button>
                    </form>
                </div>
                <div class="rellenoTexto" style="display: none;">
                    <form method="POST" action="{{ route('admin.updateQS') }}" enctype="multipart/form-data">
                        @csrf <!-- Agrega el token CSRF para protección -->
                        <h3>Editar informacion</h3>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="urlFondo" name="urlFondo">
                            <label class="input-group-text" for="inputGroupFile02">Fondo</label>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Titulo</span>
                            <input type="text" class="form-control" id="tituloERR" name="titulo" placeholder="Titulo" aria-label="Nombre" aria-describedby="basic-addon1">
                            @error('titulo')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Relleno</span>
                            <input type="text" class="form-control" id="textoERR" name="texto" placeholder="Relleno" aria-label="Relleno" aria-describedby="basic-addon1">
                        </div>
                        <input  type="text" style="display: none" id="idERR" name="id">
                        <button type="submit">Enviar</button>
                    </form>
                </div>

            </div>
        </div>
    </div>









      <!-- Optional JavaScript; choose one of the two! -->
<!-- Agrega jQuery a tu página si aún no está incluido -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {

    $(".editar-Resumen").click(function(e) {
        e.preventDefault(); // Evita que el enlace navegue a la página
        $(".crear").hide();
        $(".rellenoTexto").hide();
        $(".resumen").show();
        $(".Frase").hide();
        // Obtiene los datos del atributo "data" del enlace
        var id = $(this).data("id");
        var resumen = $(this).data("resumen");
        // Llena el formulario con los datos obtenidos
        $("#resumenER").val(resumen);
        $("#idER").val(id);
    });

    $(".editar-Frase").click(function(e) {
        e.preventDefault(); // Evita que el enlace navegue a la página
        $(".crear").hide();
        $(".rellenoTexto").hide();
        $(".resumen").hide();
        $(".Frase").show();
        // Obtiene los datos del atributo "data" del enlace
        var id = $(this).data("id");
        var titulo = $(this).data("titulo");
        var texto = $(this).data("texto");
        // Llena el formulario con los datos obtenidos
        $("#tituloEF").val(titulo);
        $("#textoEF").val(texto);
        $("#idEF").val(id);
    });

    $(".editar-Relleno").click(function(e) {
        e.preventDefault(); // Evita que el enlace navegue a la página
        $(".crear").hide();
        $(".rellenoTexto").show();
        $(".resumen").hide();
        $(".Frase").hide();
        // Obtiene los datos del atributo "data" del enlace
        var id = $(this).data("id");
        var titulo = $(this).data("titulo");
        var texto = $(this).data("texto");
        // Llena el formulario con los datos obtenidos
        $("#tituloERR").val(titulo);
        $("#textoERR").val(texto);
        $("#idERR").val(id);
    });
});
</script>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
