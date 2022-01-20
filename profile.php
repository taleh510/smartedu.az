<?php 
include('header.php');
?>
<!-- Header End -->

<!-- Side Bar Start -->
<nav class="menu-left menu-left-open">
    <section id="Profile">
        <div class="row profile">
            <div class="col-lg-12">
                <div class="exit-ic">
                    <form method="post" action="logout">
                        <button> Cıxış<i class="fas fa-sign-out-alt"></i></button>
                    </form>
                </div>
                <div class="diss-b">
                    <button id="toggl"><i class="fas fa-times"></i></button>
                </div>
                <div class="profile-content">
                    <div class="profile-img">
                        <img src="./resources/img/profile-img-1.jpg" alt="">
                    </div>
                    <div class="edit-btn">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#edit"><i class="far fa-pen"></i> Editle</button>
                        <button class="balance" type="button" data-bs-toggle="modal" data-bs-target="#balance"><i class="far fa-wallet"></i> Balansım <span><?php echo $usercek['balans']; ?></span></button>
                    </div>
                    <div class="pr">
                        <div class="profile-info">
                            <h4>Ad</h4>
                            <span><?php echo $usercek['ad']; ?></span>
                        </div>
                        <hr>
                        <div class="profile-info">
                            <h4>Soyad</h4>
                            <span><?php echo $usercek['soyad']; ?></span>
                        </div>
                        <hr>
                        <div class="profile-info">
                            <h4>Mail</h4>
                            <span><?php echo $usercek['mail']; ?></span>
                        </div>
                        <hr>
                        <div class="profile-page">
                            <button class="left-blue-nav" type="button" data-open="content1">
                                <input type="radio" id="a25" name="shipping" checked />
                                <label for="a25">İmtahanlarım</label>
                            </button>
                            <button class="left-blue-nav" type="button" data-open="content2">
                                <input type="radio" id="a50" name="shipping" />
                                <label for="a50">Nəticələrim</label>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</nav>
<!-- Side Bar End -->

<!-- Modal edit Start -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="dr">
                    <img src="./resources/img/Group 74.svg" alt="">
                    <h3>Redakte Et</h3>
                </div>
                <div class="br">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <div class="modal-body">
                <form action="admin/netting/process" method="post">
                    <label for="">Ad</label>
                    <input type="text" name="ead" id="" placeholder="Ad" value="<?php echo $usercek['ad']; ?>">
                    <label for="">Soyad</label>
                    <input type="text" name="esoyad" id="" placeholder="Soyad" value="<?php echo $usercek['soyad']; ?>">
                    <label for="">E-mail</label>
                    <input type="email" name="email" id="" placeholder="E-mail" value="<?php echo $usercek['mail']; ?>">
                    <label for="">Şifrə</label>
                    <input type="password" name="esifre" id="" placeholder="Şifrə" value="<?php echo $usercek['sifre']; ?>">
                    <label for="">Nömrə</label>
                    <input type="number" name="enomre" id="" placeholder="Nömrə" value="<?php echo $usercek['nomre']; ?>">
                    <div class="modal-footer">
                        <button type="submit" name="uedit" data-bs-dismiss="modal">Yadda Saxla</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Modal edit End -->

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
                    <h4>Cari balans: <span>0 azn</span></h4>
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

<?php
$alan = $_SESSION['mail0'];
$ssorus = $db->prepare("SELECT * FROM se_sifarisler where alan like '%$alan%' ORDER BY vaxt ASC");
$ssorus->execute();
$ssay = $ssorus->rowCount();?>
<section id="Exam">
    <div class="container">
        <div class="extra" id="content1">
            <!-- Title Page Start -->
            <div class="container">
                <div class="row my-4 " style="text-align: center; color: #364A81;">
                    <div class="col-lg-12">
                        <div class="title">
                            <h2>İMTAHANLARIM</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Title Page End -->
            <div class="row my-5">
                <div class="row mb-2 exam-top">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="total-number">
                            <span>Ümumi imtahan sayı: <?php echo $ssay; ?> </span>
                        </div>
                    </div>
                </div>
                <?php
while($scek = $ssorus->fetch(PDO::FETCH_ASSOC)){
    $s1sorus = $db->prepare("SELECT * FROM se_exam where e_id=:e_id ORDER BY vaxt ASC");
    $s1sorus->execute(array('e_id'=>$scek['e_id']));
    $s1cek=$s1sorus->fetch(PDO::FETCH_ASSOC);
    ?>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <a href="exam-start.html">
                        <div class="exam-card">
                            <div class="exam-card-img">
                                <img src="./resources/img/jeshoots-com--2vD8lIhdnw-unsplash 1.png" alt="">
                            </div>
                            <div class="price-line">
                                <span>Ödəniş <strong> <?php echo $s1cek['qiymet'];?>azn</strong> </span>
                            </div>
                            <div class="exam-card-footer">
                                <strong><?php echo $s1cek['basliq'];?></strong>
                                <div class="exam-date">
                                    <span><?php echo $s1cek['tarix'];?></span>
                                    <span><?php echo $s1cek['tarix1'];?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php }?>

<!-- Exam Card Start -->

        <div class="extra" id="content2" style="display: block;">
            <!-- Title Page Start -->
            <div class="container">
                <div class="row my-4 " style="text-align: center; color: #364A81;">
                    <div class="col-lg-12">
                        <div class="title">
                            <h2>NƏTİCƏLƏRİM</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Title Page End -->
            <div class="row my-5">
                <div class="row mb-2 exam-top">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="total-number">
                            <span>Ümumi imtahan sayı: 12 </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <a href="result.html">
                        <div class="exam-card">
                            <div class="exam-card-img">
                                <img src="./resources/img/jeshoots-com--2vD8lIhdnw-unsplash 1.png" alt="">
                            </div>
                            <div class="price-line">
                                <span>Ödəniş <strong> 5.00 azn</strong> </span>
                            </div>
                            <div class="exam-card-footer">
                                <strong>11-ci sinif buraxılış imtahanı</strong>
                                <div class="exam-date">
                                    <span>12.09.2021</span>
                                    <span>13:00</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <a href="result.html">
                        <div class="exam-card">
                            <div class="exam-card-img">
                                <img src="./resources/img/jeshoots-com--2vD8lIhdnw-unsplash 1.png" alt="">
                            </div>
                            <div class="price-line">
                                <span>Ödəniş <strong> 5.00 azn</strong> </span>
                            </div>
                            <div class="exam-card-footer">
                                <strong>11-ci sinif buraxılış imtahanı</strong>
                                <div class="exam-date">
                                    <span>12.09.2021</span>
                                    <span>13:00</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <a href="result.html">
                        <div class="exam-card">
                            <div class="exam-card-img">
                                <img src="./resources/img/jeshoots-com--2vD8lIhdnw-unsplash 1.png" alt="">
                            </div>
                            <div class="price-line">
                                <span>Ödəniş <strong> 5.00 azn</strong> </span>
                            </div>
                            <div class="exam-card-footer">
                                <strong>11-ci sinif buraxılış imtahanı</strong>
                                <div class="exam-date">
                                    <span>12.09.2021</span>
                                    <span>13:00</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <a href="result.html">
                        <div class="exam-card">
                            <div class="exam-card-img">
                                <img src="./resources/img/jeshoots-com--2vD8lIhdnw-unsplash 1.png" alt="">
                            </div>
                            <div class="price-line">
                                <span>Ödəniş <strong> 5.00 azn</strong> </span>
                            </div>
                            <div class="exam-card-footer">
                                <strong>11-ci sinif buraxılış imtahanı</strong>
                                <div class="exam-date">
                                    <span>12.09.2021</span>
                                    <span>13:00</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <a href="result.html">
                        <div class="exam-card">
                            <div class="exam-card-img">
                                <img src="./resources/img/jeshoots-com--2vD8lIhdnw-unsplash 1.png" alt="">
                            </div>
                            <div class="price-line">
                                <span>Ödəniş <strong> 5.00 azn</strong> </span>
                            </div>
                            <div class="exam-card-footer">
                                <strong>11-ci sinif buraxılış imtahanı</strong>
                                <div class="exam-date">
                                    <span>12.09.2021</span>
                                    <span>13:00</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <a href="result.html">
                        <div class="exam-card">
                            <div class="exam-card-img">
                                <img src="./resources/img/jeshoots-com--2vD8lIhdnw-unsplash 1.png" alt="">
                            </div>
                            <div class="price-line">
                                <span>Ödəniş <strong> 5.00 azn</strong> </span>
                            </div>
                            <div class="exam-card-footer">
                                <strong>11-ci sinif buraxılış imtahanı</strong>
                                <div class="exam-date">
                                    <span>12.09.2021</span>
                                    <span>13:00</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('footer.php');?>