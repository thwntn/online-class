<?php 
include 'connect.php';

$sql='DELETE FROM homework where homework_id='.$_GET["id"].'';
$kq=$con->query($sql);
 header('Location:homework.php?id='.$_GET["id"].'');

?>