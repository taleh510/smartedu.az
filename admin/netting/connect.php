<?php try {
    $db = new PDO("mysql:host=127.0.0.1;dbname=se_az;charset=utf8;", 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOExpception $me) {
    echo $me->getMessage();
}

$ciphering = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$encryption_iv = '1234567891011121';
$encryption_key = "Deirvlon";?>
