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
            <li><a href="javascript:avoid(0)">Sell Milk</a></li>
        </ul>
    </div>
</div>
<div class="row animated fadeInUp">
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="col-md-4 col-sm-offset-3">
        <?php if ($message = flash_message('message')) {
            echo alert_message($message, 'success');
        } ?>
        <form action="actions/new-sell.php" method="POST">
            <h3 class="mb-md ">Sell Milk</h3>
            <div class="form-group">

                <label for="">Select Customer</label>

                <select class="form-control custom-select" name="customer_id" required>
                    <option value="">Select Customer</option>
                    <?php
                    $result = runSql("SELECT * FROM `customer`");
                    foreach ($result as $row) { ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['id']; ?>-<?php echo $row['name']; ?></option>
                    <?php } ?>
                </select>
                <?php if ($message = flash_message('customer')) : ?>
                    <span class="text-danger text-bold"><?php echo $message; ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="">Quantity in Liters</label>
                <input type="number" placeholder="In liter" name="amount" class="form-control">
                <?php if ($message = flash_message('amount')) : ?>
                    <span class="text-danger text-bold"><?php echo $message; ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="customer_transaction" value="Sell">Sell</button>
            </div>
        </form>
    </div>
</div>

</div>
<?php
require_once 'footer.php';
?>