<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="">
    <title><?php echo $pageTitle; ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="<?php echo base_url() ?>assets/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/ckfinder/ckfinder.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
    <style>
        .error {
            color: red;
            font-weight: normal;
        }
    </style>
    <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <a href="<?php echo base_url(); ?>" class="logo">
                <span class="logo-mini"><b>N</b></span>
                <span class="logo-lg"><b>FCK</b></span>
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-history"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header"> Last Login : <i class="fa fa-clock-o"></i> <?= empty($last_login) ? "First Time Login" : $last_login; ?></li>
                            </ul>
                        </li>
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo base_url(); ?>assets/images/avatar.png" class="user-image" alt="User Image" />
                                <span class="hidden-xs"><?php echo $name; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">

                                    <img src="<?php echo base_url(); ?>assets/images/avatar.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $name; ?>
                                        <small><?php echo $role_text; ?></small>
                                    </p>

                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo base_url(); ?>profile" class="btn btn-warning btn-flat"><i class="fa fa-user-circle"></i> Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo base_url(); ?>logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="treeview">
                        <a href="<?php echo base_url(); ?>dashboard">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo base_url(); ?>" target="_blank">
                            <i class="fa fa-eye"></i> <span>View Website</span></i>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo base_url(); ?>upload">
                            <i class="fa fa-upload"></i>
                            <span>Upload Berita</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo base_url(); ?>daftar">
                            <i class="fa fa-newspaper-o"></i>
                            <span>Daftar Berita</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo base_url(); ?>tag">
                            <i class="fa fa-tags"></i>
                            <span>Tags</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo base_url(); ?>komen">
                            <i class="fa fa-newspaper-o"></i>
                            <span>Daftar Komentar</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo base_url(); ?>backup">
                            <i class="fa fa-database"></i>
                            <span>Backup Database</span>
                        </a>
                    </li>
                    <?php
                    if ($role == ROLE_ADMIN || $role == ROLE_MANAGER) {
                        ?>

                    <?php
                    }
                    if ($role == ROLE_ADMIN) {
                        ?>
                        <li class="treeview">
                            <a href="<?php echo base_url(); ?>userListing">
                                <i class="fa fa-users"></i>
                                <span>Users</span>
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>