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
            <div class="card-header">User Management</div>
            <p class="mob-info pt-5">Scroll right to see more</p> 
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-sm" id="user-table">
                      <span id="total_records"></span>
                        <thead class="thead-dark">
                          <tr class="d-flex">
                            <th scope="col" class="manage-users-name col-6 col-lg-2">Name</th>
                            <th scope="col" class="manage-users-email col-6 col-lg-3">Email</th>
                            <th scope="col" class="manag-users-roles col-6 col-lg-3">Roles</th>
                            <th scope="col" class="manage-users-actions text-center col-6 col-lg-4">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
  <!-- Modal -->
  @foreach($users as $u)
                    <tr class="d-flex">
                      <td class="col-6 col-lg-2">{{Crypt::decrypt($u->profile()->pluck('firstname'))}} {{Crypt::decrypt($u->profile()->pluck('surname'))}}</td>
                        <td class="col-6 col-lg-3">{{$u->email}}</td>
                        <td class="col-6 col-lg-3">{{implode(", ", $u->roles()->pluck('name')->toArray())}}</td>
                        <td id="action-buttons" class="text-center col-6 col-lg-4">
                          <button id="view-user{{$u->id}}" type="submit" class="btn btn-success " value="{{$u->id}}" data-toggle="modal" data-target="#view{{$u->id}}"><img src="/img/baseline_visibility_white_18dp.png" data-toggle="tooltip" data-placement="bottom" title="View User Details"></button>
                          <button id="comms-user{{$u->id}}" type="submit" class="btn btn-dark " value="{{$u->id}}" data-toggle="modal" data-target="#comms{{$u->id}}"><img src="/img/baseline_people_alt_white_18dp.png" data-toggle="tooltip" data-placement="bottom" title="User Committees"></button>  
                          <a href="{{route('admin.users.edit', $u->id)}}"><button type="button" class="btn btn-dark "><img src="/img/baseline_create_white_18dp.png" data-toggle="tooltip" data-placement="bottom" title="Edit User Roles"></button></a>
                                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$u->id}}"><img src="/img/baseline_delete_white_18dp.png" data-toggle="tooltip" data-placement="bottom" title="Delete User"></button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                      </table>
                    </div>
                    </div>
            </div>
            </div>
            <div class="render">
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
@foreach($users as $user)
<!-- View Modal -->
<div class="modal fade" id="view{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">User Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3><strong>Name:</strong> {{\Crypt::decrypt($user->profile()->pluck('firstname'))}} {{\Crypt::decrypt($user->profile()->pluck('surname'))}}</h3>
        <h3><strong>Address:</strong> {{\Crypt::decrypt($user->profile()->pluck('address'))}}
        <h3><strong>Town:</strong> {{\Crypt::decrypt($user->profile()->pluck('town'))}}</h3>
        <h3><strong>Postcode:</strong> {{\Crypt::decrypt($user->profile()->pluck('postcode'))}}</h3>
        <h3><strong>Contact No:</strong> {{\Crypt::decrypt($user->profile()->pluck('contact_no'))}}</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="comms{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">User Committies</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/user/committees/update/{{$user->id}}" method="POST">
          {{ method_field('PUT') }}
          @csrf 
          <div class="form-group row">
            <div class="row">
            @foreach($causes as $cause)
            <div class="form-check col-6">
                <input type="checkbox" name="comms[]" value="{{ $cause->id }}"
                @if($user->causes()->pluck('id')->contains($cause->id)) checked @endif>
                <label>{{ $cause->name }}</label>
              </div>
            @endforeach
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save</button>
      </form>
      </div>
    </div>
  </div>
</div>
</div>

  <!-- Delete Modal -->
  <div class="modal fade" id="delete{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Confirm Delete User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          This will delete the user {{\Crypt::decrypt($user->profile()->pluck('firstname'))}} {{\Crypt::decrypt($user->profile()->pluck('surname'))}}. Are you sure you wish to delete this user?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          {!! Form::open(['action' => ['Admin\UsersController@destroy', $user->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
          {{Form::hidden('_method', 'DELETE')}}
          {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
          {!!Form::close()!!}
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
  @endforeach