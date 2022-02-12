<?php
include 'header.php';
$ciphering = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$encryption_iv = '1234567891011121';
$encryption_key = "Deirvlon";
?>
<nav class="menu-left menu-left-open">
    <section id="Profile">
        <div class="row profile">
            <div class="col-lg-12">
                <div class="exit-ic" style="display: flex; justify-content:space-between;">
                    <form method="post" action="logout">
                        <button> Cıxış<i class="fas fa-sign-out-alt"></i></button>
                    </form>
                    <button id="toggl"><i class="fas fa-times"></i></button>
                </div>
                <!-- <div class="diss-b">

                </div> -->
                <div class="profile-content" style="height: 600px; overflow-y:scroll;">
                    <div class="profile-img">
                        <img src="./resources/img/profile-img-1.jpg" alt="">
                    </div>
                    <div class="edit-btn">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#edit"><i class="far fa-pen"></i>
                            Editle</button>
                        <button class="balance" type="button" data-bs-toggle="modal" data-bs-target="#balance"><i
                                class="far fa-wallet"></i> Balansım <span><?php echo $uc['balans']; ?></span></button>
                    </div>
                    <div class="pr">
                        <div class="profile-info">
                            <h4>Ad</h4>
                            <span><?php echo $uc['ad']; ?></span>
                        </div>
                        <hr>
                        <div class="profile-info">
                            <h4>Soyad</h4>
                            <span><?php echo $uc['soyad']; ?></span>
                        </div>
                        <hr>
                        <div class="profile-info">
                            <h4>Mail</h4>
                            <span><?php echo $uc['mail']; ?></span>
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
                <form action="admin/netting/process" method="get">
                    <label for="">Ad</label>
                    <input type="text" name="ead" id="" placeholder="Ad" value="<?php echo $uc['ad']; ?>">
                    <label for="">Soyad</label>
                    <input type="text" name="esoyad" id="" placeholder="Soyad" value="<?php echo $uc['soyad']; ?>">

                    <input hidden type="text" name="u_id" value="<?php echo $uc['u_id']; ?>">

                    <label for="">E-mail</label>
                    <input type="email" name="email" id="" placeholder="E-mail" value="<?php echo $uc['mail']; ?>">
                    <label for="">Şifrə</label>
                    <input type="password" name="esifre" id="" placeholder="Şifrə"
                        value="<?php echo openssl_decrypt($uc['sifre'], $ciphering, $encryption_key, $options, $encryption_iv); ?>">
                    <label for="">Nömrə</label>
                    <input type="number" name="enomre" id="" placeholder="Nömrə" value="<?php echo $uc['nomre']; ?>">
                    <div class="modal-footer">
                        <button type="submit" name="useredit" data-bs-dismiss="modal">Yadda Saxla</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

</div>
</div>
</div>

<?php
$alan = $_SESSION['mail0'];
$ss = $db->prepare("SELECT * FROM se_sifarisler where alan=:alan and status2=:status2 ORDER BY vaxt ASC");
$ss->execute(array('alan' => $alan, 'status2' => "Ödənilib"));
$ssay = $ss->rowCount();
$s2s = $db->prepare("SELECT * FROM se_neticeler where istirakci=:istirakci ORDER BY btarix ASC");
$s2s->execute(array('istirakci' => $alan));
$s2c = $s2s->fetch(PDO::FETCH_ASSOC);
$s2say = $s2s->rowCount();

?>
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
while ($sc = $ss->fetch(PDO::FETCH_ASSOC)) {
    $s1s = $db->prepare("SELECT * FROM se_exam where e_id=:e_id ORDER BY tarix ASC");
    $s1s->execute(array('e_id' => $sc['e_id']));
    $s1c = $s1s->fetch(PDO::FETCH_ASSOC);
    ?>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <a href="exam-info?e_id=<?php echo $sc['e_id'] ?>">
                        <div class="exam-card">
                            <div class="exam-card-img">
                                <img src="./resources/img/jeshoots-com--2vD8lIhdnw-unsplash 1.png" alt="">
                            </div>
                            <div class="price-line">
                                <span>Ödəniş <strong> <?php echo $s1c['qiymet']; ?>azn</strong> </span>
                            </div>
                            <div class="exam-card-footer">
                                <strong><?php echo $s1c['basliq']; ?></strong>
                                <div class="exam-date">
                                    <span><?php echo $s1c['tarix']; ?></span>
                                    <span><?php echo $s1c['tarix1']; ?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php }?>
            </div>

        </div>
    </div>
</section>

<section id="Exam">
    <div class="container">
        <div class="extra" id="content2">
            <!-- Title Page Start -->
            <div class="container">
                <div class="row my-4 " style="text-align: center; color: #364A81;">
                    <div class="col-lg-12">
                        <div class="title">
                            <h2>salam</h2>
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
while ($sc = $ss->fetch(PDO::FETCH_ASSOC)) {
    $s1s = $db->prepare("SELECT * FROM se_exam where e_id=:e_id ORDER BY tarix ASC");
    $s1s->execute(array('e_id' => $sc['e_id']));
    $s1c = $s1s->fetch(PDO::FETCH_ASSOC);
    ?>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <a href="exam-info?e_id=<?php echo $sc['e_id'] ?>">
                        <div class="exam-card">
                            <div class="exam-card-img">
                                <img src="./resources/img/jeshoots-com--2vD8lIhdnw-unsplash 1.png" alt="">
                            </div>
                            <div class="price-line">
                                <span>Ödəniş <strong> <?php echo $s1c['qiymet']; ?>azn</strong> </span>
                            </div>
                            <div class="exam-card-footer">
                                <strong><?php echo $s1c['basliq']; ?></strong>
                                <div class="exam-date">
                                    <span><?php echo $s1c['tarix']; ?></span>
                                    <span><?php echo $s1c['tarix1']; ?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php }?>
            </div>

        </div>
    </div>
</section>

<?php include 'footer.php';?>