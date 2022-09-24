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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        $('#toggle-sidenav').on('click', function() {
            $('.sidenav-holder').toggle();
            $('.content-holder').toggleClass('col-lg-10').toggleClass('col-lg-12');
            drawMembersChart();
            drawTrafficChart();
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
                    <div id="manage-users">
                        @include('partials.alerts')
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="text-right mr-5 mb-4">
                                <button type="button" class="btn btn-success mr-2" data-toggle="modal" data-target="#addFestivalModal">Add New Festival</button>
                                </div>
                                <div class="card">
                                    <div class="card-header">Red Sails Festival Management</div>
                                    <div class="m-3">
                                    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Festival ID</th>
      <th scope="col">Festival Year</th>
      <th scope="col">Festival Start Date</th>
      <th scope="col">Festival End Date</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($festivals as $f)
    <tr>
      <th scope="row">{{$f->id}}</th>
      <td>{{$f->year}}</td>
      <td>{{ \Carbon\Carbon::parse($f->start_date)->format('D jS M Y')}}</td>
      <td>{{ \Carbon\Carbon::parse($f->end_date)->format('D jS M Y')}}</td>
      <td>
        <a href=""><button id="comms-user" type="submit" class="btn btn-success"><img src="/img/baseline_add_white_18dp.png" data-toggle="tooltip" data-placement="bottom" title="Add Festival Programme"></button></a>
        <a href=""><button type="button" class="btn btn-dark "><img src="/img/baseline_create_white_18dp.png" data-toggle="tooltip" data-placement="bottom" title="Edit Event"></button></a>
        <button type="submit" class="btn btn-danger" data-toggle="modal" data-target=""><img src="/img/baseline_delete_white_18dp.png" data-toggle="tooltip" data-placement="bottom" title="Delete Event"></button>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
<div class="modal fade" id="addFestivalModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add New Festival</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="ml-3 mr-3 mt-2 mb-3" action="/events/red-sails/new" method="POST">
        @csrf
      <div class="modal-body text-left">
  <div class="form-group">
    <label for="exampleInputEmail1">Festival Year</label>
    <select class="form-control" id="exampleFormControlSelect1" name="festivalYear">
        <?php
        for($i = date('Y'); $i<2100; $i++) {
      echo "<option>$i</option>";
        }
        ?>
    </select>
  </div>
  <div class="row">
    <div class="col">
        <label>Start Date</label>
      <input type="date" class="form-control" placeholder="Festival Start Date..." name="startDate">
    </div>
    <div class="col">
    <label>End Date</label>
      <input type="date" class="form-control" placeholder="Festival End Date..." name="endDate">
    </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success">Add New Festival</button>
        </form>
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
</html>
