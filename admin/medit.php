<?php include('header.php');

$u_id=$_GET['u_id'];
$ms = $db->prepare("SELECT * FROM se_all_users where u_id = :u_id and stts like '%sm%'");
$ms->execute(['u_id' => $u_id]);

$mc = $ms->fetch(PDO::FETCH_ASSOC);

if ($_GET['medit']!="ok" || $_GET['u_id'] != $mc['u_id'] ) {
    header("location: ./bm?icazeyoxdur");
}
else{
?>
<link href="css/sb-admin-2.min.css" rel="stylesheet">

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card border-0 shadow-lg my-3 justify-content-center" style="width: 50%; text-align: center;margin: auto;" >
                <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Müəllim Düzəliş</h1>
                            </div>
                            <form class="user" action="netting/process?u_id=<?php echo $u_id ?>" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="muellimad"
                                            placeholder="Ad" value="<?php echo $mc['ad']; ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="muellimsoyad"
                                            placeholder="Soyad"  value="<?php echo $mc['soyad']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" name="muellimtelefon"
                                        placeholder="Telefon" value="<?php echo $mc['nomre']; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="muellimmail"
                                        placeholder="Email Adres" value="<?php echo $mc['mail']; ?>">
                                </div>
                                <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                            name="muellimpass" placeholder="Şifrə" value="<?php echo $mc['sifre']; ?>">  
                                </div>
                                <button type="submit" name="medit" class="btn btn-primary btn-user btn-block">
                                    Düzəliş et
                                </button>
                            </form>
                        </div>
                    </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

       
<?php } include('footer.php');?>