<?php
    include('./connect.php');

    $open = fopen('php://input', 'r');
    while($read = fread($open, 1024)) {
        $response  = json_decode($read, true);
    }

    $userName = $response['user'];
    $userAction = $response['action'];

    $queryType = "SELECT user_type FROM user WHERE `user_name` = '$userName'";
    $resultType = $conn -> query($queryType);
    $dataType = $resultType -> fetch_assoc();

    $userType = $dataType['user_type'];

    function handleLock($type) {
        switch ($type) {
            case 1: {
                return 4;
            }
            case 2: {
                return 3;
            }
            case 3: {
                return 3;
            }
            case 4: {
                return 4;
            }
        }
    }

    function handleUnLock($type) {
        switch ($type) {
            case 4: {
                return 1;
            }
            case 3: {
                return 2;
            }
            case 1: {
                return 1;
            }
            case 2: {
                return 2;
            }
        }
    }

    $keyLock = handleLock($userType);
    $keyUnLock = handleUnLock($userType);

    switch($userAction) {
        case 1: {
            $query = "UPDATE user SET user_type = '$keyLock'  WHERE `user_name` = '$userName'";
            break;
        }
        case 2: {
            $query = "UPDATE user SET user_type = '$keyUnLock' WHERE `user_name` = '$userName'";
            break; 
        }
    }

    $result = $conn -> query($query);

    echo $result;
?>