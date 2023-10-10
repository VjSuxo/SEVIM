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
                        <div class="row row-cols-1 row-cols-md-1 g-4">
                     @foreach ( $noticias as $nos )

                                <div class="col">
                                    <!--FACEBOOK-->
                                    <div class="card" style="background: black" >
                                    @if ($nos->tipo == 'facebook')
                                        <div id="Facebook" style="height: 100%; width: 100%; overflow: auto;">
                                            <iframe
                                                src="https://www.facebook.com/plugins/post.php?href={{$nos->enlace}}&set=pcb.685102363642676&show_text=true&width=500"
                                                width="500"
                                                height="250"
                                                style="border:none;overflow:hidden"
                                                scrolling="no" frameborder="0" allowfullscreen="true"
                                                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                                                width="500" height="300"
                                                style="border:none;overflow:hidden"
                                                scrolling="no"
                                                frameborder="0" allowfullscreen="true"
                                                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                                                ></iframe>
                                        </div>
                                    @endif
                                    <!--TWITTER-->
                                    @if ($nos->tipo == 'twitter')
                                        <div id="contenido-twitter" style="min-height: 250px; overflow: auto;">
                                            <!-- Pega el código de inserción de Twitter aquí -->
                                            <blockquote class="twitter-tweet">
                                              <p lang="en" dir="ltr">Este es un tweet incrustado de Twitter.</p>
                                              &mdash; Usuario de Twitter (@nombredeusuario) <a href="{{$nos->enlace}}">fecha del tweet</a>
                                            </blockquote>
                                            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                                          </div>
                                    @endif
                                    <!--OTRO-->
                                    @if ($nos->tipo == 'otro')
                                        <iframe
                                                src="{{$nos->enlace}}"
                                                width="500"
                                                min-height="250"
                                                style="border:none;overflow:hidden"
                                                scrolling="no" frameborder="0" allowfullscreen="true"
                                                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                                                width="500" height="300"
                                                style="border:none;overflow:hidden"
                                                scrolling="no"
                                                frameborder="0" allowfullscreen="true"
                                                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                                                ></iframe>
                                    @endif
                                    <div class="card-body">
                                        <form action="{{route('noticia.Delete',$nos->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                     @endforeach
                    </div>
                    </div>
               </div>

            </section>
    </div>
    <div id="div2">

        <div class="bottons">
            <form method="POST" action="{{ route('noticia.Store') }}" enctype="multipart/form-data">
                @csrf <!-- Agrega el token CSRF para protección -->
                <div class="input-group mb-3">
                    <span class="input-group-text enlace" id="enlace">Enlace</span>
                    <input type="text" class="form-control" name="enlace" id="enlace" placeholder="enlace" aria-label="enlace" aria-describedby="basic-addon1">
                    @error('enlace')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text enlace" id="enlace">Tipo Red</span>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Seleccione RED</option>
                        <option value="1">Facebook</option>
                        <option value="2">Twitter</option>
                        <option value="3">Noticia</option>
                      </select>
                  </div>
                <input  type="text" style="display: none" id="idV" name="idV">
                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>
</div>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
