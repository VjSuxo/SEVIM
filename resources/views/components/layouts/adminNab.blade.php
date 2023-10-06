<nav class="navbar navbar-expand-lg fixed-top"
style="
 background: rgba(255, 182, 192, 0.8);
">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('welcome')}}">
            <img src="/img/log2.png" alt="" width="50" height="50" class="d-inline-block align-text-center">
            SEVIM
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="d-inline-block align-text-center"><img src="/img/icon/icon_plus.png" width="30" height="30" alt=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('welcome')}}">Editar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.denuncias')}}">Denuncias</a>
                </li>
            </ul>
        </div>

        <!-- Aquí se muestra el enlace "Login" o el nombre del usuario autenticado -->
        <ul class="navbar-nav ml-auto">
            @if(auth()->check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->username }} <!-- Muestra el nombre del usuario autenticado -->
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="userDropdown">
                        <li>
                            @if(Auth::user()->role == '2')
                                <a class="dropdown-item" href="{{  route('admin.denuncias') }}">Denuncias</a>
                            @endif
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a> <!-- Enlace "Login" cuando el usuario no está autenticado -->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Registrate</a>
                </li>
            @endif
        </ul>
    </div>
</nav>


