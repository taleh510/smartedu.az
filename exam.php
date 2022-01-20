<?php
session_start();

if (empty($_SESSION['mail0'])) {
    include('h3.php');
} else {
    session_write_close();
    include('header.php');
}

?>

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
                <!-- <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <a href="exam-info">
                        <div class="exam-card"> -->
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
                                <a href="exam-info">
                                    <div class="exam-card">
                                        <div class="exam-card-img">
                                            <img src='./resources/img/jeshoots-com--2vD8lIhdnw-unsplash 1.png' alt=''>
                                        </div>
                                        <div class="price-line">
                                            <span>Ödəniş <strong><?php echo $ecek['qiymet']; ?> AZN</strong> </span>
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
                        $exsorus = $db->prepare("SELECT * FROM se_exam ORDER BY qeydiyyat ASC");
                        $exsorus->execute();
                        $say = $exsorus->rowCount();
                        ?>
                        <section id="Exam">
                            <div class="container">
                                <div class="row my-5">
                                    <!-- <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                    <a href="exam-info">
                                        <div class="exam-card"> -->
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
                                                    <a href="exam-info">
                                                        <div class="exam-card">
                                                            <div class="exam-card-img">
                                                                <img src='./resources/img/jeshoots-com--2vD8lIhdnw-unsplash 1.png' alt=''>
                                                            </div>
                                                            <div class="price-line">
                                                                <span>Ödəniş <strong><?php echo $ecek['qiymet']; ?> AZN</strong> </span>
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