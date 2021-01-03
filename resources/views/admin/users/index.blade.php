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
                          $(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

                          $('#user-search').on('keyup',function(){
                            var value = $('#user-search').val();
$.ajax({
type : 'POST',
url : '/admin/getUserByName',
headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
data:{search: value},
dataType: "json",
success:function(data){
  var output = '';
                                var len = data.length;
                                
                                console.log(len);
                                //console.log("Data is" +JSON.stringify(data));
                                for(var count = 0; count < len; count++) 
                                  {
                                    var userID = data[count].user_id;
                                    console.log(data[count].role_name);
                                    
                                    //console.log("User ID:" +userID);
                                    if(userID == userID)
                                    output += '<tr>';
                                    output += '<td>' + data[count].firstname + ' '+ data[count].surname+'</td>';
                                    output += '<td>' + data[count].email + '</td>';
                                    output += '<td>' + data[count].role_name + '</td>';
                                    output += "<td id='action-buttons' class='text-right'>";
                                    output += "<button type='submit' class='btn btn-success' data-toggle='modal' data-target='#view"+data[count].user_id+"'><img src='/img/baseline_visibility_white_18dp.png'></button>";
                                    output += "<a href=/admin/users/"+data[count].user_id+"/edit><button type='button' class='btn btn-dark' style='margin-left: 2%;'><img src='/img/baseline_create_white_18dp.png'></button></a>";
                                    output += "<button type='submit' class='btn btn-danger' data-toggle='modal' style='margin-left: 2%;' data-target='#delete"+data[count].user_id+"'><img src='/img/baseline_delete_white_18dp.png'></button>";
                                    output += "</td>";
                                    output += '</tr>';
                                    
                                  }
$('tbody').html(output);
}
});
})

                         
                          $('#user-role').change(function(e){
                            e.preventDefault();
                            var role = $('#user-role').val();
                            //console.log(role);
                            
                            
                            $.ajax({
                              method: "POST",
                              url: "/admin/getUserRole",
                              headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                              data: {id: role},
                              dataType: "json",
                              success: function(data) {
                                var output = '';
                                var len = data.length;
                                
                                //console.log(len);
                                //console.log("Data is" +JSON.stringify(data));
                                
                                for(var count = 0; count < len; count++) 
                                  {
                                    var userID = data[count].user_id;
                                    //console.log("User ID:" +userID);
                                    if(userID == userID)
                                    output += '<tr>';
                                    output += '<td>' + data[count].firstname + ' '+ data[count].surname+'</td>';
                                    output += '<td>' + data[count].email + '</td>';
                                    output += '<td>' + data[count].role_name + '</td>';
                                    output += "<td id='action-buttons' class='text-right'>";
                                    output += "<button type='submit' class='btn btn-success' data-toggle='modal' data-target='#view"+data[count].user_id+"'><img src='/img/baseline_visibility_white_18dp.png'></button>";
                                    output += "<a href=/admin/users/"+data[count].user_id+"/edit><button type='button' class='btn btn-dark' style='margin-left: 2%;'><img src='/img/baseline_create_white_18dp.png'></button></a>";
                                    output += "<button type='submit' class='btn btn-danger' data-toggle='modal' style='margin-left: 2%;' data-target='#delete"+data[count].user_id+"'><img src='/img/baseline_delete_white_18dp.png'></button>";
                                    output += "</td>";
                                    output += '</tr>';
                                    
                                  }
                                  
                                  
                                  $('tbody').html(output);
                                    //console.log("The output is" +output);
                                    //console.log('Data' +data.user_id);
                                    return data;
                                    
                              }
                              
                            });
                            
                            //console.log(role);
                            
                          });
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
            <div class="card-header">All Users</div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-sm" id="user-table">
                      <span id="total_records"></span>
                      <thead>
                        <tr class="d-flex">
                          
                          <th class="col-2"><input id="user-search" type="text" placeholder="Search name..." class="filter-input"></div></th>
                          <th scope="col" class="col-3"></th>
                          <form id="user-form" action="#">
                            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                          <th scope="col" class="col-3">
              <select id="user-role" name="user-role">
                <option selected disabled>Select a role</option>
                @foreach($roles as $role)
                <option id="role-id" value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
              </select>
            </form>
          </th>
              <th scope="col" class="col-4"><a href="/admin/users"><div class="text-right"><button class="btn btn-primary col-12">Clear Filters</button></div></a></th>
                      </thead>
                        <thead class="thead-dark">
                          <tr class="d-flex">
                            <th scope="col" class="manage-users-name col-2">Name</th>
                            <th scope="col" class="manage-users-email col-3">Email</th>
                            <th scope="col" class="manag-users-roles col-3">Roles</th>
                            <th scope="col" class="manage-users-actions text-center col-4">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          
  
  <!-- Modal -->
  @foreach($users as $u)
                    <tr class="d-flex">
                      <td class="col-2">{{Crypt::decrypt($u->profile()->pluck('firstname'))}} {{Crypt::decrypt($u->profile()->pluck('surname'))}}</td>
                        <td class="col-3">{{$u->email}}</td>
                        
                        <td class="col-3">{{implode(", ", $u->roles()->pluck('name')->toArray())}}</td>
                        
                        <td id="action-buttons" class="text-center col-4">
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
        <h3>Name: </h3>
        <h3>Address: </h3>
        <h3>Contact No: </h3>
        <h3>Causes Supporting:
             
        </h3> 
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
          This will delete the user. Are you sure you wish to delete this user?
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