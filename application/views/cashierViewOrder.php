  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pending Orders</h3>
            </div>


         


            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">


              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Username</th>
                  <th>Order(s) Placed</th>
                  <th>Quantity</th>
                  <th>Time</th>
                 <th>Status</th>


                </tr>
                </thead>
                <tbody>
                <tr>

                       <?php foreach ($orders as $order) { ?>  

                  <td><?php echo $order->oid; ?></td>
                  <td>unk
                  </td>
                  <td><?php echo $order->fname ?></td>
                  <td> <?php echo $order->qut ?></td>
                  <td><?php echo $order->odate ?></td>


                   <?php  $id = $order->oid; ?> 

                  <td><?php  if($order->status == null){echo "Pending";} else if ($order->status ==1) {echo "Processing";} else if ($order->status ==2) {echo "Done";}   ?> </td>
                    <?php if ($order->status ==2) {echo "Done";}   ?>
                  <td><button type="button" class="btn btn-block btn-primary" onclick="location.href='<?php echo base_url();?>index.php/Cashier/accetOrderDetails/<?php echo $id;?>'">Accept</button>
                      <button type="button" class="btn btn-block btn-danger" onclick="location.href='<?php echo base_url();?>index.php/Cashier/rejectOrder/<?php echo $id;?>'">Reject</button>
                      </td>
                      
                </tr>
                  <?php } ?>
                </tbody>
                </table>
                                </div>
                </div>
                </div>
                </div>
                </div>




  </div>
  <!-- /.content-wrapper -->