<?php include('header2.php');
$e_id=$_GET['e_id'];
$es = $db->prepare("SELECT * FROM se_exam where e_id=:e_id");
$es->execute(array('e_id' => $e_id));
$ec = $es->fetch(PDO::FETCH_ASSOC);


?>
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

<!-- Title Page Start -->
<div class="container">
    <div class="row my-5 " style="text-align: center; color: #364A81;">
        <div class="col-lg-12">
            <div class="title">
                <h2>İMTAHANLAR</h2>
            </div>
        </div>
    </div>
</div>
<!-- Title Page End -->

<!-- Exam-info Start -->

<section id="Exam-info">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="exam-info-card">
                    <img src="./resources/img/jeshoots-com--2vD8lIhdnw-unsplash 1.png" alt="">
                    <div class="exam-info-footer">
                        <h3><?php echo $ec['basliq']; ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="info">
                    <div class="tb">
                        <h5>İmtahan qiyməti:</h5>
                        <span><?php echo $ec['qiymet']; ?> AZN</span>
                    </div>
                    <div class="tb">
                        <h5>İmtahan tarixi:</h5>
                        <span><?php echo $ec['tarix']; ?>, <?php echo $ec['saat']; ?></span>
                    </div>
                    <div class="tb">
                        <h5>İmtahan müddəti:</h5>
                        <span><?php echo $ec['tarix1']; ?> dəqiqə</span>
                    </div>
                    <div class="tb">
                        <h5>Bölmə:</h5>
                        <span><?php echo $ec['bolme']; ?></span>
                    </div>
                    <div class="tb">
                        <h5>Nəşriyyatçı:</h5>
                        <span><?php echo $ec['nesriyyatci']; ?></span>
                    </div>
                    <div class="tb">
                        <h5>İmtahan fənləri</h5>
                        <?php  $jdk = (json_decode(base64_decode(json_encode($ec['fennler']))));

                        for($i=1;$i<=$ec['fsay'];$i++){

                            echo  '<span>'. $jdk->{"fenn".$i}. " - ".$jdk->{"sual".$i}.' sual</span>';}?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="title-theme-exam">
                <h4>İmtahan mövzuları:</h4>
            </div>
            <?php  for($i=1;$i<=$ec['fsay'];$i++){
                  echo '
                <div class="col-lg-12">
                    <div class="theme-exam">
                        <h5>'.$jdk->{"fenn".$i}.':</h5>
                        <span>'.$jdk->{"movzu".$i}.'</span>
                    </div>
                </div>';}
                
                $ahr = "admin/netting/process.php?e_id=".$e_id."&by=".$_SESSION['mail0']."&getexam=";
                $imtahaniyoxla0 = $db->prepare("SELECT * FROM se_sifarisler where e_id=:e_id and alan=:alan");
                $imtahaniyoxla0->execute(array('e_id' => $_GET['e_id'],'alan' => $_SESSION['mail0']));
                $iyc0 = $imtahaniyoxla0->fetch(PDO::FETCH_ASSOC);
                if( $imtahaniyoxla0->rowCount()>=1){

                    if($iyc0['status2']=="Ödənilib"){ ?>
            <div class="col-lg-12">
                <div class="exam-btn">
                    <!-- <a href="test?e_id=<?php // echo $e_id ?>"></a> -->
                    <button type="button" data-bs-toggle="modal" data-bs-target="#exam-start">İmtahana daxil ol</button>
                </div>
            </div>
            <?php }
            elseif($iyc0['status2']=="Ödənilməyib"){?>
            <div class="col-lg-12">
                <div class="exam-btn">
                    <a href="<?php echo $ahr ?>"><button>İmtahanı əldə et</button></a>
                </div>
            </div> <?php }} 
            else{?>
            <div class="col-lg-12">
                <div class="exam-btn">
                    <a href="<?php echo $ahr ?>"><button>İmtahanı əldə et</button></a>
                </div>
            </div>
            <?php }
             ?>

        </div>

    </div>
</section>
<!-- Exam-info End -->

<div class="modal fade" id="exam-start" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="dr">
                    <h3>Imtahan </h3>
                </div>
                <div class="br">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <div class="modal-body">
                <div class="title-info-exam">
                    <h5>İmtahan tarixi: <span><?php echo $ec['tarix'] ?></span></h5>
                </div>
                <div class="row lr-info my-5 ">
                    <div class="col-lg-6">
                        <div class="left">
                            <div class="info-sektor">
                                <h5>Bölmə:</h5>
                                <span><?php echo $ec['bolme'] ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="right">
                            <div class="info-subject">
                                <h5>İmtahan fənləri:</h5>
                                <?php  $jdk = (json_decode(base64_decode(json_encode($ec['fennler']))));

                        for($i=1;$i<=$ec['fsay'];$i++){

                            echo  '<span>'. $jdk->{"fenn".$i}. " - ".$jdk->{"sual".$i}.' sual</span>';}?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-3 exam-r-b">
                    <div class="col-lg-5">
                        <div class="exam-time-range">
                            <span>Başlama vaxtı: <?php echo $ec['saat'] ?></span>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="exam-time-range">
                            <img src="./resources/img/Vector (12).svg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="exam-time-range">
                            <span>Bitmə vaxtı: <?php echo date_create($ec['bitisvaxti'])->format('H:i') ?></span>
                        </div>
                    </div>
                </div>
                <div class="row exam-b">
                    <div class="col-lg-6">
                        <div class="exam-start-b">
                            <a href="test?e_id=<?php echo $e_id ?>"><button class="start-ex">İmtahana Başla</button></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="exam-start-b">
                            <button class="end-ex" data-bs-dismiss="modal">İmtahanı Ləğv et</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">
                    <button type="button" data-bs-dismiss="modal">Daxil ol</button>
                </div> -->
        </div>
    </div>
</div>

<?php include('footer.php');?>