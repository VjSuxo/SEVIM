<x-layouts.app >
    @vite(['resources/css/style_index.css','resources/css/style_flipCard.css'])

    <div class="container cabeza">
        <br><br>
        <div class=""><h1>Leyes</h1></div>

        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach ( $leyes as $ley )
            <div class="col">
                <div class="card border-primary mb-3" style="max-width: 30rem;">
                    <h5 class="card-header">{{ $ley->nombre }}</h5>
                    <div class="card-body text-primary">
                      <p class="card-text">{{ $ley->descripcion }}</p>
                    </div>
                </div>
              </div>
            @endforeach
        </div>
    </div>

</x-layouts>
