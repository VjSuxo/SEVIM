<x-layouts.adminApp>
    @vite(['resources/css/style_tabla.css'])

<div class="cuerpoT">
    <div class="mb-3">
        <input type="text" class="form-control" id="buscar" placeholder="Buscar...">
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
                            <button type="button" class="btn btn-outline-primary"
                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                data-user-id="{{ $user->id }}" data-user-email="{{ $user->email }}" data-user-username="{{ $user->username }}"
                                data-user-password="{{ $user->password }}" data-user-role="{{ $user->role }}"
                                data-user-name="{{ $user->persona->nombre }}" data-user-apP="{{ $user->persona->apPat }}" data-user-apM="{{ $user->persona->apMat }}"
                                data-user-sexo="{{ $user->persona->sexo }}" data-user-date="{{ $user->persona->fechaNac }}" data-user-cel="{{ $user->persona->celular }}"
                                data-user-ec="{{ $user->persona->estadoCivil->tipo }}"
                                >
                                Ver
                            </button>
                            <button type="button" class="btn btn-outline-primary"
                                data-bs-toggle="modal" data-bs-target="#editarData"
                                data-user-id="{{ $user->id }}" data-user-email="{{ $user->email }}" data-user-username="{{ $user->username }}"
                                data-user-password="{{ $user->password }}" data-user-role="{{ $user->role }}"
                                data-user-name="{{ $user->persona->nombre }}" data-user-apP="{{ $user->persona->apPat }}" data-user-apM="{{ $user->persona->apMat }}"
                                data-user-sexo="{{ $user->persona->sexo }}" data-user-date="{{ $user->persona->fechaNac }}" data-user-cel="{{ $user->persona->celular }}"
                                data-user-ec="{{ $user->persona->estadoCivil->tipo }}"
                                >
                                Editar
                            </button>
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"  >Eliminar</button>
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
                <input type="hidden" id="user-id">
                <input type="hidden" id="user-email">
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
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </div>
    </div>

        <!-- Modal Editar Datos-->
        <div class="modal fade " id="editarData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDITAR DATA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="user-id">
                    <input type="hidden" id="user-email">
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
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
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
        // Funcion para mandar la informacion al modal = Ver todos los datos
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Botón que abrió el modal
            var userId = button.data('user-id');
            var userEmail = button.data('user-email');
            var userUsername = button.data('user-username');
            var userRole = button.data('user-role');
            var userName = button.data('user-name');
            var userapP = button.data('user-apP');
            var userapM = button.data('user-apM');
            var userSexo = button.data('user-sexo');
            var userDate = button.data('user-date');
            var userCel = button.data('user-cel');
            var userEc = button.data('user-ec');

            // Establecer los valores en los campos del modal
            $('#user-id').val(userId);
            $('#user-email').val(userEmail);

            $('#user-id-display').text(userId);
            $('#user-email-display').text(userEmail);
            $('#user-Username-display').text(userUsername);
            $('#user-Role-display').text(userRole);
            $('#user-Name-display').text(userName);
            $('#user-apP-display').text(userapP);
            $('#user-apM-display').text(userapM);
            $('#user-Sexo-display').text(userSexo);
            $('#user-Date-display').text(userDate);
            $('#user-Cel-display').text(userCel);
            $('#user-Ec-display').text(userEc);
        });

        // Funcion para mandar la informacion al modal = Editar datos
        $('#editarData').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Botón que abrió el modal
            var userId = button.data('user-id');
            var userEmail = button.data('user-email');
            var userUsername = button.data('user-username');
            var userRole = button.data('user-role');
            var userName = button.data('user-name');
            var userapP = button.data('user-apP');
            var userapM = button.data('user-apM');
            var userSexo = button.data('user-sexo');
            var userDate = button.data('user-date');
            var userCel = button.data('user-cel');
            var userEc = button.data('user-ec');

            // Establecer los valores en los campos del modal
            $('#user-id').val(userId);
            $('#user-email').val(userEmail);
            $('#user-Username').val(userUsername);
            $('#user-Role').val(userRole);
            $('#user-Name').val(userName);
            $('#user-apP').val(userapP);
            $('#user-apM').val(userapM);
            $('#user-Sexo').val(userSexo);
            $('#user-Date').val(userDate);
            $('#user-Cel').val(userCel);
            $('#user-Ec').val(userEc);
        });

    });



</script>
</x-layouts.adminApp>
