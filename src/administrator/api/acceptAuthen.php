<?php
    include('./connect.php');

    $open = fopen('php://input', 'r');
    while($read = fread($open, 1024)) {
        $response = json_decode($read, true);
    }
    
    $type = ($response['userType'] == 8 ? 2 : 1);

    $query = "UPDATE user SET user_type = '$type' WHERE user_name = '$response[userName]'";

    echo $conn -> query($query);
?>