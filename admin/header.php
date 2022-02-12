<?php
ob_start();
session_start();
include 'netting/connect.php';
if (empty($_SESSION['loginmail'])) {
    header("Location:login?nopermittion");
}
$as = $db->prepare("SELECT * FROM se_all_users where mail=:mail and stts=:stts1 or stts=:stts2");
$as->execute(array('mail' => $_SESSION['loginmail'], 'stts1' => "sa", 'stts2' => "sm"));
$ac = $as->fetch(PDO::FETCH_ASSOC);
$say = $as->rowCount();
if ($say = 0) {
    header("location:login?status=nopermittion");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Deirvlon Technologies</title>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="js/jbvalidator.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.jqueryui.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.jqueryui.min.css" />
    <link rel="stylesheet" href="../resources/css/form-css.css">
</head>

<body id="page-top">
    <?php 
$a1 = $db->prepare("SELECT * FROM se_all_users where mail=:mail");
$a1->execute(array('mail' => $_SESSION['loginmail']));
$ac1 = $a1->fetch(PDO::FETCH_ASSOC);
if($ac1['stts']=="sa"){
?>
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index">
                <div class="sidebar-brand-icon rotate-n-13">
                    <i class="fas fa-user-shield"></i>
                </div>
                <div class="sidebar-brand-text mx-2">Deirvlon Technologies</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="index">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Ana səhifə</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="allusers">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Bütün istifadəçilər</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="bm">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Bütün müəllimlər</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="muellimelave">
                    <i class="fas fa-fw fa-plus-circle"></i>
                    <span>Müəllim əlavə et</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="sinaqelave">
                    <i class="fas fa-plus-circle"></i>
                    <span>Sınaq əlavə et</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="imtahanlar">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>İmtahanlar</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="neticeler">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Nəticələr</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsemuellim"
                    aria-expanded="true" aria-controls="collapsemuellim">
                    <i class="fas fa-fw fa-search"></i>
                    <span>Axtarış</span>
                </a>
                <div id="collapsemuellim" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="kateqoriyalar">Kateqoriyalar</a>
                        <a class="collapse-item" href="nesriyyatcilar">Nəşriyyatçılar</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="about">
                    <i class="fas fa-fw fa-info-circle"></i>
                    <span>Haqqında</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">

        </ul>
        <?php } 
if($ac1['stts']=="sm"){
    ?>
        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index">
                    <div class="sidebar-brand-icon rotate-n-13">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <div class="sidebar-brand-text mx-2">Deirvlon Technologies</div>
                </a>
                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="index">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Ana səhifə</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="sinaqelave">
                        <i class="fas fa-plus-circle"></i>
                        <span>Sınaq əlavə et</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="imtahanlar">
                        <i class="fas fa-fw fa-file-alt"></i>
                        <span>İmtahanlar</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="neticeler">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Nəticələr</span></a>
                </li>

                <hr class="sidebar-divider d-none d-md-block">

            </ul>
            <?php } ?>
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                    aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small"
                                                placeholder="Search for..." aria-label="Search"
                                                aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button"
                                    data-toggle="dropdown" data-open="123" aria-haspopup="true" aria-expanded="false">
                                    <span
                                        class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['loginmail'] ?></span>
                                    <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown" id="123">
                                    <a class="dropdown-item" href="logout">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Çıxış
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>