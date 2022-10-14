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
                              <a href="#">
                                   <div class="panel-content">
                                        <h1 class="title color-w"><i class="fa fa-money"></i> </h1>
                                        <h4 class="subtitle color-lighter-1">Current Rate</h4>
                                   </div>
                              </a>
                         </div>
                    </div>
                    <!--BOX Style 1-->
                    <?php
                    $depositor=mysqli_query($con, "SELECT * FROM `depositor`");
                    $total_depositor=mysqli_num_rows($depositor);
                    ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                         <div class="panel widgetbox wbox-1 bg-darker-2 color-light">
                              <a href="manage_depositor.php">
                                   <div class="panel-content">
                                        <h1 class="title color-light-1"> <i class="fa fa-envelope"></i> <?= $total_depositor; ?> </h1>
                                        <h4 class="subtitle">Total Depositor</h4>
                                   </div>
                              </a>
                         </div>
                    </div>
                    <!--BOX Style 1-->
                    <?php
                    $customer=mysqli_query($con, "SELECT * FROM `customer`");
                    $total_customer=mysqli_num_rows($customer);
                    ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                         <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                              <a href="customer.php">
                                   <div class="panel-content">
                                        <h1 class="title color-darker-2"> <i class="fa fa-user"></i> <?= $total_customer; ?> </h1>
                                        <h4 class="subtitle color-darker-1">Customer</h4>
                                   </div>
                              </a>
                         </div>
                    </div>
                    <!--BOX Style 1-->
                    <?php
                    $tank=mysqli_query($con, "SELECT SUM(`quantity`)as total FROM `depositor`");
                    $qty=mysqli_fetch_assoc($tank);
                    //$total_milk=mysqli_num_rows($tank);
                    ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                         <div class="panel widgetbox wbox-1 bg-light color-darker-2">
                              <a href="#">
                                   <div class="panel-content">
                                        <h1 class="title"> Total <?= $qty['total']; ?></h1>
                                        <h4 class="subtitle">Dairy tank</h4>
                                   </div>
                              </a>
                         </div>
                    </div>
               </div>
          </div>
                    
     </div>
          <?php
               require_once 'footer.php';
          ?>