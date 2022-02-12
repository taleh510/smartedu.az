<?php include 'header.php';
$e_id = $_GET['e_id'];
$eden = $_SESSION['loginmail'];
$e1sorus = $db->prepare("SELECT * FROM se_exam where elaveden like '%$eden%' and e_id like '%$e_id%' ");
$e1sorus->execute();
$e1cek = $e1sorus->fetch(PDO::FETCH_ASSOC);


// $esorus = $db->prepare("SELECT * FROM se_exam");
// $esorus->execute();
// $ecek = $esorus->fetch(PDO::FETCH_ASSOC);
$nsorus = $db->prepare("SELECT * FROM se_nesriyyatcilar");
$nsorus->execute();
$ksorus = $db->prepare("SELECT * FROM se_kateqoriya");
$ksorus->execute();
?>

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css"> -->
<link href="css/sb-admin-2.min.css" rel="stylesheet">
<!-- <link href="css/suallar.css" rel="stylesheet"> -->

<body class="bg-gradient-primary">
  <div class="card border-0 shadow-lg my-3 justify-content-center" style="width: 50%; text-align: center;margin: auto;">
    <div class="col-lg">
      <div class="p-6">
        <div class="text-center">
          <h1 class="h4 text-gray-900 mb-0 mt-3">Sınaq əlavə et</h1>
        </div>
        <div class="container">
          <form method="POST" action="netting/process.php?e_id=<?php echo $e_id ?>">
            <input style="margin-bottom: 20px;" type="text" class="form-control form-control-user"name="basliq" placeholder="Başlıq" value="<?php echo $e1cek['basliq']; ?>">
            <input style="margin-bottom: 20px;"type="text" class="form-control form-control-user"name="qiymet" placeholder="İmtahanın qiyməti" value="<?php echo $e1cek['qiymet']; ?>">
            <input style="margin-bottom: 20px;"type="date" class="form-control form-control-user"name="tarix" placeholder="İntahan tarixi" value="<?php echo $e1cek['tarix']; ?>">
            <input style="margin-bottom: 20px;"type="text"class="form-control form-control-user" name="muddet" placeholder="İmtahan müddəti" value="<?php echo $e1cek['tarix1']; ?>">
            <select style="margin-bottom: 20px;"name="bolme"class="form-control form-control-user">
              <option value="Azərbaycan">Azərbaycan</option>
              <option value="İngilis">İngilis</option>
              <option value="Rus">Rus</option>
            </select>
            <select style="margin-bottom: 20px;"name="nesriyyatci"class="form-control form-control-user">
              <?php while ($ncek = $nsorus->fetch(PDO::FETCH_ASSOC)) {
                $nesriyyatci = $ncek['n_ad'];
                echo "<option value='$nesriyyatci' > $nesriyyatci </option>";
              } ?>
            </select>
            <select style="margin-bottom: 20px;"name="kateqoriya"class="form-control form-control-user">
              <?php while ($kcek = $ksorus->fetch(PDO::FETCH_ASSOC)) {
                $kateqoriya = $kcek['k_ad'];
                echo "<option value='$kateqoriya' > $kateqoriya </option>";
              } ?>
            </select>
            </br>
            <div class="submit-btns" style="display: flex; align-items:center; justify-content:space-around">
              <button class="btn btn-primary" type="submit" name="iedit">İmtahanı redaktə et</button>
              <button class="btn btn-danger" type="submit" style="background-color: red; border-color: red;" name="idel">İmtahanı sil</button>
              <a href="sualelave?e_id=<?php echo $e1cek['e_id']; ?>&s=0"><button class="btn btn-success"type="button" style="background-color: green;border-color: green;" name="sadd">Sual əlavə et</button></a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script src="js/suallar.js"></script>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>
<?php include 'footer.php'  ?>