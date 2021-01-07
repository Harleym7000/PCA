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
      <div id="manage-users">
        @include('partials.alerts')
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="card">
              <div class="card-header">My News Stories Management</div>
              <p class="mob-info pt-5">Scroll right to see more</p> 
                  <div class="table-responsive">
                      <table class="table table-striped table-bordered table-sm" id="user-table">
                        <span id="total_records"></span>
                          <thead class="thead-dark">
                            <tr class="d-flex">
                              <th scope="col" class="manage-users-name col-6 col-lg-2">Title</th>
                              <th scope="col" class="manage-users-email col-6 col-lg-3">Story</th>
                              <th scope="col" class="manag-users-roles col-6 col-lg-3">Image</th>
                              <th scope="col" class="manage-users-actions text-center col-6 col-lg-4">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
    @foreach($news as $n)
                      <tr class="d-flex">
                        <td class="col-6 col-lg-2"><strong>{{$n->title}}</strong></td>
                          <td class="col-6 col-lg-3"><strong>{!!$n->story!!}</strong></td>
                          <td class="col-6 col-lg-3"><img src="/storage/news_images/{{$n->image}}" style="width: 100%;"></td>
                          <td id="action-buttons" class="text-center col-6 col-lg-4">
                            <a href="/events/edit/"><button type="button" class="btn btn-dark "><img src="/img/baseline_create_white_18dp.png" data-toggle="tooltip" data-placement="bottom" title="Edit News Story"></button></a>
                                  <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#newsdelete{{$n->id}}"><img src="/img/baseline_delete_white_18dp.png" data-toggle="tooltip" data-placement="bottom" title="Delete News Story"></button>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                        </table>
                      </div>
                      </div>
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