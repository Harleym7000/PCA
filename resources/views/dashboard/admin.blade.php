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
          <div class="active-users-card">
          <div class="card bg-light mb-3" style="max-width: 22rem;">
            <div class="card-header">Active Users</div>
            <div class="card-body">
              <h4 class="card-text">Total Active Users: {{$loggedInUsers}}</h4>
              <br>
              <div class="row">
              <h5 class="card-text col-4">Username</h5>
              <h5 class="card-text col-8">Last Login Made</h5>
            </div>
            <div class="row">
              @foreach($usersData as $userData)
              <p class="card-text col-4">{{$userData->name}}</p>
              <p class="card-text col-8">{{$userData->time_logged_in}}</p>
              @endforeach
            </div>
        </div>
          </div>
        </div>