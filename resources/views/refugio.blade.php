<x-layouts.app >
    @vite(['resources/css/style_index.css','resources/css/style_flipCard.css'])

    <div class="container cabeza">
        <br><br>
        <div class=""><h1>Refugios</h1></div>

        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach ( $refugios as $refugio )
                @foreach ( $ubicaciones as $ubicacion )
                    <div class="col">
                        <div class="card border-primary mb-3" style="max-width: 30rem;">
                            <h5 class="card-header">Nombre : {{ $refugio->nombre }}</h5>
                            <div class="card-body text-primary">
                            <p class="card-text">
                                Tipo de refugio :
                                @if ($refugio->tipo == 0)
                                    albergue
                                @endif
                                @if ($refugio->tipo == 1)
                                    Casa de Seguridad
                                @endif
                                <br>
                                Direccion :
                                {{ $ubicacion->direccion }}
                            </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>

</x-layouts>
