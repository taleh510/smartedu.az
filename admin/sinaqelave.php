<?php include 'header.php';
$esorus = $db->prepare("SELECT * FROM se_exam");
$esorus->execute();
$ecek = $esorus->fetch(PDO::FETCH_ASSOC);
$nsorus = $db->prepare("SELECT * FROM se_nesriyyatcilar");
$nsorus->execute();
$ksorus = $db->prepare("SELECT * FROM se_kateqoriya");
$ksorus->execute();
date_default_timezone_set('Etc/GMT-4');
?>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css"> -->
<link href="css/sb-admin-2.min.css" rel="stylesheet">
<link href="css/validation.css" rel="stylesheet">
<!-- <link href="css/suallar.css" rel="stylesheet"> -->

<body class="bg-gradient-primary">
  <script src="js/suallar.js"></script>
  <div class="container">
    <div class="card border-0 shadow-lg justify-content-center" style="margin-top: -35px !important; width: 70%; text-align: center;margin: auto;">
      <div class="col-lg">
        <div class="p-3">
          <div class="text-center">
            <h1 class="h4 text-gray-900 ">Sınaq əlavə et</h1>
          </div>
          <form method="POST" action="netting/process.php" name="sual" id="sual">
            <div class="form-group row">
              <input style="margin-bottom: 20px;" type="text" class="form-control form-control-user" name="basliq" id="basliq" placeholder="Başlıq">
              
              <input style="margin-bottom: 20px;" type="text" class="form-control form-control-user" name="qiymet" placeholder="İmtahanın qiyməti">
              
              <input style="margin-bottom: 20px;" type="date" min="<?php echo date_create('now')->format('Y-m-d') ?>" class="form-control form-control-user" name="tarix" placeholder="İntahan tarixi">
            
              <input style="margin-bottom: 20px;" type="time" class="form-control form-control-user" name="saat" placeholder="İntahan saatı">
              <input style="margin-bottom: 20px;" type="text" class="form-control form-control-user" name="muddet" placeholder="İmtahan müddəti">
              <select style="margin-bottom: 20px;" name="bolme" class="form-control form-control-user">
                <option value="Azərbaycan">Azərbaycan</option>
                <option value="İngilis">İngilis</option>
                <option value="Rus">Rus</option>
              </select>
              <select style="margin-bottom: 20px;" name="nesriyyatci" class="form-control form-control-user">
                <option selected>Nəşriyyatçı</option>
                <?php while ($ncek = $nsorus->fetch(PDO::FETCH_ASSOC)) {
                  $nesriyyatci = $ncek['n_ad'];
                  echo "<option value='$nesriyyatci' > $nesriyyatci </option>";
                } ?>
              </select>
              <select style="margin-bottom: 20px;" name="kateqoriya" class="form-control form-control-user">
                <?php while ($kcek = $ksorus->fetch(PDO::FETCH_ASSOC)) {
                  $kateqoriya = $kcek['k_ad'];
                  echo "<option value='$kateqoriya' > $kateqoriya </option>";
                } ?>
              </select>
              </br>
              <div class="accordion pl-0 pr-0" id="accordionPanelsStayOpenExample">
                <div class="accordion-item" id="accordion-item">
                  <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                      Fənn əlavə et
                    </button>
                  </h2>
                  <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body" id="accordion-body">
                      <div class="row">
                        <div class="col">
                          <input type="text" class="form-control" placeholder="Fənnin adı" name="fenn1">
                        </div>
                        <div class="col">
                          <input type="text" class="form-control" placeholder="Sualların sayı sayı" name="sual1">
                        </div>
                      </div>
                      </br>
                      <div class="row" style="margin-left: 0px;width: 100%;">
                        <textarea class="form-control"name="movzu1"></textarea>
                      </div>
                      <input hidden type="text" class="form-control" name="size" id="size" value=1>
                    </div>
                    <button type="button" class="mb-3 btn btn-info" onclick="fennadd()">Fənn əlavə et</button>
                  </div>

                </div>
                </br>
                
                <button class="btn btn-primary" type="submit" onclick="validateForm()" name="iadd">İmtahan əlavə et</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div> <!-- Bootstrap core JavaScript-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script src="js/suallar.js"></script>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>
<?php include('footer.php'); ?>