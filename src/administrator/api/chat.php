<?php
    include('./connect.php');
    
    if($conn) {
        $querySelect = "SELECT * FROM chat JOIN user ON chat.friend_user = user.user_name WHERE chat.user_name = 'admin'";
        $enforcement = $conn -> query($querySelect);
        $transData = [];
        while ($data = $enforcement -> fetch_assoc()) {
            array_push($transData, $data);
        }
        echo json_encode($transData);
    };
?>