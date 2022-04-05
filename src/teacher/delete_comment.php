<?php 
include 'connect.php';
$hw_id = $_GET['homework_id'];
$user = $_GET['userOL'];
$comment_id=$_GET['comment_id'];
$sql='DELETE FROM comment where comment_id='.$comment_id.'';
$kq=$con->query($sql);

     header('Location:homework.php?homework_id='.$hw_id.'&userOL='.$user.'');

?>
<!-- 
$sql1="SELECT * FROM homework";
$kq1=$con->query($sql1);
$row = mysqli_fetch_assoc($kq1);
echo $row['homework_id'];
?> -->