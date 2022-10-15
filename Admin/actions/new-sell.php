<?php
require_once '../../lib/init.php';

if (isset($_POST['customer_id'])) {
    $dep_id = $_POST['customer_id'];
    $amount = $_POST['amount'];
    $price = settings(CUSTOMER_PRICE, 0);

    $input_errors = array();

    if (empty($dep_id)) {
        $input_errors['customer'] = "Select customer";
    }
    if (empty($amount)) {
        $input_errors['amount'] = "Amount field is required";
    }

    if (count($input_errors) == 0) {
        $data = [
            'customer_id' => $dep_id,
            'amount' => $amount,
            'rate' => $price,
            'status' => 'success',
            'date' => date('Y-m-d'),
        ];

        if (insertSql('customer_transaction', $data)) {
            $message = "Milk sold successfully";
        } else {
            $message = "Something went wrong";
        }
        flash_message(['message' => $message]);
        header("Location: ../sell-milk.php");
        die;
    }

    flash_message($input_errors);
}

header("Location: ../sell-milk.php");
