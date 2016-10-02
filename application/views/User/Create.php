<head>
  <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.3.min.js">
  </script>

  <script>
  $(document).ready(function(){
    "use strict";
    submitform();
  });
</script>
<script type="text/javascript">
 
function submitform(){

  $('#createuser').submit(function(e){
    e.preventDefault();
    

    var me =$(this);
    $.ajax({
      url:me.attr('action'),
      type:'post',
      data:new FormData(this),
      dataType:'json',
      async: false,
      cache: false,
          contentType: false,
          processData: false,
      success: function(response){
        if(response.success==true){
          //$('#mymodel').modal('show')  ; 
          alert('successfully Registered');
          $('.form-group').removeClass('has-error').removeClass('has-success');
          $('.text-danger').remove();
          me[0].reset();//loadAssignmenttable();
        }
        else{
          
          $.each(response.messages, function(key,value){
            var element = $ ('#'+ key);
            element.closest('div.form-group')
            .removeClass('has-error')
            .addClass(value.length >0 ? 'has-error':'has-success')
            .find('.text-danger').remove();
            element.after(value);
          });
        }


      }
    })

    }

  );
}
</script>
</head>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        user
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Create User</li>
      </ol>
    </section>


<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create Customer</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  id ='createuser' action ='<?php echo base_url("index.php/User/validate"); ?>' method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" class="form-control" id="uname" name="uname" placeholder="Enter username">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div> 
                <div class="form-group">
                  <label for="exampleInputPassword1">Confirm Password</label>
                  <input type="password" class="form-control" id="conpassword" name="conpassword"  placeholder="Confirm Password">
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
    </div>
    </div>
</section>
  </div>

