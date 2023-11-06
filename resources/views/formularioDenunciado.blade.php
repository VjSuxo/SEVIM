<x-layouts.app>

    @vite(['resources/css/style_form.css'])
    <div class="container-body">
        <div class="fondoForm">
            <h1 class="title">DENUNCIA DE VIOLENCIA</h1>
            <form action="{{route('formularioPDen',$tiene)}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="datos">
                        <h1 class="titleI">3.   DATOS DENUNCIADO/A</h1>
                        <!-- Nombre -->
                        <div class="input-group mb-3">
                            <label for="nombre" class="input-group-text">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Nombre" value="">
                            <label for="apPat" class="input-group-text">Apellido Paterno</label>
                            <input type="text" class="form-control" id="apPat" name="apPat" required placeholder="Apellido Paterno" value="">
                            <label for="apMat" class="input-group-text">Apellido Materno</label>
                            <input type="text" class="form-control" id="apMat" name="apMat" required placeholder="Apellido Materno" value="">

                        </div>
                        <div class="input-group mb-3">
                            <label for="fechaNac" class="input-group-text">Edad</label>
                            <input type="number" class="form-control" id="fechaNac" name="fechaNac" required placeholder="Fecha de Nacimiento" value="">
                            <label for="nacionalidad" class="input-group-text">Nacionalidad </label>
                            <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" required placeholder="Nacionalidad" value="">
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
                            <label for="estadoCivil" class="input-group-text">Parentesco del denunciado/a </label>
                            <select id="estadoCivil" name="estadoCivil" class="form-select">
                                @foreach ($estadosCiviles as $estadoCivil)
                                    <option value="{{ $estadoCivil->id }}">
                                        {{ $estadoCivil->tipo }}
                                    </option>
                                @endforeach
                                <option value="otro">Otro</option>
                            </select>
                            <label for="celular" class="input-group-text" id="nuevoEEstadoCivil"  style="display: none;">Nuevo Parentesco</label>
                            <input type="text" id="nuevoEstadoCivil" name="nuevoEstadoCivil" style="display: none;">
                            <br>
                            <label for="celular" class="input-group-text">Celular</label>
                            <input type="text" class="form-control" id="celular" name="celular" required placeholder="Celular" value="">
                       </div>

                      <button type="submit">Enviar</button>
                    </div>
            </form>

            </div>
        </div>
    </div>

    <script>
        document.getElementById("estadoCivil").addEventListener("change", function () {
            if (this.value === "otro") {

                document.getElementById("nuevoEstadoCivil").style.display = "block";
                document.getElementById("nuevoEEstadoCivil").style.display = "block";
            } else {
                document.getElementById("nuevoEstadoCivil").style.display = "none";
                document.getElementById("agregarEstadoCivil").style.display = "none";
            }
        });

        document.getElementById("agregarEstadoCivil").addEventListener("click", function () {
            const nuevoEstadoCivil = document.getElementById("nuevoEstadoCivil").value;

            if (nuevoEstadoCivil.trim() !== "") {
                // Aquí puedes enviar el nuevo estado civil al servidor o realizar la acción deseada
                // Por ejemplo, puedes hacer una solicitud AJAX para agregar el nuevo estado civil
                // y luego actualizar la lista de estados civiles en el select.
                // No se proporciona la implementación completa, ya que depende de tu lógica y backend.
                alert("Agregando nuevo estado civil: " + nuevoEstadoCivil);
            }
        });
    </script>

</x-layouts.app>
