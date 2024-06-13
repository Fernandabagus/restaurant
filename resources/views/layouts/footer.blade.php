<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('AdminLTE-3.1.0')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{asset('AdminLTE-3.1.0')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('AdminLTE-3.1.0')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE-3.1.0')}}/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('AdminLTE-3.1.0')}}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="{{asset('AdminLTE-3.1.0')}}/plugins/raphael/raphael.min.js"></script>
<script src="{{asset('AdminLTE-3.1.0')}}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="{{asset('AdminLTE-3.1.0')}}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('AdminLTE-3.1.0')}}/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{asset('AdminLTE-3.1.0')}}/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('AdminLTE-3.1.0')}}/dist/js/pages/dashboard2.js"></script>

@if (Session::has('success'))
    <script>
        Swal({
            title: "Success!",
            text: "{{ Session::get('success') }}",
            icon: "success",
            button: "OK",
        });
    </script>
@endif

@if (Session::has('error'))
    <script>
        Swal({
            title: "Error!",
            text: "{{ Session::get('errorr') }}",
            icon: "error",
            button: "OK",
        });
    </script>
@endif
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>

<!-- DataTables  & Plugins -->
<script src="{{asset('AdminLTE-3.1.0')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('AdminLTE-3.1.0')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('AdminLTE-3.1.0')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('AdminLTE-3.1.0')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('AdminLTE-3.1.0')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('AdminLTE-3.1.0')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('AdminLTE-3.1.0')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('AdminLTE-3.1.0')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('AdminLTE-3.1.0')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('AdminLTE-3.1.0')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('AdminLTE-3.1.0')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('AdminLTE-3.1.0')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
</body>
</html>