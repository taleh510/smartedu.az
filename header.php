<?php
include 'admin/netting/connect.php';
ob_start();
session_start();
if (empty($_SESSION['mail0'])) {
   header("Location: index.php");
} else {
    $us = $db->prepare("SELECT * FROM se_all_users where mail=:mail");
    $us->execute(array('mail' => $_SESSION['mail0']));
    $uc = $us->fetch(PDO::FETCH_ASSOC);

    $esorus = $db->prepare("SELECT * FROM se_exam");
    $esorus->execute();
    $ksorus = $db->prepare("SELECT * FROM se_kateqoriya");
    $ksorus->execute();
    $nsorus = $db->prepare("SELECT * FROM se_nesriyyatcilar");
    $nsorus->execute();

    $mmail = $uc['mail'];
    if ($uc['vstts'] == "no") {
        header("Location: vertification?m=$mmail");
    } else {

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="resources/css/stylee.css">
    <!-- Responsive style -->
    <link rel="stylesheet" href="./resources/css/responsivee.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- form css -->
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
                        <button class="balance" type="button" data-bs-toggle="modal" data-bs-target="#balance"><i
                                class="far fa-wallet"></i> Balansım <span><?php echo $uc['balans'] ?>  ₼</span></button>
                        <a href="profile">
                            <div class="profile-img">
                                <div class="p-img">
                                    <img src="./resources/img/profile-img-1.jpg" alt="">
                                </div>
                                <span><?php echo $uc['ad'] . " " . $uc['soyad']; ?></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->


    <!-- Modal balance Start -->
    <div class="modal fade" id="balance" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="dr">
                        <img src="./resources/img/Group 74.svg" alt="">
                        <h3>Balansı Artır</h3>
                    </div>
                    <div class="br">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="total-balance">
                        <h4>Cari balans: <span><?php echo $uc['balans'] ?> azn</span></h4>
                    </div>
                    <form action="">
                        <label for="">Məbləğ (azn) </label>
                        <div class="b-i">
                            <input type="text" name="" id="" placeholder="1-100 azn">
                            <button>Ödəniş et</button>
                        </div>
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" data-bs-dismiss="modal">Daxil ol</button>
                </div> -->
            </div>
        </div>
    </div>

    <!-- Modal balance End -->
    <!-- Filter Section Start -->
    <section id="filter">
        <div class="container">
            <div class="row my-5">
                <div class="col-lg-12">

                    <form action="exam" method="get">
                        <div class="filter-item">
                            <div class="filtr">
                                <select class="form-select" aria-label="Default select example" name="nserc">
                                    <option selected>Kateqoriya</option>
                                    <?php while ($kcek = $ksorus->fetch(PDO::FETCH_ASSOC)) {
                                                $kateqoriya = $kcek['k_ad'];
                                                echo "<option value='$kateqoriya' > $kateqoriya </option>";
                                            } ?>
                                </select>

                            </div>
                            <div class="filtr">
                                <select class="form-select s-1" aria-label="Default select example" name="kserc">
                                    <option selected>Nəşriyyatçı</option>
                                    <?php while ($ncek = $nsorus->fetch(PDO::FETCH_ASSOC)) {
                                                $nesriyyatci = $ncek['n_ad'];
                                                echo "<option value='$nesriyyatci' > $nesriyyatci </option>";
                                            } ?>
                                </select>
                            </div>
                            <div class="search-btn">
                                <button type="submit" name="axtar" value="0"> <i class="fal fa-search"></i>
                                    Axtar</button>

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php }
} ?>