<?php
    include('./connect.php');

    $content = 'tao ăn roi';
    $chatId = 1;

    $query = "INSERT INTO message (mess_content, mess_time, mess_type, chat_id) VALUE ('$content', '2022-1-08 18:14:34', '1', '$chatId')";

    echo $conn -> query($query);
?>