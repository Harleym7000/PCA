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
    <script src="https://cdn.tiny.cloud/1/9qolqe06kbfpdnul0hbz5re9tw7ajdmp5prm43f248wbh0nh/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
          selector: '#programme',
          mobile: {
            theme: 'mobile',
    maxWidth: 425,
  },
  width: 700,
          plugins: 'autoresize',
          autoresize_bottom_margin: 50
        });
      </script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script>
        $(document).ready(function() {
          $('#toggle-sidenav').on('click', function(){
            $('.sidenav-holder').toggle();
            $('.content-holder').toggleClass('col-lg-10').toggleClass('col-lg-12');
          });
        });
          </script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<div id="app">
    <div class="container-fluid" style="text-align: left; color: #000;">
      <div class="row no-gutters">
        <div class="sidenav-holder col-12 col-lg-2">
          @include('inc.admin-sidenav')
        </div>
        <div class="content-holder col-12 col-lg-10">
          @include('inc.admin-nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="mt-4"></div>
        @include('partials.alerts')
            <div class="card mt-2">
                @foreach($festival as $f)
                <div class="card-header">{{$f->year}} Festival Management</div>
                <div class="card-body">
                <form action="/events/red-sails/programme/{{$f->id}}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="festivalDay" class="col-9 col-md-2 col-form-label text-md-right">Day of Festival:</label>

                        <div class="col-8">
                            <select id="festivalDay" class="form-control @error('festivalDay') is-invalid @enderror" name="festivalDay" required>
                                <option selected="selected" disabled>Select...</option>
                                @foreach($festivalDates as $date)
                                <option>{{$date->format('D jS M, Y')}}</option>
                                @endforeach
                            </select>
                            @error('festivalDay')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="programme" class="col-12 col-md-2 col-form-label text-md-right">Programme:</label>

                    <div class="col-12 col-md-10">
                    <textarea id="programme" name="programme" cols="40" rows="20" class="@error('programme') is-invalid @enderror">
          </textarea>
                        @error('programme')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
    @enderror
</div>
</div>
                    <div class="text-right mt-5 mr-5">
                    <button type="submit" class="btn btn-primary">Add to Programme</button>
                    </div>
                </div>
                </div>
            </div>
            @endforeach
            </form>
        </div>
    </div>
</div>
