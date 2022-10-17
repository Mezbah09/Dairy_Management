<?php
require_once 'header.php';

?>

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
               <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="panel widgetbox wbox-1 bg-darker-1">
                         <a href="#">
                              <div class="panel-content">
                                   <h1 class="title color-w"><i class="fa fa-money"></i>
                                        <?= settings(DEPOSITOR_PRICE, 0) ?><span class="currency">৳</span>
                                   </h1>
                                   <h4 class="subtitle color-lighter-1">Depositor Rate</h4>
                              </div>
                         </a>
                    </div>
               </div>

               
          
          </div>
                    
     </div>

     <?php
          require_once 'footer.php';
     ?>