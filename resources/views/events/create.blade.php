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

    $("input[data-type='currency']").on({
    keyup: function() {
      formatCurrency($(this));
    },
    blur: function() {
      formatCurrency($(this), "blur");
    }
});


function formatNumber(n) {
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}


function formatCurrency(input, blur) {
  // appends $ to value, validates decimal side
  // and puts cursor back in right position.

  // get input value
  var input_val = $('#admission').val();

  // don't validate empty input
  if (input_val === "") { return; }

  // original length
  var original_len = input_val.length;

  // initial caret position
  var caret_pos = input.prop("selectionStart");

  // check for decimal
  if (input_val.indexOf(".") >= 0) {

    // get position of first decimal
    // this prevents multiple decimals from
    // being entered
    var decimal_pos = input_val.indexOf(".");

    // split number by decimal point
    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);

    // add commas to left side of number
    left_side = formatNumber(left_side);

    // validate right side
    right_side = formatNumber(right_side);

    // On blur make sure 2 numbers after decimal
    if (blur === "blur") {
      right_side += "00";
    }

    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 2);

    // join number by .
    input_val = left_side + "." + right_side;

  } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);

    // final formatting
    if (blur === "blur") {
      input_val += ".00";
    }
  }

  // send updated string to input
  input.val(input_val);

  // put caret back in the right position
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}
  });
    </script>
</head>
<div id="app">
    <div class="container-fluid" style="text-align: left; color: #000;">
      <div class="row no-gutters">
        <div class="sidenav-holder col-12 col-lg-2">
          @include('inc.admin-sidenav')
        </div>
        <div class="content-holder col-12 col-lg-10">
          @include('inc.admin-nav')
          <div id="create-event">
            @include('partials.alerts')
          <div class="card">
            <div class="card-header">Create Event</div>
    <div id="add-event-form">
<form action="/events/create" method='POST' enctype='multipart/form-data'>
  @csrf
    <div class="form-group">
        <label for="title">Event Title: <span class="asterisk">*</span></label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter Event Title..." name="title" required autofocus value="{{ old('title') }}">
        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
      </div>
      <div class="form-group">
        <label for="desc">Event Description: <span class="asterisk">*</span></label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="8" placeholder="Summarise the event..." name="description" required>{{ old('description') }}</textarea>
        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
      </div>
    <div class="form-row">
    <div class="col-12 col-md-6">
        <label for="start_date">Event Start Date: <span class="asterisk">*</span></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <img src="/img/outline_calendar_month_black_18dp.png">
                </div>
            </div>
            <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{old('start_date')}}" required>
            @error('start_date')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>
    </div>
    <div class="form-row">
        <div class="col-12 col-md-6">
                    <label for="start_date">Event Start Date: <span class="asterisk">*</span></label>
                    <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{old('start_date')}}" required>
                    @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>
        <div class="col-12 col-md-6">
                    <label for="start_time">Event Start Time: <span class="asterisk">*</span></label>
                    <input type="time" class="form-control @error('start_time') is-invalid @enderror" id="start_time" name="start_time" value="{{old('start_time')}}" required>
                    @error('start_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>
    </div>
    <div class="form-row mt-2">
        <div class="col-12 col-md-6">
            <label for="end_date">Event End Date: <span class="asterisk">*</span></label>
            <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{old('end_date')}}" required>
            @error('end_date')
            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
            @enderror
        </div>
        <div class="col-12 col-md-6">
            <label for="end_time">Event End Time: <span class="asterisk">*</span></label>
            <input type="time" class="form-control @error('end_time') is-invalid @enderror" id="end_time" name="end_time" value="{{old('end_time')}}" required>
            @error('end_time')
            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
            @enderror
        </div>
    </div>
    <div class="form-row mt-2">
        <div class="col-12 col-md-6">
            <label for="venue">Event Venue: <span class="asterisk">*</span></label>
            <input type="text" class="form-control @error('venue') is-invalid @enderror" id="venue" placeholder="Enter Event Venue..." name="venue" value="{{old('venue')}}" required>
            @error('venue')
            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
            @enderror
        </div>
        <div class="col-12 col-md-6">
                <label for="admission">Event Admission Price: <span class="asterisk">*</span></label>
                <label class="sr-only" for="inlineFormInputGroup">Enter Event Admission Price. If free, enter 0</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <img src="/img/outline_currency_pound_black_18dp.png" height="20">
                        </div>
                    </div>
                    <input type="text" pattern="^\d{1,3}(,\d{3})*(\.\d+)" value="" data-type="currency"  class="form-control @error('admission') is-invalid @enderror" id="admission" placeholder="Enter Event Admission Fee. If free enter 0.00" name="admission" value="{{old('admission')}}" required>
                </div>
            </div>
        </div>
    </div>
      <div class="form-group">
        <label for="spaces_left">Event Capacity: <span class="asterisk">*</span></label>
        <input type="number" min=1 class="form-control @error('spaces_left') is-invalid @enderror" id="spaces_left" placeholder="Enter event capacity. How many tickets/seats are available?" name="spaces_left" value="{{old('spaces_left')}}" required>
        @error('spaces_left')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
      </div>
      <div class="form-group">
        <label for="managed_by">Event Organiser: <span class="asterisk">*</span></label>
        <input type="text" class="form-control @error('managed_by') is-invalid @enderror" id="managed_by" placeholder="Who is organising the event..." name="managed_by" value="{{old('managed_by')}}" required>
        @error('managed_by')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
      </div>
      <div class="form-group">
        <label for="image">Main Event Image: <span class="asterisk">*</span></label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{old('image')}}" required>
        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
      </div>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="eventbrite" name="eventbrite" value="{{old('eventbrite')}}">
        <label class="form-check-label" for="eventbrite">Does this event require registration through EventBrite?</label>
      </div>
      <br>
      <div class="form-group">
        <label for="eventbrite-link">Eventbrite Link: (Optional)</label>
        <input type="text" class="form-control @error('eventbrite_link') is-invalid @enderror" id="eventbrite_link" placeholder="Please provide the eventbrite link" name="eventbrite_link" value="{{old('eventbrite_link')}}">
        @error('eventbrite_link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
      </div>
      <p>Fields marked with <span class="asterisk">*</span> are required</p>
      <br>
    <div class="form-group row text-right">
      <div class="col-12">
    <button type="submit" class="btn btn-primary">Create Event</button>
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
