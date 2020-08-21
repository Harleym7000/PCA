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
          <div class="row justify-content-center">
          <div class="card-deck" style="margin: 1%;">
            <div class="card text-white bg-primary mb-3" style="min-width: 20rem;">
              <div class="card-body">
                <div class="container">
                <div class="row">
                  <div class="col-3 d-flex align-items-center">
                  <img src="/img/baseline_visibility_white_18dp.png" style="height: 70px;">
                </div>
                <div class="col-4">
                </div>
                <div class="col-5 justify-content-center">
                  <h1 class="justify-content-center text-center" style="font-size: 78px;">{{$totalUniqueVisits}}</h1>
                    <h5 class="justify-content-center text-center"><strong>Site Visits</strong></h5>
                </div>
              </div>
            </div>
              </div>
            </div>
            <div class="card text-white bg-success mb-3" style="min-width: 20rem;">
              <div class="card-body">
                <div class="container">
                <div class="row">
                  <div class="col-3 d-flex align-items-center">
                  <img src="/img/baseline_people_alt_white_18dp.png" style="height: 80px;">
                </div>
                <div class="col-4">
                </div>
                <div class="col-5 justify-content-center">
                  <h1 class="justify-content-center text-center" style="font-size: 78px;">{{$totalUsers}}</h1>
                    <h5 class="justify-content-center text-center"><strong>Total Users</strong></h5>
                </div>
              </div>
            </div>
              </div>
            </div>
            <div class="card text-white bg-info mb-3" style="min-width: 20rem;">
              <div class="card-body">
                <div class="container">
                <div class="row">
                  <div class="col-3 d-flex align-items-center">
                  <img src="/img/baseline_person_add_alt_1_white_18dp.png" style="height: 80px;">
                </div>
                <div class="col-4">
                </div>
                <div class="col-5 justify-content-center">
                  <h1 class="justify-content-center text-center" style="font-size: 78px;">{{$usersThisMonth}}</h1>
                    <h5 class="justify-content-center text-center"><strong>New Users this month</strong></h5>
                </div>
              </div>
            </div>
              </div>
            </div>
            <div class="card text-white bg-danger mb-3" style="min-width: 20rem;">
              <div class="card-body">
                <div class="container">
                <div class="row">
                  <div class="col-3 d-flex align-items-center">
                  <img src="/img/baseline_question_answer_white_18dp.png" style="height: 70px;">
                </div>
                <div class="col-4">
                </div>
                <div class="col-5 justify-content-center">
                  <h1 class="justify-content-center text-center" style="font-size: 78px;">{{$totalContactMessages}}</h1>
                    <h5 class="justify-content-center text-center"><strong>Contact Messages</strong></h5>
                </div>
              </div>
            </div>
              </div>
            </div>
          </div>
          </div>
          <div class="active-users">
            <div class="card-header">Active Users: <strong>{{$loggedInUsers}}</strong></div>
            <div class="card bg-light mb-3">
              <div class="card-body">
            <table class="table text-center">
              <thead>
                <tr>
                  <th scope="col">First Name</th>
                  <th scope="col">Surname</th>
                  <th scope="col">IP Address</th>
                  <th scope="col">Time Logged In</th>
                </tr>
              </thead>
              <tbody>
                @foreach($usersData as $activeUser)
                <tr>
                  <td>{{$activeUser->firstname}}</td>
                  <td>{{$activeUser->surname}}</td>
                  <td>{{$activeUser->ip_address}}</td>
                  <td>{{$activeUser->time_logged_in}}</td>
                </tr>
                @endforeach
              </tbody>
            </table></div>
          </div>
        </div>
        </div>
            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
      </div>
    </div>
</div>
</div>
</body>
            

                  