<?php
    include('./connect.php');

    $open = fopen('php://input', 'r');
    while($read = fread($open, 1024)){
        $response = json_decode($read, true);
    }

    $username = $response['username'];
    $email = $response['email'];
    $code = rand(100000,999999);
    $time = date("Y-m-d h:i:s");

    shell_exec("echo 'Mã xác thực tài khoản của bạn tại website OnlineClass là : ".$code."' | mail -s 'Mã xác thực từ Mail Server OnlineClass' ".$email);

    $query = "INSERT INTO authentication VALUE ('$username', '$code', '$time')";
    echo $conn -> query($query);

?>