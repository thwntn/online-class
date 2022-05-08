<?php
    include('./connect.php');
    $open = fopen('php://input', 'r');
    while($read = fread($open, 1024)) {
        $res = json_decode($read, true);
    }
    $userName = $res['userName'];
    $friendUser = $res['friendUser'];

    $queryCheck = "SELECT chat_id FROM chat WHERE user_name = '$userName' AND friend_user = '$friendUser'";
    $result = $conn -> query($queryCheck);

    $final = $result -> fetch_assoc();

    if($final == null) {
        $query = "INSERT INTO chat(user_name, friend_user) VALUE ('$userName', '$friendUser');";
        $query .= "INSERT INTO chat(user_name, friend_user) VALUE ('$friendUser', '$userName')";
    
        echo $conn -> multi_query($query);
    } else {
        echo 0;
        
    }
    
?>