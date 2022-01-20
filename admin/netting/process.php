<?php
ob_start();
session_start();
include 'connect.php';
date_default_timezone_set('Etc/GMT-4');
$slideredittime = date_create('now')->format('Y-m-d H:i:s');


if (isset($_POST['adminlogin'])) {
    $loginmail = $_POST['loginmail'];
    $loginpass = $_POST['loginpass'];

    $adminsor = $db->prepare("SELECT * FROM se_all_users where sifre=:sifre and mail=:mail");
    $adminsor->execute(array(
        'sifre' => $loginpass,
        'mail' => $loginmail
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

//////////////////////////////////////
if (isset($_POST['qeydiyyat'])) {

    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $nomre = $_POST['nomre'];
    $mail = $_POST['mail'];
    $sifre = $_POST['sifre'];
    $u_id = substr($ad, 0, 1) . substr($soyad, 0, 1) . substr($mail, 0, 1) . rand(0, 99999);
    $qeydiyyat = date_create('now')->format('Y-m-d H:i:s');
    $status="se";

    $addnewuser = $db->prepare("INSERT INTO se_all_users (u_id,ad,soyad,nomre,balans,mail,sifre,qeydiyyat,stts) 
     values (:u_id,:ad,:soyad,:nomre,:balans,:mail,:sifre,:qeydiyyat,:stts)");
    $addnewuser->execute(['u_id' => $u_id, 'ad' => $ad, 'soyad' => $soyad, 'nomre' => $nomre, 'balans' => "0", 'mail' => $mail, 'sifre' => $sifre, 'qeydiyyat' => $qeydiyyat, 'stts' => $status]);

    header('Location: ../../sign-in');
}

if (isset($_POST['daxilol'])) {
    $mail = $_POST['mail'];
    $sifre = $_POST['sifre'];

    $usersor = $db->prepare("SELECT * FROM se_all_users where sifre=:sifre and mail=:mail");
    $usersor->execute(array(
        'sifre' => $sifre,
        'mail' => $mail
    ));
    $usercek = $usersor->fetch(PDO::FETCH_ASSOC);
    if ($mail == $usercek['mail'] && $sifre == $usercek['sifre']) {
        $_SESSION['mail0'] = $mail;
        header('Location: ../../home');
    } else {
        header('Location: ../../sign-in');
    }
}

if (isset($_POST['uedit'])) {
    $data = [
        'ad' => $_POST['ead'],
        'soyad' => $_POST['esoyad'],
        'nomre' => $_POST['enomre'],
        'mail' => $_SESSION['mail0'],
        'sifre' => $_POST['esifre']
    ];
    $sql = "UPDATE se_all_users SET ad=:ad, soyad=:soyad,nomre=:nomre,sifre=:sifre WHERE mail=:mail";
    $stmt = $db->prepare($sql);
    $stmt->execute($data);
    header('Location: ../../profile?profileupdated');
}
////////////////////////////////////////////////////////////////
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
    $n_id = substr($n_ad, 0, 1) . rand(0, 99999);

    $addnewuser = $db->prepare("INSERT INTO se_nesriyyatcilar (n_id,n_ad) values (:n_id,:n_ad)");
    $addnewuser->execute(['n_id' => $n_id, 'n_ad' => $n_ad]);

    header('Location: ../nesriyyatcilar');
}
////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////
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
    $k_id = substr($k_ad, 0, 1) . rand(0, 99999);

    $addnewuser = $db->prepare("INSERT INTO se_kateqoriya (k_id,k_ad) values (:k_id,:k_ad)");
    $addnewuser->execute(['k_id' => $k_id, 'k_ad' => $k_ad]);

    header('Location: ../kateqoriyalar');
}
////////////////////////////////////////////////////////////////
if (isset($_POST['eabout'])) {

    $data = [
        'nomre' => $_POST['nomre'],
        'a_id' => "0",
        'sayt' => $_POST['sayt']
    ];
    $sql = "UPDATE se_about SET nomre=:nomre, sayt=:sayt WHERE a_id=:a_id";
    $stmt = $db->prepare($sql);
    $stmt->execute($data);
    header('Location: ../about?aboutwaschanged');
}

if (isset($_POST['muellimadd'])) {

    $m_ad = $_POST['muellimad'];
    $m_soyad = $_POST['muellimsoyad'];
    $m_telefon = $_POST['muellimtelefon'];
    $m_mail = $_POST['muellimmail'];
    $m_yas = $_POST['muellimyas'];
    $m_pass = $_POST['muellimpass'];
    $m_fenn = $_POST['muellimfenn'];
    $m_id = substr($m_ad, 0, 1) . substr($m_soyad, 0, 1) . substr($m_mail, 0, 1) . substr($m_yas, 0, 1) . rand(0, 99999);
    $m_qeydiyyat = date_create('now')->format('Y-m-d H:i:s');

    $addnewuser = $db->prepare("INSERT INTO muellimler (m_id,m_ad,m_soyad,m_telefon,m_yas,m_mail,m_pass,m_fenn,m_qeydiyyat) 
     values (:m_id,:m_ad,:m_soyad,:m_telefon,:m_yas,:m_mail,:m_pass,:m_fenn,:m_qeydiyyat)");
    $addnewuser->execute(['m_id' => $m_id, 'm_ad' => $m_ad, 'm_soyad' => $m_soyad, 'm_telefon' => $m_telefon, 'm_yas' => $m_yas, 'm_mail' => $m_mail, 'm_pass' => $m_pass, 'm_fenn' => $m_fenn, 'm_qeydiyyat' => $m_qeydiyyat]);

    header('Location: ../index?muellimelaveolundu');
}

if (isset($_POST['muellimduzelis'])) {

    $muellim_id = $_GET['muellim_id'];


    $data = [
        ':m_ad' => $_POST['muellimad'],
        'm_soyad' => $_POST['muellimsoyad'],
        'm_telefon' => $_POST['muellimtelefon'],
        'm_mail' => $_POST['muellimmail'],
        'm_yas' => $_POST['muellimyas'],
        'm_pass' => $_POST['muellimpass'],
        'm_fenn' => $_POST['muellimfenn'],
        'm_id' => $_GET['muellim_id']
    ];
    $sql = "UPDATE muellimler SET m_ad=:m_ad, m_soyad=:m_soyad, m_telefon=:m_telefon, m_mail=:m_mail, m_yas=:m_yas, m_pass=:m_pass, m_fenn=:m_fenn WHERE m_id=:m_id";
    $stmt = $db->prepare($sql);
    $stmt->execute($data);
    header('Location: ../butunmuellimler?muellimyenilendi');
}
