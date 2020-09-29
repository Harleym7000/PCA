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

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
       // Load the Visualization API and the piechart package.
    google.charts.load('current', {'packages':['corechart']});
      
      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);
        
      function drawChart() {
        var jsonData = $.ajax({
            url: "/admin/getCommitteeGrowth",
            dataType: "json",
            async: false
            }).responseText;
            
        // Create our data table out of JSON data loaded from server.
        var data = new google.visualization.DataTable(jsonData);
  
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('members_curve_chart'));
        chart.draw(data, {width: 400, height: 240});
      }
  
    </script>

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
              <li class="nav-item">
                <a class="nav-link active" href="/admin/dashboard">Admin</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/events/dashboard">Events</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
              </li>
            </ul>
            <h1>Dashboard</h1>
          <div class="row justify-content-center">
              <div class="col-11">
                <div class="card-deck">
                  <div class="card text-white bg-primary">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                      <img src="/img/baseline_visibility_white_18dp.png">
                        </div>
                        <div class="col-3">
                      <h1 class="card-text">{{$totalUniqueVisits}}
                        <p class="card-text">Site Visits</p>
                      </div>
                      </div>
                    </div>
                  </div>
                  <div class="card text-white bg-success">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-7">
                      <img src="/img/baseline_people_alt_white_18dp.png">
                        </div>
                        <div class="col-5">
                      <h1 class="card-text">{{$totalCommitteeMembers}}
                        <p class="card-text">Committee Members</p>
                      </div>
                      </div>
                    </div>
                  </div>
                  <div class="card text-white bg-danger">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-6">
                      <img src="/img/baseline_person_add_alt_1_white_18dp.png">
                        </div>
                        <div class="col-6">
                      <h1 class="card-text">{{$usersThisMonth}}
                        <p class="card-text">Registered This Month</p>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-deck">
                  <div class="card">
                    <div class="card-header">
                      Commitee Member Growth Pattern
                    </div>
                    <div class="card-body">
                      <div id="members_curve_chart" style="width: 650px; height: 300px"></div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      Site Traffic
                    </div>
                    <div class="card-body">
                      <div id="traffic_curve_chart" style="width: 650px; height: 300px"></div>
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
            

                  