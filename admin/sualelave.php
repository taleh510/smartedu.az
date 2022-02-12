<?php include 'header.php';
$e_id = $_GET['e_id'];
$esorus = $db->prepare("SELECT * FROM se_exam where e_id like '%$e_id%'");
$esorus->execute();
$ecek = $esorus->fetch(PDO::FETCH_ASSOC);

$fnn = (json_decode(base64_decode(json_encode($ecek['fennler']))));

?>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css"> -->
<script src="js/suallar.js"></script>
<script src="js/tab.js"></script>
<link href="css/sb-admin-2.min.css" rel="stylesheet">
<link href="css/tab.css" rel="stylesheet">

<body class="bg-gradient-primary">

  <div class="container">
    <div class="card border-0 shadow-lg my-0 justify-content-center"
      style="width: 80%; text-align: center;margin: auto;">
      <div class="col-lg">
        <div class="p-4">
          <div class="text-center" style=" display: flex; align-items: center; justify-content: space-between;">
            <h1 class="h4 text-gray-900" style="margin-bottom:11px">Sual əlavə et</h1>

          </div>
          <div class="tab d-flex justify-content-around">
            <button class="tablinks" onclick="openCity(event, 'Test')" id="defaultOpen">Test</button>
            <button class="tablinks" onclick="openCity(event, 'Sekil')">Şəkil</button>
            <button class="tablinks" onclick="openCity(event, 'Video')">Video</button>
            <button class="tablinks" onclick="openCity(event, 'Yazili')">Açıq tipli</button>
            <button class="tablinks" onclick="openCity(event, 'Ses')">Səs</button>
            <button class="tablinks" onclick="openCity(event, 'Uyqunluq')">Uyğunluq</button>
          </div>
          <!-- <div class="text-center " style=" display: flex; align-items: center; justify-content: flex-end;">

            <input style="width: 7%; margin-bottom:11px;" name="sira" class="form-control"  type="text" value="<?php echo $_GET['s'] + 1 ?>">
          </div> -->
          <!-- Tab content -->
          <div id="Test" class="tabcontent">

            <form id="sinaqform" onsubmit="return sinaqv()" method="POST"
              action="netting/process.php?e_id=<?php echo $e_id ?>" id="form">
              <div class="form-group" id="form-group">
                <div class="input-group mb-3 mt-3">
                  <select class="form-select" name="fenn0" id="fenn0">
                    <option selected>Fənn</option>
                    <?php for ($i = 1; $i <= $ecek['fsay']; $i++) { ?>
                    <option value="<?php echo $fnn->{"fenn" . $i} ?>"><?php echo $fnn->{"fenn" . $i} ?></option>
                    <?php   } ?>
                  </select>
                  <input name="sira" id="sira" class="form-control sira" type="text"
                    value="<?php echo $_GET['s'] + 1 ?>">
                  <input type="text" id="girisbali" class="form-control" name="girisbali" value=10>
                  <input type="text" id="cixisbali" class="form-control" name="cixisbali" value=0>
                </div>
                <input style="margin-bottom: 20px;" type="text" id="basliq" class="form-control form-control-user"
                  name="basliq" placeholder="Sualın başlığı">
                <div class="input-group">
                  <div class="input-group-text">

                    <input class="form-check-input mt-0" style="margin-left: -8px;" id="radio" type="radio" name="radio"
                      value=1 aria-label="Radio button for following text input">
                  </div>
                  <input style="position:relative" type="text" id="sinaqtest" name="name1" class="form-control"
                    aria-label="Text input with radio button">
                  <i style="position:absolute; color:red; right:10px; top:10px" class="fas fa-minus-circle"></i>
                </div>
              </div>
              <input hidden type="text" class="form-control" name="size" id="size" value=1>
              <div style="margin-top: 20px;" class="d-flex justify-content-around">
                <button type="button" class="mb-3 btn btn-primary" onclick="vadd()">Variant əlavə
                  et</button>
                <button type="submit" class="mb-3 btn btn-success" name="testelave" onclick="">Sualı
                  əlavə et</button>
              </div>
            </form>
            <!-- <div style="margin-top: 20px; display: flex;justify-content: flex-end; align-items: flex-end;">
              <button type="button" class="mb-3 btn btn-primary" onclick="vadd()">Variant əlavə et</button>
            </div> -->

          </div>

          <div id="Sekil" class="tabcontent">

            <form id="sekilform" onsubmit="return sekilv()" method="POST" action="netting/process.php?e_id=<?php echo $e_id ?>" id="form"
              enctype="multipart/form-data">
              <div class="form-group mt-3" id="form-group">
                <div class="input-group mb-3">
                  <select class="form-select" name="fenn0" id="fenn0">
                    <option selected>Fənn</option>
                    <?php for ($i = 1; $i <= $ecek['fsay']; $i++) { ?>
                    <option value="<?php echo $fnn->{"fenn" . $i} ?>"><?php echo $fnn->{"fenn" . $i} ?></option>
                    <?php   } ?>
                  </select>
                  <input id="sira" name="sira" id="sira" class="form-control sira" type="text"
                    value="<?php echo $_GET['s'] + 1 ?>">
                  <input id="girisbali" type="text" class="form-control" name="girisbali" value=10>
                  <input id="cixisbali" type="text" class="form-control" name="cixisbali" value=0>
                </div>
                <input id="basliq" style="margin-bottom: 20px;" type="text" class="form-control form-control-user" name="basliq"
                  placeholder="Sualın başlığı">
                <input id="sekil" style="margin-bottom: 20px;" type="file" accept=".png,.jpeg,.jpg"
                  class="form-control form-control-user" name="media" placeholder="Başlıq">
                <!-- <input style="margin-bottom: 20px;" type="text" class="form-control form-control-user" name="qeyd" placeholder="Qeyd"> -->
              </div>
              <div style="margin-top: 20px;" class="d-flex justify-content-around">
                <button type="submit" name="sekilsual" class="mb-3 btn btn-success">Sualı əlavə
                  et</button>
              </div>
            </form>
          </div>

          <div id="Video" class="tabcontent">
            <form method="POST" action="netting/process.php?e_id=<?php echo $e_id ?>" id="form"
              enctype="multipart/form-data">
              <div class="form-group mt-3" id="form-group">
                <div class="input-group mb-3">
                  <select class="form-select" name="fenn0">
                    <option selected>Fənn</option>
                    <?php for ($i = 1; $i <= $ecek['fsay']; $i++) { ?>
                    <option value="<?php echo $fnn->{"fenn" . $i} ?>"><?php echo $fnn->{"fenn" . $i} ?></option>
                    <?php   } ?>
                  </select>
                  <input name="sira" id="sira" class="form-control sira" type="text"
                    value="<?php echo $_GET['s'] + 1 ?>">
                  <input type="text" class="form-control" name="girisbali" value=10>
                  <input type="text" class="form-control" name="cixisbali" value=0>
                </div>
                <input style="margin-bottom: 20px;" type="text" class="form-control form-control-user" name="basliq"
                  placeholder="Sualın başlığı">
                <input style="margin-bottom: 20px;" type="file" accept=".mp4,.mov,.wmv,.avi"
                  class="form-control form-control-user" name="media1" placeholder="Başlıq">
                <input style="margin-bottom: 20px;" type="text" class="form-control form-control-user" name="link"
                  placeholder="Link">
              </div>
              <div style="margin-top: 20px;" class="d-flex justify-content-around">
                <button type="submit" name="videosual" class="mb-3 btn btn-success" onclick="">Sualı
                  əlavə et</button>
              </div>
            </form>
          </div>

          <div id="Yazili" class="tabcontent">
            <form method="POST" action="netting/process.php?e_id=<?php echo $e_id ?>" id="form">
              <div class="form-group mt-3" id="form-group">
                <div class="input-group mb-3">
                  <select class="form-select" name="fenn0">
                    <option selected>Fənn</option>
                    <?php for ($i = 1; $i <= $ecek['fsay']; $i++) { ?>
                    <option value="<?php echo $fnn->{"fenn" . $i} ?>"><?php echo $fnn->{"fenn" . $i} ?></option>
                    <?php   } ?>
                  </select>
                  <input name="sira" id="sira" class="form-control sira" type="text"
                    value="<?php echo $_GET['s'] + 1 ?>">
                  <input type="text" class="form-control" name="girisbali" value=10>
                  <input type="text" class="form-control" name="cixisbali" value=0>
                </div>
                <input style="margin-bottom: 20px;" type="text" class="form-control form-control-user" name="basliq"
                  placeholder="Sualın başlığı">
              </div>
              <div style="margin-top: 20px;" class="d-flex justify-content-around">
                <button type="submit" class="mb-3 btn btn-success" name="yazilisual" onclick="">Sualı
                  əlavə et</button>
              </div>
            </form>
          </div>

          <div id="Ses" class="tabcontent">
            <form method="POST" action="netting/process.php?e_id=<?php echo $e_id ?>" id="form"
              enctype="multipart/form-data">
              <div class="form-group mt-3" id="form-group">

                <div class="input-group mb-3">
                  <select class="form-select" name="fenn0">
                    <option selected>Fənn</option>
                    <?php for ($i = 1; $i <= $ecek['fsay']; $i++) { ?>
                    <option value="<?php echo $fnn->{"fenn" . $i} ?>"><?php echo $fnn->{"fenn" . $i} ?></option>
                    <?php   } ?>
                  </select>
                  <input name="sira" id="sira" class="form-control sira" type="text"
                    value="<?php echo $_GET['s'] + 1 ?>">
                  <input type="text" class="form-control" name="girisbali" value=10>
                  <input type="text" class="form-control" name="cixisbali" value=0>
                </div>

                <input style="margin-bottom: 20px;" type="text" class="form-control form-control-user" name="basliq"
                  placeholder="Sualın başlığı">
                <input style="margin-bottom: 20px;" type="file" accept=".mp3,.wav"
                  class="form-control form-control-user" name="media" placeholder="Başlıq">
              </div>
              <div style="margin-top: 20px;" class="d-flex justify-content-around">
                <button type="submit" class="mb-3 btn btn-success" name="sessual">Sualı əlavə
                  et</button>
              </div>
            </form>
          </div>

          <div id="Uyqunluq" class="tabcontent">
            <form method="POST" action="netting/process.php?e_id=<?php echo $e_id ?>" id="form4">
              <div class="input-group mb-3 mt-3">
                <select class="form-select" name="fenn0">
                  <option selected>Fənn</option>
                  <?php for ($i = 1; $i <= $ecek['fsay']; $i++) { ?>
                  <option value="<?php echo $fnn->{"fenn" . $i} ?>"><?php echo $fnn->{"fenn" . $i} ?></option>
                  <?php   } ?>
                </select>
                <input name="sira" id="sira" class="form-control sira" type="text" value="<?php echo $_GET['s'] + 1 ?>">
                <input type="text" class="form-control" name="girisbali" value=10>
                <input type="text" class="form-control" name="cixisbali" value=0>
              </div>
              <input style="margin-bottom: 20px;" type="text" class="form-control form-control-user" name="basliq"
                placeholder="Sualın başlığı">
              <div class="input-group mb-3 mt-3" id="input-group">

                <div class="input-group-prepend">
                  <span class="input-group-text" id="">Sual / Variant</span>
                </div>
                <input type="text" name="sual1" class="form-control">
                <input type="text" name="cavab1" class="form-control">
              </div>
              <div style="margin-top: 20px;" class="d-flex justify-content-around">
                <button type="button" class="mb-3 btn btn-primary" onclick="uadd()">Variant əlavə
                  et</button>
                <button type="submit" name="uygunlugelave" class="mb-3 btn btn-success">Sualı əlavə
                  et</button>
              </div>
              <input hidden type="text" class="form-control" name="sizee" id="sizee" value=1>
            </form>

          </div>

        </div>
      </div>
    </div>
  </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script src="js/suallar.js"></script>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById("defaultOpen").click();
  </script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>
<?php include 'footer.php'; ?>