<?php
    include './demo/connect.php';
    $subject_id = $_POST['subject_id'];
    $user_name = $_POST['userOL'];
    $homework_id = $_POST['homework_id'];
    if(isset($_POST['comment'])){
        $homework_id=$_POST['homework_id'];
        $content=$_POST["comment"];
        if($content == ""){

        }else{
            $sql1 = "INSERT INTO comment(comment_content, comment_time, user_name, homework_id) 
                VALUES ('$content', now(),'$user_name','$homework_id')";
            $kq1=$conn->query($sql1);
            header('location:homework.php?homework_id='.$homework_id.'&userOL='.$user_name.'');
        }
    }
?>