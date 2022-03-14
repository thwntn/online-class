<?php
    $conn = new MySQLi('localhost', 'root', '', 'onlineclass');

    if($conn) {
        $querySelect = "SELECT * from user";
        $enforcement = $conn -> query($querySelect);
        $transData = [];
        while ($data = $enforcement -> fetch_assoc()) {
            array_push($transData, $data);
        }
        echo json_encode($transData);
    };
?>