<x-layouts.app >
@vite(['resources/css/style_index.css','resources/css/style_flipCard.css'])

<section class="contenedor cabeza">
            <div class="inicio">
              <h1 class="align-text-center">Estamos Aqui Para Ti</h1>
              <div class="caracteristicasCard">
                @foreach ( $orientaciones as $orientacion )
                    <div class="cardCar">
                        <div class="face front">
                            <img src="{{$orientacion->urlFondo}}" alt="">
                            <h3>{{$orientacion->nombre}}s</h3>
                        </div>
                        <div class="face back">
                            <h3>{{$orientacion->nombre}}</h3>
                            <p>{{ $orientacion->id }}</p>
                            <p>{{$orientacion->resumen}}</p>
                            <div class="link">
                                <a class="editar-link"  href="detallesInformacion.html">Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            </div>
          </section>
          <section>
              <div class="contenedor reveal">

                <div class="row row-cols-1 row-cols-md-3 g-4">
                  <div class="col">
                    <div class="card fondoCard h-100">
                      <img src="/img/icon/icon_personas.png" class="card-img-top" alt="...">
                      <div class="card-body text-center d-flex flex-column"> <!-- Agregamos "text-center" aquí -->
                        <h2 class="card-title">Quienes Somos</h2>
                        @foreach ( $nosotros as $nos )
                        @if ($nos->tipo == 'qs_Pp')
                        <p class="card-text">{{ $nos->resumen }}</p>
                        @endif
                     @endforeach
                        <a href="{{route("quienesSomos")}}" class="btn formatoBtn mt-auto">mas informacion</a>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card fondoCard h-100">
                      <img src="/img/icon/icon_carteles.png" class="card-img-top" alt="...">
                      <div class="card-body text-center d-flex flex-column">
                        <h2 class="card-title">Que Hacemos</h2>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                        <a href="{{route('queHacemos')}}" class="btn formatoBtn mt-auto">Go somewhere</a>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card fondoCard h-100">
                      <img src="/img/icon/icon_participa.png" class="card-img-top" alt="...">
                      <div class="card-body text-center d-flex flex-column"> <!-- Agregamos "d-flex flex-column" aquí -->
                        <h2 class="card-title">Participa</h2>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        <a href="{{route('participa')}}" class="btn formatoBtn mt-auto">Go somewhere</a> <!-- Agregamos "mt-auto" aquí -->
                      </div>
                    </div>
                  </div>
                </div>

              </div>
          </section>

          <section class="sombra-interna">
              <div class="contenedor reveal ">
                  <h1 class="align-text-center" style="margin-left: 40%; ">Noticias</h1>

                  <div class="parent">
                    <div class="div1">
                      <div id="Facebook" style="height: 100%; width: 100%; overflow: auto;">
                        <iframe src="https://www.instagram.com/p/CWUejO1I6jN/" width="500" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                      </div>
                    </div>
                    <div class="div2">
                      <div id="Facebook" style="height: 100%; width: 100%; overflow: auto;">
                        <iframe src="https://www.facebook.com/plugins/post.php?href=https://www.instagram.com/p/CWUejO1I6jN//?locale=hi_IN&show_text=true&width=500" width="500" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                      </div>
                    </div>
                    <div class="div3">
                      <div id="contenido-twitter" style="height: 500px; overflow: auto;">
                        <!-- Pega el código de inserción de Twitter aquí -->
                        <blockquote class="twitter-tweet">
                          <p lang="en" dir="ltr">Este es un tweet incrustado de Twitter.</p>
                          &mdash; Usuario de Twitter (@nombredeusuario) <a href="https://twitter.com/ONU_es/status/1387557244724727809?lang=es">fecha del tweet</a>
                        </blockquote>
                        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                      </div>
                    </div>
                    <div class="div4">
                      <div id="Facebook" style="height: 100%; width: 100%; overflow: auto;">
                        <iframe src="https://www.facebook.com/plugins/post.php?href=https://m.facebook.com/FiscaliaGeneralBolivia/videos/la-violencia-contra-la-mujer-es-un-delito-no-lo-permitasfiscal%C3%ADageneraldelestado/919566125551365/?locale=hi_IN&show_text=true&width=500" width="500" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                      </div>
                    </div>
                    <div class="div5">
                      <div id="contenido-twitter" style="height: 500px; width: 500px; overflow: auto;">
                        <!-- Pega el código de inserción de Twitter aquí -->
                        <blockquote class="twitter-tweet">
                          <p lang="en" dir="ltr">Este es un tweet incrustado de Twitter.</p>
                          &mdash; Usuario de Twitter (@nombredeusuario) <a href="https://twitter.com/MujeresRed/status/1509266268741849090">fecha del tweet</a>
                        </blockquote>
                        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                      </div>
                    </div>
                    <div class="div6">
                      <div id="Facebook" style="height: 100%; width: 100%; overflow: auto;">
                        <iframe src="https://www.facebook.com/plugins/post.php?href=https://www.facebook.com/ONUBolivia/photos/eliminemos-todas-las-formas-de-violencia-contra-las-mujeres-y-ni%C3%B1as-en-los-%C3%A1mbit/1747279335400523/?locale=es_LA&set=pcb.685102363642676&show_text=true&width=500" width="500" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                      </div>
                    </div>
                    </div>
                  </div>


              </div>
          </section>


</x-layouts>
