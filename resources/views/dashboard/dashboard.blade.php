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
            <h1>Dashboard</h1>
          <div class="row justify-content-center">
              <div class="col-11">
                    <div class="card-deck">
                      <div class="card text-white bg-primary ">
                        <div class="card-body ">
                          <div class="row">
                            <div class="widget-img col-4">
                              <img src="/img/baseline_visibility_white_18dp.png" class="img-fluid">
                            </div>
                            <div class="col-8">
                              <h1 class="text-center"><strong><span class="total">{{$totalUsers}}</span></strong> <br>Site Visits</h1>
                            </div>
                          </div>
                      </div>
                      </div>
                      <div class="card text-white bg-success ">
                        <div class="card-body ">
                          <div class="row">
                            <div class="widget-img col-4">
                              <img src="/img/baseline_visibility_white_18dp.png" class="img-fluid">
                            </div>
                            <div class="col-8">
                              <h1 class="text-center"><strong><span class="total">{{$totalUsers}}</span></strong> <br>Committee Members</h1>
                            </div>
                          </div>
                      </div>
                      </div>
                      <div class="card text-white bg-danger">
                        <div class="card-body ">
                          <div class="row">
                            <div class="widget-img col-4">
                              <img src="/img/baseline_visibility_white_18dp.png" class="img-fluid">
                            </div>
                            <div class="col-8">
                              <h1 class="text-center"><strong><span class="total">{{$totalUsers}}</span></strong> <br>Site Visits</h1>
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
</div>
</body>
            

                  