<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    @vite(['resources/css/style_Edicion.css'])
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
        <div class="col">
            @foreach ( $leyes as $ley )
                <div class="card mt-1">
                    <div class="card-body">
                    <h5 class="card-title">{{ $ley->nombre }}</h5>
                    <p class="card-text">
                        {{ $ley->descripcion }}
                    </p>
                    <a style="max-height: 40px" class="editar-link btn btn-primary"
                        data-id="{{$ley->id}}"
                        data-nombre="{{$ley->nombre}}"
                        data-desc="{{$ley->descripcion}}"
                        href="detallesInformacion.html">
                            Editar
                    </a>
                    <form action="{{route('admin.deleteLey',$ley)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-primary" >Eliminar</button>
                    </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div id="div2">
        <div id="crear" class="crear">
            <h3>AGREGAR NUEVA LEY</h3>
            <form method="POST" action="{{ route('admin.crearLey') }}" enctype="multipart/form-data">
                @csrf <!-- Agrega el token CSRF para protección -->
                <div class="input-group mb-3">
                    <span class="input-group-text enlace" id="enlace">Nombre de Ley</span>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="nombre" aria-label="enlace" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text enlace" id="enlace">Descripcion</span>
                    <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="descripcion" aria-label="enlace" aria-describedby="basic-addon1">
                </div>
                <button type="submit">Enviar</button>
            </form>
        </div>
        <div id="update" class="update" style="display: none;">
            <h3>EDITAR LEY</h3>
            <form method="POST" action="{{ route('admin.updateLey') }}" enctype="multipart/form-data">
                @csrf <!-- Agrega el token CSRF para protección -->
                <div class="input-group mb-3">
                    <span class="input-group-text enlace" id="enlace">Nombre de Ley</span>
                    <input type="text" class="form-control" name="nombre" id="nombreE" placeholder="nombre" aria-label="enlace" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text enlace" id="enlace">Descripcion</span>
                    <input type="text" class="form-control" name="descripcion" id="descripcionE" placeholder="descripcion" aria-label="enlace" aria-describedby="basic-addon1">
                </div>
                <input type="text" name="idLey" id="idLey" style="display: none">;
                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>
</div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Mostrar el div "crear" por defecto
            $("#crear").show();
            $("#update").hide();
            // Captura el clic en el enlace "Editar"
            $(".editar-link").click(function(e) {
                e.preventDefault(); // Evita que el enlace navegue a la página

                // Obtiene los datos del atributo "data" del enlace
                var id = $(this).data("id");
                var nombre = $(this).data("nombre");
                var desc = $(this).data("desc");
                // Llena el formulario con los datos obtenidos
                $("#nombreE").val(nombre);
                $("#descripcionE").val(desc);
                $("#idLey").val(id);

                $("#crear").hide();
                $("#update").show();

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
