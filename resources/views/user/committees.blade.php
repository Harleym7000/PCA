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
        <div class="sidenav-holder col-12 col-lg-2">
          @include('inc.admin-sidenav')
        </div>
        <div class="content-holder col-12 col-lg-10">
          @include('inc.admin-nav')
<div id="profile">
    @include('partials.alerts')
    <div class="container">
        <div id="user-profile">
        <div class="row justify-content-center d-flex align-items-middle">
            <div class="col-12">
                <div class="card">
            <div class="card-header">User Committees - {{implode('',Auth::user()->profile()->pluck('firstname')->toArray())}} {{implode('',Auth::user()->profile()->pluck('surname')->toArray())}}</div>
                    <div class="card-body">

                      <form action="{{route('user.committees.update', $user->id)}}" method="POST">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="row">
                                @foreach($causes as $cause)
                                <div class="form-check col-4">
                                    <input type="checkbox" name="causes[]" value="{{ $cause->id }}"
                                    @if(Auth::user()->causes()->pluck('id')->contains($cause->id)) checked @endif disabled>
                                    <label>{{ $cause->name }}</label>
                                  </div>
                                @endforeach
                            </div>
                            </div>
                        <button id="editcommittees" type="button" class="col-12 col-lg-3 btn btn-dark" style="margin-right: 20%;">Edit Committees</button>
                        <button id="cancelcommittees" type="button" class="col-12 col-lg-3 btn btn-danger" style="margin-right: 3%;" disabled>Cancel</button>
                        <button id="savecommittees" type="submit" class="col-12 col-lg-3 btn btn-primary">Save</button>
                        </form>
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