<?php
    $open = fopen('php://input', 'r');
    while($read = fread($open, 1024)) {
        $res = json_decode($read, true);
    }

    $status = $res['getCookie'];


    switch($status){
        case 0: {
            echo setcookie('loginOnlineClass', 'eae889ceda1452b34555b2', time() + 864000*2);
            break;
        }
        case 1: {
            if(isset($_COOKIE['loginOnlineClass'])) {
                echo $_COOKIE['loginOnlineClass'] == 'eae889ceda1452b34555b2';
            } else {
                echo -2;
            }
            break;
        }
        case -1: {
            echo setcookie('loginOnlineClass', '', time() - 864000*2);
            break;
        }
    }

    // echo $_COOKIE['userOL'];

    // if($status == 1) {
    //     if(isset($_COOKIE['userOL'])) {
    //         echo $_COOKIE['userOL'] == 'eae889ceda1452b34555b2';
    //     }
    // } else if($status == 0){
    //     if(setcookie('userOL', 'eae889ceda1452b34555b2', time() + 864000*2)) {
    //         echo 0;
    //     }
    // } else {
        // if(setcookie('userOL', '', time() - 864000*2)) echo -1;
    // }
?>