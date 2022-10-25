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

                        $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

                        $(document).ready(function(){
                          $('#toggle-sidenav').on('click', function(){
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
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createFestivalModal">Create New Festival</button>
        </div>
            <div class="card">
              <div class="card-header">Red Sails Festival Management</div>
              <p class="mob-info pt-5">Scroll right to see more</p>
                  <div class="table-responsive">
                      <table class="table table-striped table-bordered table-sm" id="user-table">
                        <span id="total_records"></span>
                          <thead class="thead-dark">
                            <tr class="d-flex">
                              <th scope="col" class="manage-users-name col-6 col-lg-2">Festival ID</th>
                              <th scope="col" class="manage-users-email col-6 col-lg-3">Festival Start Date</th>
                              <th scope="col" class="manag-users-roles col-6 col-lg-3">Festival End Date</th>
                              <th scope="col" class="manage-users-actions text-center col-6 col-lg-4">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @if(-1 > 0)
                          <tr class="d-flex">
                        <td class="col-6 col-lg-2"><strong>1</strong></td>
                          <td class="col-6 col-lg-3"><strong>Festival Start Date</strong></td>
                          <td class="col-6 col-lg-3"><strong>Festival End Date</strong></td>
                          <td id="action-buttons" class="text-center col-6 col-lg-4">
                            Actions
                          </td>
                        </tr>
                        @else
                        <td>There are currently no festivals created. Once you have created a festival, it will appear here</td>
                        @endif
                    </tbody>
                    </table>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    <div class="modal fade" id="createFestivalModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
                    </div>
</body>
</html>
