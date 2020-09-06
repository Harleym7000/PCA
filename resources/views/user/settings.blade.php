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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<div id="app">
    <div class="container-fluid" style="text-align: left; color: #000;">
      <div class="row no-gutters">
        <div class="col-2">
          @include('inc.admin-sidenav')
        </div>
        <div class="col-10">
          @include('inc.admin-nav')
<div id="create-user">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="card">
                    <div class="card-header">User Settings</div>
    
                    <div class="card-body">
                        
                      <form action="{{ action('Admin\UsersController@store') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="firstname" class="col-md-2 col-form-label text-md-right">First Name:</label>
    
                            <div class="col-9">
                                <input id="firstname" type="text" class="form-control" name="firstname" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-2 col-form-label text-md-right">Surname:</label>
    
                            <div class="col-9">
                                <input id="surname" type="text" class="form-control" name="surname" required autofocus>
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>
    
                            <div class="col-9">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required>
    
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right">Password</label>
    
                            <div class="col-9">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="passwordCon" class="col-md-2 col-form-label text-md-right">Confirm Password</label>
    
                            <div class="col-9">
                                <input id="passwordCon" type="password" class="form-control" name="passwordCon" required>
                            </div>
                        </div>
                        @include('partials.alerts')

                        <div class="form-group row">
                            <label for="roles" class="col-md-2 col-form-label text-md-right">Roles</label>
    
                            <div class="col-9">
                            <div class="form-check">
                              <input type="checkbox" name="roles[]" value="">
                              <label></label>
                            </div>
                        </div>
                    </div>
                        <button type="submit" class="btn btn-primary">Create User</button>
                    </div>
                </div>
            </div>
        </div>
    </div>