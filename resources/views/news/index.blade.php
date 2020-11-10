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
    <div class="col-2">
      @include('inc.admin-sidenav')
    </div>
    <div class="col-10">
      @include('inc.admin-nav')
      <div id="manage-users">
        <div class="row justify-content-center">
                <div class="table-responsive">
                    <table class="table" id="user-table">
                      <span id="total_records"></span>
                      <thead>
                        <tr>
                          <th scope="col">Search:<input id="user-search" type="text" placeholder="Search name..." class="filter-input"></th>
                          <th scope="col"></th>
                          <form id="user-form" action="#">
                            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            </form>
          </th>
              <th scope="col"></th>
                      </thead>
                        <thead>
                          <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Story</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          
  
  <!-- Modal -->
  @foreach($news as $newsstory)
                    <tr>
                        <td><img src="/img/pcaLogo.png" style="height: 85px; width: 150px;"></td>
                        <td>{{$newsstory->title}}</td>
                        <td maxlength="3">{{$newsstory->story}}</td>
                        <td id="action-buttons">
                            <a href="{{route('news.edit-news', $newsstory->id)}}"><button type="button" class="btn btn-dark">Edit News Story</button></a>
                                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$newsstory->id}}">Delete News Story</button>
                        </td>
                      </tr>
                      @endforeach
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
@foreach($news as $newsstory)
  <!-- Delete Modal -->
  <div class="modal fade" id="delete{{$newsstory->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Confirm Delete User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          This will delete the news story {{$newsstory->title}}. Are you sure you wish to delete this news story?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
  @endforeach