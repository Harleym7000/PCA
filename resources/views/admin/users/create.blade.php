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
  @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
    @include('partials.alerts')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Create New User</div>
    
                    <div class="card-body">
                        
                      <form action="/admin/users/createNew" method="POST">
                        @csrf   
                        <div class="form-group row">
                            <label for="email" class="col-12 col-form-label">Email: <span class="asterisk">*</span></label>
    
                            <div class="col-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required>
    
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="roles" class="col-form-label">Roles <span class="asterisk">*</span> <br>(Please select at least one)</label>
                            <div class="col-12">
                        @foreach ($roles as $role)
                            <div class="form-check">
                              <input type="checkbox" name="roles[]" value="{{ $role->id }}" class="@error('roles') is-invalid @enderror">
                              @error('roles')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
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