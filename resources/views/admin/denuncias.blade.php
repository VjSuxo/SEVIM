<x-layouts.adminApp>
    @vite(['resources/css/style_tabla.css'])
<div class="cuerpoT">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Denunciante</th>
                <th scope="col">Denunciado</th>
                <th scope="col">Fecha del Hecho de Violencia</th>
                <th scope="col">Relato</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tienes as $tiene)
                <tr>
                    <th scope="row">{{ $tiene->id }}</th>
                    <td>{{ $tiene->denunciante->nombre }} {{ $tiene->denunciante->apPat }} {{ $tiene->denunciante->apMat }}</td>
                    <td>{{ $tiene->denunciado->nombre }} {{ $tiene->denunciado->apPat }} {{ $tiene->denunciado->apMat }}</td>
                    <td>{{ $tiene->denunciaViolencia->fechaHechoDenuncia }}</td>
                    <td>{{ $tiene->denunciaViolencia->relato }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-layouts.adminApp>
