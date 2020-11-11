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
                          $('#toggle-sidenav').on('click', function(){
      $('.sidenav-holder').toggle();
      $('.content-holder').toggleClass('col-lg-10').toggleClass('col-lg-12');
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
      <div id="manage-events">
        <div class="row justify-content-center">
                <div class="table-responsive">
                    <table class="table table-striped" id="user-table">
                      <span id="total_records"></span>
                      <thead>
                        <tr>
                          <th scope="col">Search News:<input id="mynews-search" type="text" placeholder="Search news..." class="filter-input"></th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                          <th scope="col"></th>
              <th scope="col"></th>
                      </thead>
                        <thead>
                          <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Headline</th>
                            <th scope="col">Story</th>
                            <th scope="col">Author</th>
                            <th style="width: 20%;">Actions</th>
                          </tr>
                        </thead>
                        <tbody>

                          
  
@if(count($news) > 0)
  @foreach($news as $story)
                    <tr>
                        <td><img src="/storage/news_images/{{$story->image}}" style="height: 85px; width: 150px;"></td>
                        <td><strong>{{$story->title}}</strong></td>
                        <td><strong>{{$story->story}}</strong></td>
                        <td><strong>{{$story->firstname}} {{$story->surname}}</strong></td>
                        <td id="action-buttons">
                            @can('manage-news')
                              <a href="/news/edit/{{$story->id}}"><button type="button" class="btn btn-dark">Edit</button></a>
                                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#newsdelete{{$story->id}}">Delete</button>
                            @endcan
                        </td>
                      </tr>
                      @endforeach
                      @else 
                      <p>You have not created any news stories</p>
                      @endif
                    </tbody>
                      </table>
                      
                    
                    </div>
                    
            </div>
            <?php echo $news->render(); ?>
        </div>
    </div>
</div>
</div>
</div>
</div>
    </div>
  </div>
</div>
  <!-- Modal -->
  @foreach($news as $story)
  <div class="modal fade" id="newsdelete{{$story->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Confirm Delete User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          This will delete the news story {{$story->title}}. Are you sure you wish to delete this news story?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <form action="/news/delete" method="POST">
          @csrf
          <button type="submit" class="btn btn-danger" name="id" value="{{$story->id}}">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
</body>
</html>