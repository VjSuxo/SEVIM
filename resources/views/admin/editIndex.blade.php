<x-layouts.adminApp>
    <style>
        iframe {
            min-height: 60vh;
    width: 100%;
    height: 100%;
    overflow: auto;
}

    </style>
    <div style="overflow-y: hidden">
        <div class="card text-center" style="margin: 15vh 15vh 15vh 15vh ">
            <div class="card-header">
              <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                  <a class="nav-link " href="{{route('admin.Eseccion1')}}" target="iframeEdit">Orientacion</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('admin.Eseccion2')}}">Nosotros</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('admin.Eseccion3')}}" aria-disabled="true">Noticias</a>
                </li>
              </ul>
            </div>
            <div class="card-body" style="min-height: 60vh">
                <div class="" style="">
                    <iframe name="iframeEdit" src="" title="Edicion de la pagina" allowfullscreen></iframe>
                  </div>
            </div>
        </div>
    </div>
</x-layouts.adminApp>
