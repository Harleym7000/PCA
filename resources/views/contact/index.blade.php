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
                        
  $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

  $(document).ready(function(){
$.ajax({
type : 'GET',
url : '/admin/getContactMessages',
headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
success:function(data){
var output = '';
          var len = data.length;
          
          console.log(len);
          //console.log("Data is" +JSON.stringify(data));
          
          for(var count = 0; count < len; count++) 
            {
              var id = data[count].id;
              //console.log(id);
              output += "<div class='message-by-contact'>";
              output += "<a href='/contact-messages/"+data[count].first_name +"'>";
              output += "<div class='row'>";
              output += "<input class='form-check-input' type='checkbox' value='"+data[count].id+"' id='defaultCheck"+data[count].id + "'>";
              output += "<input type='hidden' class='messageId' value='"+data[count].id+"'>";
              output += "<p class='col-2'>" + data[count].first_name + "</p>";
              output += "<p class='col-2'>" + data[count].subject + "</p>";
              output += "<p class='col-6'>" + data[count].message + "</p>";
              output += "<img src='/img/baseline_mark_email_read_black_18dp.png' class='action-img' data-toggle='tooltip' data-placement='bottom' title='Mark as read'>";
              output += "<img src='/img/baseline_reply_black_18dp.png' class='action-img' data-toggle='tooltip' data-placement='bottom' title='Reply'>";
              output += "<img src='/img/baseline_delete_black_18dp.png' class='action-img' data-toggle='tooltip' data-placement='bottom' title='Delete'>";
              output += "</div></div></a>";

              $('list-group-item').on('click', function () {
                console.log(id);
        $.ajax({
            type: 'POST',
            url: '/contact-message/mark-as-read',
            data: { id: id},
            dataType : 'json'
        });
    });
            }
 $('.list-group-item').html(output);
 
 }
});
  });
</script>
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
          <div id="inbox-display">
            <div class="col-12">
          <ul class="list-group">
            <li class="list-group-item"></li>
          </ul>
        </div>
    </div>