<?php
include './connect.php';

if(isset($_GET['id'])){
    $id=$_GET['id'];   
    $sql="SELECT * FROM homework where homework_id='$id'";
    $kq=$con->query($sql);
    $row=$kq->fetch_assoc();
   
    ?>
     <link rel="stylesheet" type="text/css" href="./homework.css" media="screen" />
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
     <script src="//cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
     <form method="POST" class="add_baigiang"  >
     <p style="font-size:30px">Sửa tài liệu </p>
     <input type="hidden" name="id" value = " <?php echo $row['subject_id']; ?>" >  
        <input name="homework_content" value="<?php echo $row["homework_content"] ?>"> 
        
        <button type='submit' class="btn btn-secondary"  name="update-hw">Submit</button>
    </form>   
    <?php
    if(isset($_POST["update-hw"])) {
      
        $content = $_POST["homework_content"];
        if ($content == "" ) {
			echo "Vui lòng nhập đầy đủ thông tin.";
	   }else{
        $sql = "UPDATE homework SET homework_content='$content', homework_time=now() WHERE homework_id='$id'";
         mysqli_query($con,$sql);
        header("Location:homework.php?id=$id");  
    }
} 
}
?>

