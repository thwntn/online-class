
<link rel="stylesheet" type="text/css" href="./homework.css">
<?php
include './connect.php';
$user = $_POST['userOL'];
$hw_id = $_POST['homework_id'];
if(isset($hw_id)){  
    $sql="SELECT * FROM homework where homework_id='$hw_id'";
    $kq=$con->query($sql);
    $row=$kq->fetch_assoc();
   
    ?>
     <link rel="stylesheet" type="text/css" href="./homework.css" media="screen" />
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
     <script src="//cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
     <form method="POST" class="add_baigiang"  >
     <p style="font-size:30px">Sửa tài liệu </p>
     
     <input type="hidden" name="homework_id" value = "<?php echo $row['homework_id']; ?>" >
    <input type="hidden" name="userOL" value=<?php echo $user?>> 
     <textarea name="homework_content"> <?php echo $row["homework_content"]; ?> </textarea> <br> <br>
     <p>Thời hạn </p>
     <input name="homework_finish" value= "<?php echo $row["homework_finish"]; ?> "> <br> <br>
    <button type='submit' class="btn btn-secondary"  name="update-hw">Submit</button>
    </form>    
    <?php
    if(isset($_POST["update-hw"])) {
  
        $content = $_POST["homework_content"];
        $hw_finish = $_POST["homework_finish"];
        if ($content == "") {
			echo "Vui lòng nhập đầy đủ thông tin.";
	   }else{
        $sql2 = "UPDATE homework SET  homework_content='$content', homework_time=now(), homework_finish='$hw_finish' WHERE homework_id='$hw_id'";
         mysqli_query($con,$sql2);
         echo "Sửa thành công";
     
        }
    } 
}
?>

