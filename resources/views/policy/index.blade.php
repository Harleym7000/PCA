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

  $('#customFile').on('change',function(){
      //get the file name
      var fileName = $(this).val();
      //replace the "Choose a file" label
      $('.custom-file-label').html(fileName);
  });

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
        <div class="content-holder col-12 col-sm-9 col-md-10">
          @include('inc.admin-nav')
          <div id="policy">
            @include('partials.alerts')
            <div class="row">
              <div class="col-10">
          <h1>Current Policy Documents</h1>
        </div>
        <div class="col-12 col-md-3 col-lg-2">
          <button type="submit" class="col-12 btn btn-primary" data-toggle="modal" data-target="#addnewpolicy">Upload New Policies</button>
        </div>
        </div>
          <div class="row">
        </div>
        @if(count($policies) > 0)
        <div class="row">
        @foreach($policies as $p)
        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
        <div class="card">
          <img class="card-img-top" src="img/pdf.png" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">{{$p->name}}</h4>
            <button type="submit" class="col-12 btn btn-danger" data-toggle="modal" data-target="#delete{{$p->id}}">Delete</button>
            </form>
          </div>
        </div>
        </div>
        @endforeach
      </div>
        @else
          <p>There are currently no policy documents uploaded</p>
          @endif
          <br>
          <br>
        </div>
      </div>
    </div>
    @foreach($policies as $p)
    <div class="modal fade" id="delete{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Confirm Delete Policy</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            This will delete the policy {{$p->name}}. Are you sure you wish to delete this policy?
          </div>
          <div class="modal-footer">
            <form action="/policy/delete/{{$p->name}}" method="POST">
              @csrf
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger" value="{{$p->name}}" name="filename">Delete</button>
            </form>
          </div>
        </div>
      </div>

</div>
</div>
@endforeach

<div class="modal fade" id="addnewpolicy" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Upload New Policies</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/policy/upload" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group row">
            <div class="col-12">
            <div class="form-group">
              <div class="form-control">
  <input type="file" class="form-control-file @error('file') is-invalid @enderror" id="exampleFormControlFile1" name="file[]" multiple>
</div>
  @error('file')
  <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
  </span>
@enderror
</div>
          </div>
          <br>
        </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" name="filename">Upload</button>
      </div>
    </div>
  </div>
</body>
</html>
