<?php
    include('./connect.php');

    $query = "SELECT * FROM  log";

    $data = [];

    foreach($conn -> query($query) as $value) {
        array_push($data, $value);
    }
    print_r(json_encode($data));
    
?>