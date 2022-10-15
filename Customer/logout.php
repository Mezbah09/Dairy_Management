<?php
require_once '../lib/init.php';

session_destroy();
header('location: sign-in.php');
