<?php
    include('./connect.php');
    
    if($conn) {
        $querySelect = "SELECT * FROM chat JOIN user ON chat.user_name = user.user_name WHERE chat.user_name = 'thuylien'";
        $enforcement = $conn -> query($querySelect);
        $transData = [];
        while ($data = $enforcement -> fetch_assoc()) {
            array_push($transData, $data);
        }
        echo json_encode($transData);
    };
?>