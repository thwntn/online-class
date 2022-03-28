<?php
    include('./connect.php');

    $open = fopen('php://input', 'r');
    while($read = fread($open, 1024)) {
        $responseJson = json_decode($read);
    }
    $userName = $responseJson['userName'];
    $userFriend = $responseJson['userFriend'];
    $chatId = $responseJson['chatId'];
    $content = $responseJson['content'];
    $time = date("Y-m-d h:i:s");

    $query = "INSERT INTO message VALUE ('$content', '$time', '1', '$chatId') WHERE (SELECT )"
?>