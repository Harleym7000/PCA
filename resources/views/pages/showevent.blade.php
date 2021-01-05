@extends('layouts.app')
@section('content')
<div id="show-event">
    {{-- @foreach($events as $event)
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach($images as $i)
          <div class="carousel-item @if ($loop->first) active @endif">
              <img src="/storage/event_images/{{$i->image}}" class="d-block w-100">
          </div>
          @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
      </div>
</div>
@endforeach --}}
    <div class="show-event-title">
      @foreach($events as $event)
      <h1 class="text-center">{{$event->title}}</h1>
      <h4 class="text-center">{{$event->description}}</h4>
    </div>
    <div class="show-event-info">
      <div class="row">
          <div class="col-1"></div>
          <div class="col-3">
              <img src="/storage/event_images/{{$event->image}}" style="height: 330px; width:auto;">
          </div>
          <div class="col-2"></div>
          <div class="col-5">
            <h3> <strong>Date:</strong> {{ \Carbon\Carbon::parse($event->date)->format('D jS M Y')}}</h3>
            <br>
            <h3> <strong>Time:</strong> {{ \Carbon\Carbon::parse($event->time)->format('g:ia')}}</h3>
            <br>
            <h3> <strong>Venue:</strong> {{$event->venue}}</h3>
            <br>
            <h3> <strong>Organiser:</strong> {{$event->managed_by}}</h3>
            <br> 
            <h3><strong>Admission:</strong>@if($event->admission == 0) Free @else @money ($event->admission)@endif</h3>
            <br>
            <h3 @if($event->spaces_left > 0) style="color: green" @else style="color: red" @endif><strong>Spaces Left:</strong> {{$event->spaces_left}}</h3>
          </div>
          <div class="col-1"></div>
      </div>
      <div class="text-center">
      <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#event{{$event->id}}" @if($event->spaces_left == 0) disabled data-toggle="tooltip" data-placement="bottom" title="This event is full" style="cursor: not-allowed;" @endif>Register</button>
    </div>
</div>
</div>
        <!-- Modal -->


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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-dateFormat/1.0/jquery.dateFormat.min.js" integrity="sha512-YKERjYviLQ2Pog20KZaG/TXt9OO0Xm5HE1m/OkAEBaKMcIbTH1AwHB4//r58kaUDh5b1BWwOZlnIeo0vOl1SEA==" crossorigin="anonymous"></script>
                          <script>
                                                  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

                            $(document).ready(function(){
                                $(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

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

<script>
    $(document).ready(function(){
        $('.carousel').carousel();
    }); 
    </script>

        @endsection