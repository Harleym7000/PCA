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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $('#toggle-sidenav').on('click', function(){
      $('.sidenav-holder').toggle();
      $('.content-holder').toggleClass('col-lg-10').toggleClass('col-lg-12');
    });
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
<div class="container">
  <div id="edit-user">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User Roles for {{\Crypt::decrypt($user->profile()->pluck('firstname'))}} {{\Crypt::decrypt($user->profile()->pluck('surname'))}}</div>

                <div class="card-body">

                  <form action="{{route('admin.users.update', $user)}}" method="POST">
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
                <div class="row">
                  <div class="col-10">
                <a href="/admin/users"><button type="button" class="btn btn-secondary">Cancel</button></a>
              </div>
              <div class="col-2">
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                  </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>