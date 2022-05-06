<?php
    include('connect.php');

    $query = "SELECT * FROM notification WHERE user_name = 'admin'";
    $queryCount = "SELECT COUNT(*) as notRead FROM notification WHERE user_name = 'admin' AND noti_status = 2";

    $data = [];

    foreach($conn -> query($query) as $values) {
        array_push($data, $values);
    }

    foreach($conn -> query($queryCount) as $values) {
        array_push($data, $values);
    }
    
    print_r(json_encode($data));
?>