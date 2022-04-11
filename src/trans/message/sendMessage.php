<?php
    include('./connect.php');

    $content = 'noi dung can gui';
    $chatId = 2;

    $query = "INSERT INTO message (mess_content, mess_time, mess_type, chat_id) VALUE ('$content', NOW(), '1', '$chatId')";

    echo $conn -> query($query);
?>