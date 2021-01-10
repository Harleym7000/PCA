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
  $(document).ready(function() {
    $('#toggle-sidenav').on('click', function(){
      $('.sidenav-holder').toggle();
      $('.content-holder').toggleClass('col-lg-10').toggleClass('col-lg-12');
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
      <div id="members">
          @include('partials.alerts')
          <div class="row">
            <div class="col-12 col-md-6 col-xl-8">
              <h1 class="welcome">Welcome {{\Crypt::decrypt(Auth::user()->profile()->pluck('firstname'))}}</h1>
            </div>
            <div class="col-12 col-md-6 col-xl-4">
              <div class="card col-12 text-white bg-success">
                <div class="card-body">
                  <div class="row">
                    <div class="col-2" style="height: 98%; margin:auto">
                  <img src="/img/baseline_event_white_18dp.png">
                    </div>
                    <div class="col-10">
                  <h1 class="card-text text-right">Next Meeting</h1>
                    <h5 class="card-text text-right">{{ \Carbon\Carbon::parse($meetingDate->datetime)->format('D jS M Y - g:ia')}}</h5>
                    @can('manage-users')
                    <div class="text-right">
                  <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#meetingdate">
                    Update
                  </button>
                </div>
                </form>
                  @endcan
                  </div>
                  </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  <div id="events">
    <h1>Upcoming Events</h1>
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 row-cols-xl-3">
    @if(count($events) > 0)
          @foreach($events as $event)
      <div class="col mb-4">
        <div id="upcoming-events">
        <div class="card">
          <img src="/storage/event_images/{{$event->image}}" class="card-img-top img-fluid" alt="..." style="width:100%; max-height:350px;">
          <div class="card-body">
            <h1 class="card-title">{{$event->title}}</h1>
            <h3 class="card-title text-center">When: {{ \Carbon\Carbon::parse($event->date)->format('D jS M Y')}} - {{ \Carbon\Carbon::parse($event->time)->format('g:ia')}}</h3>
                <h3 class="card-text text-center" style="width: 90%; margin: auto;">Where: {{$event->venue}}</h3>
            <div class="row">
              <a href="/event/{{$event->id}}" class="btn btn-primary col-5">More Info</a>
              <button type="button" class="btn btn-light col-5" data-toggle="modal" data-target="#event{{$event->id}}">
                Register
              </button>
        </div>
          </div>
        </div>
      </div>
    </div>
      @endforeach
      @else 
      <p>There are currently no Upcoming Events</p>
      @endif
        </div>
  </div>
      </div>
      <!-- Modal -->

@foreach($events as $event)
<div class="modal fade" id="event{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">{{$event->title}} Event Registration</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        @auth
                              <form class="userEventReg" action="/events/register" method="POST">
                                @csrf
                                <div class="form-row">
                                  <label class="col">First Name:</label>
                                  <label class="col">Surname:</label>
                                </div>
                                <div class="form-row">
                                  <div class="col">
                                    <input type="text" name="forename" class="form-control" value="{{implode('', Auth::user()->profile()->pluck('firstname')->toArray())}}"placeholder="First name">
                                  </div>
                                  <div class="col">
                                    <input type="text" name="surname" class="form-control" value="{{implode('', Auth::user()->profile()->pluck('surname')->toArray())}}"placeholder="Last name">
                                  </div>
                                </div>
                                <div class="form-row">
                                  <label class="col">Email Address:</label>
                                </div>
                                <div class="form-row">
                                  <div class="col">
                                    <input type="text" name="email" class="form-control" value="{{Auth::user()->email}}" placeholder="Email Address">
                                  </div>
                                </div>
                                <div class="form-row">
                                  <label class="col">Contact Number:</label>
                                </div>
                                <div class="form-row">
                                  <div class="col">
                                    <input type="text" name="phone" class="form-control" value="{{implode('', Auth::user()->profile()->pluck('contact_no')->toArray())}}" placeholder="Contact Number">
                                  </div>
                                </div>
                            </div>
                            <div class="form-check">
                              <div class="col">
                              <input type="checkbox" class="form-check-input" value="{{auth()->user()->id}}" name="UID" id="userRegID">
                              <label class="form-check-label" for="exampleCheck1">This information is correct</label>
                            </div>
                          </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                              <button type="submit" class="btn btn-primary" name="EID" value="{{$event->id}}">Register</button>
                            </div>
</form>
    @endauth
        @guest
        <form action="/events/register/guest" method="POST">
          @csrf 
        <div class="form-row">
          <label class="col">First Name:</label>
          <label class="col">Surname:</label>
        </div>
        <div class="form-row">
          <div class="col">
            <input type="text" name="forename" class="form-control" placeholder="First name">
          </div>
          <div class="col">
            <input type="text" name="surname" class="form-control" placeholder="Last name">
          </div>
        </div>
        <div class="form-row">
          <label class="col">Email Address:</label>
        </div>
        <div class="form-row">
          <div class="col">
            <input type="text" name="email" class="form-control" placeholder="Email Address">
          </div>
        </div>
        <div class="form-row">
          <label class="col">Contact Number:</label>
        </div>
        <div class="form-row">
          <div class="col">
            <input type="text" name="phone" class="form-control" placeholder="Contact Number">
          </div>
        </div>
    </div>
    <input type="hidden" name="eventID" value="{{$event->id}}">
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      <button type="submit" class="btn btn-primary">Register</button>
    </form>
    @endguest
    </div>
  </div>
</div>
</div>
@endforeach
</div>
  </div>

  <div class="modal fade" id="meetingdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">User Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/meeting/update" method="POST">
            @csrf
            <input type="datetime-local" name="meetdate">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>
</html>