<?php
    include('./connect.php');
    include('./logSystem.php');
    include('./updateStatistical.php');

    $response = fopen("php://input", "r");
    while ($data = fread($response, 1024)) {
        $responseJSON = json_decode($data, true);
        $username = $responseJSON[0];
        $password = $responseJSON[1];
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

    $password_en = encrypt($password, $username);

    $query = "SELECT * FROM user WHERE `user_name` = '$username' AND `user_password` = '$password_en'";
    $sql = $conn -> query($query);
    $data = $sql -> fetch_assoc();
    if($data == null) echo 0;
    else {
        setcookie('userOL', '836bc6397d06de5f635683cff01822564683b57c5298c38bd389628685d9ce9d74cba952fc80ac305a6dd1d122bb041dfa93377880d478f27b99da3fafc05bf6', time() + 864000*2);
        echo $data['user_type'];
        // log
        logSystem('Đăng nhập', $username, $conn);
        updateStatistical($conn, 'login');
    }

?>