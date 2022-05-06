<?php
    include('./connect.php');

    $arr = ['user', 'comment', 'message', 'homework'];

    $data = [];

    foreach ($arr as $value) {
        $query = "SELECT COUNT(*) FROM $value";
        $result = $conn -> query($query);
        $response = $result ->fetch_assoc();
        $data[$value] = $response['COUNT(*)'];
    }
    echo json_encode($data);
?>