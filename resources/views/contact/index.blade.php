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
  $(document).ready(function(){
    $('#toggle-sidenav').on('click', function(){
      $('.sidenav-holder').toggle();
      $('.content-holder').toggleClass('col-lg-10').toggleClass('col-lg-12');
    });

    $('[data-toggle="tooltip"]').tooltip();

    $('.markRead').click(function() {
      var messageID = $(this).val();
      console.log(messageID);
      $.ajax({
type : 'POST',
url : '/admin/contact/flipToRead',
headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
data:{id: messageID},
dataType: "json",
    })
  });

  $('.markUnread').click(function() {
      var messageID = $(this).val();
      console.log(messageID);
      $.ajax({
type : 'POST',
url : '/admin/contact/flipToUnread',
headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
data:{id: messageID},
dataType: "json",
    })
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
          <div id="inbox-display">
            @include('partials.alerts')
            <div class="col-12">
              <div class="row">
                <div class="col-lg-2">
                  <label class="col-12">Message Subject:</label>
                </div>
                <div class="col-2">
                  <label class="col-12">Sent By:</label>
                </div>
                <div class="col-3">
                  <label class="col-12">Message:</label>
                </div>
                <div class="col-2"></div>
                <div class="col-2">
                  <label class="col-12">Received:</label>
                </div>
              </div>
                <form action="/admin/contact/filter" method="POST">
                  @csrf
                  <div class="form-row">
                  <div class="col-12 col-lg-2">
              <input type="text" placeholder="Search by Subject" name="subjectSearch">
            </div>
            <div class="col-12 col-lg-2">
              <input type="text" placeholder="Search by Name" name="nameSearch">
            </div>
            <div class="col-12 col-lg-3">
              <input type="text" placeholder="Search by message keywords" class="col-12" name="messageSearch">
            </div>
              <div class="col-12 col-lg-2"></div>
              <div class="col-12 col-lg-2">
              <input type="date" name="dateSearch" class="col-12">
              </div>
              <div class="col-12 col-lg-1 text-centered">
                <button type="submit" class="filter-messages btn btn-primary btn-block">Search</button>
              </div>
              </div>
                </form>
              @if(count($messages) > 0)
          <ul class="list-group">
            @foreach($messages as $message)
            <li class="list-group-item my-auto" @if($message->read === 1) style="background-color:#f8f8f8;"
              @endif>
              <div class="row">
              <p class="col-9 col-lg-2" @if($message->read === 0) style="font-weight: bold;"@endif>{{$message->subject}}</p> <p class="col-3 col-lg-2" @if($message->read === 0) style="font-weight: bold;"@endif>{{$message->firstname}} {{$message->surname}} <p class="col-12 col-lg-4" @if($message->read === 0) style="font-weight: bold;"@endif>{{$message->message}}</p>
              <div class="col-8 col-md-9 col-lg-2">
              <a href="/admin/contact/reply/{{$message->id}}" data-toggle="tooltip" data-placement="bottom" title="Reply"><button type="button" id="reply" class="btn btn-btn-link"><img src="/img/baseline_reply_black_18dp.png"></button></a>
              @if($message->read === 0)<a href="" data-toggle="tooltip" data-placement="bottom" title="Mark as Read"><button type="button"  class="markRead btn btn-link" value="{{$message->id}}" name="mark-read"><img src="/img/baseline_mark_email_read_black_18dp.png">@else<a href="" data-toggle="tooltip" data-placement="bottom" title="Mark Unread"><button type="button" class="markUnread btn btn-link" name="markUnread" value="{{$message->id}}"><img src="/img/baseline_mark_email_unread_black_18dp.png">@endif</button></a>
              <a data-toggle="tooltip" data-placement="bottom" title="Delete"><button type="button" class="btn btn-link" data-toggle="modal" data-target="#delete{{$message->id}}"><img src="/img/baseline_delete_black_18dp.png"></button></a>
              
            </div>
            <p class="col-4 col-md-3 col-lg-2" @if($message->read === 0) style="font-weight: bold;"@endif>{{\Carbon\Carbon::parse($message->created_at)->format('D jS M H:i')}}</p>
              </div>
            </li>
            @endforeach
          </ul>
          @else 
          <p class="text-center">There are currently no contact messages</p>
          @endif
        </div>
    </div>
    @foreach($messages as $message)
    <!-- Modal -->
<div class="modal fade" id="delete{{$message->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Message {{$message->subject}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        This will delete the message {{$message->subject}}. Are you sure you wish to delete this message
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form action="/admin/contact/delete" method="POST">
          @csrf
        <button type="submit" class="btn btn-danger" name="deleteMessage" value="{{$message->id}}">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach