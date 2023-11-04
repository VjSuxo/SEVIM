<x-layouts.app>

    @vite(['resources/css/style_form.css'])
    <div class="container-body">
        <div class="fondoForm">
            <div class="inpt">
                <h1 class="title">DENUNCIA DE VIOLENCIA</h1>
                <form action="{{route('veriFDEN',$tiene)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="datos">
                            <h1 class="titleI">2.   DATOS VICTIMA</h1>
                            <!-- Nombre -->
                            <div class="input-group mb-3">
                                <label for="nombre" class="input-group-text">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Nombre" value="{{ auth()->check() ? auth()->user()->persona->nombre : '' }}">
                                <label for="apPat" class="input-group-text">Apellido Paterno</label>
                                <input type="text" class="form-control" id="apPat" name="apPat" required placeholder="Apellido Paterno" value="{{ auth()->check() ? auth()->user()->persona->apPat : '' }}">
                                <label for="apMat" class="input-group-text">Apellido Materno</label>
                                <input type="text" class="form-control" id="apMat" name="apMat" required placeholder="Apellido Materno" value="{{ auth()->check() ? auth()->user()->persona->apMat : '' }}">

                            </div>
                            <div class="input-group mb-3">
                                <label for="docIdentidad" class="input-group-text">Documento de Identidad</label>
                                <input type="text" class="form-control" id="docIdentidad" name="docIdentidad" required placeholder="Documento de Identidad" value="{{ auth()->check() ? auth()->user()->persona->id : '' }}">
                                <label for="fechaNac" class="input-group-text">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="fechaNac" name="fechaNac" required placeholder="Fecha de Nacimiento" value="{{ auth()->check() ? auth()->user()->persona->fechaNac : '' }}">
                            </div>
                            <div class="input-group mb-3">
                                <label for="nacionalidad" class="input-group-text">Correo</label>
                                <input type="email" class="form-control" id="email" name="email" required placeholder="Nacionalidad" value="{{ auth()->check() ? auth()->user()->persona->email : '' }}">
                                <label for="sexo" class="input-group-text">Sexo</label>
                                <select class="form-select" id="sexo" name="sexo" required>
                                    <option value="Femenino" {{ auth()->check() && auth()->user()->persona->sexo == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                                    <option value="Masculino" {{ auth()->check() && auth()->user()->persona->sexo == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                    <option value="Otro" {{ auth()->check() && auth()->user()->persona->sexo == 'Otro' ? 'selected' : '' }}>Otro</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <label for="estadoCivil" class="input-group-text">Estado Civil</label>
                                <select class="form-select" id="estadoCivil" name="estadoCivil" required>
                                    <!-- Asegúrate de tener una forma de obtener los estados civiles disponibles -->
                                    @foreach ($estadosCiviles as $estadoCivil)
                                        <option value="{{ $estadoCivil->id }}" {{ auth()->check() && auth()->user()->persona->idEstado == $estadoCivil->id ? 'selected' : '' }}>
                                            {{ $estadoCivil->tipo }}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="celular" class="input-group-text">Celular</label>
                                <input type="text" class="form-control" id="celular" name="celular" required placeholder="Celular" value="{{ auth()->check() ? auth()->user()->persona->celular : '' }}">
                           </div>
                           <h1 class="titleI">3. UBICACION</h1>
                           <div class="input-group mb-3">
                            <label for="departamento" class="input-group-text">Departamento</label>
                            <input type="text" class="form-control" id="departamento" name="departamento" required placeholder="Departamento" value="{{ $tiene->denunciaViolencia->direccion->departamento }}">
                           </div>
                           <div class="input-group mb-3">
                            <label for="domicilio" class="input-group-text">Domicilio</label>
                            <input type="text" class="form-control" id="domicilio" name="domicilio" required placeholder="Domicilio" value="{{ $tiene->denunciaViolencia->direccion->domicilio }}">
                            <label for="ubicacion" class="input-group-text">Ubicación</label>
                            <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="{{ $tiene->denunciaViolencia->direccion->ubicacion }}"/>
                          </div>
                          <button type="submit">Siguiente</button>
                        </div>
                </form>
            </div>
            <div class="texto">
                    <h1 class="titleI">2.   DATOS VICTIMA</h1>
                    <!-- Nombre -->
                    <div class="input-group mb-3">
                        <label for="nombre" style="margin-right: 10px">Nombre :</label><p>{{ auth()->check() ? auth()->user()->persona->nombre : '' }} {{ auth()->check() ? auth()->user()->persona->apPat : '' }} {{ auth()->check() ? auth()->user()->persona->apMat : '' }}</p>
                    </div>
                    <div class="input-group mb-3">
                        <label for="docIdentidad" style="margin-right: 10px" >Documento de Identidad : </label><p>{{ auth()->check() ? auth()->user()->persona->id : '' }}</p>
                        <label for="fechaNac" style="margin-left: 10px; margin-right: 10px">Fecha de Nacimiento : </label><p>{{ auth()->check() ? auth()->user()->persona->fechaNac : '' }}</p>
                    </div>
                    <div class="input-group mb-3">
                        <label for="nacionalidad" style="margin-right: 10px">Correo : </label><p>{{ auth()->check() ? auth()->user()->persona->email : '' }}</p>
                        <label for="sexo" style="margin-left: 10px; margin-right: 10px">Sexo : </label><p>{{auth()->user()->persona->sexo }}</p>
                    </div>
                    <div class="input-group mb-3">
                        <label for="estadoCivil" style="margin-right: 10px">Estado Civil : </label><p>{{auth()->user()->persona->estadoCivil->tipo}} </p>

                        <label for="celular" style="margin-left: 10px; margin-right: 10px">Celular : </label><p>{{ auth()->check() ? auth()->user()->persona->celular : '' }}</p>
                   </div>
                   <h1 class="titleI">3. UBICACION</h1>
                   <div class="input-group mb-3">
                    <label for="departamento" style="margin-right: 10px">Departamento</label><p>{{ $tiene->denunciaViolencia->direccion->departamento }}</p>
                   </div>
                   <div class="input-group mb-3">
                    <label for="domicilio" style="margin-right: 10px">Domicilio</label><p>{{ $tiene->denunciaViolencia->direccion->domicilio }}</p>
                    <label for="ubicacion" style="margin-left: 10px; margin-right: 10px">Ubicación</label><p>{{ $tiene->denunciaViolencia->direccion->ubicacion }}</p>
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
            $(".inpt").show();
            $(".texto").hide();
        });
    });
</script>
</x-layouts.app>
