<?php
    include('./connect.php');

    $resonseJSON;

    //Open:data
    $open = fopen('php://input', 'r');
    while($resonse = fread($open, 1024)) {
        $resonseJSON = json_decode($resonse, true);
        print_r($resonseJSON['username']);
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

    $query = "INSERT INTO user VALUE ('$resonseJSON[username]', '$resonseJSON[fullname]', '$password_en', '$resonseJSON[address]', '$resonseJSON[phone]', '$resonseJSON[gendle]', '$resonseJSON[major]', '$resonseJSON[type]', '$resonseJSON[image]')";
    $resonse = $conn -> query($query);
    if($resonse) echo 1;
    else echo -1;
?>