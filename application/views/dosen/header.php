<!--

=========================================================
* Now UI Dashboard - v1.5.0
=========================================================

* Product Page: https://www.creative-tim.com/product/now-ui-dashboard
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Designed by www.invisionapp.com Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        <?php echo $title?>
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="<?=base_url('assets/fontawesome/css/all.css')?>">
    <!-- CSS Files -->
    <link href="<?=base_url('assets/admin/css/bootstrap.min.css')?>" rel="stylesheet" />
    <link href="<?=base_url('assets/admin/css/now-ui-dashboard.css')?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?=base_url('assets/admin/css/datatables.min.css')?>">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?=base_url('assets/admin/demo/demo.css')?>" rel="stylesheet" />
    <link rel="shorcut icon" type="image/ico" href="<?=base_url('assets/img/favicon.ico')?>">
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="blue">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
            <div class="logo">
                <a href="#" class="simple-text logo-mini">
                    SIKP
                </a>
                <a href="#" class="simple-text logo-normal">
                    V 1.0.0
                </a>
            </div>
            <div class="sidebar-wrapper" id="sidebar-wrapper">
                <ul class="nav">
                    <li id="menu_beranda">
                        <a href="<?=base_url('Dosen/Dosen')?>">
                            <i class="now-ui-icons design_app"></i>
                            <p>Beranda</p>
                        </a>
                    </li>
                    <li id="menu_bimbingan">
                        <a href="<?=base_url('Dosen/Bimbingan')?>">
                            <i class="now-ui-icons files_single-copy-04"></i>
                            <p>Bimbingan</p>
                        </a>
                    </li>
                    <li id="menu_rek_judul">
                        <a href="<?=base_url('Dosen/Rek_judul')?>">
                            <i class="now-ui-icons education_agenda-bookmark"></i>
                            <p>Rekomendasi Judul</p>
                        </a>
                    </li>
                    <li id="menu_jadwal_menguji">
                        <a href="<?=base_url('Dosen/Jadwal_menguji')?>">
                            <i class="now-ui-icons design-2_ruler-pencil"></i>
                            <p>JADWAL MENGUJI</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel" id="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form>
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Cari...">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="now-ui-icons ui-1_zoom-bold"></i>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <i class="now-ui-icons media-2_sound-wave"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Stats</span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item" id="menu_profile">
                                <a class="nav-link" href="<?=base_url('Dosen/Profile')?>">
                                    <i class="now-ui-icons users_single-02"></i> Profil
                                    <p>
                                        <span class="d-lg-none d-md-block">Profile</span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=base_url('Mahasiswa/Mahasiswa/logout')?>">
                                    <i class="now-ui-icons sport_user-run"></i> Keluar
                                    <p>
                                        <span class="d-lg-none d-md-block">Keluar</span>
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->