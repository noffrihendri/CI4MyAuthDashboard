<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/admin-lte/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="/assets/admin-lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <link rel="stylesheet" href="/assets/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/assets/admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/assets/admin-lte/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/admin-lte/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/assets/admin-lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/assets/admin-lte/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/assets/admin-lte/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="<?= base_url('/assets/ckeditor4/ckeditor.js') ?>"></script>


    <script src="<?= base_url()?>/assets/jquery/jquery-3.5.1.min.js"></script>
   


    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="<?=base_url('/assets/bootstrap/css/bootstrap-select.min.css')?>"> -->



</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url(); ?>" class="brand-link">

                <span class="brand-text font-weight-light align-center">Selamat Datang</span>
            </a>


            <?= $this->include('navbar'); ?>

        </aside>






        <div class="body">

            <body class="hold-transition sidebar-mini">

                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->

                    <?php
                    $msgHeader = session()->getFlashdata('message_header');
                    if (!empty($msgHeader)) {
                        $msgTipe = $msgHeader['tipe'];
                        $msgIcon = "";
                        switch ($msgTipe) {
                            case "danger":
                                $msgIcon = "fa-ban";
                                break;
                            case "success":
                                $msgIcon = "fa-check";
                                break;
                            case "warning":
                                $msgIcon = "fa-warning";
                                break;
                            case "info":
                                $msgIcon = "fa-info";
                                break;
                        }
                    ?>
                        <div class="alert alert-<?= $msgTipe; ?> alert-dismissable" id="message_header">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h4><?= $msgHeader['title']; ?></h4>
                            <?= $msgHeader['message']; ?>
                        </div>
                    <?php
                    }
                    ?>

                    <?php echo $this->renderSection('content'); ?>



                </div>
            </body>
        </div>







        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->

    <!-- jQuery -->
    <script src="<?= base_url('/assets/admin-lte/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script src="<?= base_url('/assets/jquery/jquery-ui-1.9.2.custom/jquery-ui-1.9.2.custom.min.js')?>" type="text/javascript">  </script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('/assets/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- ChartJS -->
    <script src="<?= base_url('/assets/admin-lte/plugins/chart.js/Chart.min.js') ?>"></script>
    <!-- Sparkline -->
    <script src="<?= base_url('/assets/admin-lte/plugins/sparklines/sparkline.js') ?>"></script>
    <!-- JQVMap -->
    <script src="<?= base_url('/assets/admin-lte/plugins/jqvmap/jquery.vmap.min.js') ?>"></script>
    <script src="<?= base_url('/assets/admin-lte/plugins/jqvmap/maps/jquery.vmap.usa.js') ?>"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= base_url('assets/admin-lte/plugins/jquery-knob/jquery.knob.min.js') ?>"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url('/assets/admin-lte/plugins/moment/moment.min.js') ?>"></script>
    <script src="<?= base_url('/assets/admin-lte/plugins/daterangepicker/daterangepicker.js') ?>"></script>

    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url('/assets/admin-lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>

    <!-- Summernote -->
    <script src="<?= base_url('/assets/admin-lte/plugins/summernote/summernote-bs4.min.js') ?>"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url('/assets/admin-lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('/assets/admin-lte/dist/js/adminlte.js') ?>"></script>


    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?= base_url('/assets/admin-lte/dist/js/pages/dashboard.js') ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('/assets/admin-lte/dist/js/demo.js') ?>"></script>

    <!-- DataTables -->
    <script src="<?= base_url('/assets/admin-lte/plugins/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?= base_url('/assets/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') ?>"></script>

    <!-- Bootstrap 4 -->



    <script src="<?= base_url('/assets/js/topindo.js') ?>"></script>

    <!-- page script -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/js/Tagit/css/jquery-ui-base-1.8.20.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/js/Tagit/css/tagit-dark-grey.css">
    <script type="text/javascript" src="<?php echo base_url();?>/assets/js/Tagit/tagit.js"></script>
    <script type="text/javascript" src="<?php echo site_url('news/tagit'); ?>"></script>




    <script src="<?= base_url('/assets/js/tinymce/tinymce.min.js') ?>" type="text/javascript"></script>
    <script src="<?= base_url('/assets/js/nicedit/nicEdit.js') ?>" type="text/javascript"></script>

 


    
</script>
</body>

</html>