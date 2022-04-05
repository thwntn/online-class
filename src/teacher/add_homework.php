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
     <p style="font-size:40px;margin-top:100px;margin-left:350px">Thêm bài tập</p> 
 <form method = "POST" class="add" enctype="multipart/form-data">          
 
    <table>
        <tr> 
            <td style="font-size:25px"><?php 
                echo $row["subject_code"]; echo "&nbsp";
                echo $row["subject_name"];
                ?></td>

        </tr>   
        <input type="hidden" name="subject_id" value = " <?php echo $row["subject_id"]; ?>" >  
        <tr>    
        <td><input style="width:300px" class='create-1' name="tittle" placeholder="Tiêu đề"></td>
        </tr>                                         
        <tr> 
            <td><p class='create-1'>Ngày hết hạn</p></td>
            <td><input style="width:300px" class='create-1'   type='date' name="homework_finish"></td>
        </tr>
        <tr>    
        <td colspan='2'><textarea class='create-1' name="content"></textarea></td>
        </tr>
        <tr>    
        <td>
        <input class='upload' type='file' name = "fileUpload">  
        <p class='create'>Chưa chọn file</p> 
        </td>
        </tr>
    </table>  
    <button type='submit' class="btn btn-primary" name="btn_submit" style="margin-left:570px">Hoàn tất </button>
    </form>                                           


<?php
    if (isset($_POST["btn_submit"])) {
        $id=$_POST["subject_id"];
        $date = $_POST["homework_finish"];
        $tittle = $_POST["tittle"];
        $content = $_POST["content"];
        $duongdan = $_FILES["fileUpload"]["name"];
         move_uploaded_file($_FILES["fileUpload"]["tmp_name"],'./filetailieu/' . $duongdan);
        if ($tittle == "") {
    
            echo "<div class='alert alert-danger' role='alert'>
            Vui lòng nhập đầy đủ thông tin!
            </div>
        ";
        
    }else{
        $sql = "INSERT INTO homework( subject_id, homework_finish, homework_tittle,homework_content, homework_file) VALUES ('$id', '$date','$tittle', '$content', '$duongdan')";
        mysqli_query($con,$sql); 
        header('Location:subject.php?subject_id='.$id.'&userOL='.$user.'');
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