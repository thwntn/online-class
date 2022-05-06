<?php
include './demo/connect.php';

if(isset($_GET['comment_id'])){
    $comment_id=$_GET['comment_id'];   
    $sql="SELECT * FROM comment where comment_id='$comment_id'";
    $kq=$conn->query($sql);
    $row=$kq->fetch_assoc();
   
    ?>
     <link rel="stylesheet" type="text/css" href="./giaovien.css" media="screen" />
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <p style="font-size:40px">Comment </p>
     <form method="POST" >
        <input name="comment_content"  class='create-1' value="<?php echo $row["comment_content"] ?>">
        <button type='submit' class="btn btn-secondary"  name="update">Submit</button>
    </form>   
    <?php
    if(isset($_POST["update"])) {
        $comment_content = $_POST["comment_content"];
        if ($comment_content == "") {
    
        }else{
        $sql = "UPDATE comment SET comment_content='$comment_content', comment_time=now() WHERE comment_id='$comment_id'";
         mysqli_query($conn,$sql);
        echo "Sửa comment thành công!"; 
        }
    }
} 
?>