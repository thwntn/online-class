<?php
    include('./connect.php');

    $open = fopen('php://input', 'r');
    while($read = fread($open, 1024)){
        $response = json_decode($read, true);
    }

    $username = $response['username'];
    $code = $response['code'];

    $time = date("Y-m-d h:i:s");

    $query = "INSERT INTO authentication VALUE ('$username', '$code', '$time')";
    echo $query;
?>