@include("layouts.header")

  <!-- Navbar -->
@include("layouts.navbar")
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
@include("layouts.sidebar")

  <!-- Content Wrapper. Contains page content -->
@yield('content')
@include('sweetalert::alert')
    <!-- /.content -->

  <!-- /.content-wrapper -->

 

  <!-- Main Footer -->
@include("layouts.footer")  
