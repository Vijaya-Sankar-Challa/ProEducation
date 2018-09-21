@if(Auth::user()->role == 1)
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('admin_title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ url('bootstrap/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('plugins/datatables/dataTables.bootstrap.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ url('dist/css/skins/_all-skins.min.css') }}">
  <link rel="stylesheet" href="{{ url('css/toastr.min.css') }}">

  @yield('style')

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/nimda') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>PL</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>Pannel</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu" style="margin-right: 20px;">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ url('images/uploads/avatars') }}/{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}"  class="user-image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ url('images/uploads/avatars') }}/{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" class="img-circle">
                <p>{{ Auth::user()->name }}<small>Member since {{ Auth::user()->created_at->format('j F Y') }}</small></p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ url('/profile') }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                    </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ url('images/uploads/avatars') }}/{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" class="img-circle">
        </div>
        <div class="pull-left info small">
          <p>{{ Auth::user()->name }}</p>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="{{ url('/admindashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
        </li>
        <li>
          <a href="{{ url('/adminusers') }}"><i class="fa fa-users" aria-hidden="true"></i><span>Users</span></a>
        </li>
        <li>
          <a href="{{ url('/adminprojects') }}"><i class="glyphicon glyphicon-briefcase" aria-hidden="true"></i><span>Projects Posted</span></a>
        </li>
        <li>
          <a href="{{ url('/adminbids') }}"><i class="glyphicon glyphicon-briefcase" aria-hidden="true"></i><span>Bids</span></a>
        </li>
        <li>
          <a href="{{ url('/adminskills') }}"><i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i><span>Skills</span></a>
        </li>
        <li>
          <a href="{{ url('/adminsubskills') }}"><i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i><span>Sub Skills</span></a>
        </li>
        <li>
          <a href="{{ url('/adminprocat') }}"><i class="glyphicon glyphicon-equalizer" aria-hidden="true"></i><span>Project Categories</span></a>
        </li>
        <li>
          <a href="{{ url('/adminsubprocat') }}"><i class="glyphicon glyphicon-equalizer" aria-hidden="true"></i><span>Sub Project Categories</span></a>
        </li>
        <li>
          <a href="{{ url('/admininterncat') }}"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <span>Internship Categories</span></a>
        </li>
        <li>
          <a href="{{ url('/admininterndep') }}"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <span>Internship Departments</span></a>
        </li>
        <li>
          <a href="{{ url('/admininterndet') }}"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <span>Internship Details</span></a>
        </li>
        <li>
          <a href="{{ url('/adminworkshops') }}"><i class="fa fa-briefcase" aria-hidden="true"></i> <span>Workshops</span></a>
        </li>
        <li>
          <a href="{{ url('/adminpostnotification') }}"><i class="fa fa-bell" aria-hidden="true"></i> <span>Post Notification</span></a>
        </li>
        <li>
          <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out" aria-hidden="true"></i> <span>Log Out</span>
          </a>
          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
             {{ csrf_field() }}
          </form>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('page_name')
        <small>@yield('page_dis')</small>
      </h1>
      @yield('levels')
    </section>

    <!-- Main content -->
    <section class="content">
      @yield('admincontent')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2017-18 <a href="#">Pro Education</a>.</strong> All rights reserved.
  </footer>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- jQuery 2.2.3 -->
<script src="{{ url('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ url('bootstrap/js/bootstrap.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ url('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ url('plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('dist/js/app.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('dist/js/demo.js') }}"></script>
<script src="{{ url('js/toastr.min.js') }}"></script>
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
<script>
  toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
    @if(Session::has('message'))
        var type="{{Session::get('alert-type','info')}}"


        switch(type){
            case 'info':
                 toastr.info("{{ Session::get('message') }}");
                 break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
</script>

@yield('script')
</body>
</html>
@else
@include('errors.noaccess')
@endif