<x-layouts.adminApp>
    @vite(['resources/css/style_Edicion.css',])
<div class="container" style="margin-top: 10vh">
    <div class="grid-container">
        <div id="div1">
                <section >
                    <div class="contenedor reveal cuerpo">

                         @foreach ( $eventos as $evento )
                            @if ($evento->tipo == '2')
                            <div class="row row-cols-1 row-cols-md-1 g-4">
                                <div class="col">
                                    <div class="card mb-3" style="max-width: 540px;">
                                        <div class="row g-0">
                                          <div class="col-md-4">
                                            <img src="{{$evento->urlImg}}" class="img-fluid rounded-start" alt="...">
                                          </div>
                                          <div class="col-md-8">
                                            <div class="card-body">
                                              <h5 class="card-title">{{$evento->titulo}}</h5>
                                              <p class="card-text">{{$evento->descripcion}} </p>
                                              <p class="card-text">{{$evento->fechaIni}} </p>
                                              <p class="card-text">{{$evento->fechaFin}} </p>
                                              <p class="card-text">Tipo : presencial </p>
                                              <p class="card-text">{{$evento->ubicaciones[0]->direccion}} </p>
                                                <div class="acciones">
                                                    <a style="max-height: 40px" class="editar-P btn btn-primary"
                                                    data-id="{{$evento->id}}"
                                                    data-titulo="{{$evento->titulo}}"
                                                    data-descripcion="{{$evento->descripcion}}"
                                                    data-fechaIni="{{$evento->fechaIni}}"
                                                    data-fechaFin="{{$evento->fechaFin}}"
                                                    data-direccion="{{$evento->ubicaciones[0]->direccion}}"
                                                    href="detallesInformacion.html">
                                                    Editar
                                                    </a>
                                                    <form action="{{route('admin.deletEvento',$evento->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-primary ">Eliminar</button>
                                                    </form>
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </div>

                              </div>
                            @endif
                            @if ($evento->tipo == '1' )
                            <div class="row row-cols-1 row-cols-md-1 g-4">
                                <div class="col">
                                    <div class="card mb-3" style="max-width: 540px;">
                                        <div class="row g-0">
                                          <div class="col-md-4">
                                            <img src="{{$evento->urlImg}}" class="img-fluid rounded-start" alt="...">
                                          </div>
                                          <div class="col-md-8">
                                            <div class="card-body">
                                              <h5 class="card-title">{{$evento->titulo}}</h5>
                                              <p class="card-text">{{$evento->descripcion}} </p>
                                              <p class="card-text">{{$evento->fechaIni}} </p>
                                              <p class="card-text">{{$evento->fechaFin}} </p>
                                              <p class="card-text">Tipo : Virtual </p>
                                              <p class="card-text">{{$evento->urlSecion}} </p>
                                                <div class="acciones">
                                                    <a style="max-height: 40px" class="editar-V btn btn-primary"
                                                    data-id="{{$evento->id}}"
                                                    data-titulo="{{$evento->titulo}}"
                                                    data-descripcion="{{$evento->descripcion}}"
                                                    data-fechaIni="{{$evento->fechaIni}}"
                                                    data-fechaFin="{{$evento->fechaFin}}"
                                                    data-direccion="{{$evento->urlSecion}}"
                                                    href="detallesInformacion.html">
                                                    Editar
                                                    </a>
                                                    <form action="{{route('admin.deletEvento',$evento->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-primary ">Eliminar</button>
                                                    </form>
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </div>

                              </div>
                            @endif
                         @endforeach


                   </div>

                </section>
        </div>
        <div id="div2">
            <div class="bottons">
                <div class="crearCard"  style="">
                    <form method="POST" action="{{ route('admin.crearEvento') }}" enctype="multipart/form-data">
                        @csrf <!-- Agrega el token CSRF para protección -->
                        <h3 class="titulo" >Crear Evento</h3>


                        <div class="input-group mb-3" id="tituloDiv" >
                            <span class="input-group-text" id="basic-addon1">Nombre</span>
                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" aria-label="Nombre" aria-describedby="basic-addon1">
                            @error('titulo')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="input-group mb-3" id="textoDiv" >
                            <span class="input-group-text" id="basic-addon1">Descripcion</span>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Relleno" aria-label="Relleno" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3" id="textoDiv" >
                            <span class="input-group-text" id="basic-addon1">Fecha Inicio</span>
                            <input type="date" class="form-control" id="fechaI" name="fechaI" placeholder="Relleno" aria-label="Relleno" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3" id="textoDiv" >
                            <span class="input-group-text" id="basic-addon1">Fecha Fin</span>
                            <input type="date" class="form-control" id="fechaF" name="fechaF" placeholder="Relleno" aria-label="Relleno" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3" id="textoDiv" >
                            <span class="input-group-text" id="basic-addon1">Imagen</span>
                            <input type="file" class="form-control" id="relleno" name="urlImagen" placeholder="urlImagen" aria-label="Relleno" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3" id="textoDiv">
                            <span class="input-group-text" id="basic-addon1">Tipo</span>
                            <select class="form-select" id="inputGroupSelect01" name="tipo" onchange="showInput()">
                                <option selected>Elija</option>
                                <option value="1">Virtual</option>
                                <option value="2">Presencial</option>
                            </select>
                        </div>

                        <div id="inputVirtual" style="display: none;">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Enlace del Evento Virtual</span>
                                <input type="text" class="form-control" name="enlace" id="enlace">
                            </div>
                        </div>

                        <div id="inputPresencial" style="display: none;">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Dirección del Evento Presencial</span>
                                <input type="text" class="form-control" name="direccion" id="direccion">
                            </div>
                        </div>

                        <button type="submit" id="button"  >Enviar</button>
                    </form>

                    <script>
                        function showInput() {
                            var select = document.getElementById("inputGroupSelect01");
                            var inputVirtual = document.getElementById("inputVirtual");
                            var inputPresencial = document.getElementById("inputPresencial");

                            // Obtener el valor seleccionado
                            var selectedValue = select.value;

                            // Mostrar u ocultar inputs según la selección
                            if (selectedValue == "1") {
                                inputVirtual.style.display = "block";
                                inputPresencial.style.display = "none";
                            } else if (selectedValue == "2") {
                                inputVirtual.style.display = "none";
                                inputPresencial.style.display = "block";
                            } else {
                                inputVirtual.style.display = "none";
                                inputPresencial.style.display = "none";
                            }
                        }
                    </script>


                </div>
                <div class="editarP" style="display: none">
                    <h3>Editar Principal</h3>
                    <form method="POST" action="{{ route('admin.updateEvento') }}" enctype="multipart/form-data">
                        @csrf <!-- Agrega el token CSRF para protección -->
                        <div class="input-group mb-3" id="tituloDiv" >
                            <span class="input-group-text" id="basic-addon1">Nombre</span>
                            <input type="text" class="form-control" id="tituloE" name="titulo" placeholder="Titulo" aria-label="Nombre" aria-describedby="basic-addon1">
                            @error('titulo')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="input-group mb-3" id="textoDiv" >
                            <span class="input-group-text" id="basic-addon1">Descripcion</span>
                            <input type="text" class="form-control" id="descripcionE" name="descripcion" placeholder="Relleno" aria-label="Relleno" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3" id="textoDiv" >
                            <span class="input-group-text" id="basic-addon1">Fecha Inicio</span>
                            <input type="date" class="form-control" id="fechaIE" name="fechaI" placeholder="Relleno" aria-label="Relleno" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3" id="textoDiv" >
                            <span class="input-group-text" id="basic-addon1">Fecha Fin</span>
                            <input type="date" class="form-control" id="fechaFE" name="fechaF" placeholder="Relleno" aria-label="Relleno" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3" id="textoDiv" >
                            <span class="input-group-text" id="basic-addon1">Imagen</span>
                            <input type="file" class="form-control" id="imagenE" name="urlImagen" placeholder="urlImagen" aria-label="Relleno" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3" id="textoDiv">
                            <span class="input-group-text" id="basic-addon1">Tipo</span>
                            <select class="form-select" id="inputGroupSelect01" name="tipo" onchange="showInput()">
                                <option value=-1 selected>Elija</option>
                                <option value="1">Virtual</option>
                                <option value="2">Presencial</option>
                            </select>
                        </div>

                        <div id="inputVirtualE"  style="display: none;">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Enlace del Evento Virtual</span>
                                <input type="text" class="form-control" name="enlaceE" id="enlaceE">
                            </div>
                        </div>

                        <div id="inputDir" style="display: none;">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Dirección del Evento Presencial</span>
                                <input type="text" class="form-control" name="direccionE" id="direccionE">
                            </div>
                        </div>
                        <input type="text" style="display: none;"  id="idE" name="id" >
                        <button type="submit" id="button"  >Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // Captura el clic en el enlace "Editar"
    $(".editar-P").click(function(e) {
        e.preventDefault(); // Evita que el enlace navegue a la página
        // Obtiene los datos del atributo "data" del enlace
        var id=$(this).data("id");
        var titulo=$(this).data("titulo");
        var descripcion=$(this).data("descripcion");
        var fechaIni=$(this).data("fechaIni");
        var fechaFin=$(this).data("fechaFin");
        var direccion=$(this).data("direccion");
        var formattedFechaIni = formatDate(fechaIni);
        var formattedFechaFin = formatDate(fechaFin);


        $("#idE").val(id);
        $("#tituloE").val(titulo);
        $("#descripcionE").val(descripcion);
        $("#fechaIE").val(formattedFechaIni);
        $("#fechaFE").val(formattedFechaFin);
        $("#direccionE").val(direccion);
        $("#enlaceE").val(null);
        $("#inputVirtualE").hide();
        $("#inputDir").show();
        $(".editarP").show();
        $(".crearCard").hide();
    });

    $(".editar-V").click(function(e) {
        e.preventDefault(); // Evita que el enlace navegue a la página
        // Obtiene los datos del atributo "data" del enlace
        var id=$(this).data("id");
        var titulo=$(this).data("titulo");
        var descripcion=$(this).data("descripcion");
        var fechaIni=$(this).data("fechaIni");
        var fechaFin=$(this).data("fechaFin");
        var direccion=$(this).data("direccion");
        var formattedFechaIni = formatDate(fechaIni);
        var formattedFechaFin = formatDate(fechaFin);


        $("#idE").val(id);
        $("#tituloE").val(titulo);
        $("#descripcionE").val(descripcion);
        $("#fechaIE").val(formattedFechaIni);
        $("#fechaFE").val(formattedFechaFin);
        $("#enlaceE").val(direccion);
        $("#direccionE").val(null);

        $("#inputVirtualE").show();
        $("#inputDir").hide();
        $(".editarP").show();
        $(".crearCard").hide();
    });
    // Función para formatear la fecha a yyyy-MM-dd
    function formatDate(dateString) {
        var date = new Date(dateString);
        var year = date.getFullYear();
        var month = String(date.getMonth() + 1).padStart(2, '0');
        var day = String(date.getDate()).padStart(2, '0');
        return year + '-' + month + '-' + day;
    }

    $(".editar-Ff").click(function(e) {
        e.preventDefault(); // Evita que el enlace navegue a la página
        // Obtiene los datos del atributo "data" del enlace
        var id = $(this).data("id");
        var resumen = $(this).data("resumen");
            $("#resumenEP").val(resumen);
            $("#idVP").val(id);
            $(".editarP").show();
            $(".editarC").hide();
            $(".editarF").hide();
            $(".crearCard").hide();
    });


    $(".editar-C").click(function(e) {
        e.preventDefault(); // Evita que el enlace navegue a la página

        // Obtiene los datos del atributo "data" del enlace
        var id = $(this).data("id");
        var titulo = $(this).data("titulo");
        var relleno = $(this).data("relleno");
            $("#tituloEC").val(titulo);
            $("#rellenoEC").val(relleno);
            $("#idVC").val(id);
            $(".editarC").show();
            $(".editarP").hide();
            $(".editarF").hide();
            $(".crearCard").hide();


    });

    $("#buttonC").click(function(e){
        $("#tituloDiv").show();
                $("#textoDiv").show();
                $("#urlFondoDiv").show();
                $("#button").show();
                $("#resumen").show();

    });
});

</script>

</x-layouts.adminApp>
