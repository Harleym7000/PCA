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
<div class="container-fluid" style="text-align: left; color: #000;">
  <div class="row">
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
                    <div class="card-header">Reset User Password</div>
    
                    <div class="card-body">
                        
                      <form action="{{ action('Admin\UsersController@resetUserPassword') }}" method="POST">
                        @csrf

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
                        <button type="submit" class="btn btn-primary">Reset Password</button>
                    </div>
                </div>
            </div>
        </div>
    </div>