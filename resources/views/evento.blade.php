<x-layouts.app >
    @vite(['resources/css/style_index.css','resources/css/style_flipCard.css'])

    <div class="container" style="margin-top: 10vh">
        <div class="row row-cols-1 row-cols-md-3 g-4" >
            @foreach ( $eventos as $evento )
                <div class="col">
                    <div class="card">
                        <img src="{{ $evento->urlImg }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $evento->titulo }}</h5>
                            <p class="card-text">{{ $evento->descripcion }}</p>
                            @if ($evento->tipo == 2)
                                <p>Direccion : {{ $evento->ubicaciones[0]->direccion }}</p>
                            @endif
                            @if ($evento->tipo == 1)
                                Enlace del evento : <a href="{{ $evento->urlSecion }}" class="btn btn-primary">Ingresar</a>
                            @endif
                        </div>
                        <div class="card-footer">
                              <small class="text-muted">Fechas : {{ $evento->fechaIni }} a {{ $evento->fechaFin }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layouts>
