<?php
ob_start();
session_start();
include 'admin/netting/connect.php';
if (!empty($_SESSION['mail0'])) {
    header("Location: home");
}
$esorus = $db->prepare("SELECT * FROM se_exam");
$esorus->execute();
$ksorus = $db->prepare("SELECT * FROM se_kateqoriya");
$ksorus->execute();
$nsorus = $db->prepare("SELECT * FROM se_nesriyyatcilar");
$nsorus->execute();

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

    <title>EduSmart-Sınaq İmtahanı</title>
</head>

<body>
    <!-- Header Start -->
    <header class="homepage">
        <div class="container">
            <div class="row navg">
                <div class="col-lg-4">
                    <a href="">
                        <div class="logo-img">
                            <img src="./resources/img/Group 180 (1).svg" alt="">
                        </div>
                    </a>
                </div>
                <div class="col-lg-8">
                    <div class="header-item">
                        <form method="post" action="sign-in">
                            <button type="submit">Daxil ol</button>
                        </form>
                        <form method="post" action="register">
                            <button type="submit">Qeydiyyat</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Homepage Section Start -->
    <section id="home">
        <div class="container">
            <div class="row home my-5">
                <div class="col-lg-6">
                    <div class="home-left">
                        <h1>Sən də qəbul imtahanında
                            yüksək bal toplamaq
                            istəyirsən?</h1>
                        <h2>Elə indi <strong>SmartEDU</strong> ilə
                            online sınaqlara qoşul!</h2>
                        <span><strong>SmartEDU-nun</strong> online sınaqları ilə
                            seçilmiş suallarla ixtisas qruplarına
                            uyğun özünü sınağa çək!</span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="home-right">
                        <img src="./resources/img/Group 252.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Homepage Section End -->

    <!-- Filter Section Start -->
    <section id="filter">
        <div class="container">
            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="filter-item">
                        <div class="filtr">
                            <section id="filter">
                                <div class="container">
                                    <div class="row my-5">
                                        <div class="col-lg-12">

                                            <form action="exam" method="get">
                                                <div class="filter-item">
                                                    <div class="filtr">
                                                        <select class="form-select" aria-label="Default select example"
                                                            name="nserc">
                                                            <option selected>Nəşriyyatçı</option>
                                                            <?php while ($kcek = $ksorus->fetch(PDO::FETCH_ASSOC)) {
                                                                $kateqoriya = $kcek['k_ad'];
                                                                echo "<option value='$kateqoriya' > $kateqoriya </option>";
                                                            } ?>
                                                        </select>
                                                    </div>
                                                    <div class="filtr">
                                                        <select class="form-select s-1"
                                                            aria-label="Default select example" name="kserc">
                                                            <option selected>Kateqoriya</option>
                                                            <?php while ($ncek = $nsorus->fetch(PDO::FETCH_ASSOC)) {
                                                                $nesriyyatci = $ncek['n_ad'];
                                                                echo "<option value='$nesriyyatci' > $nesriyyatci </option>";
                                                            } ?>
                                                        </select>
                                                    </div>
                                                    <div class="search-btn">

                                                        <button type="submit" name="axtar"> <i
                                                                class="fal fa-search"></i> Axtar</button>

                                                    </div>

                                                </div>
                                            </form>

                                        </div>

                                        <!-- </div></div> -->

                                        <?php

                                if (isset($_GET['axtar'])) {
                                    $kserc = $_GET['kserc'];
                                    $nserc = $_GET['nserc'];
                                    if ($kserc == "Kateqoriya" and $nserc == "Nəşriyyatçı") {
                                        $exsorus = $db->prepare("SELECT * FROM se_exam");
                                    } elseif ($kserc != "Kateqoriya" and $nserc != "Nəşriyyatçı") {
                                        $exsorus = $db->prepare("SELECT * FROM se_exam where nesriyyatci like '%$nserc%' and kateqoriya like '%$kserc%' ");
                                    } elseif ($kserc != "Kateqoriya" and $nserc == "Nəşriyyatçı") {
                                        $exsorus = $db->prepare("SELECT * FROM se_exam where kateqoriya like '%$kserc%' ");
                                    } elseif ($kserc == "Kateqoriya" and $nserc != "Nəşriyyatçı") {
                                        $exsorus = $db->prepare("SELECT * FROM se_exam where nesriyyatci like '%$nserc%' ");
                                    }
                                    $exsorus->execute();
                                    $say = $exsorus->rowCount();
                                ?>
                                        <section id="Exam">
                                            <div class="container">
                                                <div class="row my-5">
                                                    <div class="row mb-2 exam-top">
                                                        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                            <div class="total-number">
                                                                <span>Ümumi imtahan sayı: <?php echo $say ?> </span>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                            <div class="learn-more">
                                                                <a href="exam">Hamısına bax</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <section id="Exam">
                                                    <div class="container">
                                                        <div class="row my-5">
                                                            <?php while ($ecek = $exsorus->fetch(PDO::FETCH_ASSOC)) { ?>

                                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                                <a href="exam-info?e_id=<?php echo $ecek['e_id']; ?>">
                                                                    <div class="exam-card">
                                                                        <div class="exam-card-img">
                                                                            <img src='./resources/img/jeshoots-com--2vD8lIhdnw-unsplash 1.png'
                                                                                alt=''>
                                                                        </div>
                                                                        <div class="price-line">
                                                                            <span>Ödəniş
                                                                                <strong><?php echo $ecek['qiymet']; ?>
                                                                                    AZN</strong> </span>
                                                                        </div>
                                                                        <div class="exam-card-footer">
                                                                            <strong>
                                                                                <?php echo $ecek['basliq']; ?></strong>
                                                                            <div class="exam-date">
                                                                                <span>
                                                                                    <?php echo $ecek['tarix']; ?></span>
                                                                                <span><?php echo $ecek['tarix1']; ?></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>

                                                            <?php }
                                                    } else {
                                                        $exsorus = $db->prepare("SELECT * FROM se_exam ORDER BY qeydiyyat DESC LIMIT 6");
                                                        $exsorus->execute(); ?>
                                                            <section id="Exam">
                                                                <div class="container">
                                                                    <div class="row my-5">
                                                                        <!-- <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                    <a href="exam-info">
                                        <div class="exam-card"> -->
                                                                        <div class="row mb-2 exam-top">
                                                                            <div
                                                                                class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                                                <div class="total-number">
                                                                                    <!-- <span>Ümumi imtahan sayı:</span> -->
                                                                                </div>
                                                                            </div>

                                                                            <div
                                                                                class="col-lg-6 col-md-12 col-sm-12 col-12">

                                                                                <div class="learn-more">
                                                                                    <a href="exam">Hamısına bax</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <section id="Exam">
                                                                        <div class="container">
                                                                            <div class="row my-5">
                                                                                <?php while ($ecek = $exsorus->fetch(PDO::FETCH_ASSOC)) { ?>

                                                                                <div
                                                                                    class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                                                    <a
                                                                                        href="exam-info?e_id=<?php echo $ecek['e_id']; ?>">
                                                                                        <div class="exam-card">
                                                                                            <div class="exam-card-img">
                                                                                                <img src='./resources/img/jeshoots-com--2vD8lIhdnw-unsplash 1.png'
                                                                                                    alt=''>
                                                                                            </div>
                                                                                            <div class="price-line">
                                                                                                <span>Ödəniş:
                                                                                                    <strong><?php echo $ecek['qiymet']; ?>
                                                                                                        AZN</strong>
                                                                                                </span>
                                                                                            </div>
                                                                                            <div
                                                                                                class="exam-card-footer">
                                                                                                <strong>
                                                                                                    <?php echo $ecek['basliq']; ?></strong>
                                                                                                <div class="exam-date">
                                                                                                    <span> Tarix:
                                                                                                        <?php echo $ecek['tarix']; ?></span>
                                                                                                    <span><?php echo $ecek['saat']; ?></span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                </div> <?php }
                                                                                } ?>

                                                                    </section>
                                                                </div>
                                                        </div>
                                                    </div>
                                            </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
</body>
<?php include('footer.php'); ?>