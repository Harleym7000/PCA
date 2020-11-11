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
<script>
  $(document).ready(function() {
    $('#toggle-sidenav').on('click', function(){
      $('.sidenav-holder').toggle();
      $('.content-holder').toggleClass('col-lg-10').toggleClass('col-lg-12');
    });
  });
    </script>
</head>
    <body>
    <div id="app">
        <div class="container-fluid" style="text-align: left; color: #000;">
          <div class="row no-gutters">
            <div class="sidenav-holder col-12 col-lg-2">
              @include('inc.admin-sidenav')
            </div>
            <div class="content-holder col-12 col-lg-10">
              @include('inc.admin-nav')
<div id="create-user">
    @include('partials.alerts')
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="card">
                    <div class="card-header">Reset User Password</div>
    
                    <div class="card-body">
                        
                      <form action="/admin/users/processResetPass" method="POST">
                        @csrf

                        <div class="form-group row">
                          <label for="password" class="col-12 col-md-3 col-lg-2 col-form-label text-md-right">Current Password</label>
  
                          <div class="col-12 col-md-7">
                              <input id="current_password" type="password" class="form-control" name="current_password" required>
                          </div>
                      </div>

                        <div class="form-group row">
                            <label for="password" class="col-12 col-md-3 col-lg-2 col-form-label text-md-right">New Password</label>
    
                            <div class="col-12 col-md-7">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="passwordCon" class="col-md-3 col-lg-2 col-form-label text-md-right">Confirm New Password</label>
    
                            <div class="col-12 col-md-7">
                                <input id="passwordCon" type="password" class="form-control" name="passwordCon" required>
                            </div>
                        </div>
                        <div class="text-right">
                        <button type="submit" class="col-12 col-md-3 col-lg-3 col-xl-2 btn btn-primary">Reset Password</button>
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