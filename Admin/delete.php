<?php

require_once '../lib/init.php';

if(isset($_GET['depositor_delete'])){
    $id=base64_decode($_GET['depositor_delete']);
    mysqli_query($con,"DELETE FROM `depositor` WHERE `id`='$id'");
    header('location: manage_depositor.php');
}

?>