<?php include('header.php');

$muellim_id=$_GET['muellim_id'];
$muellimsorus = $db->prepare("SELECT * FROM muellimler where m_id = :m_id");
$muellimsorus->execute(['m_id' => $muellim_id]);

$muellimcek = $muellimsorus->fetch(PDO::FETCH_ASSOC);

if ($_GET['muellimduzelis']!="ok" || $_GET['muellim_id'] != $muellimcek['m_id'] ) {
    header("location: ./butunmuellimler?icazeyoxdur");
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
                            <form class="user" action="netting/process?muellim_id=<?php echo $muellim_id ?>" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="muellimad"
                                            placeholder="Ad" value="<?php echo $muellimcek['m_ad']; ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="muellimsoyad"
                                            placeholder="Soyad"  value="<?php echo $muellimcek['m_soyad']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" name="muellimtelefon"
                                        placeholder="Telefon" value="<?php echo $muellimcek['m_telefon']; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="muellimmail"
                                        placeholder="Email Adres" value="<?php echo $muellimcek['m_mail']; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="date" class="form-control form-control-user" name="muellimyas"
                                        placeholder="Təvəllüd" value="<?php echo $muellimcek['m_yas']; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="muellimfenn"
                                        placeholder="Fənn" value="<?php echo $muellimcek['m_fenn']; ?>">
                                </div>
                                <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                            name="muellimpass" placeholder="Şifrə" value="<?php echo $muellimcek['m_pass']; ?>">  
                                </div>
                                <button type="submit" name="muellimduzelis" class="btn btn-primary btn-user btn-block">
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