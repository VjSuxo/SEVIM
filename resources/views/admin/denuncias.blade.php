<x-layouts.adminApp>
    @vite(['resources/css/style_tabla.css'])
<div class="cuerpoT">
    <div class="mb-3">
        <input type="text" class="form-control" id="buscar" placeholder="Buscar...">
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Denunciante</th>
                <th scope="col">Denunciado</th>
                <th scope="col">Tipo Denuncia</th>
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
                    <td> {{$tiene->denunciaViolencia->tipoDenuncia->tipoDenuncia}} </td>
                    <td>{{ $tiene->denunciaViolencia->fechaHechoDenuncia }}</td>
                    <td>{{ $tiene->denunciaViolencia->relato }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#buscar').on('keyup', function () {
            const filtro = $(this).val().toLowerCase();
            $('tbody tr').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(filtro) > -1);
            });
        });
    });
</script>
</x-layouts.adminApp>
