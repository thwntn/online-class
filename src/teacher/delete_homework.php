<?php 
include 'connect.php';

    $sql='DELETE FROM homework where homework_id='.$_GET["id"].'';
    mysqli_query($con,$sql);
    header('Location:manage.php');

?>