<?php include 'header2.php';
$cs = $_SESSION['mail0'];
$e_id = $_GET['e_id'];
$es = $db->prepare("SELECT * FROM se_sifarisler where alan=:alan and e_id=:e_id");
$es->execute(array('alan' => $_SESSION['mail0'], 'e_id' => $e_id));
$ec = $es->fetch(PDO::FETCH_ASSOC);
date_default_timezone_set('Etc/GMT-4');

$imst = $db->prepare("SELECT * FROM se_exam where e_id=:e_id");
$imst->execute(array('e_id' => $e_id));
$imst0 = $imst->fetch(PDO::FETCH_ASSOC);

$endtime = $imst0['bitisvaxti'];

if ($ec['status2'] != "Ödənilib") {
    header("Location:exam-info?e_id=" . $e_id . "&by=" . $_SESSION['mail0']);
} elseif ($ec['status2'] == "Ödənilib") {
    $currentimtahan = $ec['e_id'];
    $es1 = $db->prepare("SELECT * FROM se_exam where e_id=:e_id");
    $es1->execute(array('e_id' => $currentimtahan));
    $ec1 = $es1->fetch(PDO::FETCH_ASSOC);

    if ($imst0['stts'] != "Aktiv") { ?>
        <div class="alertt" style="display:flex;align-items:center;justify-content:center;width:100%; height:50vh">
            <div class="alert alert-danger" role="alert" style="text-align:center;width:40%;margin:0 auto;">
                Hal hazırda bu imtana girmək mümkün deyil!
            </div>
        </div>
    <?php }
    if ($imst0['stts'] == "Aktiv") {
        if ($ec['stts3'] == "Daxil olunuyub") { ?>
            <div class="alertt" style="display:flex;align-items:center;justify-content:center;width:100%; height:50vh">
                <div class="alert alert-danger" role="alert" style="text-align:center;width:40%;margin:0 auto;">
                    Siz artıq bu imtahana daxil olmusunuz.
                </div>
            </div>

        <?php }
        if ($ec['stts3'] == "Bitib") { ?>
            <div class="alertt" style="display:flex;align-items:center;justify-content:center;width:100%; height:50vh">
                <div class="alert alert-danger" role="alert" style="text-align:center;width:40%;margin:0 auto;">
                    Siz artıq imtahanı bitirmisiniz.
                </div>
            </div>
        <?php } elseif ($ec['stts3'] == "Daxil olunmayıb") { ?>
            <!-- Results section start -->
            <section class="results">
                <div class="container">
                    <div class="result-head">
                        <div class="result-heading">
                            <h1>
                                <?php echo $ec1['basliq'] ?>
                            </h1>
                        </div>
                        <div class="exam-info">
                            <div class="students-info">
                                <div class="students-name">
                                    <h4>Şagird: <?php echo $uc['ad'] . " " . $uc['soyad'] ?></h4>
                                </div>
                                <div class="search-section">
                                    <div class="search">
                                        <div class="for-search">
                                            <i class="fal fa-search"></i>
                                            <input type="text" placeholder="Sual nömrəsi axtar">
                                        </div>
                                        <button>
                                            Axtar
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="test-head">
                                <div class="test-begin">
                                    <p>İmtahan başladı: <?php echo $imst0['saat'] ?></p>
                                    <script>
                                        count_id = "<?php echo $imst0['bitisvaxti'] ?>";
                                        cid2 = count_id.replace(/\-/g, "/");
                                        var countDownDate = new Date(cid2).getTime();
                                        var x = setInterval(function () {
                                            var now = new Date().getTime();
                                            var distance = countDownDate - now;
                                            var hour = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                            var minute = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                                            document.getElementById("demo").innerHTML = ("Qalan vaxt: " + hour + ":" +
                                                minute + ":" + seconds).toString();
                                            if (distance < 0) {
                                                clearInterval(x);
                                                document.getElementById("myform").submit();
                                            }
                                        }, 1000);
                                    </script>
                                    <p id="demo"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    //$size=$_POST['size'];
                    $es2 = $db->prepare("SELECT * FROM se_suallar where e_id=:e_id order by sira asc");
                    $es2->execute(array('e_id' => $currentimtahan)); ?>
                    <form method="get" id="myform"
                          action="admin/netting/process.php?c_exam=<?php echo $currentimtahan ?>&c_s=<?php echo $cs ?>"><?php
                        while ($ec2 = $es2->fetch(PDO::FETCH_ASSOC)) {
                            if ($ec2['tip'] == "video") {
                                echo '
                <div class="question-card">
                    <div class="question-content">
                        <div class="question">
                            <h4>Sual ' . $ec2["sira"] . '</h4>
                            <p>
                                  ' . $ec2["basliq"] . '
                            </p>
                            <div class="video-question">
                                <video width="" height="240" controls>
                                    <source src="admin/img' . $ec2["variant"] . '" type="video/mp4">
                                </video>
                            </div>
                        </div>
                        <div class="open-questions">
                            <h4>Cavab</h4>
                            <div class="open-question">
                                <div class="open-question-content">
                                    <textarea name="cavab' . $ec2['s_id'] . '" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="notes">
                            <h4>Qeyd</h4>
                            <div class="note">
                                <div class="note-content">
                                    <textarea name="qeyd' . $ec2['s_id'] . '" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                            }
                            if ($ec2['tip'] == "sekil") {

                                echo '<div class="question-card">
                <div class="question-content">
                    <div class="question">
                    <h4>Sual ' . $ec2['sira'] . '</h4>
                    <p>
                    ' . $ec2['basliq'] . '
                    </p>
                        <div class="voice-question">
                            <img
                                src="admin/img' . $ec2['variant'] . '" width="100%" height="100%"
                            >
                        </div>
                    </div>
                    <div class="open-questions">
                        <h4>Cavab</h4>
                        <div class="open-question">
                            <div class="open-question-content">
                                <textarea name="cavab' . $ec2['s_id'] . '" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="notes">
                        <h4>Qeyd</h4>
                        <div class="note">
                            <div class="note-content">
                                <textarea name="qeyd' . $ec2['s_id'] . '" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
                            }

                            if ($ec2['tip'] == "yazili") {
                                echo '
                <div class="question-card">
                    <div class="question-content">
                        <div class="question">
                            <h4>Sual ' . $ec2['sira'] . '</h4>
                            <p>
                            ' . $ec2['basliq'] . '
                            </p>
                        </div>
                        <div class="open-questions">
                            <h4>Cavab</h4>
                            <div class="open-question">
                                <div class="open-question-content">
                                    <textarea name="cavab' . $ec2['s_id'] . '"  cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="notes">
                            <h4>Qeyd</h4>
                            <div class="note">
                                <div class="note-content">
                                    <textarea name="qeyd' . $ec2['s_id'] . '" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>';
                            }

                            if ($ec2['tip'] == "ses") {
                                echo '<div class="question-card">
            <div class="question-content">
                <div class="question">
                    <h4>Sual ' . $ec2['sira'] . '</h4>
                    <div class="voice-question">
                        <audio controls >
                            <source src="admin/img' . $ec2['variant'] . '" type="audio/ogg" >
                          Your browser does not support the audio element.
                        </audio>
                    </div>
                </div>
                <div class="open-questions">
                    <h4>Cavab</h4>
                    <div class="open-question">
                        <div class="open-question-content">
                            <textarea name="cavab' . $ec2['s_id'] . '" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <div class="notes">
                    <h4>Qeyd</h4>
                    <div class="note">
                        <div class="note-content">
                            <textarea name="qeyd' . $ec2['s_id'] . '"  cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
                            }

                            if ($ec2['tip'] == "test") {

                                $jdk = (json_decode(base64_decode(json_encode($ec2['variant']))));

                                echo '<div class="question-cards">
                <div class="question-card">
                    <div class="question-content">
                        <div class="question">
                            <h4>Sual ' . $ec2['sira'] . ' </h4>
                            <p>' .
                                    $ec2['basliq']
                                    . '</p>
                        </div>
                        <div class="questions-answer">
                            <div class="q-answers">';
                                for ($i = 1; $i <= $ec2['say']; $i++) {
                                    echo '   <div class = "test-answer-group">
                                    <input class="test-answer" type="radio"  name="cavab' . $ec2['s_id'] . '" value="' . $jdk->{'variant' . $i} . '">
                                    <label for="html">' . $jdk->{'variant' . $i} . '</label>
                                </div>';
                                }
                                echo '</div>

                        <div class="notes">
                            <h4>Qeyd</h4>
                            <div class="note">
                                <div class="note-content">
                                    <textarea name="qeyd' . $ec2['s_id'] . '" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>';
                            }
                            if ($ec2['tip'] == "uygunlug") {

                                $alphabet = array('510', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

                                $jdk1 = (json_decode(base64_decode(json_encode($ec2['variant']))));

                                echo '<div class="question-card">
                <div class="question-content">
                    <div class="question">
                        <h4>Sual ' . $ec2['sira'] . '</h4>
                        <p>' .
                                    $ec2['basliq']
                                    . '</p>
                        <div class="match">
                            <div class="left-side">';
                                for ($i = 1; $i <= $ec2['say']; $i++) {
                                    $sss = "sual" . strval($i);
                                    echo '<p>' . $i . ". " . $jdk1->{$sss} . '</p>';
                                }
                                echo '  </div>
                            <div class="right-side">';
                                for ($i = 1; $i <= $ec2['say']; $i++) {
                                    $sss = "cavab" . strval($i);
                                    echo '<p>' . $alphabet[$i] . ". " . $jdk1->{$sss} . '</p>';
                                }

                                echo '          </div>
                        </div>
                    </div>
                    <div class="open-questions">
                        <h4>Cavab</h4>
                        <div class="open-question">
                            <div class="open-question-content">
                                <textarea name="cavab' . $ec2['s_id'] . '" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="notes">
                        <h4>Qeyd</h4>
                        <div class="note">
                            <div class="note-content">
                                <textarea name="qeyd' . $ec2['s_id'] . '" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
                                $ahref = "admin/netting/process.php?c_exam=$currentimtahan&c_s=$cs";
                            }
                        } ?>

                        <div class="result-btn">
                            <a style="text-decoration:none;" href="<?php echo $ahref ?>">
                                <button>Bitir</button>
                            </a>
                        </div>
                        <input hidden name="c_exam" value="<?php echo $currentimtahan ?>">
                        <input hidden name="c_s" value="<?php echo $_SESSION['mail0'] ?>">
                    </form>
                </div>
            </section> <?php }
    }
}

?>
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