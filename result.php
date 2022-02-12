<?php include 'header2.php';
$e_id = $_GET['e_id'];
$rs1 = $db->prepare("SELECT * FROM se_exam where e_id=:e_id");
$rs1->execute(array('e_id' => $e_id));
$rc1 = $rs1->fetch(PDO::FETCH_ASSOC);

$rs2 = $db->prepare("SELECT * FROM se_neticeler where e_id=:e_id and istirakci=:istirakci");
$rs2->execute(array('e_id' => $e_id, 'istirakci' => $_SESSION['mail0']));
$rc2 = $rs2->fetch(PDO::FETCH_ASSOC);

$rs3 = $db->prepare("SELECT * FROM se_all_users where mail=:mail");
$rs3->execute(array('mail' => $_SESSION['mail0']));
$rc3 = $rs3->fetch(PDO::FETCH_ASSOC);

$rsduz = $db->prepare("SELECT * FROM se_yoxlamalar where e_id=:e_id and istirakci=:istirakci and stts3=:stts3");
$rsduz->execute(array('istirakci' => $_SESSION['mail0'], 'e_id' => $e_id, 'stts3' => "Düz"));
$rsduzsay = $rsduz->rowCount();
$rcduz = $rsduz->fetch(PDO::FETCH_ASSOC);

$rssehv = $db->prepare("SELECT * FROM se_yoxlamalar where e_id=:e_id and istirakci=:istirakci and stts3=:stts3");
$rssehv->execute(array('istirakci' => $_SESSION['mail0'], 'e_id' => $e_id, 'stts3' => "Səhv"));
$rssehvsay = $rssehv->rowCount();
$rcsehv = $rssehv->fetch(PDO::FETCH_ASSOC);

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
        </div>
    </div>
</div>

<section class="results">
    <div class="container">
        <div class="result-head">
            <div class="result-heading">
                <h1>
                    <?php echo $rc1['basliq'] ?>
                </h1>
            </div>
            <div class="students-name">
                <h4>Şagird: <?php echo ($rc3['ad'] . " " . $rc3['soyad']); ?></h4>
                <p>Ümumi bal:
                    <?php
if ($rc2['netice'] < 0) {
    echo 0;
} else {
    echo $rc2['netice'];
}
?></p>
            </div>
            <div class="search">
                <div class="for-search">
                    <i class="fal fa-search"></i>
                    <input type="text" placeholder="Sual nömrəsi axtar">
                </div>
                <button>
                    Axtar
                </button>
            </div>
            <div class="answers">
                <div class="answer-item ">
                    <div class="true">
                        <div class="true-answer">
                        </div>
                    </div>
                    <p>Düzgün cavablar</p>
                </div>
                <div class="answer-item">
                    <div class="false">
                        <div class="false-answer">
                        </div>
                    </div>
                    <p>Səhv cavablar</p>
                </div>
            </div>
            <div class="answer-number">
                <p>
                    Düzgün cavabların sayı: <?php echo $rsduzsay; ?>
                </p>
                <p>
                    Səhv cavabların sayı: <?php echo $rssehvsay; ?>
                </p>
            </div>
        </div>

        <?php $es2 = $db->prepare("SELECT * FROM se_suallar where e_id=:e_id order by sira asc");
$es2->execute(array('e_id' => $e_id));?>
        <form method="get"
            action="admin/netting/process.php?c_exam=<?php echo $currentimtahan ?>&c_s=<?php echo $cs ?>"><?php
while ($ec2 = $es2->fetch(PDO::FETCH_ASSOC)) {

    $rss1 = $db->prepare("SELECT * FROM se_yoxlamalar where e_id=:e_id and istirakci=:istirakci and s_id=:s_id");
    $rss1->execute(array('istirakci' => $_SESSION['mail0'], 'e_id' => $e_id, 's_id' => $ec2['s_id']));
    $rcc1 = $rss1->fetch(PDO::FETCH_ASSOC);

    $rss2 = $db->prepare("SELECT * FROM se_suallar where e_id=:e_id  and s_id=:s_id order by sira");
    $rss2->execute(array('e_id' => $e_id, 's_id' => $ec2['s_id']));
    $rcc2 = $rss2->fetch(PDO::FETCH_ASSOC);

    if ($ec2['tip'] == "yazili") {
        echo '
                <div class="question-card">
                    <div class="question-content">
                        <div class="question">
                            <h4>Sual ' . $rcc2['sira'] . '</h4>
                            <p>
                               ' . $ec2['basliq'] . '
                            </p>
                        </div>
                        <div class="questions-answer">
                            <h4>Cavab</h4>
                            <div class="open-answer">
                                <div class="open-answer-content">
                                    <p>
                                       ' . $rcc1['cavab'] . '
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="explanation" style= " display:flex ">
                        <div class="ex mx-2" style="width:70%;">
                            <h4>Qeyd</h4>
                            <div class="explain">
                                <div class="explain-content">';
        echo '<p>
                                           ' . $rcc1['qeyd'] . '
                                        </p>';
        echo ' </div></div></div>
                             <div class="ex" style="width:30%">
                             <h4>Nəticə</h4>
                             <div class="explain">
                                 <div class="explain-content">';
        if ($rcc1['stts3'] == "Düz") {
            echo '<p>' . $rcc2['verdiyibal'] . ' / ' . $rcc1['qiymet'] . '</p>';} elseif ($rcc1['stts3'] == "Səhv") {
            echo '<p>' . $rcc2['verdiyibal'] . ' / 0
                                         </p>';}
        echo ' </div>
                             </div></div>

                        </div>
                    </div>
                </div>';}

    if ($ec2['tip'] == "ses") {
        echo '
                            <div class="question-card">
                                <div class="question-content">
                                    <div class="question">
                                        <h4>Sual ' . $rcc2['sira'] . '</h4>
                                        <p>
                                           ' . $ec2['basliq'] . '
                                        </p>
                                        <div class="voice-question">
                                <audio controls autoplay muted>
                                    <source src="admin/img' . $rcc2['variant'] . '" type="audio/ogg">
                                  Your browser does not support the audio element.
                                </audio>
                            </div>
                                    </div>
                                    <div class="questions-answer">
                                        <h4>Cavab</h4>
                                        <div class="open-answer">
                                            <div class="open-answer-content">
                                                <p>
                                                   ' . $rcc1['cavab'] . '
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="explanation" style= " display:flex ">
                                    <div class="ex mx-2" style="width:70%;">
                                        <h4>Qeyd</h4>
                                        <div class="explain">
                                            <div class="explain-content">';
        echo '<p>' . $rcc1['qeyd'] . '</p>';
        echo ' </div></div></div>
                                         <div class="ex" style="width:30%">
                                         <h4>Nəticə</h4>
                                         <div class="explain">
                                             <div class="explain-content">';
        if ($rcc1['stts3'] == "Düz") {echo '<p>' . $rcc2['verdiyibal'] . ' / ' . $rcc1['qiymet'] . '</p>';} elseif ($rcc1['stts3'] == "Səhv") {echo '<p>' . $rcc2['verdiyibal'] . ' / 0</p>';}
        echo '
                                            </div>
                                         </div>
                                         </div>
                                    </div>
                                </div>
                            </div>';}

    if ($ec2['tip'] == "video") {
        echo '
                                        <div class="question-card">
                                            <div class="question-content">
                                                <div class="question">
                                                    <h4>Sual ' . $rcc2['sira'] . '</h4>
                                                    <p>
                                                       ' . $ec2['basliq'] . '
                                                    </p>
                                                    <div class="video-question">
                                                    <video width="" height="240" controls>
                                                        <source src="admin/img' . $rcc2['variant'] . '" type="video/mp4">
                                                    </video>
                                                </div>
                                                </div>
                                                <div class="questions-answer">
                                                    <h4>Cavab</h4>
                                                    <div class="open-answer">
                                                        <div class="open-answer-content">
                                                            <p>
                                                               ' . $rcc1['cavab'] . '
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="explanation" style= " display:flex ">
                                                <div class="ex mx-2" style="width:70%;">
                                                    <h4>Qeyd</h4>
                                                    <div class="explain">
                                                        <div class="explain-content">';
        echo '<p>' . $rcc1['qeyd'] . '</p>';
        echo ' </div></div></div>
                                                     <div class="ex" style="width:30%">
                                                     <h4>Nəticə</h4>
                                                     <div class="explain">
                                                         <div class="explain-content">';
        if ($rcc1['stts3'] == "Düz") {echo '<p>' . $rcc2['verdiyibal'] . ' / ' . $rcc1['qiymet'] . '</p>';} elseif ($rcc1['stts3'] == "Səhv") {echo '<p>' . $rcc2['verdiyibal'] . ' / 0</p>';}
        echo '
                                                        </div>
                                                     </div>
                                                     </div>
                                                </div>
                                            </div>
                                        </div>';}

    if ($ec2['tip'] == "sekil") {
        echo '
                                                    <div class="question-card">
                                                        <div class="question-content">
                                                            <div class="question">
                                                                <h4>Sual ' . $rcc2['sira'] . '</h4>
                                                                <p>
                                                                   ' . $ec2['basliq'] . '
                                                                </p>
                                                                <div class="img-question">
                                                                <img src="admin/img' . $rcc2['variant'] . '" width="600" height="300">
                                                            </div>
                                                            </div>
                                                            <div class="questions-answer">
                                                                <h4>Cavab</h4>
                                                                <div class="open-answer">
                                                                    <div class="open-answer-content">
                                                                        <p>
                                                                           ' . $rcc1['cavab'] . '
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="explanation" style= " display:flex ">
                                                            <div class="ex mx-2" style="width:70%;">
                                                                <h4>Qeyd</h4>
                                                                <div class="explain">
                                                                    <div class="explain-content">';
        echo '<p>' . $rcc1['qeyd'] . '</p>';
        echo ' </div></div></div>
                                                                 <div class="ex" style="width:30%">
                                                                 <h4>Nəticə</h4>
                                                                 <div class="explain">
                                                                     <div class="explain-content">';
        if ($rcc1['stts3'] == "Düz") {echo '<p>' . $rcc2['verdiyibal'] . ' / ' . $rcc1['qiymet'] . '</p>';} elseif ($rcc1['stts3'] == "Səhv") {echo '<p>' . $rcc2['verdiyibal'] . ' / 0</p>';}
        echo '
                                                                    </div>
                                                                 </div>
                                                                 </div></div>
                                                            </div>

                                                    </div>';}

    if ($ec2['tip'] == "test") {
        $jdk = (json_decode(base64_decode(json_encode($rcc2['variant']))));
        echo '
                                                                <div class="question-card">
                                                                    <div class="question-content">
                                                                        <div class="question">
                                                                            <h4>Sual ' . $rcc2['sira'] . '</h4>
                                                                            <p>
                                                                               ' . $ec2['basliq'] . '
                                                                            </p>

                                                                        </div>

                                                                        <div class="q-answers">';
        for ($i = 1; $i <= $rcc2['say']; $i++) {
            if ($jdk->{'variant' . $i} == $rcc1['cavab']) {

                if ($rcc1['cavab'] == $rcc2['dv']) {echo ' <div class="answer-group">
                                                                                    <input disabled class="right-answer" type="radio" id="html" name="answer" checked>
                                                                                    <p>' . $jdk->{'variant' . $i} . '</p>
                                                                                </div>';} else {echo ' <div class="answer-group">
                                                                                    <input disabled class="wrong-answer" type="radio" id="html" name="answer" checked>
                                                                                    <p>' . $jdk->{'variant' . $i} . '</p>
                                                                                </div>';}
            } else {
                echo ' <div class="answer-group">
                                                                                    <input disabled class="wrong-answer" type="radio" id="html" name="wrong-answer">
                                                                                    <p>' . $jdk->{'variant' . $i} . '</p>
                                                                                </div>';}
        }

        // else{
        //     echo  ' <div class="answer-group">
        //         <input disabled class="answer" type="radio" id="html" name="wrong-answer">
        //         <p>'.$jdk->{'variant'.$i}.'</p>
        //     </div>';}

        echo '</div><div class="explanation" style= " display:flex ">
                                                                        <div class="ex mx-2" style="width:70%;">
                                                                            <h4>Qeyd</h4>
                                                                            <div class="explain">
                                                                                <div class="explain-content">';
        echo '<p>' . $rcc1['qeyd'] . '</p>';
        echo ' </div></div></div>
                                                                             <div class="ex" style="width:30%">
                                                                             <h4>Nəticə</h4>
                                                                             <div class="explain">
                                                                                 <div class="explain-content">';
        if ($rcc1['stts3'] == "Düz") {echo '<p>' . $rcc2['verdiyibal'] . ' / ' . $rcc1['qiymet'] . '</p>';} elseif ($rcc1['stts3'] == "Səhv") {echo '<p>' . $rcc2['verdiyibal'] . ' / 0</p>';}
        echo '
                                                                                </div>
                                                                             </div>
                                                                             </div></div>
                                                                        </div>

                                                                </div>';}

}?>

    </div>
</section>
<!-- Results section end -->
<!-- Js load -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
</script>
</body>

</html>