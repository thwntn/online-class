<?php
    include('./connect.php');

    $query = "SELECT user_name, user_fullname, user_type, user_image FROM user WHERE user_type = 50";
    $result = $conn -> query($query);

    $listUser = [];

    while ($data = $result -> fetch_assoc()) {
        array_push($listUser, $data);
    }
    print_r(json_encode($listUser));

?>