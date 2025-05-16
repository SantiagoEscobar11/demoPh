<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else

        @endif
    </head>
    <body >
  <h1>Demo PHº</h1>
  <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand">Consulta</a>
      <div class="d-flex" >
        <input class="form-control me-2" type="search" id="iptBuscar" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-outline-success" id="liveToastBtn">Search</button>
      </div>
    </div>
  </nav>

  <div class="container-fluid text-center ">
    <div class=" row ">
      <div class="col bg-primary text-white ">
        Paciente
        <div class="input-group input-group-sm mb-3">
          <span class="input-group-text" id="inputGroup-sizing-sm">Id</span>
          <input type="text" class="form-control" id="iptIdPaciente" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"  disabled  >
        </div>
        <div class="input-group input-group-sm mb-3">
          <span class="input-group-text" id="inputGroup-sizing-sm">Nombre</span>
          <input type="text" class="form-control" id="iptNamePaciente" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled>
        </div>
        <div class="input-group input-group-sm mb-3">
          <span class="input-group-text" id="inputGroup-sizing-sm">Apellido</span>
          <input type="text" class="form-control" id="iptLastNamePaciente" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled >
        </div>
      </div>
      <div class="col bg-secondary text-white ">
        Cita
        <div class="input-group input-group-sm mb-3">
          <span class="input-group-text" id="inputGroup-sizing-sm">Cita Id</span>
          <input type="text" class="form-control"  id="iptIdCita" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled>
        </div>
        <div class="col input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm">Fecha</span>
            <input type="text" class="form-control" id="iptFechaCita" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled>
          </div>

        <div class="row">
          <div class="col input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm">Init time</span>
            <input type="text" class="form-control"  id="iptHICita" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled>
          </div>
          <div class="col input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm">End time</span>
            <input type="text" class="form-control"  id="iptFICita" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled>
          </div>
        </div>

      </div>
    </div>
    <div class="row">
      <div class="col bg-secondary">
        Medico

        <div class="input-group input-group-sm mb-3">
          <span class="input-group-text" id="inputGroup-sizing-sm">Nombre</span>
          <input type="text" class="form-control" id="iptNombremedico" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled>
        </div>
        <div class="input-group input-group-sm mb-3">
          <span class="input-group-text" id="inputGroup-sizing-sm">Apellido</span>
          <input type="text" class="form-control" id="iptApellidomedico" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled>
        </div>

      </div>

    </div>
  </div>



    </body>
</html>
