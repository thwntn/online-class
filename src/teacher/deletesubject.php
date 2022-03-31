<?php 
include 'connect.php';
$sql='DELETE FROM subject where subject_id='.$_GET["id"].'';
$kq=$con->query($sql);

    header('Location:manage.php');

?>