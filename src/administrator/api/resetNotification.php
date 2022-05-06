<?php
    include('./connect.php');

    $query =  "UPDATE notification SET noti_status = 1 WHERE user_name = 'admin'";

    $conn -> query($query);
?>