<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="./resources/css/responsive.css">
    <link rel="stylesheet" href="./resources/css/style.css">
    <script src="admin/js/suallar.js"></script>
    <title>EduSmart-Sınaq İmtahanı</title>
</head>

<body>
    <!-- Header Start -->
    <header>
        <div class="container">
            <div class="row navg">
                <div class="col-lg-12">
                    <a href="home">
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
                    <h2>Yeni Şifrə</h2>
                    <span>Yeni şifrənizi təyin edin.</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Title Page End -->

    <!-- Register Form Start -->
    <section id="register">
        <div class="container">
            <div class="row my-5 register">
                <?php 
                $resetleyen = $_GET['r'];
                $token = $_GET['t'];
                ?>
                <form method="get" action="admin/netting/process.php">
                <input hidden type="text" name="r" value="<?php echo $resetleyen ?>">
                <input hidden type="text" name="token" value="<?php echo $token ?>">
                    <label for="">Şifrə</label>
                    <input type="text" name="parol" id="parol1" onchange="yoxla()" >
                    <label for="">Yeni şifrə</label> 
                    <input type="text" name="parol" id="parol2" onchange="yoxla()" > 
                    <div class="sign-in-btn">
                    <button name="sifrenideyis" class="sifrenideyis" id="sifrenideyis" style="">Təsdiqlə</button>
                </div>
                </form>
               
            </div>
        </div>
    </section>
    <!-- Register Form End-->

    <!-- Footer Start -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-box">
                        <div class="logo-footer">
                            <img src="./resources/img/Group 77 (1).svg" alt="">
                        </div>
                        <div class="power-by">
                            <span> Powered by Deirvlon Technologies <br>
                                www.deirvlon.com</span>
                        </div>
                        <div class="contact-me">
                            <span>Bizimlə Əlaqə</span>
                            <span><i class="fab fa-whatsapp"></i> +994 55 639 49 54</span>
                        </div>
                        <div class="copywriter">
                            <span>Copyright © 2021 Deirvlon Technologies. All rights are reserved.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->
    <script src="admin/js/suallar.js"></script>
    <script src="./resources/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>