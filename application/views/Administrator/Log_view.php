<script>
  function loadtable(){
    "use strict";
  //load admin
  $("#logtable").dataTable().fnDestroy()
  var table1=$('#logtable').DataTable( {
    "order": [[ 2, "desc" ]],
    "lengthMenu": [[10,25, 50,100], [10,25, 50,100 ]],

    "processing": true,
    "serverSide": true,
    "ajax": {
            "url": "<?php echo base_url('index.php/Log/getactivity'); ?>",
            "type": "POST"
        },
    "pagingType": "full_numbers",
    
  } );
  setInterval( function () {
    table1.ajax.reload( null, false ); // user paging is not reset on reload
  }, 10000 );


  //getaction();  
}
</script>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User log Activity
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Administrator</a></li>
        <li class="active">Userlog Activity</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">User log Activity</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="logtable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Activity ID</th>
                  <th>User</th>
                  <th>Date</th>
                  <th>Status</th>

                </tr>
                </thead>
                
                <tfoot>
                <tr>
                  <th>Activity ID</th>
                  <th>User</th>
                  <th>Date</th>
                  <th>Status</th>
  
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
  
  
  
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>dist/js/demo.js"></script>
<!-- page scri<?php echo base_url(); ?>pt -->
<script>
  $(function () {
    loadtable();

  });
</script>

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css">
    <meta charset="utf-8">
  <link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico">
  <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
  <title>DataTables example - Bootstrap 3</title>
  <!--<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
  <link rel="stylesheet" type="text/css" href="../../media/css/dataTables.bootstrap.css">
  
  <style type="text/css" class="init">
  
  </style>
  <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.3.min.js">
  </script>
  <script type="text/javascript" language="javascript" src="../../media/js/jquery.dataTables.js">
  </script>
  <script type="text/javascript" language="javascript" src="../../media/js/dataTables.bootstrap.js">
  </script>
  <script type="text/javascript" language="javascript" src="../../resources/syntax/shCore.js">
  </script>
  <script type="text/javascript" language="javascript" src="../../resources/demo.js">
  </script>
  <script type="text/javascript" language="javascript" class="init">