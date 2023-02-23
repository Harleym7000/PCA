@extends('layouts.app')
@section('content')
<div id="events">
  @include('partials.alerts')
    <h1>Red Sails Festival</h1>
    <div class="mt-5">
        <h4 class="text-center">The Red Sails Festival is an annual, week-long event filled with fun-packed activities for people of all ages</h4>
    </div>
    <div class="mt-5">
        <h2 class="text-center mb-4">What's On?</h2>
        @if($festivalExists != 0)
        <ul class="nav justify-content-center">
        @foreach($festivalDates as $fd)
  <li class="nav-item">
    <a class="nav-link active" href="/red-sails/{{$fd->format('Y-m-d')}}">{{$fd->format('D jS M Y')}}</a>
  </li>
        @endforeach
        </ul>
        @else
        <h4 class="text-center">Sorry, the festival programme has not yet been added for this year. Please check back again later</h4>
        @endif
    </div>
    </div>
        </div>
        <!-- Modal -->
<div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Event Registration</h5>
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
                                <button type="submit" class="btn btn-primary" name="EID" value="">Register</button>
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
      <input type="hidden" name="eventID" value="">
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Register</button>
      </form>
      @endguest
      </div>
    </div>
  </div>
</div>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
    async defer>
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-dateFormat/1.0/jquery.dateFormat.min.js" integrity="sha512-YKERjYviLQ2Pog20KZaG/TXt9OO0Xm5HE1m/OkAEBaKMcIbTH1AwHB4//r58kaUDh5b1BWwOZlnIeo0vOl1SEA==" crossorigin="anonymous"></script>

        @endsection
