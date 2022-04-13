<?php
include './connect.php';
$user=$_POST['userOL'];
$subject_id = $_POST['subject_id'];
if(isset($subject_id)){  
    $sql="SELECT * FROM subject where subject_id='$subject_id'";
    $kq=$con->query($sql);
    $row=$kq->fetch_assoc();
?>     

                            <form action="" method="post" enctype="multipart/form-data" align="center">
                                    <h2>Thêm tài liệu</h2> 
                                     <input type="hidden" name="userOL" value=<?php echo $user?>>
                                     <input type="hidden" name="subject_id" value = "<?php echo $row['subject_id']; ?>" > 
                                        <input class='create-1' type="text" name="homework_id" placeholder="Mã tài liệu"> <br>
                                        <input class='create-1' name="content" placeholder="Nội dung"><br>
                                                                    
                                        <input class='create-1' type="datetime-local" name="finish" ><br>
                                        <input class='upload' type='file' name = "fileUpload"><br>
                                        <p class='create' >Chưa chọn file</p>    
                                        <input type="submit" class="btn btn-secondary" name="submit">                             
                                    </div>
                                    
                            </form>
<?php
if (isset($_POST["submit"])) {
    $id=$_POST["homework_id"];
    $sj_id=$_POST["subject_id"];
    $finish = $_POST["finish"];
    $content = $_POST["content"];
    $duongdan = $_FILES["fileUpload"]["name"];
    move_uploaded_file($_FILES["fileUpload"]["tmp_name"],'./filetailieu/' . $duongdan);
    if ($id == "" || $content == "") {     
        echo  "Vui lòng nhập đầy đủ thông tin";
    }else{
    $sql = "INSERT INTO homework( homework_id, subject_id, homework_content, homework_time, homework_finish) VALUES ('$id', '$subject_id', '$content' , now(), '$finish')";
    mysqli_query($con,$sql); 
    }
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