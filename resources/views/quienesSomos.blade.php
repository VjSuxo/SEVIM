<x-layouts.app >
    @vite(['resources/css/style_about.css','resources/css/style_detalles.css',])
    @foreach ( $nosotros as $nos )
    @if ($nos->tipo == 'qST')
       <div class="inicio" style=" background: url({{$nos->urlFondo}}) ;">
           <h1>Quienes Somos</h1>
       </div>
     @endif
   @endforeach


       <section >
           <div class="contenedor reveal cuerpo">
               <div class="L1">
                @foreach ( $nosotros as $nos )
                   @if ($nos->tipo == 'qST')
                       <h1 class="tituloP">
                         {{$nos->titulo}}
                       </h1>
                       <p class="textoP">{{$nos->texto}} </p>
                   @endif
                @endforeach
               </div>
               <div class="L2">
                   @foreach ( $nosotros as $nos )
                       @if ($nos->tipo == 'qSF')
                       <h1 class="Frase">{{$nos->titulo}}</h1>
                       <h3 class="creador">
                           {{$nos->texto}}
                       </h3>
                       @endif
                    @endforeach

               </div>
          </div>

       </section>
</x-layouts.app >
