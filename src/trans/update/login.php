<?php
    include('./connect.php');

    $query = "UPDATE statistical SET statis_amount = statis_amount+1 WHERE statis_type = 'login'";

    echo $conn->query($query);
?>