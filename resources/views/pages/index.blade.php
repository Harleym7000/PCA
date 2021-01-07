@extends('layouts.app')
@section('content')
            <div class="box">
              @include('partials.alerts')
                <div class="img-title">
                  <h1 class="display-4">Serving the Portstewart Community</h1>
                  <a href="/register"><button type="button" class="btn btn-primary">JOIN TODAY</button></a>
                <a href="/about"><button type="button" class="btn btn-light">FIND OUT MORE</button></a>
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
              <div class="card">
                <img src="/storage/event_images/{{$event->image}}" class="card-img-top" alt="Image for event {{$event->title}}" style="width:100%; min-height:350px; max-height: 350px;">
                <div class="card-body">
                  <h2 class="card-title text-center">{{$event->title}}</h2>
                  <h3 class="card-title text-center">When: {{ \Carbon\Carbon::parse($event->date)->format('D jS M Y')}} - {{ \Carbon\Carbon::parse($event->time)->format('g:ia')}}</h3>
                  <h3 class="card-text text-center" style="width: 90%; margin: auto;">Where: {{$event->venue}}</h3>
                  <div class="row">
                    <a href="/event/{{$event->id}}" class="btn btn-primary col-5">More Info</a>
                    @if($event->is_eventbrite == 1)
                    <a href="{{$event->eventbrite_link}}" class="col-5" target="_blank" style="padding-top: 2%;"><button type="button" class="btn btn-light" style="width:115%;">
                      Register
                    </button></a> 
                    @else
                    <button type="button" class="btn btn-light col-5" data-toggle="modal" data-target="#event{{$event->id}}">
                      Register
                    </button>
                    @endif
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
          <div id="news">
            <h1>Latest News</h1>
            @if(count($news) > 0)
            @foreach($news as $story)
            <div class="media">
              <img class="media-object mr-3 img-responsive" src="/storage/news_images/{{$story->image}}" alt="Generic placeholder image" >
              <div class="media-body">
                <a href="/news/story/{{$story->id}}"><h5 class="mt-0">{{$story->title}}</h5></a>
                <br><br>
                <p>{!!$story->story!!}</p>
                <p>Written on: {{ \Carbon\Carbon::parse($story->created_at)->format('D jS M Y - H:i:s')}}</p>
              </div>
            </div>
              @endforeach
            @endif
          </div>
</div>
<!-- Button trigger modal -->


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
