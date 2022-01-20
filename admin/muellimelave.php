<?php include('header.php')?>
<link href="css/sb-admin-2.min.css" rel="stylesheet">

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card border-0 shadow-lg my-3 justify-content-center" style="width: 50%; text-align: center;margin: auto;" >
                <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Müəllim əlavə et</h1>
                            </div>
                            <form class="user" action="netting/process" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="muellimad"
                                            placeholder="Ad">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="muellimsoyad"
                                            placeholder="Soyad">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" name="muellimtelefon"
                                        placeholder="Telefon">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="muellimmail"
                                        placeholder="Email Adres">
                                </div>
                                <div class="form-group">
                                    <input type="date" class="form-control form-control-user" name="muellimyas"
                                        placeholder="Təvəllüd">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="muellimfenn"
                                        placeholder="Fənn">
                                </div>
                                <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                            name="muellimpass" placeholder="Şifrə">  
                                </div>
                                <button type="submit" name="muellimadd" class="btn btn-primary btn-user btn-block">
                                    Müəllimi əlavə et
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

       
<?php include('footer.php');?>