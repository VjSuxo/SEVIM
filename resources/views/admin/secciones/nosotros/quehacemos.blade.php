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

                         @foreach ( $nosotros as $nos )
                            @if ($nos->tipo == 'qH_PF')
                            <div class="card bg-dark text-white">
                                <img src="{{$nos->urlFondo}}" style="max-height: 150px; max-width: 150px;  class="card-img" alt="...">
                                <div class="card-img-overlay text-center">
                                    <h4 class="card-title">Fondo Pagina</h4>
                                    <a class="editar-link btn btn-primary"
                                    data-id="{{$nos->id}}"
                                    href="detallesInformacion.html">
                                    Editar
                                    </a>
                                </div>
                              </div>
                            @endif
                            @if ($nos->tipo == 'qH_Pf' )
                            <div class="row row-cols-1 row-cols-md-1 g-4">
                                <div class="col">
                                    <div class="card mb-3" style="max-width: 540px;">
                                        <div class="row g-0">
                                          <div class="col-md-4">
                                            <img src="{{$nos->urlImagen}}" class="img-fluid rounded-start" alt="...">
                                          </div>
                                          <div class="col-md-8">
                                            <div class="card-body">
                                              <h5 class="card-title">Parte Vista Inicio</h5>
                                              <p class="card-text">{{$nos->resumen}}</p>
                                                <a class="editar-link btn btn-primary"
                                                data-id="{{$nos->id}}"
                                                data-resumen="{{$nos->resumen}}"
                                                href="detallesInformacion.html">
                                                Editar
                                                </a>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </div>

                              </div>
                            @endif
                            @if ($nos->tipo == 'qH_PC')
                            <div class="row row-cols-1 row-cols-md-1 g-4">
                                <div class="col">
                                    <div class="card mb-3" style="max-width: 540px;">
                                        <div class="row g-0">
                                          <div class="col-md-4">
                                            <img src="{{$nos->urlImagen}}" class="img-fluid rounded-start" alt="...">
                                          </div>
                                          <div class="col-md-8">
                                            <div class="card-body">
                                              <h5 class="card-title">{{$nos->titulo}}</h5>
                                              <p class="card-text">{{$nos->texto}} </p>
                                                <div class="acciones">
                                                    <a style="max-height: 40px" class="editar-link btn btn-primary"
                                                    data-id="{{$nos->id}}"
                                                    data-titulo="{{$nos->titulo}}"
                                                    data-relleno="{{$nos->texto}}"
                                                    href="detallesInformacion.html">
                                                    Editar
                                                    </a>
                                                    <form action="{{route('nosotrosQ.delete',$nos->id)}}" method="POST">
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
                <button type="button" id="buttonC"  onclick="crear">Crear</button>
                <form method="POST" action="{{ route('nosotrosQ.store') }}" enctype="multipart/form-data">
                    @csrf <!-- Agrega el token CSRF para protección -->
                    <div class="input-group mb-3" id="resumenDiv" style="display: none">
                        <span class="input-group-text" id="basic-addon1">Resumen</span>
                        <input type="text" class="form-control" id="resumen" name="resumen" placeholder="Resumen" aria-label="Resumen" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3" id="urlFondoDiv" style="display: none">
                        <input type="file" class="form-control" id="urlFondo" name="urlFondo">
                        <label class="input-group-text" for="inputGroupFile02">Fondo</label>
                    </div>
                    <div class="input-group mb-3" id="tituloDiv" style="display: none">
                        <span class="input-group-text" id="basic-addon1">Titulo</span>
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" aria-label="Nombre" aria-describedby="basic-addon1">
                        @error('titulo')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="input-group mb-3" id="textoDiv" style="display: none">
                        <span class="input-group-text" id="basic-addon1">Texto</span>
                        <input type="text" class="form-control" id="relleno" name="relleno" placeholder="Relleno" aria-label="Relleno" aria-describedby="basic-addon1">
                    </div>
                    <input  type="text" style="display: none" id="idV" name="idV">
                    <input type="text" style="display: none" id="tipo" name="tipo" value="qH_PC">
                    <button type="submit" id="button" style="display: none" >Enviar</button>
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
        var id = $(this).data("id");
        var titulo = $(this).data("titulo");
        var resumen = $(this).data("resumen");
        var relleno = $(this).data("relleno");
        if(resumen != null){
            $("#resumenDiv").show();
            $("#tituloDiv").hide();
                $("#textoDiv").hide();
                $("#urlFondoDiv").hide();
            $("#resumen").val(resumen);
            $("#button").show();
            $("#urlFondoDiv").show();
            $("#idV").val(id);
        }else{
            if(relleno != null){
                $("#tituloDiv").show();
                $("#textoDiv").show();
                $("#urlFondoDiv").show();
                $("#button").show();
                $("#titulo").val(titulo);
                $("#relleno").val(relleno);
                $("#idV").val(id);
                $("#resumenDiv").hide();
            }
            else{
                $("#urlFondoDiv").show();
                $("#idV").val(id);
                $("#tipo").val('qH_PF');
                $("#button").show();
            }
        }


    });
    $("#buttonC").click(function(e){
        $("#tituloDiv").show();
                $("#textoDiv").show();
                $("#urlFondoDiv").show();
                $("#button").show();
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
