<?php
    include('connect.php');

    $open = fopen('php://input', 'r');
    while($read = fread($open, 1024)) {
        $response = json_decode($read, true);
    }
    
    $query = "DELETE FROM user WHERE user_name = '$response'";
    echo $result = $conn -> query($query);
?>