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
                  <a class="nav-link active" href="{{route('admin.Eseccion1')}}" target="iframeEdit">Active</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
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
