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
            @foreach ( $refugios as $refugio )
                <div class="card mt-1">
                    <div class="card-body">
                    <h5 class="card-title">{{ $refugio->nombre }}</h5>
                    <p class="card-text">
                        @if ($refugio->tipo == 0)
                            albergue
                        @endif
                        @if ($refugio->tipo == 1)
                            Casa de Seguridad
                        @endif
                    </p>
                   @foreach ( $ubicaciones as $ubicacion )
                       @if($ubicacion->idRefugio == $refugio->id  )
                       <p >Direccion : {{ $ubicacion->direccion }}</p>
                       <a style="max-height: 40px" class="editar-link btn btn-primary"
                        data-id="{{$refugio->id}}"
                        data-nombre="{{$refugio->nombre}}"
                        data-tipo="{{$refugio->tipo}}"
                        data-direccion="{{ $ubicacion->direccion }}"
                        href="detallesInformacion.html">
                            Editar
                    </a>
                       @endif
                   @endforeach

                    <form action="{{route('admin.DeleteRefugio',$refugio)}}" method="POST">
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
            <h3>AGREGAR NUEVO REFUGIO</h3>
            <form method="POST" action="{{ route('admin.CreateRefugio') }}" enctype="multipart/form-data">
                @csrf <!-- Agrega el token CSRF para protección -->
                <div class="input-group mb-3">
                    <span class="input-group-text enlace" id="enlace">Nombre Refugio</span>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="nombre" aria-label="enlace" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text enlace" id="enlace">Tipo Refugio</span>
                    <select class="form-select" aria-label="Default select example" id="tipo" name="tipo">
                        <option selected>Seleccione Tipo de refugio</option>
                        <option value="0">Albergue</option>
                        <option value="1">Casa de Seguridad</option>
                      </select>
                  </div>
                <div class="input-group mb-3">
                    <span class="input-group-text enlace" id="enlace">Enlace Maps o Direccion</span>
                    <input type="text" class="form-control" name="direccion" id="direccion" placeholder="enlace o direccion" aria-label="enlace" aria-describedby="basic-addon1">
                </div>
                <button type="submit">Enviar</button>
            </form>
        </div>
        <div id="update" class="update" style="display: none;">
            <h3>EDITAR REFUGIO</h3>
            <form method="POST" action="{{ route('admin.UpdateRefugio') }}" enctype="multipart/form-data">
                @csrf <!-- Agrega el token CSRF para protección -->
                <div class="input-group mb-3">
                    <span class="input-group-text enlace" id="enlace">Nombre Refugio</span>
                    <input type="text" class="form-control" name="nombre" id="nombreE" placeholder="nombre" aria-label="enlace" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text enlace" id="enlace">Tipo Refugio</span>
                    <select class="form-select" aria-label="Default select example" id="tipo" name="tipo">
                        <option selected value="-1">Seleccione Tipo de refugio</option>
                        <option value="0">Albergue</option>
                        <option value="1">Casa de Seguridad</option>
                      </select>
                  </div>
                <div class="input-group mb-3">
                    <span class="input-group-text enlace" id="enlace">Enlace Maps o Direccion</span>
                    <input type="text" class="form-control" name="direccion" id="direccionE" placeholder="enlace o direccion" aria-label="enlace" aria-describedby="basic-addon1">
                </div>
                <input type="text" name="idRef" id="idRef" style="display: none">;
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
                var direccion = $(this).data("direccion");
                // Llena el formulario con los datos obtenidos
                $("#nombreE").val(nombre);
                $("#direccionE").val(direccion);
                $("#idRef").val(id);

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
