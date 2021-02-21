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
          <div id="message-reply">
            @include('partials.alerts')
            <div class="card">
              @foreach($message as $m)
              <div class="card-header">{{\Crypt::decrypt($m->subject)}}</div>
              <div class="card-body">
                <div class="text-left">
                  <h5>Status: @if($m->closed === 0)Open @else Closed @endif </h3>
                  @if($m->closed === 0)
                  <form action="/admin/contact/close" method="POST">
                    @csrf
                  <button type="submit" id="close" class="btn btn-primary" name="contactClose" value="{{$m->id}}">Close Request</button>
                  </form>
                  <br>
                  <br>
                  @endif
            <h1>{{\Crypt::decrypt($m->subject)}}</h1>
            <strong><p>{{\Crypt::decrypt($m->firstname)}} {{\Crypt::decrypt($m->surname)}} ({{$m->email}})</p></strong>
            <h4>{{\Crypt::decrypt($m->message)}}</h4>
          </div>
            <br>
            @if(count($response) > 0)
            @foreach($response as $r)
            <strong><p>{{\Crypt::decrypt($r->firstname)}} {{\Crypt::decrypt($r->surname)}} ({{$r->email}})</p></strong>
            <h4>{{\Crypt::decrypt($r->response)}}</h4>
              @endforeach
            
            @endif
            @if($m->closed === 0)
            <form action="/admin/contact/reply/{{$m->id}}" method="POST">
              @csrf
              <div class="form-group">
                <label>Enter response</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="9" name="response" placeholder="Type your response here..."></textarea>
              </div>
              <br>
              <input type="hidden" value="{{$m->email}}" name="from">
              <input type="hidden" value="{{\Crypt::decrypt($m->subject)}}" name="subject">
              <div class="row">
                <div class="col-8 col-lg-10">
                  <a href="/admin/contact"><button type="button" class="btn btn-secondary">Cancel</button></a>
                </div>
                <div class="col-4 col-lg-2">
              <div class="form-group text-right">
              <button type="submit" class="btn btn-primary">Reply</button>
            </div>
            </div>
            </div>
          </div>
            </form>
            @endif
            
            @endforeach
    </div>
  </div>
  </div>
        </div>
      </div>
    </div>
</div>
</body>
</html>
