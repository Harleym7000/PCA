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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User {{$user->name}}</div>

                <div class="card-body">

                  <form action="{{route('admin.users.update', $user)}}" method="POST">

                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="firstname" class="col-md-2 col-form-label text-md-right">First Name:</label>

                        <div class="col-6">
                            <input id="firstname" type="text" class="form-control" name="firstname" value="{{$user->firstname}}" required autocomplete="firstname" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="surname" class="col-md-2 col-form-label text-md-right">Surname:</label>

                        <div class="col-6">
                            <input id="surname" type="text" class="form-control" name="surname" value="{{$user->surname}}" required autocomplete="surname" autofocus>
                        </div>
                    </div>

                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-group row">
                        <label for="roles" class="col-md-2 col-form-label text-md-right">Roles</label>

                        <div class="col-md-6">
                    @foreach ($roles as $role)
                        <div class="form-check">
                          <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                          @if($user->roles()->pluck('id')->contains($role->id)) checked @endif>
                          <label>{{ $role->name }}</label>
                        </div>
                    @endforeach
                    </div>
                </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>