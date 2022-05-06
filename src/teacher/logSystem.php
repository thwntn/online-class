<?php
    include('./connect.php');

    function logSystem($content, $userName, $con) {
        $query = "INSERT INTO log ( log_content, log_time, user_name ) VALUES ( '$content', NOW(), '$userName' )";
        $con -> query($query);
    }

    

    

?>