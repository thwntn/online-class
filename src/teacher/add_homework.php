<?php
include './connect.php';
$user=$_POST['userOL'];
$subject_id = $_POST['subject_id'];
     
if (isset($_POST["btn_submit"])) {
    $id=$_POST["homework_id"];
    $subject_id=$_POST["subject_id"];
    $finish = $_POST["finish"];
    $content = $_POST["content"];
    $duongdan = $_FILES["fileUpload"]["name"];
    move_uploaded_file($_FILES["fileUpload"]["tmp_name"],'./filetailieu/' . $duongdan);
    if ($id == "") {     
        echo  "<script>alert('Vui lòng nhập đầy đủ thông tin')</script>";
    }else{
    $sql = "INSERT INTO homework( homework_id, subject_id, homework_content, homework_time, homework_finish) VALUES ('$id', '$subject_id', '$content' , now(), '$finish')";
    mysqli_query($con,$sql); 
    echo  "<script>alert('Thêm thành công')</script>";
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