<?php
    include('./connect.php');

    $chatId = 1;

    if($conn) {
        $querySelect = "SELECT * FROM `message` JOIN chat ON message.chat_id = chat.chat_id WHERE message.chat_id = '$chatId' ORDER BY message.mess_time ASC";
        $enforcement = $conn -> query($querySelect); 
        $transData = [];
        while ($data = $enforcement -> fetch_assoc()) {
            array_push($transData, $data);
        }
        echo json_encode($transData);
    };
?>