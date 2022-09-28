<?php
require_once '../dbcon.php';
require_once 'header.php';

?>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<!-- ========================================================= -->
<!-- ========================================================= -->
<!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                <!-- leftside content header -->
                    <div class="leftside-content-header">
                    <ul class="breadcrumbs">
                        <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                        <li><a href="javascript:avoid(0)">Customers</a></li>
                    </ul>
                    </div>
                </div>
    <div class="row animated fadeInUp">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <div class="col-sm-12">
                    <h4 class="section-subtitle"><b>All Customers</b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Address</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result=mysqli_query($con, "SELECT * FROM `depositor`");
                                        while($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <tr>
                                            <td><?= $row["name"] ?></td>
                                            <td><?= $row["email"] ?></td>
                                            <td><?= $row["contact"] ?></td>
                                            <td><?= $row["address"] ?></td>
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
          </div>
                    
     </div>
          <?php
               require_once 'footer.php';
          ?>