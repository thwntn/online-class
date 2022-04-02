<?php 
include './demo/connect.php';
    $sql='DELETE FROM comment where comment_id='.$_GET["id"].'';
    mysqli_query($conn,$sql);
    header('Location:homework.php?id='.$_GET['homework_id'].'');

?>