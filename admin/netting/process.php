<?php
include 'connect.php';
ob_start();
session_start();
date_default_timezone_set('Etc/GMT-4');

if (isset($_GET['vertification'])) {
    $o1 = $_GET['o1'];
    $o2 = $_GET['o2'];
    $o3 = $_GET['o3'];
    $o4 = $_GET['o4'];

    $mmail = $_GET['m'];
    $ss = $db->prepare("SELECT * FROM se_all_users where mail=:mail");
    $ss->execute(array('mail' => $mmail));
    $sc = $ss->fetch(PDO::FETCH_ASSOC);
    $vcode = $sc['vcode'];

    $v1 = substr($vcode, 0, 1);
    $v2 = substr($vcode, 1, 2);
    $v3 = substr($vcode, 2, 3);
    $v4 = substr($vcode, 3, 4);

    if ($o1 = $v1 and $o2 = $v2 and $o3 = $v3 and $o4 = $v4) {

        $data = ['vstts' => "yes", 'mail' => $mmail];
        $sql = "UPDATE se_all_users SET vstts=:vstts WHERE mail=:mail";
        $stmt = $db->prepare($sql);
        $stmt->execute($data);
        $_SESSION['mail0'] = $mmail;
        header('Location: ../../home?s=profilevertification');
    } else {
        header('Location: ../../vertification?m='.$mmail.'&s=wrongotp');
    }
}
if (isset($_GET['usersil'])) {
    $u_id = $_GET['u_id'];
    $del = 'DELETE FROM se_all_users WHERE u_id = :u_id';
    $stmt = $db->prepare($del);
    $stmt->bindParam(':u_id', $u_id);
    $stmt->execute();
    if ($stmt->execute()) {
        header("Location: ../allusers?istifadecisilindi");
    }
}
if (isset($_POST['adminedit'])) {
    $data = [
        'ad' => $_POST['ead'],
        'soyad' => $_POST['esoyad'],
        'nomre' => $_POST['enomre'],
        'mail' => $_SESSION['mail0'],
        'sifre' => $encryption = openssl_encrypt($_POST['esifre'], $ciphering, $encryption_key, $options, $encryption_iv),
    ];
    $sql = "UPDATE se_all_users SET ad=:ad, soyad=:soyad,nomre=:nomre,sifre=:sifre WHERE mail=:mail";
    $stmt = $db->prepare($sql);
    $stmt->execute($data);
    header('Location: ../../profile?profileupdated');
}
if (isset($_POST['adminlogin'])) {
    $loginmail = $_POST['loginmail'];
    $loginpass = openssl_encrypt($_POST['loginpass'], $ciphering, $encryption_key, $options, $encryption_iv);
    $adminsor = $db->prepare("SELECT * FROM se_all_users where (sifre=:sifre and mail=:mail ) AND (stts=:stts1 OR stts=:stts2)");
    $adminsor->execute(array(
        'sifre' => $loginpass,
        'mail' => $loginmail,
        'stts1' => "sa",
        'stts2' => "sm",
    ));
    echo $say0 = $adminsor->rowCount();

    if ($say0 != 0) {
        $_SESSION['loginmail'] = $loginmail;
        header("location: ../");
        exit;
    } else {
        header("location: ../login?nopermittion");
        exit;
    }
}
if (isset($_POST['uygunlugelave'])) {
    $fen0 = $_POST['fenn0'];
    $girisbali = $_POST['girisbali'];
    $cixisbali = $_POST['cixisbali'];
    $tip = "uygunlug";
    $e_id = $_GET['e_id'];
    $sira = $_POST['sira'];
    $size = $_POST['sizee'];
    $basliq = $_POST['basliq'];
    $qeydiyyat = date_create('now')->format('Y-m-d H:i:s');

    $s1 = $_POST['sual1'];
    $c1 = $_POST['cavab1'];

    $array = ["sual1" => $s1, "cavab1" => $c1];

    for ($i = 2; $i <= $size; $i++) {
        $sual = strval($_POST['sual' . strval($i)]);
        $cavab = strval($_POST['cavab' . strval($i)]);
        $ss = "sual" . $i;
        $cc = "cavab" . $i;
        $arra = [$ss => $sual, $cc => $cavab];
        $array += $arra;
        var_dump($array);
    }
    $variantlar = base64_encode(json_encode($array));
    $addsual = $db->prepare("INSERT INTO se_suallar (e_id,basliq,variant,vaxt,say,tip,sira,fenn,verdiyibal,cixdigibal)
        values (:e_id,:basliq,:variant,:vaxt,:say,:tip,:sira,:fenn,:verdiyibal,:cixdigibal)");
    $addsual->execute(['e_id' => $e_id, 'basliq' => $basliq, 'variant' => $variantlar, 'vaxt' => $qeydiyyat, 'say' => $size, 'tip' => $tip, 'sira' => $sira, 'fenn' => $fen0, 'verdiyibal' => $girisbali, 'cixdigibal' => $cixisbali]);
    header('Location: ../sualelave?e_id=' . $e_id . '&s=' . $sira);
}
if (isset($_POST['testelave'])) {

    $tip = "test";
    $girisbali = $_POST['girisbali'];
    $cixisbali = $_POST['cixisbali'];
    $e_id = $_GET['e_id'];
    $sira = $_POST['sira'];
    $size = $_POST['size'];
    $basliq = $_POST['basliq'];
    $qeydiyyat = date_create('now')->format('Y-m-d H:i:s');
    $d1 = $_POST['radio'];
    $d2 = "name" . $d1;
    $dv = $_POST[$d2];

    $t1 = $_POST['name1'];
    $array = ["variant1" => $t1];
    for ($i = 2; $i <= $size; $i++) {

        $variant = strval($_POST['name' . strval($i)]);
        $v1 = "variant" . $i;
        $arra = [$v1 => $variant];
        //var_dump(array_merge($array,$arra));
        $array += $arra;
        var_dump($array);
    }
    $variantlar = base64_encode(json_encode($array));
    $addsual = $db->prepare("INSERT INTO se_suallar (e_id,basliq,variant,dv,vaxt,say,tip,sira,verdiyibal,cixdigibal)
        values (:e_id,:basliq,:variant,:dv,:vaxt,:say,:tip,:sira,:verdiyibal,:cixdigibal)");
    $addsual->execute(['e_id' => $e_id, 'basliq' => $basliq, 'variant' => $variantlar, 'dv' => $dv, 'vaxt' => $qeydiyyat, 'say' => $size, 'tip' => $tip, 'sira' => $sira, 'verdiyibal' => $girisbali, 'cixdigibal' => $cixisbali]);
    header('Location: ../sualelave?e_id=' . $e_id . '&s=' . $sira);}
if (isset($_POST['sessual'])) {

    $uploads_dir = '../img/suallar';
    @$tmp_name = $_FILES['media']["tmp_name"];
    @$name = $_FILES['media']["name"];
    $randomnum = (4 * intval($e_id)) . rand(10000, 99999);
    $imgyol = substr($uploads_dir, 6) . "/" . $randomnum . $name;

    @move_uploaded_file($tmp_name, "$uploads_dir/$randomnum$name");
    $sira = $_POST['sira'];
    $tip = "ses";
    $e_id = $_GET['e_id'];
    $size = 1;
    $basliq = $_POST['basliq'];
    $girisbali = $_POST['girisbali'];
    $cixisbali = $_POST['cixisbali'];
    $qeydiyyat = date_create('now')->format('Y-m-d H:i:s');

    $addsual = $db->prepare("INSERT INTO se_suallar (e_id,basliq,variant,vaxt,say,tip,sira,verdiyibal,cixdigibal)
     values (:e_id,:basliq,:variant,:vaxt,:say,:tip,:sira,:verdiyibal,:cixdigibal)");
    $addsual->execute(['e_id' => $e_id, 'basliq' => $basliq, 'variant' => $imgyol, 'vaxt' => $qeydiyyat, 'say' => $size, 'tip' => $tip, 'sira' => $sira, 'verdiyibal' => $girisbali, 'cixdigibal' => $cixisbali]);
    header('Location: ../sualelave?e_id=' . $e_id . '&s=' . $sira);
}

if (isset($_POST['sekilsual'])) {

    $uploads_dir = '../img/suallar';
    @$tmp_name = $_FILES['media']["tmp_name"];
    @$name = $_FILES['media']["name"];
    $randomnum = (4 * intval($e_id)) . rand(10000, 99999);
    $imgyol = substr($uploads_dir, 6) . "/" . $randomnum . $name;

    @move_uploaded_file($tmp_name, "$uploads_dir/$randomnum$name");
    $sira = $_POST['sira'];
    $tip = "sekil";
    $e_id = $_GET['e_id'];
    $size = 1;
    $basliq = $_POST['basliq'];
    $girisbali = $_POST['girisbali'];
    $cixisbali = $_POST['cixisbali'];
    $qeydiyyat = date_create('now')->format('Y-m-d H:i:s');

    $addsual = $db->prepare("INSERT INTO se_suallar (e_id,basliq,variant,vaxt,say,tip,sira,verdiyibal,cixdigibal)
     values (:e_id,:basliq,:variant,:vaxt,:say,:tip,:sira,:verdiyibal,:cixdigibal)");
    $addsual->execute(['e_id' => $e_id, 'basliq' => $basliq, 'variant' => $imgyol, 'vaxt' => $qeydiyyat, 'say' => $size, 'tip' => $tip, 'sira' => $sira, 'verdiyibal' => $girisbali, 'cixdigibal' => $cixisbali]);
    header('Location: ../sualelave?e_id=' . $e_id . '&s=' . $sira);
}

if (isset($_POST['videosual'])) {

    if ($_POST['link']) {
        $imgyol = $_POST['link'];
    } else {
        $uploads_dir = '../img/suallar';
        @$tmp_name = $_FILES['media1']["tmp_name"];
        @$name = $_FILES['media1']["name"];
        $randomnum = (4 * intval($e_id)) . rand(10000, 99999);
        $imgyol = substr($uploads_dir, 6) . "/" . $randomnum . $name;
        @move_uploaded_file($tmp_name, "$uploads_dir/$randomnum$name");
    }
    $sira = $_POST['sira'];
    $tip = "video";
    $e_id = $_GET['e_id'];
    $size = 1;
    $basliq = $_POST['basliq'];
    $girisbali = $_POST['girisbali'];
    $cixisbali = $_POST['cixisbali'];
    $qeydiyyat = date_create('now')->format('Y-m-d H:i:s');

    $addsual = $db->prepare("INSERT INTO se_suallar (e_id,basliq,variant,vaxt,say,tip,sira,verdiyibal,cixdigibal)
     values (:e_id,:basliq,:variant,:vaxt,:say,:tip,:sira,:verdiyibal,:cixdigibal)");
    $addsual->execute(['e_id' => $e_id, 'basliq' => $basliq, 'variant' => $imgyol, 'vaxt' => $qeydiyyat, 'say' => $size, 'tip' => $tip, 'sira' => $sira, 'verdiyibal' => $girisbali, 'cixdigibal' => $cixisbali]);
    header('Location: ../sualelave?e_id=' . $e_id . '&s=' . $sira);
}

if (isset($_POST['yazilisual'])) {
    $tip = "yazili";
    $e_id = $_GET['e_id'];
    $size = 1;
    $basliq = $_POST['basliq'];
    $qeydiyyat = date_create('now')->format('Y-m-d H:i:s');
    $sira = $_POST['sira'];
    $girisbali = $_POST['girisbali'];
    $cixisbali = $_POST['cixisbali'];
    $addsual = $db->prepare("INSERT INTO se_suallar (e_id,basliq,vaxt,say,tip,sira,verdiyibal,cixdigibal)
     values (:e_id,:basliq,:vaxt,:say,:tip,:sira,:verdiyibal,:cixdigibal)");
    $addsual->execute(['e_id' => $e_id, 'basliq' => $basliq, 'vaxt' => $qeydiyyat, 'say' => $size, 'tip' => $tip, 'sira' => $sira, 'verdiyibal' => $girisbali, 'cixdigibal' => $cixisbali]);
    header('Location: ../sualelave?e_id=' . $e_id . '&s=' . $sira);
}
if (isset($_POST['iadd'])) {

    $f1 = $_POST['fenn1'];
    $s1 = $_POST['sual1'];
    $m1 = $_POST['movzu1'];

    $array = ['fenn1' => $f1, 'sual1' => $s1, 'movzu1' => $m1];

    $size = $_POST['size'];

    for ($i = 2; $i <= $size; $i++) {
        $fenn = strval($_POST['fenn' . strval($i)]);
        $sualsay = strval($_POST['sual' . strval($i)]);
        $movzu = strval($_POST['movzu' . strval($i)]);

        $f = "fenn" . $i;
        $s = "sual" . $i;
        $m = "movzu" . $i;

        $arra = [
            $f => $fenn,
            $s => $sualsay,
            $m => $movzu,
        ];

        $array += $arra;
        var_dump($array);
    }

    $movzular = base64_encode(json_encode($array));
    $saat = $_POST['saat'];
    $basliq = $_POST['basliq'];
    $qiymet = $_POST['qiymet'];
    $tarix = $_POST['tarix'];
    $muddet = $_POST['muddet'];
    $bolme = $_POST['bolme'];
    $nesriyyatci = $_POST['nesriyyatci'];
    $kateqoriya = $_POST['kateqoriya'];
    $elaveden = $_SESSION['loginmail'];
    $qeydiyyat = date_create('now')->format('Y-m-d H:i:s');
    
    $addnewexam = $db->prepare("INSERT INTO se_exam (saat,fsay,fennler,basliq,nesriyyatci,kateqoriya,qiymet,tarix,tarix1,qeydiyyat,bolme,elaveden,stts)
    values (:saat,:fsay,:fennler,:basliq,:nesriyyatci,:kateqoriya,:qiymet,:tarix,:tarix1,:qeydiyyat,:bolme,:elaveden,:stts)");
    $addnewexam->execute(['saat' => $saat, 'fsay' => $size, 'fennler' => $movzular, 'basliq' => $basliq, 'nesriyyatci' => $nesriyyatci, 'kateqoriya' => $kateqoriya, 'qiymet' => $qiymet, 'tarix' => $tarix, 'tarix1' => $muddet, 'qeydiyyat' => $qeydiyyat, 'stts' => "Passiv", 'bolme' => $bolme, 'elaveden' => $elaveden]);

    $imst = $db->prepare("SELECT * FROM se_exam where e_id=:e_id");
    $imst->execute(array('e_id' => $e_id));
    $imst0 = $imst->fetch(PDO::FETCH_ASSOC);

    $date = $imst0['tarix'].$imst0['saat'];
    $endexam = date('Y-m-d H:i',strtotime($date."+$imst0[tarix1] minutes"));

    $data = [
        'bitisvaxti' => $endexam,
        'e_id' => $e_id,
    ];
    $sql = "UPDATE se_exam SET bitisvaxti=:bitisvaxti WHERE e_id=:e_id";
    $stmt = $db->prepare($sql);
    $stmt->execute($data);
}

if (isset($_POST['iedit'])) {
    $e_id = $_GET['e_id'];
    $data = [
        'e_id' => $e_id,
        'basliq' => $_POST['basliq'],
        'qiymet' => $_POST['qiymet'],
        'tarix' => $_POST['tarix'],
        'tarix1' => $_POST['muddet'],
        'bolme' => $_POST['bolme'],
        'kateqoriya' => $_POST['kateqoriya'],
        'nesriyyatci' => $_POST['nesriyyatci'],
    ];
    $sql = "UPDATE se_exam SET basliq=:basliq,qiymet=:qiymet,tarix=:tarix,tarix1=:tarix1,bolme=:bolme,nesriyyatci=:nesriyyatci,kateqoriya=:kateqoriya WHERE e_id=:e_id";
    $stmt = $db->prepare($sql);
    $stmt->execute($data);
    header('Location: ../imtahanduzelis?s=imtahanyenilendi&e_id=' . $e_id);
}

if (isset($_GET['qeydiyyat'])) {
    $n = 20;
    function getName($n)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }

    $mail = $_GET['mail'];
    $us = $db->prepare("SELECT * FROM se_all_users");
    $us->execute();
    $uc = $us->fetch(PDO::FETCH_ASSOC);

    if ($mail != $uc['mail']) {
        $ad = $_GET['ad'];
        $soyad = $_GET['soyad'];
        $nomre = $_GET['nomre'];

        $sfr = $_GET['sifre'];
        $sifre = openssl_encrypt($sfr, $ciphering, $encryption_key, $options, $encryption_iv);
        $vcode = rand(1000, 9999);
        $qeydiyyat = date_create('now')->format('Y-m-d H:i:s');
        $status = "se";
        $vstts = "no";

        $addnewuser = $db->prepare("INSERT INTO se_all_users (ad,soyad,nomre,balans,mail,sifre,qeydiyyat,stts,vstts,vcode,resetcode)
     values (:ad,:soyad,:nomre,:balans,:mail,:sifre,:qeydiyyat,:stts,:vstts,:vcode,:resetcode)");
        $addnewuser->execute(['ad' => $ad, 'soyad' => $soyad, 'nomre' => $nomre, 'balans' => "0", 'mail' => $mail, 'sifre' => $sifre, 'qeydiyyat' => $qeydiyyat, 'stts' => $status, 'vstts' => $vstts, 'vcode' => $vcode, 'resetcode' => getName($n)]);
        $_SESSION['mail0'] = $mail;
        header('Location: ../../mail?yeniistifadeci');
    } else {
        header('Location: ../../register?buistifadeciartiqmovcuddur');
    }
}

if (isset($_GET['daxilol'])) {
    $mail = $_GET['mail'];
    $sfr = $_GET['sifre'];

    $sifre = openssl_encrypt($sfr, $ciphering, $encryption_key, $options, $encryption_iv);

    $usersor = $db->prepare("SELECT * FROM se_all_users where sifre=:sifre and mail=:mail and stts=:stts");
    $usersor->execute(array('sifre' => $sifre,'mail' => $mail,'stts' => "se"));
    $usercek = $usersor->fetch(PDO::FETCH_ASSOC);
    if ($mail == $usercek['mail'] and $sifre == $usercek['sifre']) {
        $_SESSION['mail0'] = $mail;
        header('Location: ../../home');
    } else {
        header('Location: ../../sign-in');
    }
}

if (isset($_GET['uedit'])) {
    $data = [
        'u_id' => $_GET['u_id'],
        'ad' => $_GET['ad'],
        'soyad' => $_GET['soyad'],
        'nomre' => $_GET['nomre'],
        'balans' => $_GET['balans'],
        'stts' => $_GET['stts'],
        'mail' => $_GET['mail'],
        'sifre' => openssl_encrypt($_GET['sifre'], $ciphering, $encryption_key, $options, $encryption_iv)];
    $sql = "UPDATE se_all_users SET ad=:ad,soyad=:soyad,nomre=:nomre,balans=:balans,mail=:mail,sifre=:sifre,stts=:stts WHERE u_id=:u_id";
    $stmt = $db->prepare($sql);
    $stmt->execute($data);

    header("Location: ../allusers?profileupdated");
}

if (isset($_GET['useredit'])) {
    $data = [
        'u_id' => $_GET['u_id'],
        'ad' => $_GET['ead'],
        'soyad' => $_GET['esoyad'],
        'nomre' => $_GET['enomre'],
        'mail' => $_GET['email'],
        'sifre' => openssl_encrypt($_GET['esifre'], $ciphering, $encryption_key, $options, $encryption_iv)];
    $sql = "UPDATE se_all_users SET ad=:ad,soyad=:soyad,nomre=:nomre,mail=:mail,sifre=:sifre WHERE u_id=:u_id";
    $stmt = $db->prepare($sql);
    $stmt->execute($data);
    
    header("Location: ../../profile?profileupdated");
}


if (isset($_POST['nedit'])) {
    $data = ['nad' => $_POST['nad'], 'n_id' => $_GET['n_id']];
    $sql = "UPDATE se_nesriyyatcilar SET n_ad=:nad WHERE n_id=:n_id";
    $stmt = $db->prepare($sql);
    $stmt->execute($data);
    header('Location: ../nesriyyatcilar?nupdated');
}

if (isset($_POST['nsil'])) {
    $n_id = $_GET['n_id'];

    $del = 'DELETE FROM se_nesriyyatcilar WHERE n_id = :n_id';
    $stmt = $db->prepare($del);
    $stmt->bindParam(':n_id', $n_id);
    $stmt->execute();
    if ($stmt->execute()) {
        header("Location: ../nesriyyatcilar?cwasdeleted");
    }
}

if (isset($_POST['nnew'])) {

    $n_ad = $_POST['nadi'];

    $addnewuser = $db->prepare("INSERT INTO se_nesriyyatcilar (n_ad) values (:n_ad)");
    $addnewuser->execute(['n_ad' => $n_ad]);

    header('Location: ../nesriyyatcilar');
}

if (isset($_POST['kedit'])) {
    $data = ['kad' => $_POST['kad'], 'k_id' => $_GET['k_id']];
    $sql = "UPDATE se_kateqoriya SET k_ad=:kad WHERE k_id=:k_id";
    $stmt = $db->prepare($sql);
    $stmt->execute($data);
    header('Location: ../kateqoriyalar?profileupdated');
}

if (isset($_POST['ksil'])) {
    $k_id = $_GET['k_id'];

    $del = 'DELETE FROM se_kateqoriya WHERE k_id = :k_id';
    $stmt = $db->prepare($del);
    $stmt->bindParam(':k_id', $k_id);
    $stmt->execute();
    if ($stmt->execute()) {
        header("Location: ../kateqoriyalar?cwasdeleted");
    }
}

if (isset($_POST['cnew'])) {

    $k_ad = $_POST['kadi'];

    $addnewuser = $db->prepare("INSERT INTO se_kateqoriya (k_ad) values (:k_ad)");
    $addnewuser->execute(['k_ad' => $k_ad]);

    header('Location: ../kateqoriyalar');
}

if (isset($_POST['eabout'])) {

    $data = [
        'nomre' => $_POST['nomre'],
        'a_id' => "0",
        'sayt' => $_POST['sayt'],
    ];
    $sql = "UPDATE se_about SET nomre=:nomre, sayt=:sayt WHERE a_id=:a_id";
    $stmt = $db->prepare($sql);
    $stmt->execute($data);
    header('Location: ../about?aboutwaschanged');
}

if (isset($_GET['madd'])) {

    $us00 = $db->prepare("SELECT * FROM se_all_users");
    $us00->execute();
    $mail = $_GET['muellimmail'];
    while($uc00 = $us00->fetch(PDO::FETCH_ASSOC)){
         if ($uc00['mail']==$mail){
        header('Location: ../muellimelave?buistifadeciartiqmovcuddur');
    }} 
        $ad = $_GET['muellimad'];
        $soyad = $_GET['muellimsoyad'];
        $nomre = $_GET['muellimtelefon'];

        $sfr = $_GET['muellimpass'];
        $sifre = openssl_encrypt($sfr, $ciphering, $encryption_key, $options, $encryption_iv);
        $stts = "sm";
        $qeydiyyat = date_create('now')->format('Y-m-d H:i:s');

        $am = $db->prepare("INSERT INTO se_all_users (ad,soyad,nomre,mail,sifre,qeydiyyat,stts)
        values (:ad,:soyad,:nomre,:mail,:sifre,:qeydiyyat,:stts)");
        $am->execute(['ad' => $ad, 'soyad' => $soyad, 'nomre' => $nomre, 'mail' => $mail, 'sifre' => $sifre, 'qeydiyyat' => $qeydiyyat, 'stts' => $stts]);
        header('Location: ../index?muellimelaveolundu');
   
}

if (isset($_POST['medit'])) {

    $u_id = $_GET['u_id'];
    $data = [
        'ad' => $_POST['muellimad'],
        'soyad' => $_POST['muellimsoyad'],
        'nomre' => $_POST['muellimtelefon'],
        'mail' => $_POST['muellimmail'],
        'sifre' => $_POST['muellimpass'],
        'u_id' => $_GET['u_id'],
    ];
    $sql = "UPDATE se_all_users SET ad=:ad,soyad=:soyad,nomre=:nomre,mail=:mail,sifre=:sifre WHERE u_id=:u_id";
    $stmt = $db->prepare($sql);
    $stmt->execute($data);
    header('Location: ../bm?muellimyenilendi');
}

if (isset($_POST['mdel'])) {
    $u_id = $_GET['u_id'];

    $del = 'DELETE FROM se_all_users WHERE u_id = :u_id';
    $stmt = $db->prepare($del);
    $stmt->bindParam(':u_id', $u_id);
    $stmt->execute();
    if ($stmt->execute()) {
        header("Location: ../bm?muellimsilindi");
    }
}
if (isset($_POST['idel'])) {
    $e_id = $_GET['e_id'];

    $del = 'DELETE FROM se_exam WHERE e_id = :e_id';
    $stmt = $db->prepare($del);
    $stmt->bindParam(':e_id', $e_id);
    $stmt->execute();
    if ($stmt->execute()) {
        header("Location: ../imtahanlar?imtahansilindi");
    }
}
if (!empty($_GET['c_exam'])) {

    $es00 = $db->prepare("SELECT * FROM se_suallar where e_id=:e_id");
    $es00->execute(array('e_id' => $_GET['c_exam']));

    $e_id = $_GET['c_exam'];
    $istirakci = $_GET['c_s'];
    $qeydiyyat = date_create('now')->format('Y-m-d H:i:s');

    while ($ec00 = $es00->fetch(PDO::FETCH_ASSOC)) {

        if (!empty($_GET['cavab' . strval($ec00['s_id'])])) {
            $cavab = $_GET['cavab' . strval($ec00['s_id'])];
        } else { $cavab = " ";}
        $qeyd = $_GET['qeyd' . strval($ec00['s_id'])];
        $slch = $db->prepare("SELECT * FROM se_suallar where s_id=:s_id and tip=:tip");
        $slch->execute(array('s_id' => $ec00['s_id'], 'tip' => "test"));
        $slch0 = $slch->fetch(PDO::FETCH_ASSOC);
        $em = $db->prepare("INSERT INTO se_yoxlamalar (e_id,istirakci,s_id,cavab,qeyd,qeydiyyat,stts,stts3)
        values (:e_id,:istirakci,:s_id,:cavab,:qeyd,:qeydiyyat,:stts,:stts3)");
        $em->execute(['stts3' => "Gözləmədə", 'e_id' => $e_id, 'istirakci' => $istirakci, 's_id' => $ec00['s_id'], 'cavab' => $cavab, 'qeyd' => $qeyd, 'qeydiyyat' => $qeydiyyat, 'stts' => "Yoxlanılmayıb"]);

        if ($ec00['tip'] == "test" and $cavab == $ec00['dv']) {
            $data = ['stts3' => "Düz", 'qiymet' => $slch0['verdiyibal'], 'stts' => "Yoxlanılıb", 'e_id' => $_GET['c_exam'], 's_id' => intval($ec00['s_id']), 'istirakci' => $istirakci];
            $sql = "UPDATE se_yoxlamalar SET qiymet =:qiymet,stts=:stts,stts3=:stts3 WHERE istirakci=:istirakci and e_id=:e_id and s_id=:s_id";
            $stmt = $db->prepare($sql);
            $stmt->execute($data);
        } elseif ($ec00['tip'] == "test" and $cavab != $ec00['dv']) {
            $data = ['stts3' => "Səhv", 'qiymet' => (0 - intval($slch0['cixdigibal'])), 'stts' => "Yoxlanılıb", 'e_id' => $_GET['c_exam'], 's_id' => intval($ec00['s_id']), 'istirakci' => $istirakci];
            $sql = "UPDATE se_yoxlamalar SET qiymet =:qiymet,stts=:stts,stts3=:stts3 WHERE istirakci=:istirakci and e_id=:e_id and s_id=:s_id";
            $stmt = $db->prepare($sql);
            $stmt->execute($data);
        }

        $yoxlaniss = $db->prepare("SELECT * FROM se_suallar where e_id=:e_id");
        $yoxlaniss->execute(array('e_id' => $e_id));
        $nsay = $yoxlaniss->rowCount();
        while ($yxlns0 = $yoxlaniss->fetch(PDO::FETCH_ASSOC)) {
            $imax = 0;
            for ($i = 1; $i <= $nsay; $i++) {
                $imax += $yxlns0['verdiyibal'];
            }
        }
    }
    $yoxlanis = $db->prepare("SELECT * FROM se_yoxlamalar where e_id=:e_id and istirakci=:istirakci");
    $yoxlanis->execute(array('e_id' => $e_id, 'istirakci' => $istirakci));
    $yxlns = $yoxlanis->fetch(PDO::FETCH_ASSOC);
    $qymt2 = 0;
    $qymt2 += $yxlns['qiymet'];

    $ny = $db->prepare("INSERT INTO se_neticeler (e_id,istirakci,imax,netice,btarix,stts)
        values (:e_id,:istirakci,:imax,:netice,:btarix,:stts)");
    $ny->execute(['e_id' => $e_id, 'istirakci' => $istirakci, 'imax' => $imax, 'netice' => $qymt2, 'btarix' => $qeydiyyat, 'stts' => "Passiv"]);


    $data = [
        'alan' => $istirakci,
        'stts3' => "Bitib",
        'e_id' => $e_id,
    ];

    $sql = "UPDATE se_sifarisler SET stts3=:stts3 WHERE alan=:alan and e_id=:e_id";
    $stmt = $db->prepare($sql);
    $stmt->execute($data);



    header("location:../../result?e_id=".$e_id);
}
if (isset($_GET['yoxla'])) {

    $saulnomre = $_GET['s_id'];
    $e_id = $_GET['e_id'];
    $yoxlanilan = $_GET['yxln'];
    $qiymet = $_GET['qiymet' . $saulnomre];
    $sttss = "Yoxlanılıb";
    //if($qiymet==""){$sttss = "Yoxlanılmayıb";}
    $qeydiyyat = date_create('now')->format('Y-m-d H:i:s');

    $data = ['stts' => $sttss, 'qiymet' => $qiymet, 's_id' => $saulnomre, 'e_id' => $e_id, 'istirakci' => $yoxlanilan, 'stts3' => "Düz"];
    $sql = "UPDATE se_yoxlamalar SET qiymet =:qiymet,stts=:stts,stts3=:stts3 WHERE istirakci=:istirakci and e_id=:e_id and s_id=:s_id";
    $stmt = $db->prepare($sql);
    $stmt->execute($data);

    $blns = $db->prepare("SELECT * FROM se_neticeler where e_id=:e_id and istirakci=:istirakci");
    $blns->execute(array('e_id' => $e_id, 'istirakci' => $yoxlanilan));
    $blns0 = $blns->fetch(PDO::FETCH_ASSOC);

    $ntc = intval($blns0['netice']) + intval($qiymet);

    $data = ['netice' => $ntc, 'istirakci' => $yoxlanilan, 'e_id' => $e_id];
    $sql = "UPDATE se_neticeler SET netice =:netice WHERE istirakci=:istirakci and e_id=:e_id";
    $stmt = $db->prepare($sql);
    $stmt->execute($data);

    header("Location:../imtahanyoxlanis?e_id=" . $e_id);

}
if (isset($_GET['sehvdir'])) {

    $saulnomre = $_GET['s_id'];
    $e_id = $_GET['e_id'];
    $yoxlanilan = $_GET['yxln'];

    $qeydiyyat = date_create('now')->format('Y-m-d H:i:s');

    $shv = $db->prepare("SELECT * FROM se_suallar where e_id=:e_id and s_id=:s_id");
    $shv->execute(array('e_id' => $e_id, 's_id' => $saulnomre));
    $shv0 = $shv->fetch(PDO::FETCH_ASSOC);
    $qiymet = (0 - $shv0['cixdigibal']);
    $data = ['stts' => "Yoxlanılıb", 'qiymet' => $qiymet, 's_id' => $saulnomre, 'e_id' => $e_id, 'istirakci' => $yoxlanilan, 'stts3' => "Səhv"];
    $sql = "UPDATE se_yoxlamalar SET qiymet =:qiymet,stts=:stts,stts3=:stts3 WHERE istirakci=:istirakci and e_id=:e_id and s_id=:s_id";
    $stmt = $db->prepare($sql);
    $stmt->execute($data);

    $blns = $db->prepare("SELECT * FROM se_neticeler where e_id=:e_id and istirakci=:istirakci");
    $blns->execute(array('e_id' => $e_id, 'istirakci' => $yoxlanilan));
    $blns0 = $blns->fetch(PDO::FETCH_ASSOC);

    $ntc = intval($blns0['netice']) + intval($qiymet);

    $data = ['netice' => $ntc, 'istirakci' => $yoxlanilan, 'e_id' => $e_id];
    $sql = "UPDATE se_neticeler SET netice =:netice WHERE istirakci=:istirakci and e_id=:e_id";
    $stmt = $db->prepare($sql);
    $stmt->execute($data);

    header("Location:../imtahanyoxlanis?e_id=" . $e_id);
}

if (isset($_GET['getexam'])) {
    $student = $_GET['by'];
    $imtahanid = $_GET['e_id'];
    $imtahaniyoxla = $db->prepare("SELECT * FROM se_exam where e_id=:e_id");
    $imtahaniyoxla->execute(array('e_id' => $imtahanid));
    $iyc = $imtahaniyoxla->fetch(PDO::FETCH_ASSOC);
    $puluyoxla = $db->prepare("SELECT * FROM se_all_users where mail=:mail");
    $puluyoxla->execute(array('mail' => $student));
    $pyc = $puluyoxla->fetch(PDO::FETCH_ASSOC);
    $qeydiyyat = date_create('now')->format('Y-m-d H:i:s');
    if (intval($pyc['balans']) >= intval($iyc['qiymet'])) {

        $caribalans = intval($pyc['balans'] - $iyc['qiymet']);
        $data = ['balans' => $caribalans, 'mail' => $student];
        $sql = "UPDATE se_all_users SET balans =:balans WHERE mail=:mail";
        $stmt = $db->prepare($sql);
        $stmt->execute($data);

        $em = $db->prepare("INSERT INTO se_sifarisler (alan,e_id,vaxt,status2,stts3)
        values (:alan,:e_id,:vaxt,:status2,:stts3)");
        $em->execute(['e_id' => $imtahanid, 'alan' => $student, 'vaxt' => $qeydiyyat, 'status2' => "Ödənilib", 'stts3' => "Daxil olunmayıb"]);
        header('Location:../../mail?e_id=' . $imtahanid . "&getexam=start");

    } else {
        header('Location:../../exam-info?e_id=' . $imtahanid . "&st=bkqvy");
    }

}
// if(isset($_GET['imtahanadaxilol'])){
//     $by = $_GET['by'];
//     $e_id=$_GET['e_id'];

//     $daxilol = $db->prepare("SELECT * FROM se_sifarisler where e_id=:e_id and istirakci=:istirakci ");
//     $daxilol->execute(array('istirakci' => $by, 'e_id' => $e_id));
//     $daxilol1 = $daxilol->fetch(PDO::FETCH_ASSOC);
//     if('stts')
// }
if (isset($_GET['sifrenideyis'])) {

    $n = 20;
    function getName($n)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }

    $rstlyn = $_GET['r'];
    $tkn = $_GET['token'];

    $yenisifre = $_GET['parol'];
    $sifre = openssl_encrypt($yenisifre, $ciphering, $encryption_key, $options, $encryption_iv);

    $data = [
        'mail' => $rstlyn,
        'resetcode' => getName($n),
        'sifre' => $sifre,
    ];

    $sql = "UPDATE se_all_users SET resetcode=:resetcode,sifre=:sifre WHERE mail=:mail";
    $stmt = $db->prepare($sql);
    $stmt->execute($data);

    header('Location:../../sign-in');

}
if (isset($_GET['imtahaniaktivet'])) {
    $e_id = $_GET['e_id'];
    $data = ['stts' => "Aktiv", 'e_id' => $e_id];
    $sql = "UPDATE se_exam SET stts =:stts WHERE e_id=:e_id";
    $stmt = $db->prepare($sql);
    $stmt->execute($data);

    $exsorus = $db->prepare("SELECT * FROM se_exam where e_id=:e_id");
    $exsorus->execute(array('e_id'=>$e_id));
    $exsorus0 = $exsorus->fetch(PDO::FETCH_ASSOC);
    $date = $exsorus0['tarix'].$exsorus0['saat'];
    $endexam = date('Y-m-d H:i',strtotime($date."+$exsorus0[tarix1] minutes"));


    $data = [
        'bitisvaxti' => $endexam,
        'e_id' => $e_id,
    ];
    $sql = "UPDATE se_exam SET bitisvaxti=:bitisvaxti WHERE e_id=:e_id";
    $stmt = $db->prepare($sql);
    $stmt->execute($data);

    header("Location: ../imtahanlar");
}
if (isset($_GET['imtahanideaktivet'])) {
    $e_id = $_GET['e_id'];

    $data = ['stts' => "Passiv", 'e_id' => $e_id];
    $sql = "UPDATE se_exam SET stts =:stts WHERE e_id=:e_id";
    $stmt = $db->prepare($sql);
    $stmt->execute($data);
    header("Location: ../imtahanlar");
}
ob_end_flush();