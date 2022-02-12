<?php try {
    $db = new PDO("mysql:host=localhost;dbname=u1510888_default;charset=utf8;", 'u1510888', '4OsIJVtgy07M84Ru');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOExpception $me) {
    echo $me->getMessage();
}

$ciphering = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$encryption_iv = '1234567891011121';
$encryption_key = "Deirvlon";?>
