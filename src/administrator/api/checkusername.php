<?php
    include('./connect.php');

    $open = fopen('php://input', 'r');
    while($resonse = fread($open, 1024)) {
        $resonseJSON = json_decode($resonse, true);
        $username = $resonseJSON;
    }

    $query = "SELECT user_name FROM user WHERE user_name = '$username'";
    $response = $conn -> query($query);

    $array = $response -> fetch_assoc();
    if($array == null) {
        echo -1;
    }
    else echo 1;
?>