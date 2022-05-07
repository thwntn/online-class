<?php
    include('../connect.php');

    $userName = $_POST['userName'];
    $userFriend = $_POST['userFriend'];
    $content = $_POST['content'];

    // getchatid
    $queryGetChatID = "SELECT chat_id FROM chat WHERE user_name = '$userName' && friend_user = '$userFriend'";
    foreach($con -> query($queryGetChatID) as $value) {
        $chatID = $value['chat_id'];
    }

    $query = "INSERT INTO message (mess_content, mess_time, mess_type, chat_id) VALUE ('$content', NOW(), '1', '$chatID')";

    echo $con -> query($query);
?>