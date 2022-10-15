<?php
require_once 'lib/init.php';

if (settings(SITE_NAME, null) && !isset($_GET['force'])) {
    header('Location: index.php');
    die;
}

// Run the installation data
settings([
    SITE_NAME => 'Dairy Management',
    DEPOSITOR_PRICE => 10,
    CUSTOMER_PRICE => 12,
]);


header('Location: index.php');
