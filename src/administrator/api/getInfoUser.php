<?php
    include('./connect.php');

    $open = fopen('php://input', 'r');
    while($read = fread($open, 1024)){
        $response = json_decode($read);
    }

    $query = "SELECT * FROM user WHERE user_name = '$response'";

    foreach($conn -> query($query) as $value) {
        echo json_encode($value);
    }
?>