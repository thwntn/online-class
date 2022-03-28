<?php
    include('./connect.php');

    $open = fopen('php://input', 'r');
    while($read = fread($open, 1024)){
        $response = json_decode($read, true);
    }

    $code = $response;

    $query = "SELECT user_name FROM authentication WHERE code = '$code'";
    $result = $conn -> query($query);

    $data = $result -> fetch_assoc();

    $userName = $data['user_name'];

    if(($data != null)) {
        $queryUpdate = "UPDATE user SET user_type = 1 WHERE `user_name` = '$userName' && user_type = 9 ; UPDATE user SET user_type = 2 WHERE `user_name` = '$userName' && user_type = 8";
        echo $final =  $conn -> multi_query($queryUpdate);
    }
    else echo -1;
?>