<?php
    include('./connect.php');

    $query = "SELECT * FROM user INNER JOIN authentication ON user.user_name = authentication.user_name WHERE user.user_type = 8 OR user.user_type = 9";

    $listUser = [];

    foreach($conn -> query($query) as $value) {
        array_push($listUser, $value);
    }

    echo json_encode($listUser);
?>