<?php
    include('./connect.php');

    $open = fopen('php://input', 'r');
    while($read = fread($open, 1024)){
        $response = json_decode($read, true);
    }

    //lấy user_email để gửi lại mã xác thực
    $userName = $response['username'];
    $query = "SELECT user_email FROM user INNER JOIN authentication ON user.user_name = authentication.user_name WHERE user.user_name = '$userName'";
    $result = $conn -> query($query);
    $data = $result -> fetch_assoc();


    $email = $data['user_email'];
    $code = rand(100000,999999);
    $time = date("Y-m-d h:i:s");

    $subject = "Mã xác nhận từ OnlineClass";
    
    $message = "Mã xác nhận của bạn tại Online Class là: ". $code;
    
    $header = "From:abc@somedomain.com \r\n";
    $header .= "Cc:afgh@somedomain.com \r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";
    
    $retval = mail ($email,$subject,$message,$header);
    
    if( $retval == true ) {
        $query = "INSERT INTO authentication (authen_code, authen_time, user_name) VALUE ('$code', '$time', '$userName')";
        echo $conn -> query($query);
    }else {
        echo -1;
    }
?>