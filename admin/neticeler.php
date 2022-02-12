<?php include 'header.php';
$eden=$_SESSION['loginmail'];
$esorus = $db->prepare("SELECT * FROM se_exam where elaveden like '%$eden%' ");
$esorus->execute();
$nsorus = $db->prepare("SELECT * FROM se_nesriyyatcilar");
$nsorus->execute();
$ksorus = $db->prepare("SELECT * FROM se_kateqoriya");
$ksorus->execute();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
<link href="css/sb-admin-2.min.css" rel="stylesheet">

<link href="css/sual.css" rel="stylesheet">
<body class="bg-gradient-primary">

<div class="exam-section">
  <div class="container">
  <div class="exam-boxs">
 <?php while($ecek = $esorus->fetch(PDO::FETCH_ASSOC)){?>
  <a href="imtahanyoxlanis?e_id=<?php echo $ecek['e_id'];?>" style="text-decoration: none;">
<div class="exam-box">
      <div class="exam-head">
        <i class="fas fa-info-circle"></i>
        <h5><?php echo $ecek['basliq'];?></h5>
      </div>
      <dix class="exam-explanation">
        <small><?php echo $ecek['qeydiyyat'];?></small>
      </dix>
    </div>
 <?php } ?>  </a>

  
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