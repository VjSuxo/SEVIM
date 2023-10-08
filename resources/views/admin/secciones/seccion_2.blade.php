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


        <div id="div3">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                  <div class="card fondoCard h-100">
                    <img src="/img/icon/icon_personas.png" class="card-img-top" alt="...">
                    <div class="card-body text-center d-flex flex-column"> <!-- Agregamos "text-center" aquí -->
                      <h2 class="card-title">Quienes Somos</h2>
                      <a href="{{ route('admin.edit.QuienesSomos') }}" class="btn formatoBtn mt-auto">Editar</a>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card fondoCard h-100">
                    <img src="/img/icon/icon_carteles.png" class="card-img-top" alt="...">
                    <div class="card-body text-center d-flex flex-column">
                      <h2 class="card-title">Que Hacemos</h2>
                      <a href="{{ route('admin.edit.QueHacemos') }}" class="btn formatoBtn mt-auto">Editar</a>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card fondoCard h-100">
                    <img src="/img/icon/icon_participa.png" class="card-img-top" alt="...">
                    <div class="card-body text-center d-flex flex-column"> <!-- Agregamos "d-flex flex-column" aquí -->
                      <h2 class="card-title">Participa</h2>
                      <a href="{{ route('admin.edit.Participa') }}" class="btn formatoBtn mt-auto">Editar</a> <!-- Agregamos "mt-auto" aquí -->
                    </div>
                  </div>
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
        var id = $(this).data("id");
        var nombre = $(this).data("nombre");
        var resumen = $(this).data("resumen");
        var relleno = $(this).data("relleno");

        // Llena el formulario con los datos obtenidos
        $("#nombre").val(nombre);
        $("#resumen").val(resumen);
        $("#relleno").val(relleno);
        $("#idV").val(id);

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
