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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
        $('#toggle-sidenav').on('click', function(){
          $('.sidenav-holder').toggle();
          $('.content-holder').toggleClass('col-lg-10').toggleClass('col-lg-12');
        });
      });
        </script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Create New User</div>
    
                    <div class="card-body">
                        
                      <form action="{{ action('Admin\UsersController@store') }}" method="POST">
                        @csrf   
                        <div class="form-group row">
                            <label for="email" class="col-12 col-form-label">Email</label>
    
                            <div class="col-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required>
    
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-12 col-form-label">Password</label>
    
                            <div class="col-12">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="passwordCon" class="col-12 col-form-label">Confirm Password</label>
    
                            <div class="col-12">
                                <input id="passwordCon" type="password" class="form-control" name="passwordCon" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="roles" class="col-form-label">Roles</label>
    
                            <div class="col-12">
                        @foreach ($roles as $role)
                            <div class="form-check">
                              <input type="checkbox" name="roles[]" value="{{ $role->id }}">
                              <label>{{ $role->name }}</label>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Create User</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>