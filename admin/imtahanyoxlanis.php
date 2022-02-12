<?php include 'header.php';
$e_id = $_GET['e_id'];
$eden = $_SESSION['loginmail'];
$e1sorus = $db->prepare("SELECT * FROM se_exam where elaveden like '%$eden%' and e_id like '%$e_id%' ");
$e1sorus->execute();
$e1cek = $e1sorus->fetch(PDO::FETCH_ASSOC);

$e99s = $db->prepare("SELECT * FROM se_sifarisler where e_id=:e_id");
$e99s->execute(array('e_id' => $_GET['e_id']));
// $e1c = $e1s->fetch(PDO::FETCH_ASSOC);

?>

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css"> -->
<link href="css/sb-admin-2.min.css" rel="stylesheet">
<!-- <link href="css/suallar.css" rel="stylesheet"> -->

<body class="bg-gradient-primary">
  <div class="card border-0 shadow-lg my-3 justify-content-center" style="width: 90%; text-align: center;margin: auto;">
    <div class="col-lg">
      <div class="p-6">
        <div class="text-center">
          <h1 class="h4 text-gray-900 mb-0 mt-3">Sualları yoxla</h1>
        </div>
        <div class="container">
          <?php while ($e99c = $e99s->fetch(PDO::FETCH_ASSOC)) { ?>

          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapse<?php echo $e99c['s_id'] ?>" aria-expanded="false"
                aria-controls="flush-collapseThree">
                <?php echo $e99c['alan']; ?>
              </button>
            </h2>
            <div id="flush-collapse<?php echo $e99c['s_id'] ?>" class="accordion-collapse collapse"
              aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
                <?php 
      
                 $yxlmn = $db->prepare("SELECT * FROM se_yoxlamalar where e_id=:e_id and istirakci=:istirakci and stts=:stts");
                 $yxlmn->execute(array('e_id' => $_GET['e_id'], 'istirakci' => $e99c['alan'], 'stts' => "Yoxlanılmayıb"));
                 while ($yxc = $yxlmn->fetch(PDO::FETCH_ASSOC)) {
                 $sualb = $db->prepare("SELECT * FROM se_suallar where e_id=:e_id and s_id=:s_id");
                 $sualb->execute(array('e_id' => $_GET['e_id'], 's_id' => $yxc['s_id']));
                 $sualc = $sualb->fetch(PDO::FETCH_ASSOC);?>

                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading<?php echo $yxc['s_id'] ?>">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapse<?php echo $e99c['s_id']?>">
                      <?php echo  $sualc['basliq'] ?>
                    </button>
                  </h2>
                  <div id="collapse<?php echo $e99c['s_id']?>" class="accordion-collapse collapse show"
                    data-bs-parent="#accordion">
                    <form method="GET" action="netting/process.php">
                      <div class="accordion-body">
                        <div class="mb-3">
                          <input hidden type="text" name="s_id" class="form-control" value="<?php echo $yxc['s_id'];?>">
                          <input hidden type="text" name="e_id" class="form-control" value="<?php echo $yxc['e_id'];?>">
                          <input hidden type="text" name="yxln" class="form-control"
                            value="<?php echo $e99c['alan'];?>">
                          <textarea readonly type="text" id="TextInput"
                            class="form-control"><?php echo $yxc['cavab'];?></textarea></br>
                          <input readonly type="text" id="Input" class="form-control"
                            value="<?php echo $yxc['qeyd'];?>">
                        </div>
                        <div class="input-group mb-3">
                          <input type="number" name="qiymet<?php echo $yxc['s_id']; ?>" min="1"
                            max="<?php echo intval($sualc['verdiyibal']);?>" class="form-control" placeholder="Qiymət">
                          <button type="submit" name="yoxla" class="btn btn-success">Təsdiqlə</button>
                          <button type="submit" name="sehvdir" class="btn btn-danger">Yalnış</button>
                    </form>
                  </div>
                </div>
              </div>

            </div><?php } 
                    
                      ?>

          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
  </br>
  </div>
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
<?php include 'footer.php';  ?>