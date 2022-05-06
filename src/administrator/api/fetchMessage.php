<?php
    include('./connect.php');

    $open = fopen('php://input', 'r');
    while($read = fread($open, 1024)) {
        $response = json_decode($read, true);
    }

    $user_name = $response['userName'];
    $user_friend = $response['userFriend'];

    
    //lấy chat id tin nhắn send
    $query = "SELECT chat_id FROM chat WHERE user_name = '$user_name' AND friend_user = '$user_friend'";

    foreach($conn -> query($query) as $value) {
        $idSend = $value['chat_id'];
    }
    
    //lấy chat id tin nhắn received
    $query = "SELECT chat_id FROM chat WHERE user_name = '$user_friend' AND friend_user = '$user_name'";
    
    foreach($conn -> query($query) as $value) {
        $idReceived = $value['chat_id'];
    }

    //lấy tin nhắn gứi
    $listMessSend = [];

    $query = "SELECT * FROM message WHERE chat_id = '$idSend' ORDER BY mess_time ASC";
    foreach($conn -> query($query) as $value) {
        array_push($listMessSend, $value);
    }

    //lấy tin nhắn nhận
    $listMessReceived = [];

    $query = "SELECT * FROM message WHERE chat_id = '$idReceived' ORDER BY mess_time ASC";
    foreach($conn -> query($query) as $value) {
        array_push($listMessReceived, $value);
    }

    $data = [$listMessReceived, $listMessSend];

    echo(json_encode($data));
?>