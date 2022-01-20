<?php 
ob_start();
session_start();
include 'admin/netting/connect.php';
$usersor = $db->prepare("SELECT * FROM se_all_users where mail=:mail");
$usersor->execute(array('mail'=>$_SESSION['mail0']));
$usercek = $usersor->fetch(PDO::FETCH_ASSOC);
 if($_SESSION['mail0']==''){header("Location: ./");}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="./resources/css/responsive.css">
    <link rel="stylesheet" href="./resources/css/style.css">
    <link rel="stylesheet" href="./resources/css/stylee.css">
    <!-- responsive style -->
    <link rel="stylesheet" href="./resources/css/responsivee.css">
    <title>EduSmart-Sınaq İmtahanı</title>
</head>

<body>
    <!-- Header Start -->
    <header>
        <div class="container">
            <div class="row navg">
                <div class="col-lg-4">
                    <a href="home">
                        <div class="logo-img">
                            <img src="./resources/img/Group 180.svg" alt="">
                        </div>
                    </a>
                </div>
                <div class="col-lg-8">
                    <div class="header-item">
                        <button class="balance" type="button" data-bs-toggle="modal" data-bs-target="#balance"><i class="far fa-wallet"></i> Balansım <span><?php echo $usercek['balans'] ?></span></button>
                        <a href="profile">
                            <div class="profile-img">
                                <div class="p-img">
                                    <img src="./resources/img/profile-img-1.jpg" alt="">
                                </div>
                                <span><?php echo $usercek['ad']." ".$usercek['soyad'];?></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>