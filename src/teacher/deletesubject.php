<?php 
include 'connect.php';
$sql='DELETE FROM subject where subject_code='.$_GET["code"].'';
$kq=$con->query($sql);

    header('Location:manage.php');

?>