<x-layouts.app>

    @vite(['resources/css/style_form.css'])
    <div class="container-body">
        <div class="fondoForm">
            <div class="inputs" style="display: none">
                <form action="{{route('veriFVV',$tiene)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="datos">
                            <h1 class="titleI">3.   DATOS DENUNCIADO/A</h1>
                            <!-- Nombre -->
                            <div class="input-group mb-3">
                                <label for="nombre" class="input-group-text">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Nombre" value="{{ $tiene->denunciado->nombre }}">
                                <label for="apPat" class="input-group-text">Apellido Paterno</label>
                                <input type="text" class="form-control" id="apPat" name="apPat" required placeholder="Apellido Paterno" value="{{ $tiene->denunciado->apPat }}">
                                <label for="apMat" class="input-group-text">Apellido Materno</label>
                                <input type="text" class="form-control" id="apMat" name="apMat" required placeholder="Apellido Materno" value="{{ $tiene->denunciado->apMat }}">

                            </div>
                            <div class="input-group mb-3">
                                <label for="sexo" class="input-group-text">Sexo</label>
                                <select class="form-select" id="sexo" name="sexo" required>
                                    <option value="Femenino" >Femenino</option>
                                    <option value="Masculino" >Masculino</option>
                                    <option value="Otro" >Otro</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <label for="sexo" class="input-group-text">Nacionalidad</label>
                                <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" required placeholder="Nacionalidad" value="{{ $tiene->denunciado->nacionalidad  }}">

                            </div>
                            <div class="input-group mb-3">
                                <label for="estadoCivil" class="input-group-text">El denunciado/a es su</label>
                                <select class="form-select" id="estadoCivil" name="estadoCivil" required>
                                    <!-- Asegúrate de tener una forma de obtener los estados civiles disponibles -->
                                    @foreach ($estadosCiviles as $estadoCivil)
                                    @foreach ($estadosCiviles as $estadoCivil)
                                    <option value="{{ $estadoCivil->id }}" {{ $tiene->denunciado->idEstado == $estadoCivil->id ? 'selected' : '' }}>
                                        {{ $estadoCivil->tipo }}
                                    </option>
                                @endforeach
                                    @endforeach
                                </select>
                                <label for="celular" class="input-group-text">Celular</label>
                                <input type="text" class="form-control" id="celular" name="celular" required placeholder="Celular" value="{{ $tiene->denunciado->celular }}">
                           </div>

                          <button type="submit">Enviar</button>
                        </div>
                </form>
            </div>
            <div class="texto">
                <h1 class="titleI">3.   DATOS DENUNCIADO/A</h1>
                <!-- Nombre -->
                <div class="input-group mb-3">
                    <label for="nombre" style="margin-right: 9px" >Nombre :   </label> <p> {{ $tiene->denunciado->nombre }}</p>
                </div>
                <div class="input-group mb-3">
                    <label for="apPat" style="margin-right: 9px" >Apellido Paterno : </label> <p> {{ $tiene->denunciado->apPat }}</p>
                </div>
                <div class="input-group mb-3">
                    <label for="apMat" style="margin-right: 9px" >Apellido Materno : </label><p>{{ $tiene->denunciado->apMat }}</p>
                </div>
                <div class="input-group mb-3">
                    <label for="sexo" style="margin-right: 9px" >Sexo : </label><p>{{ $tiene->denunciado->sexo }}</p>
                </div>
                <div class="input-group mb-3">
                    <label for="sexo" style="margin-right: 9px" >Nacionalidad : </label><p>{{ $tiene->denunciado->nacionalidad }}</p>
                </div>
                <div class="input-group mb-3">
                    <label for="estadoCivil" style="margin-right: 9px" >El denunciado/a es su </label><p>{{ $tiene->denunciado->estadoCivil->tipo }}</p>
               </div>
               <div class="input-group mb-3">
                <label for="celular" style="margin-right: 9px" >Celular : </label> <p> {{ $tiene->denunciado->celular }}</p>
           </div>
               <a href="/editar" id="editar" class="btn btn-primary">Editar</a>
                    <a href="{{ route('vFic',$tiene)  }}" class="btn btn-primary">Siguiente</a>
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
            $(".inputs").show();
            $(".texto").hide();
        });
    });
</script>
</x-layouts.app>
