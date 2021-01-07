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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                          <script>
                            $(document).ready(function(){

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
<div class="container">
    <div id="event-edit">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Event {{$event->title}}</div>

                <div class="card-body">

                  <form action="/events/edit/{{$event->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                          <div class="form-group">
                              <label for="title">Event Title:</label>
                              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter Event Title..." name="title" value="{{$event->title}}" required autofocus>
                              @error('title')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                            </div>
                            <div class="form-group">
                              <label for="desc">Event Description:</label>
                              <textarea class="form-control @error('desc') is-invalid @enderror" id="desc" rows="8" placeholder="Summarise the event..." name="desc" required>{{$event->description}}</textarea>
                              @error('desc')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                            </div>
                            <div class="form-group">
                              <label for="title">Event Date:</label>
                              <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{$event->date}}" required>
                              @error('date')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                            </div>
                            <div class="form-group">
                              <label for="time">Event Time:</label>
                              <input type="time" class="form-control @error('time') is-invalid @enderror" id="time" name="time" value="{{$event->time}}" required>
                              @error('time')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                            </div>
                            <div class="form-group">
                              <label for="location">Event Venue:</label>
                              <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" placeholder="Enter Event Venue..." name="location" value="{{$event->venue}}" required>
                              @error('location')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                            </div>
                            <div class="form-group">
                              <label for="admission">Event Admission Price:</label>
                              <input type="number" step="any" class="form-control @error('admission') is-invalid @enderror" id="admission" placeholder="Enter Event Admission Fee. If free enter 0.00" name="admission" value="{{$event->admission}}" required>
                              @error('admission')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                            </div>
                            <div class="form-group">
                              <label for="capacity">Event Capacity:</label>
                              <input type="number" min=1 class="form-control @error('capacity') is-invalid @enderror" id="capacity" placeholder="Enter event capacity. How many tickets/seats are available?" name="capacity" value="{{$event->spaces_left}}" required>
                              @error('admission')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                            </div>
                            <div class="form-group">
                              <label for="org">Event Organiser:</label>
                              <input type="text" class="form-control @error('org') is-invalid @enderror" id="org" placeholder="Who is organising the event..." name="org" value="{{$event->managed_by}}" required>
                              @error('org')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                            </div>
                            <div class="form-group">
                              <label for="main-image">Main Event Image:</label>
                              <img src="/storage/event_images/{{$event->image}}" style="height: 140px; width:170px;">
                              <input type="file" class="form-control @error('main_image') is-invalid @enderror" id="main_image" name="main_image" value="{{$event->image}}" required>
                              @error('main_image')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                            </div>
                            <div class="form-group">
                              <label for="other-images">Other Event Images:</label>
                              <input type="file" class="form-control @error('other_images') is-invalid @enderror" id="other_images" name="other_images[]" multiple>
                              @error('other_images')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                            </div>
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="eventbrite" name="eventbrite" @if($event->is_eventbrite == 1) checked @endif>
                              <label class="form-check-label" for="eventbrite">Does this event require registration through EventBrite?</label>
                            </div>
                            <br>
                            <div class="form-group">
                              <label for="eventbrite-link">Eventbrite Link: (Optional)</label>
                              <input type="text" class="form-control @error('eventbrite_link') is-invalid @enderror" id="eventbrite_link" placeholder="Please provide the eventbrite link if necessary" name="eventbrite_link" value="{{$event->eventbrite_link}}">
                              @error('eventbrite_link')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                            </div>
                            <br>
                          <div class="form-group row text-right">
                            <div class="col-12">
                          <button type="submit" class="btn btn-primary">Update Event</button>
                        </div>
                      </div>
                          </div>
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
</body>
</html>