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
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);


    function drawChart() {
      $.ajax({
type : 'GET',
url : '/admin/getCommitteeGrowth',
headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
dataType: "json",
success:function(response){
  console.log(JSON.stringify(response));
  var jan = response.janMembers;
  var feb = response.febMembers;
  var mar = response.marMembers;
  var apr = response.aprMembers;
  var may = response.mayMembers;
  var jun = response.junMembers;
  var jul = response.julMembers;
  var aug = response.augMembers;
  var sep = response.sepMembers;
  var oct = response.octMembers;
  var nov = response.novMembers;
  var dec = response.decMembers;
      
        var data = google.visualization.arrayToDataTable([
          ['Month', 'New Members'],
          ['Jan',  jan],
          ['Feb',  feb],
          ['Mar',  mar],
          ['Apr',  apr],
          ['May',  may],
          ['Jun',  jun],
          ['Jul',  jul],
          ['Aug',  aug],
          ['Sep',  sep],
          ['Oct',  oct],
          ['Nov',  nov],
          ['Dec',  dec],
        ]);

        var options = {
          title: 'Committee Member Growth This Year',
          curveType: 'function',
          colors:['red','#004411'],
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('members_curve_chart'));

        chart.draw(data, options);
}
      });
      }
  
    </script>
    <script>
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);


    function drawChart() {
      $.ajax({
type : 'GET',
url : '/admin/getSiteTraffic',
headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
dataType: "json",
success:function(response){
  console.log(JSON.stringify(response));
  var jan = response.janVisitors;
  var feb = response.febVisitors;
  var mar = response.marVisitors;
  var apr = response.aprVisitors;
  var may = response.mayVisitors;
  var jun = response.junVisitors;
  var jul = response.julVisitors;
  var aug = response.augVisitors;
  var sep = response.sepVisitors;
  var oct = response.octVisitors;
  var nov = response.novVisitors;
  var dec = response.decVisitors;
      
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Site Visits'],
          ['Jan',  jan],
          ['Feb',  feb],
          ['Mar',  mar],
          ['Apr',  apr],
          ['May',  may],
          ['Jun',  jun],
          ['Jul',  jul],
          ['Aug',  aug],
          ['Sep',  sep],
          ['Oct',  oct],
          ['Nov',  nov],
          ['Dec',  dec],
        ]);

        var options = {
          title: 'Site Visits This Year',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('traffic_curve_chart'));

        chart.draw(data, options);
}
      });
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
                      <strong>Commitee Member Growth Pattern</strong>
                    </div>
                    <div class="card-body">
                      <div id="members_curve_chart"></div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <strong>Site Traffic</strong>
                    </div>
                    <div class="card-body">
                      <div id="traffic_curve_chart"></div>
                    </div>
                  </div>
                </div>
              </div>
              <h3 class="text-center">More coming soon</h3>
          </div>
          </div>
        </div>
      </div>
    </div>  
</div>
</body>
            

                  