<?php
    include('./connect.php');

    $open = fopen('php://input', 'r');
    while($read = fread($open, 1024)){
        $response = json_decode($read, true);
    }

    $userName = $response['username'];
    $code = $response['code'];

    $query = "SELECT username FROM authentication WHERE code = '$code'";
    $result = $conn -> query($query);

    $data = $result -> fetch_assoc();

    if(($data != null) && ($data['username'] == $userName)) {
        $queryType = "SELECT user_type FROM user WHERE `user_name` = '$userName'";
        $resultType = $conn -> query($queryType);

        $dataType = $resultType -> fetch_assoc();

        if($dataType != null) {
            $userType = $dataType['user_type'];

            switch($userType) {
                case 8: {
                    $userType = 2;
                    break;
                }
                case 9: {
                    $userType = 1;
                    break;
                }
            }

            $queryUpdate = "UPDATE user SET user_type = '$userType'";
            echo $final = $conn -> query($queryUpdate);
        }
    }
    else echo -1;
?>