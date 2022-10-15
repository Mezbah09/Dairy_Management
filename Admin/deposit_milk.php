<?php
require_once '../lib/init.php';
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
                        <li><a href="javascript:avoid(0)">Deposit Milk</a></li>
                    </ul>
                    </div>
                </div>
                <div class="row animated fadeInUp">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                    <div class="col-md-4 col-sm-offset-3">
                                    <form action="add-deposite.php" method="POST">
                                        <h3 class="mb-md ">Deposit Milk</h3>
                                        <div class="form-group">
                                        
                                            <label for="">Select Depositor</label>
                                            
                                            <select class="form-control custom-select" name="depositor" required>
                                                <option value="">Select Depositor</option>
                                                <?php
                                                $result=mysqli_query($con, "SELECT * FROM `depositor`");
                                                while($row = mysqli_fetch_assoc($result))
                                                {?>
                                                <option value="<?php echo $row['id'];?>"><?php echo $row['id'];?>-<?php echo $row['name'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Quantity in Liters</label>
                                            <input type="text" name="amount" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" name="depositor_transaction" value="Deposit">Deposit</button>
                                        </div>
                                    </form>
                    </div>
                </div>
                    
    </div>
        <?php
            require_once 'footer.php';
        ?>