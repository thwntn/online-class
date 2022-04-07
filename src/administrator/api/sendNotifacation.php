<?php
    include('./connect.php');

    $open = fopen('php://input', 'r');
    while($read = fread($open, 1024)) {
        $response = json_decode($read, true);
    }

    $query = "INSERT INTO notification (noti_content, noti_status, noti_time, user_name) VALUE ('$response[content]', 2, NOW(), '$response[userName]')";

    echo $conn -> query($query);
?>