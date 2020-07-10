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
                                    var roles = data[count].role_name;
                                    console.log(roles)
                                    //console.log("User ID:" +userID);
                                    if(userID == userID)
                                    output += '<tr>';
                                    output += '<td>' + data[count].name + '</td>';
                                    output += '<td>' + data[count].email + '</td>';
                                    output += '<td>' + data[count].role_name + '</td>';
                                    output += '<td>';
                                    output += "<a href=/admin/users/"+data[count].user_id+"/edit><button type='button' class='btn btn-dark'>Edit User</button></a>";
                                    output += "<button type='submit' class='btn btn-danger' data-toggle='modal' style='margin-left: 2%;' data-target='#delete"+data[count].user_id+"'>Delete User</button>";
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
                                    output += '<td>' + data[count].name + '</td>';
                                    output += '<td>' + data[count].email + '</td>';
                                    output += '<td>' + data[count].role_name + '</td>';
                                    output += '<td>';
                                    output += "<a href=/admin/users/"+data[count].user_id+"/edit><button type='button' class='btn btn-dark'>Edit User</button></a>";
                                    output += "<button type='submit' class='btn btn-danger' data-toggle='modal' style='margin-left: 2%;' data-target='#delete"+data[count].user_id+"'>Delete User</button>";
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
                          <th scope="col">Select Role:
              <select id="user-role" name="user-role">
                <option selected disabled>Choose an option...</option>
                @foreach($roles as $role)
                <option id="role-id" value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
              </select>
            </form>
          </th>
              <th scope="col"></th>
                      </thead>
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Roles</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          
  
  <!-- Modal -->
  @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                        <td id="action-buttons">
                            @can('edit-users')
                            <a href="{{route('admin.users.edit', $user->id)}}"><button type="button" class="btn btn-dark">Edit User</button></a>
                            @endcan
                            @can('delete-users')
                                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$user->id}}">Delete User</button>
                            @endcan
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                      </table>
                    
                    </div>
            </div>
            <?php echo $users->render(); ?>
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
  <!-- Modal -->
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
          This will delete the user {{$user->name}}. Are you sure you wish to delete this user?
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