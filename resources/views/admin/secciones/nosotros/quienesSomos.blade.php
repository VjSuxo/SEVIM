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
        <div id="div4">
            @foreach ( $nosotros as $nos )
             @if ($nos->tipo == 'qs_Pp')
                <div class="inicio" style=" background: url({{$nos->urlFondo}}) ;">
                    <h1>Quienes Somos</h1>
                </div>
              @endif
            @endforeach


                <section >
                    <div class="contenedor reveal cuerpo">
                        <div class="L1">
                         @foreach ( $nosotros as $nos )
                            @if ($nos->tipo == 'qs_Pp')
                                <h1 class="tituloP">
                                  {{$nos->titulo}}
                                </h1>
                                <p class="textoP">{{$nos->texto}} </p>
                                <a id="editar-link" class="btn btn-primary"
                                data-id="{{$nos->id}}"
                                data-titulo="{{$nos->titulo}}"
                                data-resumen="{{$nos->resumen}}"
                                data-relleno="{{$nos->texto}}"
                                data-frace=""
                                data-dicho=""
                                >
                                Editar
                                </a>
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
                <form method="POST" action="{{ route('nosotrosQ.store') }}" enctype="multipart/form-data">
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
                    <button type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </div>









      <!-- Optional JavaScript; choose one of the two! -->
<!-- Agrega jQuery a tu página si aún no está incluido -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // Captura el clic en el enlace "Editar"
    $("#editar-link").click(function(e) {
        e.preventDefault(); // Evita que el enlace navegue a la página

        // Obtiene los datos del atributo "data" del enlace
        var id = $(this).data("id");
        var titulo = $(this).data("titulo");
        var resumen = $(this).data("resumen");
        var relleno = $(this).data("relleno");
        var frace = $(this).data("frace");
        var dicho = $(this).data("dicho");
        // Llena el formulario con los datos obtenidos
        $("#titulo").val(titulo);
        $("#resumen").val(resumen);
        $("#relleno").val(relleno);
        $("#idV").val(id);
        $("#frace").val(frace);
        $('#dicho').val(dicho);

        // Puedes redirigir al usuario al formulario de edición aquí
        // window.location.href = "URL_DEL_FORMULARIO_DE_EDICIÓN";

    });
});
$(document).ready(function() {
    // Captura el clic en el enlace "Editar"
    $("#editar-link2").click(function(e) {
        e.preventDefault(); // Evita que el enlace navegue a la página

        // Obtiene los datos del atributo "data" del enlace
        var id = $(this).data("id");
        var titulo = $(this).data("titulo");
        var resumen = $(this).data("resumen");
        var relleno = $(this).data("relleno");
        var frace = $(this).data("frace");
        var dicho = $(this).data("dicho");
        // Llena el formulario con los datos obtenidos
        $("#titulo").val(titulo);
        $("#resumen").val(resumen);
        $("#relleno").val(relleno);
        $("#idV").val(id);
        $("#frace").val(frace);
        $('#dicho').val(dicho);

        // Puedes redirigir al usuario al formulario de edición aquí
        // window.location.href = "URL_DEL_FORMULARIO_DE_EDICIÓN";

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
