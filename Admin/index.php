<?php
require_once 'header.php';

?>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<!-- ========================================================= -->
<!-- content HEADER -->
<!-- ========================================================= -->
<div class="content-header">
     <!-- leftside content header -->
     <div class="leftside-content-header">
          <ul class="breadcrumbs">
               <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
          </ul>
     </div>
</div>
<div class="row animated fadeInUp">
     <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
     <div class="col-sm-12">
          <div class="row">
               <!--BOX Style 1-->

               <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="panel widgetbox wbox-1 bg-darker-1">
                         <a href="deposit_milk.php">
                              <div class="panel-content">
                                   <h1 class="title color-w"><i class="fa fa-money"></i>
                                        <?= settings(DEPOSITOR_PRICE, 0) ?><span class="currency">৳</span>
                                   </h1>
                                   <h4 class="subtitle color-lighter-1">Depositor Rate</h4>
                              </div>
                         </a>
                    </div>
               </div>
               <!--BOX Style 1-->
               <?php
               $depositor = mysqli_query($con, "SELECT * FROM `depositor`");
               $total_depositor = mysqli_num_rows($depositor);
               ?>
               <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="panel widgetbox wbox-1 bg-darker-2 color-light">
                         <a href="manage_depositor.php">
                              <div class="panel-content">
                                   <h1 class="title color-light-1"> <i class="fa fa-users"></i> <?= $total_depositor; ?> </h1>
                                   <h4 class="subtitle">Total Depositor</h4>
                              </div>
                         </a>
                    </div>
               </div>
               <!--BOX Style 1-->
               <?php
               $customer = mysqli_query($con, "SELECT * FROM `customer`");
               $total_customer = mysqli_num_rows($customer);
               ?>
               <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                         <a href="customer.php">
                              <div class="panel-content">
                                   <h1 class="title color-darker-2"> <i class="fa fa-users"></i> <?= $total_customer; ?> </h1>
                                   <h4 class="subtitle color-darker-1">Customer</h4>
                              </div>
                         </a>
                    </div>
               </div>
               <!--BOX Style 1-->
               <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="panel widgetbox wbox-1 bg-light color-darker-2">
                         <a href="#">
                              <div class="panel-content">
                                   <h1 class="title"> Total <?= milk_tank(); ?> Ltr</h1>
                                   <h4 class="subtitle">Dairy tank</h4>
                              </div>
                         </a>
                    </div>
               </div>
          </div>
     </div>

     <div class="row">
          <div class="col-sm-12 col-sm-offset-2">
               <div class="row">
                    <div class="col-md-8">
                         <?php if ($message = flash_message('message')) {
                              echo alert_message($message, 'success');
                         } ?>
                    </div>
               </div>
               <div class="row">
                    <div class="col-md-4">
                         <div class="panel">
                              <div class="panel-body">
                                   <form action="actions/update-settings.php" method="POST">
                                        <h3 class="mb-md ">Depositor Rate</h3>
                                        <div class="form-group">
                                             <label for="">Rate</label>
                                             <input type="number" placeholder="Price" name="<?= DEPOSITOR_PRICE ?>" value="<?= settings(DEPOSITOR_PRICE, 0) ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                             <button type="submit" class="btn btn-primary" name="depositor_rate" value="Update">Update</button>
                                        </div>
                                   </form>
                              </div>
                         </div>
                    </div>
                    <div class="col-md-4">
                         <div class="panel">
                              <div class="panel-body">
                                   <form action="actions/update-settings.php" method="POST">
                                        <h3 class="mb-md ">Customer Rate</h3>
                                        <div class="form-group">
                                             <label for="">Rate</label>
                                             <input type="number" placeholder="Price" name="<?= CUSTOMER_PRICE ?>" value="<?= settings(CUSTOMER_PRICE, 0) ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                             <button type="submit" class="btn btn-primary" name="customer_rate" value="Update">Update</button>
                                        </div>
                                   </form>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
<?php
require_once 'footer.php';
?>