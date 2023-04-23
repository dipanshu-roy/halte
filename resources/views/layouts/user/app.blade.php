<!DOCTYPE html>
<html lang="en">
  <head>
    <title>{{ $user->name ?? '' }} || {{config('app.name')}}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf_token" content="{{csrf_token()}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    @include('setting.app')
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="{{route('home')}}">{{config('app.name')}}</a>
      <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <ul class="app-nav">
        <li class="app-search">
          <input class="app-search__input" type="search" placeholder="Search">
          <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        @if(Setting('fire_base_notification')=='Active')
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i><span class="notifications_count"></span></a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title">You have <span class="notifications_count"></span> new notifications.</li>
            <div class="app-notification__content" id="notifications_history"></div>
            <li class="app-notification__footer"><a href="{{route('notification.history')}}">See all notifications.</a></li>
          </ul>
        </li>
        @endif
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="{{url('profile-update')}}"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                <input type="hidden" name="username_redirect" value="login">
            </form>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="@if(!empty($user->profile)){{asset($user->profile)}}@else{{asset('image/profile.jpg')}}@endif" alt="{{$user->name??''}}">
        <div>
          <p class="app-sidebar__user-name">{{$user->name??''}}</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item {{(request()->is('home'))?'active':''}}" href="{{route('home')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview {{(request()->is('add-users'))?'is-expanded':''}} {{(request()->is('manage-users'))?'is-expanded':''}}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Manage Users</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item {{(request()->is('manage-users'))?'active':''}}" href="{{route('manage.users')}}"><i class="icon fa fa-circle-o"></i> Manage User</a></li>
            <li><a class="treeview-item {{(request()->is('add-users'))?'active':''}}" href="{{route('add.users')}}"><i class="icon fa fa-circle-o"></i> Add User</a></li>
          </ul>
        </li>
      </ul>
    </aside>
    @yield('content')
    <!-- Essential javascripts for application to work-->
    <div class="modal fade" id="uploadImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Upload Image</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <span class="show_notification"></span>
                        </div>
                        <div class="col-md-9">
                            <div style="height: 300px;overflow-y: scroll;overflow-x: hidden;">
                                <div class="row" id="load_image"></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <img id="image_output" style="width:100%;border-radius: 5px;"/>
                            <input type="file" id="upload_image"  class="btn btn-secondary w-100" accept="image/x-png, image/gif, image/jpeg" name="upload_image" onchange="loadFile(event)">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span style="cursor: pointer;font-weight:600" class="delete-btn btn btn-outline-danger btn-xs">Delete Selectd</span>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" href="#" onclick="upload_function()" ><i class="fa fa-upload"></i> Upload</button>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">View Notification</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <h5 id="notification_title">....</h5>
            <p id="notification_description"></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/plugins/pace.min.js')}}"></script>
    <script src="{{asset('js/plugins/sweetalert.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript">
      $(document).ready( function () {
        $('#myTable').DataTable();
      });
    </script>
    <script>
      function UpdateStaus(urls,id,status){
        $.ajax({
          headers: {'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')},
          url: urls,
          type: "POST",
          data: {id:$(id).attr('data'),status:status},
          success: function(xhr){
            if(xhr.data.status=='Inactive'){
              $('#inds'+xhr.data.id).addClass('btn-outline-danger');
              $('#inds'+xhr.data.id).removeClass('btn-outline-success');
              $('#inds'+xhr.data.id).text('Inactive');
            }else{
              $('#inds'+xhr.data.id).addClass('btn-outline-success');
              $('#inds'+xhr.data.id).removeClass('btn-outline-danger');
              $('#inds'+xhr.data.id).text('Active');
            }
            swal(xhr.data.status, "Succesfully "+xhr.data.status, "success");
          },
          error: function (xhr, ajaxOptions, thrownError) {
            swal("Something Went to Wrong!", "Please try again", "error");
          }
        });
      }
    </script>
    <script>
    var loadFile = function(event) {
      var output = document.getElementById('image_output');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
        URL.revokeObjectURL(output.src);
      }
    };
    </script>
    <script>
      function upload_function(){
          data = new FormData();
          data.append('image', $('#upload_image')[0].files[0]);
          $(".show_notification").show();
          $.ajax({
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
              type:'POST',
              url: "{{url('ajax/image-upload')}}",
              data:data,
              mimeType: 'multipart/form-data',
              contentType: false,
              dataType:'json',
              processData: false,
              success:function(responce){
                  if(responce.status==200){
                      $("#image_output").attr("src",""),
                      $("#upload_image").val('');
                      $('.show_notification').html('<div class="alert alert-success">'+responce.msg+'</div>');
                  }else{
                      $("#image_output").attr("src",""),
                      $("#upload_image").val('');
                      $('.show_notification').html('<div class="alert alert-danger">'+responce.msg+'</div>');
                  }
                  loadUploadedImage();
                  setTimeout(function () {
                      $('.show_notification').hide();
                  }, 1500);
              },
          });
      }
    </script>
    <script> 
      function loadUploadedImage(){
        $("#load_image").load("{{url('ajax/load-image')}}");
      }
      function get_this_image(id){
        $("#set_image_value").val(id);
        $.ajax({
            type:'GET',
            url: "{{url('ajax/load-image-id')}}/"+id+"",
            success:function(responce){
              $("#set_image").attr('src',''+responce+'');
            },
        });
      }
    </script>
    <script>
    $('.delete-btn').on('click', function(event) {
      if($('.delete-checkbox:checked').length>0){
        if(confirm("Are you sure to Delete Selected")){
          data = new Array();
          $('.delete-checkbox:checked').each(function() {
              if (this.checked){
                data.push($(this).val());
              }
          });
          $.each( data, function( index, value ){
              $("#TableID_"+value).remove();
          });
          $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
            url : "{{url('ajax/delete-image')}}",
            data: {id:data},
            type : 'POST',
            success : function(result){
                if(result.status==200){
                    $('.delete-btn').text('Delete Selectd');
                    loadUploadedImage();
                }
            }
          });
        }
      }
    });
    </script>
    <script>
      function NotificationsCount(){
        $.get("{{url('ajax/notifications-count')}}", function(xhr){
          if(xhr.status==200){
            $('.notifications_count').text(xhr.data);
          }
        });
      }
      function NotificationsHistory(){
        $.get("{{url('ajax/notifications-history')}}", function(xhr){
          $('#notifications_history').empty();
          if(xhr.status==200){
            var datax = xhr.data;
            var html = '';
            for(var i=0;i<datax.length;i++){
              html += '<li><a class="app-notification__item" data-toggle="modal" data-target="#myModal" onclick="ReadNotification('+datax[i].id+')"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-bell fa-stack-1x fa-inverse"></i></span></span><div><p class="app-notification__message">'+datax[i].title+'</p><p class="app-notification__meta">'+datax[i].created_at+'</p></div></a></li>';
            }
            $('#notifications_history').append(html);
          }
        });
      }
      NotificationsCount();
      NotificationsHistory();
      function ReadNotification(id){
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
            url : "{{url('ajax/read-notification')}}",
            data: {id:id},
            type : 'POST',
            success : function(xhr){
              if(xhr.status==200){
                NotificationsCount()
                NotificationsHistory();
                $('#notification_title').text(xhr.data.title);
                $('#notification_description').text(xhr.data.description);
              }
            }
        });
      }
    </script>
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>
    <script>
    var firebaseConfig = {
      apiKey: "AIzaSyDykzd8-vk962Im23P0fXCi6oB8D0Vp2ms",
      authDomain: "notification-94417.firebaseapp.com",
      projectId: "notification-94417",
      storageBucket: "notification-94417.appspot.com",
      messagingSenderId: "119121087610",
      appId: "1:119121087610:web:b172e73a7a128122b6bfc3",
      measurementId: "G-ZFC7QHJFNQ"
    };
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();
    function StoreToken(messaging) {
      messaging.requestPermission().then(function () {
          return messaging.getToken()
        }).then(function (response) {
          $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
            url: '{{url("ajax/store-token")}}',
            type: 'POST',
            data: {token: response},
            dataType: 'JSON',
            success: function (response) {},
            error: function (error) {},
          });
        }).catch(function (error) {
        alert(error);
      });
    }
    messaging.onMessage(function (payload) {
      const title = payload.notification.title;
      const options = {
        body: payload.notification.body,
        icon: payload.notification.icon,
      };
      new Notification(title, options);
    });
    @if(empty($user->fcm_id) && Setting('fire_base_notification')=='Active')
    StoreToken(messaging);
    @endif
    </script>
    <script type="text/javascript" src="{{asset('js/plugins/chart.js')}}"></script>
    <script type="text/javascript">
      var data = {
      	labels: ["January", "February", "March", "April", "May"],
      	datasets: [{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [65, 59, 80, 81, 56]
      		},{
      			label: "My Second dataset",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [28, 48, 40, 19, 86]
      		}
      	]
      };
      var pdata = [
      	{
      		value: 300,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Complete"
      	},
      	{
      		value: 50,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "In-Progress"
      	}
      ];
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
    @if(!empty(session('success')))
    <script type="text/javascript">
        toastr.success("{{session('success')}}");
    </script>
    @endif
    @if(!empty(session('error')))
    <script type="text/javascript">
        toastr.error("{{session('error')}}");
    </script>
    @endif
  </body>
</html>