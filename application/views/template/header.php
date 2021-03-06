<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php
        ini_set('memory_limit', '1024M');
    ?>
    <title>Admin</title>

    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url().'assets/template/startbootstrap-sb-admin-2-gh-pages'?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url().'assets/template/startbootstrap-sb-admin-2-gh-pages'?>/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo base_url().'assets/template/startbootstrap-sb-admin-2-gh-pages'?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>

    <!-- Modal Add by Ice -->

</head>
<script>

</script>


<body>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon">
                    <i class="fa fa-user-circle"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                MANAGEMENT
            </div>

            <!-- Nav Item - Activity Menu -->
            <li class="nav-item <?php if ($_SESSION['menu'] == 'activity_show_list' || $_SESSION['menu'] == 'activity_create'|| $_SESSION['menu'] == 'activity_update') echo 'active' ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-bullseye"></i>
                    <span>Activity</span>
                </a>
                <div id="collapseTwo" class="collapse <?php if ($_SESSION['menu'] == 'activity_show_list' || $_SESSION['menu'] == 'activity_create') echo 'show' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <div class="collapse-item <?php if ($_SESSION['menu'] == 'activity_show_list') echo 'active' ?>">
                            <?php echo anchor('/Activity/show_list', 'Activity List', array('style'=> 'text-decoration: none'));?>
                        </div>
                        <div class="collapse-item <?php if ($_SESSION['menu'] == 'activity_create') echo 'active' ?>">
                            <?php echo anchor('/Activity/create', 'Create Activity', array('style'=> 'text-decoration: none'));?>
                        </div>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Achievement Menu -->
            <li class="nav-item <?php if ($_SESSION['menu'] == 'achievement_show_list' || $_SESSION['menu'] == 'achievement_create' || $_SESSION['menu'] == 'achievement_update' || $_SESSION['menu'] == 'achievement_detail') echo 'active' ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa fa-trophy"></i>
                    <span>Achievement</span>
                </a>
                <div id="collapseUtilities" class="collapse <?php if ($_SESSION['menu'] == 'achievement_show_list' || $_SESSION['menu'] == 'achievement_create') echo 'show' ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <div class="collapse-item <?php if ($_SESSION['menu'] == 'achievement_show_list') echo 'active' ?>">
                            <?php echo anchor('/Achievement/show_list', 'Achievement List', array('style'=> 'text-decoration: none'));?>
                        </div>
                        <div class="collapse-item <?php if ($_SESSION['menu'] == 'achievement_create') echo 'active' ?>">
                            <?php echo anchor('/Achievement/create', 'Create Achievement', array('style'=> 'text-decoration: none'));?>
                        </div>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Nav Item - number -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <!-- <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?php echo $clu->clu_point; ?>  Point </span> -->
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['clu_point']?> Point </span>
                        </a>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Cluster 0</span>
                            <img class="img-profile rounded-circle" src="<?php echo base_url().'assets/template/startbootstrap-sb-admin-2-gh-pages'?>/img/undraw_profile.svg">
                        </a>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->