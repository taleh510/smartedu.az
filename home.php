<?php
include 'header.php';

if (empty($_SESSION['mail0'])) {
    header("location: index");
}
$esorus = $db->prepare("SELECT * FROM se_exam");
$esorus->execute();
//$ecek = $esorus->fetch(PDO::FETCH_ASSOC);
?>

<div class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./resources/img/WhatsApp Image 2022-01-18 at 12.57.51.jpeg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./resources/img/WhatsApp Image 2022-01-18 at 12.58.15.jpeg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./resources/img/WhatsApp Image 2022-01-18 at 12.58.37.jpeg" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>
</div>
<!-- Full Screen Carousel End -->

<!-- Exam Card Start -->


<?php

if (isset($_GET['axtar'])) {
    $kserc = $_GET['kserc'];
    $nserc = $_GET['nserc'];
    $axtar = $_GET['axtar'];
    if ($kserc == "Kateqoriya" and $nserc == "Nəşriyyatçı" or $axtar == "0") {
        $exsorus = $db->prepare("SELECT * FROM se_exam");
    } elseif ($kserc != "Kateqoriya" and $nserc != "Nəşriyyatçı" or $axtar == "0") {
        $exsorus = $db->prepare("SELECT * FROM se_exam where nesriyyatci like '%$nserc%' and kateqoriya like '%$kserc%' ");
    } elseif ($kserc != "Kateqoriya" and $nserc == "Nəşriyyatçı" or $axtar == "0") {
        $exsorus = $db->prepare("SELECT * FROM se_exam where kateqoriya like '%$kserc%' ");
    } elseif ($kserc == "Kateqoriya" and $nserc != "Nəşriyyatçı" or $axtar == "0") {
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
                                            <img src='./resources/img/jeshoots-com--2vD8lIhdnw-unsplash 1.png' alt=''>
                                        </div>
                                        <div class="price-line">
                                            <span>Ödəniş: <strong><?php echo $ecek['qiymet']; ?> AZN</strong> </span>
                                        </div>
                                        <div class="exam-card-footer">
                                            <strong> <?php echo $ecek['basliq']; ?></strong>
                                            <div class="exam-date">
                                                <span> <?php echo $ecek['tarix']; ?></span>
                                                <span><?php echo $ecek['tarix1']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        <?php }
                    } else {
                        $exsorus = $db->prepare("SELECT * FROM se_exam ORDER BY qeydiyyat Desc
                        LIMIT 3");
                        $exsorus->execute(); ?>
                        <section id="Exam">
                            <div class="container">
                                <div class="row my-5">
                                    <!-- <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                    <a href="exam-info">
                                        <div class="exam-card"> -->
                                    <div class="row mb-2 exam-top">
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                            <div class="total-number">
                                                <!-- <span>Ümumi imtahan sayı:</span> -->
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
                                                    <a href="exam-info?e_id=<?php echo $ecek['e_id'] ?>">
                                                        <div class="exam-card">
                                                            <div class="exam-card-img">
                                                                <img src='./resources/img/jeshoots-com--2vD8lIhdnw-unsplash 1.png' alt=''>
                                                            </div>
                                                            <div class="price-line">
                                                                <span>Ödəniş: <strong><?php echo $ecek['qiymet']; ?> AZN</strong> </span>
                                                            </div>
                                                            <div class="exam-card-footer">
                                                                <strong> <?php echo $ecek['basliq']; ?></strong>
                                                                <div class="exam-date">
                                                                    <span>Tarix: <?php echo $ecek['tarix']; ?></span>
                                                                    <span><?php echo $ecek['saat']; ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div> <?php }
                                                } ?>

                                        </div>
                                    </div>
                                </section>
                            </div>
                            </a>
                    </div>
                </div>
        </div>

        <?php include('footer.php'); ?>