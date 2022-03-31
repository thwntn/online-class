<?php 
include 'connect.php';
if (isset($_POST["submit-btn"])) {
    $id = $_POST["subject_id"];
    $name = $_POST["subject_name"];
    $image = $_POST["subject_image"];
    $year = $_POST["subject_year"];
    $semester = $_POST["subject_semester"];
    $credit = $_POST["subject_credit"];
    $user = $_POST["user_name"];
    $sql = "INSERT INTO subject(subject_id, subject_name, subject_image, subject_year, subject_semester, subject_credit, user_name) VALUES ( '$id', '$name','$image', '$year', '$semester','$credit', '$user')";
    mysqli_query($con,$sql);
    header("Location:manage.php"); 
}
?>