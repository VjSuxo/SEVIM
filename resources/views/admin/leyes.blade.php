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

    </div>
    <div id="div2">


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
