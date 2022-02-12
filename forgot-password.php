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
                    <h2>Şifrənizi yeniləyin</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Title Page End -->

    <!-- Register Form Start -->
    <section id="register">
        <div class="container">
            <div class="row my-5 register">
                <form action="mail/index.php" method="get">
                    <label for="">Mail adresinizi daxil edin</label>
                    <input type="text" name="namereset" placeholder="example@mail.com">
                     <div class="sign-in-btn">
                    <button name="reset">Göndər</button>
                </div>
                </form>
               
            </div>
        </div>
    </section>
    <!-- Register Form End-->

   <?php include('footer.php');?>