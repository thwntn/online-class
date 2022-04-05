<?php 
include 'connect.php';
$idsj = $_GET['subject_id'];
$user = $_GET['userOL'];
$sql='DELETE FROM subject where subject_id='.$idsj.'';
$kq=$con->query($sql);

header('Location:manage.php?userOL='.$user.'');

?>