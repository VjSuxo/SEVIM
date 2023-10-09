<x-layouts.app>
    @vite(['resources/css/style_index.css','resources/css/style_about.css','resources/css/style_detalles.css'])
    @foreach ( $nosotros as $nos )

    @if ($nos->tipo == 'qp_PF')
    <div class="inicio" style=" background: url({{$nos->urlFondo}}) ;">
        <h1>Quienes Hacemos</h1>
    </div>
    @endif
    @endforeach


        <section >
            <div class="contenedor reveal cuerpoH">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ( $nosotros as $nos  )
                        @if ($nos->tipo == 'qp_PC')
                            <div class="col">
                                <div class="card fondoCard h-100 d-flex justify-content-center align-items-center">
                                <div class="card-body text-center">
                                    <h2 class="card-title">{{$nos->titulo}}</h2>
                                    <img src="{{$nos->urlImagen}}" class="card-img-top" alt="...">
                                    <p class="card-text">{{$nos->texto}}</p>
                                </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>

        </section>
</x-layouts>
