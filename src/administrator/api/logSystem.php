<?php
    include('./connect.php');

    function logSystem($content, $userName, $conn) {
        $query = "INSERT INTO log ( log_content, log_time, user_name ) VALUES ( '$content', NOW(), '$userName' )";
        return $conn -> query($query);
    }
?>