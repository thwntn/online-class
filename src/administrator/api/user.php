<?php
    include('./connect.php');

    if($conn) {
        $querySelect = "SELECT * from user WHERE user_type = 1 OR user_type = 2 OR user_type = 3 or user_type = 4";
        $enforcement = $conn -> query($querySelect);
        $transData = [];
        while ($data = $enforcement -> fetch_assoc()) {
            array_push($transData, $data);
        }
        echo json_encode($transData);
    };
?>