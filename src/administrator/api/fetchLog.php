<?php
    include('./connect.php');

    $query = "SELECT * FROM log INNER JOIN user on log.user_name = user.user_name";

    $data = [];

    foreach($conn -> query($query) as $value) {
        array_push($data, $value);
    }
    print_r(json_encode($data));
    
?>