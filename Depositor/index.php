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
          <h4 class="section-subtitle"><b>All deposit milk</b></h4>
          <div class="panel">
               <div class="panel-content">
                    <div class="table-responsive">
                         <table id="basic-table" class="table-bordered data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                              <thead>
                                   <tr>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Rate</th>
                                        <th>Quantity</th>
                                        <th>Date</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   <?php
                                   $depositor_id = $_SESSION['depositor_id'];
                                   echo $depositor_id;

                                   $result = mysqli_query($con, "SELECT `depositor_transaction`.`amount`,`depositor_transaction`.`rate`,`depositor_transaction`.`date`,`depositor`.`name`,`depositor`.`contact` FROM `depositor`INNER JOIN `depositor_transaction`ON `depositor_transaction`.`depositor_id`= `depositor`.`id`WHERE `depositor_transaction`.`depositor_id`='$depositor_id'");
                                   while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <tr>
                                             <td><?= $row["name"] ?></td>
                                             <td><?= $row["contact"] ?></td>
                                             <td><?= $row["rate"] ?></td>
                                             <td><?= $row["amount"] ?></td>
                                             <td><?= $row["date"] ?></td>
                                        </tr>
                                   <?php
                                   }
                                   ?>
                                   
                              </tbody>
                         </table>
                    </div>
               </div>
          </div>
     </div>

</div>

<?php
require_once 'footer.php';
?>