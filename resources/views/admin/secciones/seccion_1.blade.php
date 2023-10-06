<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    @vite(['resources/css/style_Edicion.css','resources/css/style_flipCard.css'])
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
        <!-- Contenido del primer div -->
        <div class="cards">
        @foreach ( $orientaciones as $orientacion )
            <div class="cardCar">
                <div class="face front">
                    <img src="{{$orientacion->urlFondo}}" alt="">
                    <h3>{{$orientacion->nombre}}s</h3>
                </div>
                <div class="face back">
                    <h3>{{$orientacion->nombre}}</h3>
                    <p>{{$orientacion->resumen}}</p>
                    <div class="link">
                        <a class="editar-link" data-nombre="{{$orientacion->nombre}}" data-resumen="{{$orientacion->resumen}}" href="detallesInformacion.html">Details</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    <div id="div2">
        <!-- Contenido del segundo div -->
        <div class="bottons">
            <form method="POST" action="{{ route('orientacion.store') }}" enctype="multipart/form-data">
                @csrf <!-- Agrega el token CSRF para protección -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Nombre</span>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1">
                    @error('nombre')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Resumen</span>
                    <input type="text" class="form-control" name="resumen" placeholder="Resumen" aria-label="Resumen" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Relleno</span>
                    <input type="text" class="form-control" name="relleno" placeholder="Relleno" aria-label="Relleno" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" name="urlFondo" id="inputGroupFile02">
                    <label class="input-group-text" for="inputGroupFile02">Subir</label>
                </div>
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
    $(".editar-link").click(function(e) {
        e.preventDefault(); // Evita que el enlace navegue a la página

        // Obtiene los datos del atributo "data" del enlace
        var nombre = $(this).data("nombre");
        var resumen = $(this).data("resumen");

        // Llena el formulario con los datos obtenidos
        $("#nombre").val(nombre);
        $("#resumen").val(resumen);

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
