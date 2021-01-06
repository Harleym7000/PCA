@extends('layouts.app')
@section('content')
<div id="events">
    <h1>Scheduled Events</h1>
    <form id="event-search" action="/events" method="POST">
      @csrf
            <div class="form-row">
              <div class="col-12 col-lg-4">
                  <label>Search Events:</label>
                <input type="text" id="search-event" class="form-control" placeholder="Search Event" name="title">
              </div>
              <div class="col-12 col-lg-3">
                <label>Select Date:</label>
                <input type="date" id="search-date" class="form-control" name="date">
              </div>
              <div class="col-12 col-lg-3">
                <label>Select Time:</label>
                <input type="time" id="event-time" class="form-control" name="time">
              </div>
            <div class="text-right col-12 col-lg-2">
              <button type="submit" class="btn btn-primary col-12">
                Apply filters
              </button>
            </div>
    </form>
</div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 row-cols-xl-3">
      @if(count($events) > 0)
            @foreach($events as $event)
        <div class="col mb-4">
          <div id="upcoming-events">
          <div class="card">
            <img src="/storage/event_images/{{$event->image}}" class="card-img-top" alt="..." style="width:100%; min-height:350px; max-height: 350px;">
            <div class="card-body">
              <h2 class="card-title text-center">{{$event->title}}</h2>
              <h3 class="card-title text-center">When: {{ \Carbon\Carbon::parse($event->date)->format('D jS M Y')}} - {{ \Carbon\Carbon::parse($event->time)->format('g:ia')}}</h3>
                  <h3 class="card-text text-center" style="width: 90%; margin: auto;">Where: {{$event->venue}}</h3>
              <div class="row">
                <a href="/event/{{$event->id}}" class="btn btn-primary col-5">More Info</a>
                <button type="button" class="btn btn-light col-5" data-toggle="modal" data-target="#event{{$event->id}}" data-backdrop="static">
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
                                      <input type="text" name="forename" class="form-control" value="{{\Crypt::decrypt(Auth::user()->profile()->pluck('firstname'))}}"placeholder="First name" required>
                                    </div>
                                    <div class="col">
                                      <input type="text" name="surname" class="form-control" value="{{\Crypt::decrypt(Auth::user()->profile()->pluck('surname'))}}"placeholder="Last name" required>
                                    </div>
                                  </div>
                                  <div class="form-row">
                                    <label class="col">Email Address:</label>
                                  </div>
                                  <div class="form-row">
                                    <div class="col">
                                      <input type="text" name="email" class="form-control" value="{{Auth::user()->email}}" placeholder="Email Address" required>
                                    </div>
                                  </div>
                                  <div class="form-row">
                                    <label class="col">Contact Number:</label>
                                  </div>
                                  <div class="form-row">
                                    <div class="col">
                                      <input type="text" name="phone" class="form-control" value="{{\Crypt::decrypt(Auth::user()->profile()->pluck('contact_no'))}}" placeholder="Contact Number">
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
              <input type="text" name="forename" class="form-control @error('forename') is-invalid @enderror" placeholder="First name" required>
              @error('forename')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
            </div>
            <div class="col">
              <input type="text" name="surname" class="form-control @error('surname') is-invalid @enderror" placeholder="Last name" required>
              @error('surname')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
            </div>
          </div>
          <div class="form-row">
            <label class="col">Email Address:</label>
          </div>
          <div class="form-row">
            <div class="col">
              <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" required>
              @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
            </div>
          </div>
          <div class="form-row">
            <label class="col">Contact Number:</label>
          </div>
          <div class="form-row">
            <div class="col">
              <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Contact Number">
              @error('phone')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
            </div>
          </div>
          <br>
<div class="form-row">
                  <div class="g-recaptcha @error('recaptcha') is-invalid @enderror" data-sitekey="6LeWLL8ZAAAAALOKCQHnNaPioxOzVeF3VTBLiCUS" name="recapctha"></div>
                  @error('recaptcha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <br>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-dateFormat/1.0/jquery.dateFormat.min.js" integrity="sha512-YKERjYviLQ2Pog20KZaG/TXt9OO0Xm5HE1m/OkAEBaKMcIbTH1AwHB4//r58kaUDh5b1BWwOZlnIeo0vOl1SEA==" crossorigin="anonymous"></script>
                          <script>
                                                  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

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