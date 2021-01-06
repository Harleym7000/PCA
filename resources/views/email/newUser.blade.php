<!DOCTYPE html>
<html lang="en">
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
</head>
<body>
    <div class="template" style="width: 70%; margin:auto; background-color: #e4eeed; font-family:sans-serif; padding:5%;">
        <h1 style="color: #000;">Hello!</h1>
    <p style="font-size: 16px; font-weight: bold; color: #000;">{{$body}}</p>
    <br>
    <br>
    <div class="verify-button">
    <a href="http://127.0.0.1:8000/user/create/verify?token={{$token}}"><button type="button" style="width: 30%; margin-left: 35%; background-color: #3490DC; height: 50px; border:none; color: #fff; font-size: 18px; cursor: pointer;">Verify Email</button></a>
</div>
    <br>
    <p style="font-size: 16px; font-weight: bold; color: #000">If the button above does not work, please click the link below or copy and paste it into a new tab on your browser</p>
    <a href="http://127.0.0.1:8000/user/create/verify?token={{$token}}">http://127.0.0.1:8000/user/create/verify?token={{$token}}</a>
    <br>
    <p style="font-size: 16px; font-weight: bold; color: #000;">If this wasn't you, we apologise for the inconvenience. Please ignore this email. <br> Thanks, <br> PCA</p>
</div>
</body>
</html>