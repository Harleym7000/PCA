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
      drawMembersChart();
      drawTrafficChart();
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
                          <th scope="col">Search Events:<input id="event-search" type="text" placeholder="Search event..." class="filter-input"></th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                          <th scope="col">Search Organisers:
                            <select id="event-organiser" name="event-organiser">
                              <option selected disabled>Choose an option...</option>
                              @foreach($orgs as $org)
                              <option id="organiser" value="{{$org->managed_by}}">{{$org->managed_by}}</option>
                              @endforeach
                            </select>
              <th scope="col"></th>
                      </thead>
                        <thead>
                          <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Venue</th>
                            <th scope="col">Organiser</th>
                            <th style="width: 20%;">Actions</th>
                          </tr>
                        </thead>
                        <tbody>

                          
  
  <!-- Modal -->
  @foreach($events as $event)
                    <tr>
                        <td><img src="/storage/event_images/{{$event->image}}" style="height: 85px; width: 150px;"></td>
                        <td><strong>{{$event->title}}</strong></td>
                        <td><strong>{{\Carbon\Carbon::parse($event->date)->format('D d M Y')}}</strong></td>
                        <td><strong>{{\Carbon\Carbon::parse($event->time)->format('H:i')}}</strong></td>
                        <td><strong>{{$event->venue}}</strong></td>
                        <td><strong>{{$event->managed_by}}</strong></td>
                        <td id="action-buttons">
                            @can('manage-events')
                              <a href="/events/edit/{{$event->id}}"><button type="button" class="btn btn-dark">Edit</button></a>
                                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#eventdelete{{$event->id}}">Delete</button>
                            @endcan
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                      </table>
                      
                    
                    </div>
                    
            </div>
            <?php echo $events->render(); ?>
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
  @foreach($events as $event)
  <div class="modal fade" id="eventdelete{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Confirm Delete User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          This will delete the event {{$event->title}}. Are you sure you wish to delete this event?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <form action="/events/delete" method="POST">
          @csrf
          <button type="submit" class="btn btn-danger" name="eid" value="{{$event->id}}">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
</body>
</html>