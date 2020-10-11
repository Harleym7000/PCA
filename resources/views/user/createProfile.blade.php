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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
        $(document).ready(function() {
            $('.modal').modal('show');
        });

</script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <div class="container-fluid" style="text-align: left; color: #000;">
      <div class="row no-gutters">
        <div class="col-2">
          @include('inc.admin-sidenav')
        </div>
        <div class="col-10">
          @include('inc.admin-nav')
<div id="profile">
    @include('partials.alerts')
    <div class="container">
        <div class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title">Welcome to PCA</h3>
                </div>
                <div class="modal-body">
                  <h5>Hi there! Welcome to PCA. We're delighted to have you as a Committee Member. Before you begin exploring the site, we just need to collect some details from you. Please fill in the form to complete your profile.</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                </div>
              </div>
            </div>
          </div>
          <div id="user-profile">
        <div class="row justify-content-center">
            <h1>Create Your Profile</h1>
                <div class="card">
            <div class="card-header">User Profile</div>
    
                    <div class="card-body">
                        
                      <form action="/user/profile" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="firstname" class="col-md-2 col-form-label text-md-right">First Name:</label>
    
                            <div class="col-9">
                                <input id="firstname" type="text" class="form-control" name="firstname" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-2 col-form-label text-md-right">Surname:</label>
    
                            <div class="col-9">
                                <input id="surname" type="text" class="form-control" name="surname" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-2 col-form-label text-md-right">Address:</label>
    
                            <div class="col-9">
                                <input id="address" type="text" class="form-control" name="address" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="town" class="col-md-2 col-form-label text-md-right">Town:</label>
    
                            <div class="col-9">
                                <input id="town" type="text" class="form-control" name="town" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-2 col-form-label text-md-right">Postcode:</label>
    
                            <div class="col-9">
                                <input id="postcode" type="text" class="form-control" name="postcode" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-2 col-form-label text-md-right">Contact No:</label>
    
                            <div class="col-9">
                                <input id="contact_no" type="text" class="form-control" name="contact_no" autofocus>
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">Email:</label>
    
                            <div class="col-9">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$userEmail}}" required>
    
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row text-right">
                            <div class="col-11">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        </div>
      </div>
    </div>
</div>
</body>
</html>