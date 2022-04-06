<?php
include './demo/connect.php';
$subject_id = $_POST['subject_id'];
$user_name = $_POST['userOL'];
    if(isset($_POST["submit"])){
        $sql2 = "INSERT INTO registry( subject_id, user_name) 
            VALUES ('$subject_id', '$user_name')";
        mysqli_query($conn,$sql2);
        
        header('location:subject.php?subject_id='.$subject_id.'&userOL='.$user_name.'');
    }
?>