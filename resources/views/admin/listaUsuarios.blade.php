<x-layouts.adminApp>
    @vite(['resources/css/style_tabla.css','resources/css/style_modalAU.css'])

<div class="cuerpoT">
    <div class="d-flex flex-row bd-highlight mb-3">
        <input type="text" class="form-control" id="buscar" placeholder="Buscar...">
        <a href="{{ route('admin.crearUser') }}" class="btn btn-primary">Crear Nuevo Usuario</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">CI</th>
                <th scope="col">Nombre</th>
                <th scope="col">Sexo</th>
                <th scope="col">Correo</th>
                <th scope="col">Estado Civil</th>
                <th scope="col">Rol</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->persona->nombre }} {{ $user->persona->apPat }} {{ $user->persona->apMat }}</td>
                    <td>{{ $user->persona->sexo }}</td>
                    <td>{{ $user->email}}</td>
                    <td>{{ $user->persona->estadoCivil->tipo}}</td>
                    <td>
                        @if ($user->role == 0)
                            user
                        @endif
                        @if ($user->role == 1)
                            editor
                        @endif
                        @if ($user->role == 2)
                            admin
                        @endif
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                            <button type="button" class="btn  btn-outline-primary show-user-details"
                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                data-user="{{ json_encode([
                                    'id' => $user->id,
                                    'email' => $user->email,
                                    'username' => $user->username,
                                    'password' => $user->password,
                                    'role' => $user->role,
                                    'name' => $user->persona->nombre,
                                    'apP' => $user->persona->apPat,
                                    'apM' => $user->persona->apMat,
                                    'sexo' => $user->persona->sexo,
                                    'date' => $user->persona->fechaNac,
                                    'cel' => $user->persona->celular,
                                    'ec' => $user->persona->estadoCivil->tipo
                                ]) }}">
                                Ver
                            </button>
                            <form action="{{route('admin.User.Delete',$user)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-primary" >Eliminar</button>
                            </form>

                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

    <!-- Modal Ver todos los datos-->
    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="inputs">
                    <form method="POST" action="{{route('admin.User.update')}}" enctype="multipart/form-data">
                        @csrf
                        <p>User CI          : <input id="user-id-input" name="id"></p>
                        <p>Email            : <input id="user-email-input" name="email"></p>
                        <p>Username         : <input id="user-Username-input" name="username"></p>
                        <p>Rol              :
                            <select class="form-select" aria-label="Default select example" name="role">
                                <option value="-1">Cambiar Rol</option>
                                <option value="0">Usuario</option>
                                <option value="1">Administrador</option>
                                <option value="2">Otro</option>
                              </select>
                        </p>
                        <p>Nombre           : <input id="user-Name-input" name="name"></p>
                        <p>Ap. Paterno      : <input id="user-apP-input" name="apPat"></p>
                        <p>Ap. Materno      : <input id="user-apM-input" name="apMat"></p>
                        <p>Sexo             : <input id="user-Sexo-input" name="sexo"></p>
                        <p>Fecha Nacimiento : <input id="user-Date-input" name="fechaNac"></p>
                        <p>Celular          : <input id="user-Cel-input" name="cel"></p>
                        <p>Estado Civil     : <input id="user-Ec-input" style="display: none">
                            <select class="form-select" aria-label="Default select example" name="ec">
                                <option value="-1">Cambiar Estado Civil</option>
                                @foreach ( $civil as $estado )
                                    <option value="{{$estado->id}}">{{$estado->tipo}}</option>
                                @endforeach
                              </select>
                        </p>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
                <div class="Inf">
                    <p>User CI          : <span id="user-id-display"></span></p>
                    <p>Email            : <span id="user-email-display"></span></p>
                    <p>Username         : <span id="user-Username-display"></span></p>
                    <p>Rol              : <span id="user-Role-display"></span></p>
                    <p>Nombre           : <span id="user-Name-display"></span></p>
                    <p>Ap. Paterno      : <span id="user-apP-display"></span></p>
                    <p>Ap. Materno      : <span id="user-apM-display"></span></p>
                    <p>Sexo             : <span id="user-Sexo-display"></span></p>
                    <p>Fecha Nacimiento : <span id="user-Date-display"></span></p>
                    <p>Celular          : <span id="user-Cel-display"></span></p>
                    <p>Estado Civil     : <span id="user-Ec-display"></span></p>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" id="edit-button" class="btn btn-primary">Editar</button>
            </div>
        </div>
        </div>
    </div>









<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Funcion para buscar elementos
        $('#buscar').on('keyup', function () {
            const filtro = $(this).val().toLowerCase();
            $('tbody tr').filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(filtro) > -1);
            });
        });
        //Funciones MODAl
        $('#exampleModal').on('show.bs.modal', function() {
            $('.Inf').show();
            $('.inputs').hide();
        });

        // Cuando se hace clic en el botón de editar
        $('#edit-button').click(function() {
            // Oculta el div 'Inf' y muestra el div 'inputs'
            $('.Inf').hide();
            $('.inputs').show();
        });


        // Funcion para mandar la informacion al modal = Ver todos los datos
        $('#exampleModal').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget); // Botón que abrió el modal
            const userData = JSON.parse(this.getAttribute('data-user'));
            document.querySelectorAll('.show-user-details').forEach(button => {
                button.addEventListener('click', function () {
                    const userData = JSON.parse(this.getAttribute('data-user'));
                    if(userData.role == 0){
                        document.getElementById('user-Role-display').textContent = "Usuario";
                    }
                    if(userData.role == 2){
                        document.getElementById('user-Role-display').textContent = "Administrador";
                    }
                    if(userData.role == 1){
                        document.getElementById('user-Role-display').textContent = "Otro";
                    }
                    document.getElementById('user-id-display').textContent = userData.id;
                    document.getElementById('user-email-display').textContent = userData.email;
                    document.getElementById('user-Username-display').textContent = userData.username;

                    document.getElementById('user-Name-display').textContent = userData.name;
                    document.getElementById('user-apP-display').textContent = userData.apP;
                    document.getElementById('user-apM-display').textContent = userData.apM;
                    document.getElementById('user-Sexo-display').textContent = userData.sexo;
                    document.getElementById('user-Date-display').textContent = userData.date;
                    document.getElementById('user-Cel-display').textContent = userData.cel;
                    document.getElementById('user-Ec-display').textContent = userData.ec;

                    document.getElementById('user-id-input').value = userData.id;
                    document.getElementById('user-email-input').value = userData.email;
                    document.getElementById('user-Username-input').value = userData.username;

                    document.getElementById('user-Name-input').value = userData.name;
                    document.getElementById('user-apP-input').value = userData.apP;
                    document.getElementById('user-apM-input').value = userData.apM;
                    document.getElementById('user-Sexo-input').value = userData.sexo;
                    document.getElementById('user-Date-input').value = userData.date;
                    document.getElementById('user-Cel-input').value = userData.cel;
                    document.getElementById('user-Ec-input').value = userData.ec;

                });
            });
        });


    });



</script>
</x-layouts.adminApp>
