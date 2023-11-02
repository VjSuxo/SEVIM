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
                            @if ($nos->tipo == 'qSP')
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
                        @foreach ( $nosotros as $nos )
                            @if ($nos->tipo == 'qH_Pf')
                                <p class="card-text">{{ $nos->resumen }}</p>
                            @endif
                        @endforeach
                        <a href="{{route('queHacemos')}}" class="btn formatoBtn mt-auto">Go somewhere</a>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card fondoCard h-100">
                      <img src="/img/icon/icon_participa.png" class="card-img-top" alt="...">
                      <div class="card-body text-center d-flex flex-column"> <!-- Agregamos "d-flex flex-column" aquí -->
                        <h2 class="card-title">Participa</h2>
                        @foreach ( $nosotros as $nos )
                            @if ($nos->tipo == 'qPF')
                                <p class="card-text">{{ $nos->resumen }}</p>
                            @endif
                        @endforeach
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
                    @foreach ( $noticias as $noticia )
                    <div class="div1">
                        @if ($noticia->tipo == 'facebook')
                            <div id="Facebook" style="height: 100%; width: 100%; overflow: auto;">
                                <iframe
                                    src="https://www.facebook.com/plugins/post.php?href={{$noticia->enlace}}&set=pcb.685102363642676&show_text=true&width=500"
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
                    </div>
                    <div class="div2">
                        @if ($noticia->tipo == 'noticia')
                            <div id="Facebook" style="height: 100%; width: 100%; overflow: auto;">
                                <iframe
                                src="{{$noticia->enlace}}"
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
                                ></iframe></div>
                        @endif

                    </div>
                    <div class="div3">
                        @if ($noticia->tipo == 'twitter')
                        <div id="contenido-twitter" style="min-height: 250px; overflow: auto;">
                            <!-- Pega el código de inserción de Twitter aquí -->
                            <blockquote class="twitter-tweet">
                              <p lang="en" dir="ltr">Este es un tweet incrustado de Twitter.</p>
                              &mdash; Usuario de Twitter (@nombredeusuario) <a href="{{$noticia->enlace}}">fecha del tweet</a>
                            </blockquote>
                            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                          </div>
                        @endif
                    </div>
                    <div class="div4">
                        @if ($noticia->tipo == 'facebook')
                            <div id="Facebook" style="height: 100%; width: 100%; overflow: auto;">
                                <iframe
                                    src="https://www.facebook.com/plugins/post.php?href={{$noticia->enlace}}&set=pcb.685102363642676&show_text=true&width=500"
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
                    </div>
                    <div class="div5">
                        @if ($noticia->tipo == 'twitter')
                        <div id="contenido-twitter" style="min-height: 250px; overflow: auto;">
                            <!-- Pega el código de inserción de Twitter aquí -->
                            <blockquote class="twitter-tweet">
                              <p lang="en" dir="ltr">Este es un tweet incrustado de Twitter.</p>
                              &mdash; Usuario de Twitter (@nombredeusuario) <a href="{{$noticia->enlace}}">fecha del tweet</a>
                            </blockquote>
                            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                          </div>
                        @endif
                      </div>
                      <div class="div6">
                        @if ($noticia->tipo == 'noticia')
                            <div id="Facebook" style="height: 100%; width: 100%; overflow: auto;">
                                <iframe
                                src="{{$noticia->enlace}}"
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
                                ></iframe></div>
                        @endif
                      </div>
                @endforeach
                </div>
            </div>


              </div>
          </section>


</x-layouts>
