<?php
    include './demo/connect.php';

    function logSystem($content, $userName, $conn) {
        $query = "INSERT INTO log ( log_content, log_time, user_name ) VALUES ( '$content', NOW(), '$userName' )";
        $conn -> query($query);
    }

?>