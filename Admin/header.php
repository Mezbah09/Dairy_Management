<?php

$page = explode('/', $_SERVER['PHP_SELF']);
$page = end($page);
require_once '../lib/init.php';

redirect_if_not_logged_in('admin');

?>



<!doctype html>
<html lang="en" class="fixed left-sidebar-top">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Dairy Management</title>

    <!--load progress bar-->
    <script src="../assets/vendor/pace/pace.min.js"></script>
    <link href="../assets/vendor/pace/pace-theme-minimal.css" rel="stylesheet" />

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--Notification msj-->
    <link rel="stylesheet" href="../assets/vendor/toastr/toastr.min.css">
    <!--Magnific popup-->
    <link rel="stylesheet" href="../assets/vendor/magnific-popup/magnific-popup.css">
    <!--dataTable-->
    <link rel="stylesheet" href="../assets/vendor/data-table/media/css/dataTables.bootstrap.min.css">
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">


</head>

<body>
    <div class="wrap">
        <!-- page HEADER -->
        <!-- ========================================================= -->
        <div class="page-header">
            <!-- LEFTSIDE header -->
            <div class="leftside-header">
                <div class="logo">
                    <a href="index.php" class="on-click">
                        <h5>Dairy Management</h5>
                    </a>
                </div>
                <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>
            <!-- RIGHTSIDE header -->
            <div class="rightside-header">
                <div class="header-middle"></div>

                <!--NOCITE HEADERBOX-->
                <div class="header-section hidden-xs" id="notice-headerbox">


                    <div class="header-separator"></div>
                </div>
                <!--USER HEADERBOX -->
                <div class="header-section" id="user-headerbox">
                    <div class="user-header-wrap">
                        <div class="user-photo">
                            <img alt="profile photo" src="../assets/images/avatar/mezbah.jpg" />
                        </div>
                        <div class="user-info">
                            <span class="user-name">Mezbah</span>
                            <span class="user-profile">Admin</span>
                        </div>
                        <i class="fa fa-plus icon-open" aria-hidden="true"></i>
                        <i class="fa fa-minus icon-close" aria-hidden="true"></i>
                    </div>
                    <div class="user-options dropdown-box">
                        <div class="drop-content basic">
                            <ul>
                                <li> <a href=""><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="header-separator"></div>
                <!--Log out -->
                <div class="header-section">
                    <a href="logout.php" data-toggle="tooltip" data-placement="left" title="Logout"><i class="fa fa-sign-out log-out" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <!-- page BODY -->
        <!-- ========================================================= -->
        <div class="page-body">
            <!-- LEFT SIDEBAR -->
            <!-- ========================================================= -->
            <div class="left-sidebar">
                <!-- left sidebar HEADER -->
                <div class="left-sidebar-header">
                    <div class="left-sidebar-title">DMS</div>
                    <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
                        <span></span>
                    </div>
                </div>
                <!-- NAVIGATION -->
                <!-- ========================================================= -->
                <div id="left-nav" class="nano">
                    <div class="nano-content">
                        <nav>
                            <ul class="nav nav-left-lines" id="main-nav">
                                <!--HOME-->
                                <!---->
                                <li class="<?= $page == 'index.php' ? 'active-item' : '' ?>"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
                                <!--Customer-->
                                <li class="<?= $page == 'customer.php' ? 'active-item' : '' ?>"><a href="customer.php"><i class="fa fa-users" aria-hidden="true"></i><span>customer</span></a></li>
                                <!--Depositor-->
                                <li class="has-child-item close-item <?= $page == 'add_depositor.php' ? 'open-item' : '' ?><?= $page == 'manage_depositor.php' ? 'open-item' : '' ?>">
                                    <a><i class="fa fa-user" aria-hidden="true"></i><span>Depositor</span></a>
                                    <ul class="nav child-nav level-1">
                                        <li class="<?= $page == 'add_depositor.php' ? 'active-item' : '' ?>"><a href="add_depositor.php">Add depositor</a></li>
                                        <li class="<?= $page == 'manage_depositor.php' ? 'active-item' : '' ?>"><a href="manage_depositor.php">Manage depositor</a></li>
                                    </ul>
                                </li>
                                <!--Deposit-->
                                <li class="has-child-item close-item <?= $page == 'deposit_milk.php' ? 'open-item' : '' ?><?= $page == '#' ? 'open-item' : '' ?>">
                                    <a><i class="fa fa-flask" aria-hidden="true"></i><span>Deposit</span></a>
                                    <ul class="nav child-nav level-1">
                                        <li class="<?= $page == 'deposit_milk.php' ? 'active-item' : '' ?>"><a href="deposit_milk.php">Deposit Milk</a></li>
                                        <li class="<?= $page == 'diposit_history.php' ? 'active-item' : '' ?>"><a href="diposit_history.php">Deposit History</a></li>
                                    </ul>
                                </li>
                                <!--sell milk-->
                                <li class="<?= $page == 'sell-milk.php' ? 'active-item' : '' ?>"><a href="sell-milk.php"><i class="fa fa-flask" aria-hidden="true"></i><span>Sell Milk</span></a></li>

                                
                                <!--UI ELEMENTENTS-->

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- CONTENT -->
            <!-- ========================================================= -->
            <div class="content">