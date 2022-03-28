<?php 
include 'connect.php';
if (isset($_POST["submit"])) {
    $start = $_POST["calendar_start"];
    $time = $_POST["calendar_time"];
    $weekstart = $_POST["subject_weekstart"];
    $weekend = $_POST["subject_weekend"];
    $sql = "INSERT INTO calendar(calendar_start, calendar_time, subject_weekstart, subject_weekend) VALUES ( '$start', '$time', '$weekstart', '$weekend')";
    mysqli_query($con,$sql);
}
?>