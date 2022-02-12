<?php
ob_start();
session_start();
include 'admin/netting/connect.php';
$mmail = $_GET['m'];
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <script src="./resources/js/otp.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="./resources/css/responsive.css">
    <link rel="stylesheet" href="./resources/css/style.css">
    <link rel="stylesheet" href="./resources/css/otp.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <title>EduSmart-Sınaq İmtahanı</title>
</head>

<body>
    <header class="homepage">
        <div class="container">
            <div class="row navg">
                <div class="col-lg-4">
                    <a href="home">
                        <div class="logo-img">
                            <img src="./resources/img/Group 180 (1).svg" alt="">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <form action="admin/netting/process.php" method="get">
        <div class="container">
            <h1>TƏSDİQLƏMƏ KODU</h1>
            <div class="userInput">
            <input hidden type="text"  name="m" value="<?php echo $mmail?>">
                <input type="text" id='ist' name="o1" maxlength="1" onkeyup="clickEvent(this,'sec')">
                <input type="text" id="sec" name="o2" maxlength="1" onkeyup="clickEvent(this,'third')">
                <input type="text" id="third" name="o3" maxlength="1" onkeyup="clickEvent(this,'fourth')">
                <input type="text" id="fourth" name="o4" maxlength="1" onkeyup="clickEvent(this,'fifth')">
            </div>
            <?php if (isset($_GET['s']) == "wrongotp") { ?>
                <div class="alert alert-danger" role="alert">
                    Daxil etdiyiniz kod yalnışdır.
                </div>
            <?php } ?>
            <button type="submit" name="vertification">Təsdiqlə</button>
        </div>
    </form>
    <?php //} 
    ?>

</body>
<?php include('footer.php'); ?>