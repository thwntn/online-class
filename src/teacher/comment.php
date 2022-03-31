<?php
include 'connect.php';

        if(isset($_POST["send"])){
        $content=$_POST["comment_content"];
        $idhw=$_GET["homework_id"];
        if ( $content == "") {
    
        
        }else{
        $sql1 = "INSERT INTO comment(comment_content, user_name, homework_id) VALUES ('$content', 'ngocdiem', '$idhw')";
        mysqli_query($con,$sql);
        header("Location:homework.php?id=$idhw"); 
        }
    }
?>

