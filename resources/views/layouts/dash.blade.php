<!-- Dashboard for the administrator -->
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Always force latest IE rendering engine -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="keywords" content="ChapChap Cargo is an online cargo management system where users are able to ship stuff from abroad with ease">
  <meta charset="utf-8">
  <title>ChapChap || Cargo</title>
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset ('dash/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset ('dash/ionicons/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset ('dash/font-awesome-4.7.0/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{ asset ('dash/bootstrap/js/bootstrap-formhelpers-phone.js')}}">
  <link rel="stylesheet" href="{{ asset ('dash/dist/css/iMond.min.css')}}">
  <link rel="stylesheet" href="{{ asset ('dash/dist/css/skins/_all-skins.min.css')}}">
  <link rel="stylesheet" href="{{ asset ('dash/plugins/datatables/dataTables.bootstrap.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset ('dash/plugins/iCheck/flat/blue.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset ('dash/plugins/morris/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset ('dash/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset ('dash/plugins/datepicker/datepicker3.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset ('dash/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset ('dash/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <link rel="stylesheet" href="{{ mix('assets/css/app.css') }}">
  <link rel="stylesheet" href="{{ mix('assets/css/libs.css') }}">

</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="/system/admin" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>CHAP</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>ChapChap</b>Cargo</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <a class="btn btn-lg btn-danger" href="{{ url('/logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="/logout" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
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
          <img src="{{ asset ('img/avatar4.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
        <!-- fetch first name of logged user -->
          <p>{{ Sentinel::getUser()->first_name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
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
      <!-- sidebar menu: : menus with dropdowns  -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-graduation-cap"></i> <span>Manage Orders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/orders"><i class="fa fa-circle-o"></i>View Orders</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-sitemap"></i> <span> Manage Categories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('categories.index') }}"><i class="fa fa-btn fa-tags"></i>View Categories</a></li>
            <li><a href="{{ route('categories.create') }}"><i class="fa fa-btn fa-shopping-cart"></i>Add Category</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-sitemap"></i> <span> Manage Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('products.index') }}"><i class="fa fa-btn fa-gift"></i>View Products</a></li>
            <li><a href="{{ route('products.create') }}"><i class="fa fa-btn fa-gift"></i>Add Products</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="">
            Employees
          </a>
          <ul class="treeview-menu">
            <li><a href="/create/employee">New Employee</a></li>
            <li><a href="/view/employees">View Employees</a></li>
          </ul>
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
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content  we yield content from blades with section 'content'-->
    <section class="content">
      <div class="row">
        @yield('content')
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2017 <a href="http://imond.co.ke">ChapChap Cargo</a>.</strong> All rights
    reserved.
  </footer>

</div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.3 -->
    <script src="{{ asset ('dash/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>

    <script>
      $(".delete").on("submit", function(){
        return confirm("You are about to delete a record, Continue?");
      });
    </script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{ asset ('dash/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{ asset ('dash/plugins/morris/morris.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{ asset ('dash/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- jvectormap -->
    <script src="{{ asset ('dash/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{ asset ('dash/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset ('dash/plugins/knob/jquery.knob.js')}}"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="{{ asset ('dash/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- datepicker -->
    <script src="{{ asset ('dash/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset ('dash/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <!-- Slimscroll -->
    <script src="{{ asset ('dash/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{ asset ('dash/plugins/fastclick/fastclick.js')}}"></script>
    <!-- iMond App -->
    <script src="{{ asset ('dash/dist/js/app.min.js')}}"></script>
    <!-- iMond dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset ('dash/dist/js/pages/dashboard.js')}}"></script>
    <!-- iMond for demo purposes -->
    <script src="{{ asset ('dash/dist/js/demo.js')}}"></script>
    <!-- DataTables -->
    <script src="{{ asset ('dash/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset ('dash/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <!-- Scripts -->
    <script src="{{ mix('assets/js/app.js') }}"></script>
    <script src="{{ mix('assets/js/all.js') }}"></script>
    <script src="{{ mix('assets/js/libs.js') }}"></script>
    <script src="{{ mix('assets/js/custom.js') }}"></script>


    </body>
</html>
