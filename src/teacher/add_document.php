<?php
include './connect.php';
$user=$_GET['userOL'];
$subject_id = $_GET['subject_id'];


if(isset($subject_id)){
    $sql="SELECT * FROM subject where subject_id='$subject_id'";
    $kq=$con->query($sql);
    $row=$kq->fetch_assoc(); 

     }
     ?>
      <p style="font-size:40px;margin-top:100px;margin-left:350px">Thêm bài giảng</p> 
 <form method = "POST"  class="add" enctype="multipart/form-data">           
    
        <p style="font-size:25px"><?php 
                    echo $row["subject_code"]; echo "&nbsp";
                    echo $row["subject_name"];
                    ?> </p>
        
        <input type="hidden" name="subject_id" value = " <?php echo $row["subject_id"]; ?>" >   
        <td><input class='create-1' name="tittle" placeholder="Tiêu đề"></td>      
        <p colspan='2'><textarea class='create-1' name="content" ></textarea></p>
        <input class='upload' type='file' name = "fileUpload">
        <p class='create' >Chưa chọn file</p>  

            
    
    <button type='submit' class="btn btn-primary" name="submit" style="margin-left:550px">Hoàn tất </button>
    </form>                                           


<?php
    if (isset($_POST["submit"])) {
        $idsj=$_POST["subject_id"];
        $content = $_POST["content"];
        $tittle = $_POST["tittle"];
         $duongdan = $_FILES["fileUpload"]["name"];
         move_uploaded_file($_FILES["fileUpload"]["tmp_name"],'./filetailieu/' . $duongdan);
        if ($tittle == "") {
    
            echo "<div class='alert alert-danger' role='alert'>
            Vui lòng nhập đầy đủ thông tin!
            </div>
        ";
        
    }else{
        $sql = "INSERT INTO homework(subject_id, homework_tittle, homework_content, homework_file) VALUES ('$idsj', '$tittle', '$content', '$duongdan')";
        mysqli_query($con,$sql); 
        //header('Location:subject.php?id='.$idsj.'');
        header('Location:subject.php?subject_id='.$idsj.'&userOL='.$user.'');
        }
    }
                                         
?> 
<link rel="stylesheet" type="text/css" href="./manage.css">
<link rel="stylesheet" href="modulemanage/framework/css/bootstrap.css">
<script src="modulemanage/framework/js/bootstrap.js"></script>
<script> 
//upload file
 document.querySelector('.create').addEventListener('click', function () {
         document.querySelector('.upload').click()
     })
     document.querySelector('.upload').addEventListener('change', function () {
         document.querySelector('.create').innerHTML = document.querySelector('.upload').value
     })
</script>