<?php
require_once 'header.php';
require_once '../lib/init.php';

if (isset($_POST['depositor'])) {
    $dep_id = $_POST['depositor'];
    $amount = $_POST['amount'];
    $price = settings(DEPOSITOR_PRICE, 'Hello');

    $input_errors = array();

    if (empty($dep_id)) {
        $input_errors['depositor'] = "Select depositor";
    }
    if (empty($amount)) {
        $input_errors['amount'] = "Amount field is required";
    }

    if (count($input_errors) == 0) {
        $data = [
            'depositor_id' => $dep_id,
            'amount' => $amount,
            'rate' => $price,
            'status' => 'success',
            'date' => date('Y-m-d'),
        ];

        if (insertSql('deposits', $data)) {
            $message = "Depositor added successfully";
        } else {
            $message = "Something went wrong";
        }
        flash_message(['message' => $message]);
        header("Location: deposit_milk.php");
        die;
    }

    flash_message($input_errors);
    header("Location: deposit_milk.php");
}
