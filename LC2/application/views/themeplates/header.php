<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="<?= base_url('assets/') ?>img/cvlogo1.png" >
    <title><?= $judul; ?></title>
    <link href="<?= base_url('assets/') ?>css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-warning" style="background: linear-gradient(to top, #ffd700, #ffeb3b);">
    <a class="navbar-brand text-dark" href="#">
        <img src="<?= base_url('assets/') ?>img/cvlogo1.png" class="mr-2" width="50" height="50" name="logo">Cv. Lima Cahaya </a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group" hidden="true">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <?php
                   $role_id = $this->session->userdata('role_id');
                    if ($role_id == 1) { ?>
                        <a class="dropdown-item" href="<?= base_url('admin/edit'); ?>">Settings</a>
                        <a class="dropdown-item" href="<?= base_url('admin/changepassword'); ?>">Ganti Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>">Logout</a>
                    <?php } if ($role_id == 2) { ?>
                        <a class="dropdown-item" href="<?= base_url('sales/edit'); ?>">Settings</a>
                        <a class="dropdown-item" href="<?= base_url('sales/changepassword'); ?>">Ganti Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>">Logout</a>
                        <?php };?>
                </div>

            </li>
        </ul>
    </nav>