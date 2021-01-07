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
          selector: '#story',
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
    @include('partials.alerts')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit News Story {{$news->title}}</div>

                <div class="card-body">

                  <form action="/news/edit/{{$news->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}

                    <div class="form-group row">
                        <label for="title" class="col-md-2 col-form-label text-md-right">News Headline:</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control" name="title" value="{{$news->title}}" required autocomplete="date" autofocus>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="desc" class="col-md-2 col-form-label text-md-right">Story:</label>

                        <div class="col-6">
                            <textarea id="story" rows="20" class="form-control" contenteditable="true" onClick="document.execCommand('bold', false, null)" name="story" required autocomplete="desc" autofocus>{{$news->story}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="organiser" class="col-md-2 col-form-label text-md-right">Image:</label>

                        <div class="col-6">
                            <input id="news-image" type="file" class="form-control" name="news_image" autocomplete="organiser" autofocus>
                        </div>
                    </div>
                    <div class="text-right">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>