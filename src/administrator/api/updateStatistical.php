<?php
    include('./connect.php');
    
    function updateStatistical($conn, $string) {
        $time = date("Y-m-d");
        
        $queryCheck = "SELECT * FROM statistical WHERE statis_time = '$time' && statis_type = '$string'";
        $resultCheck = $conn -> query($queryCheck);
        
        $finalCheck = $resultCheck -> fetch_assoc();
        if($finalCheck == null) {
            $queryCreate = "INSERT INTO statistical (statis_type, statis_time, statis_amount) VALUES ('$string', '$time', 1)";
            $conn -> query($queryCreate);
        } else {
            $query = "UPDATE statistical SET statis_amount = statis_amount+1 WHERE statis_type = '$string'";
            $conn->query($query);
        }
    }
?>