<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="./resources/css/responsive.css">
    <link rel="stylesheet" href="./resources/css/style.css">
    <script src="admin/js/jbvalidator.js"></script>
    <title>EduSmart-Sınaq İmtahanı</title>
</head>

<body>
    <!-- Header Start -->
    <header>
        <div class="container">
            <div class="row navg">
                <div class="col-lg-12">
                    <a href="index">
                        <div class="logo-img" style="display: flex; justify-content: center;">
                            <img style="width: 40%;" src="./resources/img/Group 180.svg" alt="">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Title Page Start -->
    <div class="container">
        <div class="row my-4 " style="text-align: center; color: #364A81;">
            <div class="col-lg-12">
                <div class="title">
                    <h2>HESABA DAXİL OLMAQ</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Title Page End -->

    <!-- Register Form Start -->
    <section id="register">
        <div class="container">
            <div class="row my-5 register">
                <form action="admin/netting/process" name="signin" id="signin" onsubmit="return validatesignin()" method="get">
                    <label for="">E-mail</label>
                    <input type="email" name="mail" id="mail" placeholder="E-mail">
                    <label for="">Şifrə</label>
                    <input type="password" name="sifre" id="sifre" placeholder="Şifrə">
                    <div class="sign-in-btn" id = "sign-in-btn">
                        <button type="submit" name="daxilol">Daxil ol</button>
                    </div>
                </form>
                <div class="sign-in-href">
                    <span>Saytımıza birinci dəfə daxil olmusunuz?<a href="register">Qeydiyyatdan keçin</a></span>
                </div>
                <div class="forget-password" style="    display: flex; color:#364a81; align-items: center; justify-content: center;">
                    <a href="forgot-password">Şifrənizi unutmusunuz?</a>
                </div>

            </div>
        </div>
    </section>
    <!-- Register Form End-->

  <?php include('footer.php');?>