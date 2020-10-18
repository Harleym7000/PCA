@extends('layouts.app')
@section('content')
<div id="events">
    <h1>Scheduled Events</h1>
    <form id="event-search" action="" method="POST">
      @csrf
            <div class="form-row">
              <div class="col-12 col-lg-4">
                  <label>Search Events:</label>
                <input type="text" class="form-control" placeholder="Search Event">
              </div>
              <div class="col-12 col-lg-4">
                <label>Select Date:</label>
                <input type="date" class="form-control">
              </div>
              <div class="col-12 col-lg-4">
                <label>Select Time:</label>
                <input type="time" class="form-control">
              </div>
            </div>
    </form>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 row-cols-xl-3">
      @if(count($events) > 0)
            @foreach($events as $event)
        <div class="col mb-4">
          <div class="card">
            <img src="/img/pcaLogo.png" class="card-img-top" alt="...">
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
                                      <input type="text" name="forename" class="form-control" value="{{implode('', auth::user()->profile()->pluck('firstname')->toArray())}}"placeholder="First name">
                                    </div>
                                    <div class="col">
                                      <input type="text" name="surname" class="form-control" value="{{implode('', auth::user()->profile()->pluck('surname')->toArray())}}"placeholder="Last name">
                                    </div>
                                  </div>
                                  <div class="form-row">
                                    <label class="col">Email Address:</label>
                                  </div>
                                  <div class="form-row">
                                    <div class="col">
                                      <input type="text" name="email" class="form-control" value="{{auth::user()->email}}" placeholder="Email Address">
                                    </div>
                                  </div>
                                  <div class="form-row">
                                    <label class="col">Contact Number:</label>
                                  </div>
                                  <div class="form-row">
                                    <div class="col">
                                      <input type="text" name="phone" class="form-control" value="{{implode('', auth::user()->profile()->pluck('contact_no')->toArray())}}" placeholder="Contact Number">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                          <script>
                            $(document).ready(function(){
                              $('.eventRegUser').click(function() {
                                var eventID = $(this).val();
                                var userID = $('#userRegID').val();
                                //alert('Event ID ' + eventID + 'User ID ' + userID);
                                $.ajax({
                                  type: 'POST',
                                  url: '/events/register',
                                  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                                  data: {EID: eventID, UID: userID},
                                  dataType: 'json',
                                  success: function(data) {
                                    console.log('success');
                                  }
                                });
                              });
                            });
                          </script>
        @endsection