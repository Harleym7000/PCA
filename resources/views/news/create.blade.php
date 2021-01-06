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
          @include('partials.alerts')
          <div id="create-event">
          <div class="card">
            <div class="card-header">Create News Story</div>
    <div id="add-event-form">
        <form id="create-news" action="/news/create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="formGroupExampleInput">Headline:</label>
              <input type="text" class="form-control" id="formGroupExampleInput" placeholder="News Story Headline..." name="headline">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Story:</label>
          <textarea id="story" name="story" cols="40" rows="20">
          </textarea>
          <br>
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">News Story Cover Image</label>
              <input type="file" class="form-control" id="exampleFormControlFile1" name="image">
            </div>
            <div class="text-right">
            <button type="submit" class="btn btn-primary">Publish</button>
        </div>
        </form>
    </div>
          </div>
          </div>
        </div>
      </div>
    </div>
</div>
</body>
</html>

