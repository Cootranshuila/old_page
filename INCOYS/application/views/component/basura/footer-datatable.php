
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 2.3.8
  </div>
  <strong>Copyright &copy; 2017 OneTurpial</a>.</strong> All rights
  reserved.
</footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>/template/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>/template/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>/template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>/template/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>/template/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>/template/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>/template/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>/assets/machanda.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>/template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>/template/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#table-order-states").DataTable();
    $("#table-alla-order").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
