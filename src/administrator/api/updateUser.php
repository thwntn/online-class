<?php
    include('./connect.php');

    $open = fopen('php://input', 'r');
    while($read = fread($open, 1024)){
        $response = json_decode($read, true);
    }

    $query = "UPDATE user SET user_fullname = '$response[user_fullname]', user_address = '$response[user_address]', user_major = '$response[user_major]' WHERE user_name = '$response[user_name]'";
    
    echo $conn -> query($query);

?>