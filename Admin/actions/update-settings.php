<?php

require_once '../../lib/init.php';

if (isset($_POST['depositor_rate'])) {
    settings([
        DEPOSITOR_PRICE => $_POST[DEPOSITOR_PRICE] ?? 0,
    ]);

    flash_message(['message' => 'Dipositor rate updated!']);
}

if (isset($_POST['customer_rate'])) {
    settings([
        CUSTOMER_PRICE => $_POST[CUSTOMER_PRICE] ?? 0,
    ]);

    flash_message(['message' => 'Customer rate updated!']);
}

exit(header('Location: ../index.php'));
