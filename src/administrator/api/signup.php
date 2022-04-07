<?php
    include('./connect.php');

    $resonseJSON;

    //Open:data
    $open = fopen('php://input', 'r');
    while($response = fread($open, 1024)) {
        $resonseJSON = json_decode($response, true);
    }

    function encrypt ($simple_string, $password) {
        $ciphering = "aes-256-cbc";
        
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        
        $encryption_iv = '5479456005809498';
        
        $encryption_key = openssl_digest($password, 'sha512', TRUE);
        $encryption = openssl_encrypt($simple_string, $ciphering, $encryption_key, $options, $encryption_iv);
        return $encryption;
    }

    $password_en = encrypt($resonseJSON['password'], $resonseJSON['username']);   

    $query = "INSERT INTO user VALUE ('$resonseJSON[username]', '$password_en', '$resonseJSON[fullname]', '$resonseJSON[email]', '$resonseJSON[phone]', '$resonseJSON[address]', '$resonseJSON[gendle]', '$resonseJSON[major]', '$resonseJSON[type]', '$resonseJSON[image]')";
    $responseQ = $conn -> query($query);
    if($responseQ) echo 1;
    else echo -1;
?>