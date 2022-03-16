<?php
    $conn = new MySQLi('localhost', 'root', '', 'onlineclass');

    $response = fopen("php://input", "r");
    while ($data = fread($response, 1024)) {
        $responseJSON = json_decode($data, true);
        $username = $responseJSON[0];
        $password = $responseJSON[1];
    }

    $query = "SELECT * FROM user WHERE `user_name` = '$username' AND `user_password` = '$password'";
    $sql = $conn -> query($query);
    $data = $sql -> fetch_assoc();
    if($data == null) echo -1;
    else echo $data['user_type'];
?>