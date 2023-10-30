<x-layouts.app>

    @vite(['resources/css/style_form.css'])
    <div class="container-body">
        <div class="fondoForm">
            <h1 class="title">DENUNCIA DE VIOLENCIA</h1>
            <form action="{{route('formularioPDV',$denuncia)}}" method="POST" enctype="multipart/form-data">
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
                        <input type="text" class="form-control" id="departamento" name="departamento" required placeholder="Departamento" value="">
                       </div>
                       <div class="input-group mb-3">
                        <label for="domicilio" class="input-group-text">Domicilio</label>
                        <input type="text" class="form-control" id="domicilio" name="domicilio" required placeholder="Domicilio" value="">
                        <label for="ubicacion" class="input-group-text">Ubicación</label>
                        <input type="text" class="form-control" id="ubicacion" name="ubicacion"/>
                      </div>
                      <button type="submit">Enviar</button>
                    </div>
            </form>

            </div>
        </div>
    </div>
</x-layouts.app>
