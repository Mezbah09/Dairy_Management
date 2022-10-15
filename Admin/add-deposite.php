<?php
require_once 'header.php';
require_once '../lib/init.php';

//session_start();
//if(isset($_SESSION['depositor_login'])){
//header('location: index.php');
//}

// dd(runSql('SELECT * FROM settings', true));

if (isset($_POST['depositor'])) {
    $name = $_POST['depositor'];
    $amount = $_POST['amount'];
    $price = settings(DEPOSITOR_PRICE, 'Hello');

    $input_errors = array();

    if (empty($name)) {
        $input_errors['depositor'] = "Select depositor";
    }
    if (empty($amount)) {
        $input_errors['amount'] = "Amount field is required";
    }

    if (count($input_errors) == 0) {
        //    show the form.
    }
}
