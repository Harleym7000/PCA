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
    <div id="app">
        <div class="container-fluid" style="text-align: left; color: #000;">
          <div class="row">
            <div class="col-2">
              @include('inc.admin-sidenav')
            </div>
            <div class="col-10">
              @include('inc.admin-nav')
            <div class="card">
                <div class="card-header">Events</div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Event Title</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if(count($events) > 0)
                    @foreach($events as $event)
                    <tr>
                        <th scope="row">{{$event->id}}</th>
                        <td>{{$event->title}}</td>
                        <td>
                            @can('manage-events')
                            <a href=""><button type="button" class="btn btn-primary float-left">Edit Event</button></a>
                            <form action="" method="POST" class="float-left">
                                @csrf 
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger">Delete Event</button>
                            </form>
                        </td>
                    </tr>
                            @endcan
                    @endforeach
                    </tbody>
                      </table>
                    @else 
                    <p>There are no events</p>
                    @endif

                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
</div>
