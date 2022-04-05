<?php
include './connect.php';
$hw_id = $_GET['homework_id'];
$user = $_GET['userOL'];
$comment_id=$_GET['comment_id'];
if(isset($comment_id)){   
    $sql="SELECT * FROM comment where comment_id='$comment_id'";
    $kq=$con->query($sql);
    $row=$kq->fetch_assoc();
   
    ?>
     <link rel="stylesheet" type="text/css" href="./homework.css" media="screen" />
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <p style="font-size:40px">Sửa bình luận </p>
     <form method="POST" >
    <input name="comment_content"  class='create-1' value="<?php echo $row["comment_content"] ?>">
    <button type='submit' class="btn btn-secondary"  name="update-cmt">Submit</button>
    </form>   
    <?php
    if(isset($_POST["update-cmt"])) {
        
        $content = $_POST["comment_content"];
        if ( $content == "") {
    
        }else{
            $sql = "UPDATE comment SET comment_content='$content', comment_time=now() WHERE comment_id='$comment_id'";
            mysqli_query($con,$sql);
            header('Location:homework.php?homework_id='.$hw_id.'&userOL='.$user.'');
        }
    }
} 
?>