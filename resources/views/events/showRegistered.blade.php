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
            <div class="card">
              <div class="card-header">Registered List for {{$eventTitle->title}} <div class="text-right"><a href="/events/index"><button type="button" class="btn btn-primary">Back to Events</button></a></div></div>
              <p class="mob-info pt-5">Scroll right to see more</p> 
                  <div class="table-responsive">
                      <table class="table table-striped table-bordered table-sm" id="user-table">
                        <span id="total_records"></span>
                          <thead class="thead-dark">
                            <tr class="d-flex">
                              <th scope="col" class="manage-users-name col-6 col-lg-3">First Name</th>
                              <th scope="col" class="manage-users-email col-6 col-lg-3">Surname</th>
                              <th scope="col" class="manag-users-roles col-6 col-lg-3">E-mail Address</th>
                              <th scope="col" class="manage-users-actions text-center col-6 col-lg-3">Contact No</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($guestReg as $g)
                      <tr class="d-flex">
                        <td class="col-6 col-lg-3"><strong>{{\Crypt::decrypt($g->forename)}}</strong></td>
                          <td class="col-6 col-lg-3"><strong>{{\Crypt::decrypt($g->surname)}}</strong></td>
                          <td class="col-6 col-lg-3"><strong>{{$g->email}}</strong></td>
                          <td class="col-6 col-lg-3"><strong>{{\Crypt::decrypt($g->contact_no)}}</strong></td>
                      </tr>
                          @endforeach
                          @foreach($userReg as $u)
                          <tr class="d-flex">
                        <td class="col-6 col-lg-3"><strong>{{Crypt::decrypt($u->firstname)}}</strong></td>
                          <td class="col-6 col-lg-3"><strong>{{\Crypt::decrypt($u->surname)}}</strong></td>
                          <td class="col-6 col-lg-3"><strong>{{$u->email}}</strong></td>
                          <td class="col-6 col-lg-3"><strong>{{\Crypt::decrypt($u->contact_no)}}</strong></td>
                          @endforeach
                        </tr>
                      </tbody>
                        </table>
                      </div>
                      </div>
              </div>
              </div>
              <div class="render">
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