<?php 
include './demo/connect.php';
    $sql='DELETE FROM comment where comment_id='.$_POST["id"].'';
    mysqli_query($conn,$sql);
    header('Location:homework.php?id='.$_POST['homework_id'].'');

?>