<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>

<div id="app">
    <div class="container-fluid" style="text-align: left; color: #000;">
      <div class="row no-gutters">
        <div class="col-2">
          @include('inc.admin-sidenav')
        </div>
        <div class="col-10">
          @include('inc.admin-nav')
          <div id="dashboard">
            <ul class="nav nav-tabs">
              @can('manage-users')
              <li class="nav-item">
                <a class="nav-link" href="/admin/dashboard">Admin</a>
              </li>
              @endcan
              @can('manage-events')
              <li class="nav-item">
                <a class="nav-link active" href="/events/dashboard">Events</a>
              </li>
              @endcan
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
              </li>
            </ul>
            <h1>Dashboard</h1>
              <div class="content col-12">
                <div class="row justify-content-center">
                  <div class="card col-12 col-xl-3 text-white bg-primary">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-12 col-lg-7" style="height: 98%; margin:auto">
                      <img src="/img/baseline_visibility_white_18dp.png">
                        </div>
                        <div class="col-12 col-lg-5">
                      <h1 class="card-text text-right">3
                        <p class="card-text text-right">Site Visits</p>
                      </div>
                      </div>
                    </div>
                  </div>
                  <div class="card col-12 col-xl-3 text-white bg-success">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-12 col-lg-5" style="height: 98%; margin:auto">
                      <img src="/img/baseline_people_alt_white_18dp.png">
                        </div>
                        <div class="col-12 col-lg-7">
                      <h1 class="card-text">3
                        <p class="card-text">Members</p>
                      </div>
                      </div>
                    </div>
                  </div>
                  <div class="card col-12 col-xl-3 text-white bg-danger">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-6" style="height: 98%; margin:auto">
                      <img src="/img/baseline_person_add_alt_1_white_18dp.png">
                        </div>
                        <div class="col-6">
                      <h1 class="card-text">+3
                        <p class="card-text">This Month</p>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
</div>
</body>
</html>
            

                  