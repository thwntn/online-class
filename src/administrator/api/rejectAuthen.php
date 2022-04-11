<?php
    include('./connect.php');

    $open = fopen('php://input', 'r');
    while($read = fread($open, 1024)) {
        $response = json_decode($read, true);
    }

    $query = "DELETE FROM authentication WHERE user_name = '$response[userName]' ; DELETE FROM user WHERE user_name = '$response[userName]'";

    echo $conn -> multi_query($query);
?>