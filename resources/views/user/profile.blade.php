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

        
        $("#editprofile").click(function() {
            $('#firstname').removeAttr('disabled');
            $('#surname').removeAttr('disabled');
            $('#address').removeAttr('disabled');
            $('#town').removeAttr('disabled');
            $('#postcode').removeAttr('disabled');
            $('#tel_no').removeAttr('disabled');
            $('#mob_no').removeAttr('disabled');
            $('#email').removeAttr('disabled');
            $('.roles').removeAttr('disabled');
            $('#saveprofile').removeAttr('disabled');
            $('#cancelprofile').removeAttr('disabled');
            $('#editprofile').attr('disabled', 'disabled');
    });

    $("#cancelprofile").click(function() {
            $('#firstname').attr('disabled', 'disabled');
            $('#surname').attr('disabled', 'disabled');
            $('#address').attr('disabled', 'disabled');
            $('#town').attr('disabled', 'disabled');
            $('#postcode').attr('disabled', 'disabled');
            $('#tel_no').attr('disabled', 'disabled');
            $('#mob_no').attr('disabled', 'disabled');
            $('#email').attr('disabled', 'disabled');
            $('.roles').attr('disabled', 'disabled');
            $('#saveprofile').attr('disabled', 'disabled');
            $('#cancelprofile').attr('disabled', 'disabled');
            $('#editprofile').removeAttr('disabled');
    });
});

</script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
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
        <div class="row justify-content-center">
                <div class="card">
            <div class="card-header">User Profile - {{$user->firstname}} {{$user->surname}}</div>
    
                    <div class="card-body">
                        
                      <form action="/user/profile" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="firstname" class="col-md-2 col-form-label text-md-right">First Name:</label>
    
                            <div class="col-9">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{$user->firstname}}" required autofocus disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-2 col-form-label text-md-right">Surname:</label>
    
                            <div class="col-9">
                                <input id="surname" type="text" class="form-control" name="surname" value="{{$user->surname}}" required autofocus disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-2 col-form-label text-md-right">Address:</label>
    
                            <div class="col-9">
                                <input id="address" type="text" class="form-control" name="address" value="{{$user->address}}" required autofocus disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="town" class="col-md-2 col-form-label text-md-right">Town:</label>
    
                            <div class="col-9">
                                <input id="town" type="text" class="form-control" name="town" value="{{$user->town}}" required autofocus disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-2 col-form-label text-md-right">Postcode:</label>
    
                            <div class="col-9">
                                <input id="postcode" type="text" class="form-control" name="postcode" value="{{$user->postcode}}" required autofocus disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-2 col-form-label text-md-right">Telephone:</label>
    
                            <div class="col-9">
                                <input id="tel_no" type="text" class="form-control" name="tel_no" value="{{$user->tel_no}}" autofocus disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mob_no" class="col-md-2 col-form-label text-md-right">Mobile:</label>
    
                            <div class="col-9">
                                <input id="mob_no" type="text" class="form-control" name="mob_no" value="{{$user->mob_no}}" autofocus disabled>
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>
    
                            <div class="col-9">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required disabled>
    
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="roles" class="col-md-2 col-form-label text-md-right">Supporting Causes:</label>
                            
                            
                            <div class="col-9">
                            <div class="form-check">
                                @foreach($causes as $cause)
                              <input class="roles" type="checkbox" name="causes[]" value="{{$cause->id}}"
                              @if($user->causes()->pluck('id')->contains($cause->id)) checked @endif disabled>
                              <label>{{$cause->name}}</label>
                              @endforeach
                            </div>
                        </div>
                    </div>
                        <button id="editprofile" type="button" class="btn btn-dark" style="margin-right: 67%;">Edit Profile</button>
                        <button id="cancelprofile" type="button" class="btn btn-danger pull-right" style="margin-right: 2%;" disabled>Cancel</button>
                        <button id="saveprofile" type="submit" class="btn btn-primary pull-right" disabled>Save</button>
                    </div>
                </div>
            </div>
        </div>