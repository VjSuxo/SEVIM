<x-layouts.app>
@vite(['resources/css/style_form.css'])
<div class="container-body">
    <div class="fondoForm">
        <h1 class="title">VALIDACION DE INFORMACION</h1>
        <div class="inpt" style="display: none">
            <form action="{{route('veriForm',$tiene)}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="inputs">
                <div class="hechos">
                    <!-- Datos del hecho-->
                        <h1 class="titleI">1. DATOS DEL HECHO</h1>
                        <!-- Fecha Denuncia-->
                        <div class="mb-3">
                            <label for="fechaD" class="form-label">Fecha de Denuncia</label>
                            <input type="date" class="form-control" id="fechaD" name="fechaD" value="{{$tiene->fechaDenuncia}}" required placeholder="">
                        </div>
                          <!-- Fecha Hecho-->
                        <div class="mb-3">
                            <label for="fechaH" class="form-label">Fecha del Hecho de Violencia</label>
                            <input type="date" class="form-control" id="fechaH" name="fechaH" value="{{$tiene->denunciaViolencia->fechaHechoDenuncia}}" required placeholder="">
                        </div>
                          <!-- Tipo violencia-->
                        <div class="mb-3">
                            <label for="tipoV" class="form-label">Tipo de Violencia</label>
                                <select class="form-select" aria-label="Default select example" id="tipoV" name="tipoV">
                                    @foreach ( $tipoViolencias as $estadoCivil )
                                    <option value="{{ $estadoCivil->id }}" {{ $tiene->denunciaViolencia->tipoViolencia->id == $estadoCivil->id ? 'selected' : '' }}>
                                        {{ $estadoCivil->tipoViolencia }}
                                    </option>
                                    @endforeach
                                </select>
                        </div>
                          <!-- Relato-->
                        <div class="mb-3">
                            <span class="form-label">Relatos de los Hechos</span>
                            <textarea class="form-control"  id="relato" name="relato" aria-label="With textarea" required>{{ $tiene->denunciaViolencia->relato }}</textarea>
                        </div>
                          <!-- Subir archivos-->
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Cambiar pruebas (archivos)</label>
                            <input type="file" name="archivo" id="archivo" class="form-control" id="inputGroupFile02">
                        </div>
                        <button type="submit" >Siguiente</button>
                </div>
            </div>
            </form>

        </div>
        <!-- datos -->
        <div class="texto">
            <div style="padding: 10vh">
                <!-- Datos del hecho-->
                    <h1 class="titleI">1. DATOS DEL HECHO</h1>
                    <!-- Fecha Denuncia-->
                    <div class="mb-3">
                        <label for="fechaD" class="form-label">Fecha de Denuncia</label>
                        <p>{{$tiene->fechaDenuncia}}</p>
                    </div>
                      <!-- Fecha Hecho-->
                    <div class="mb-3">
                        <label for="fechaH" class="form-label">Fecha del Hecho de Violencia</label>
                        <p>{{$tiene->denunciaViolencia->fechaHechoDenuncia}}</p>
                    </div>
                      <!-- Tipo violencia-->
                    <div class="mb-3">
                        <label for="tipoV" class="form-label">Tipo de Violencia</label>
                        <p>{{ $tiene->denunciaViolencia->tipoViolencia->tipoViolencia }}</p>
                    </div>
                      <!-- Relato-->
                    <div class="mb-3">
                        <span class="form-label">Relatos de los Hechos</span>
                        <p>{{ $tiene->denunciaViolencia->relato }}</p>
                    </div>
                      <!-- Subir archivos-->
                    @if ($tiene->denunciaViolencia->urlArchivoPruebas != null)
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Subir pruebas (archivos)</label>
                            <a href="{{ $tiene->denunciaViolencia->urlArchivoPruebas }}">Pruebas</a>
                        </div>
                    @endif
                    <a href="/editar" id="editar" class="btn btn-primary">Editar</a>
                    <a href="{{ route('vFic',$tiene)  }}" class="btn btn-primary">Siguiente</a>
            </div>

        </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $(".texto").show();
        $(".inpt").hide();
        $("#editar").click(function(e){
            e.preventDefault();
            $(".inpt").show();
            $(".texto").hide();
        });
    });
</script>
</x-layouts.app>



