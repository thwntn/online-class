<?php
    include('./connect.php');

    $open = fopen('php://input', 'r');
    while($read = fread($open, 1024)) {
        $responseJson = json_decode($read, true);
    }

    $query = "INSERT INTO message (mess_content, mess_time, mess_type, chat_id) VALUE ('$responseJson[content]', NOW(), '1', '$responseJson[chatId]')";

    echo $conn -> query($query);
?>