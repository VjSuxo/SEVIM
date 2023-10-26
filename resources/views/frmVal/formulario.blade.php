<x-layouts.app>
@vite(['resources/css/style_form.css'])
<div class="container-body">
    <div class="fondoForm">
        <h1 class="title">VALIDACION DE INFORMACION</h1>
        <div class="inpt">
            <form action="{{route('formularioPDH')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="inputs">
                <div class="hechos ">
                    <!-- Datos del hecho-->
                        <h1 class="titleI">1. DATOS DEL HECHO</h1>
                        <!-- Fecha Denuncia-->
                        <div class="mb-3">
                            <label for="fechaD" class="form-label">Fecha de Denuncia</label>
                            <input type="date" class="form-control" id="fechaD" name="fechaD" required placeholder="">
                        </div>
                          <!-- Fecha Hecho-->
                        <div class="mb-3">
                            <label for="fechaH" class="form-label">Fecha del Hecho de Violencia</label>
                            <input type="date" class="form-control" id="fechaH" name="fechaH" required placeholder="">
                        </div>
                          <!-- Tipo violencia-->
                        <div class="mb-3">
                            <label for="tipoV" class="form-label">Tipo de Violencia</label>
                                <select class="form-select" aria-label="Default select example" id="tipoV" name="tipoV">
                                    @foreach ( $tipoViolencias as $tipo )
                                    <option id="tipoV" name="tipoV" value="{{$tipo->id}}">{{$tipo->tipoViolencia}}</option>
                                    @endforeach
                                </select>
                        </div>
                          <!-- Relato-->
                        <div class="mb-3">
                            <span class="form-label">Relatos de los Hechos</span>
                            <textarea class="form-control"  id="relato" name="relato" aria-label="With textarea" required></textarea>
                        </div>
                          <!-- Subir archivos-->
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Subir pruebas (archivos)</label>
                            <input type="file" name="archivo" id="archivo" class="form-control" id="inputGroupFile02">
                        </div>
                        <button type="submit" >Siguiente</button>
                        <input type="submit" value="sdsd">
                </div>
            </div>
            </form>

        </div>
        <!-- datos -->
        <div class="texto">
            <div class="hechos ">
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
                    </div>
                      <!-- Tipo violencia-->
                    <div class="mb-3">
                        <label for="tipoV" class="form-label">Tipo de Violencia</label>

                    </div>
                      <!-- Relato-->
                    <div class="mb-3">
                        <span class="form-label">Relatos de los Hechos</span>
                    </div>
                      <!-- Subir archivos-->
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Subir pruebas (archivos)</label>
                    </div>
                    <button type="submit" >Siguiente</button>
            </div>
        </div>
        </div>
    </div>
</div>
</x-layouts.app>



