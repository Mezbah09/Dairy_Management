<?php

function milk_tank()
{
    $totalDiposit = runSql("SELECT SUM(`amount`)as total FROM `depositor_transaction`", false);
    $totalSold = runSql("SELECT SUM(`amount`)as total FROM `customer_transaction`", false);

    return $totalDiposit['total'] - $totalSold['total'];
}







