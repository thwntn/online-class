<?php 
include 'connect.php';
$homework_id = $_GET['homework_id'];
$idsj = $_GET['subject_id'];
$user = $_GET['userOL'];
    $sql='DELETE FROM homework where homework_id='.$homework_id.'';
    mysqli_query($con,$sql);
    header('Location:subject.php?subject_id='.$idsj.'&userOL='.$user.'');

?>