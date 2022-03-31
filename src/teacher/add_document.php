<?php
include './connect.php';
include './header.php';


if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="SELECT * FROM subject where subject_id='$id'";
    $kq=$con->query($sql);
    $row=$kq->fetch_assoc(); 

     }
     ?>
      <p style="font-size:40px;margin-top:100px;margin-left:350px">Thêm bài giảng</p> 
 <form method = "POST"  class="add">           
    
        <p style="font-size:25px"><?php 
                    echo $row["subject_code"]; echo "&nbsp";
                    echo $row["subject_name"];
                    ?> </p>
        
        <input type="hidden" name="subject_id" value = " <?php echo $row["subject_id"]; ?>" >

        <p colspan='2'><textarea class='create-1' name="content" ></textarea></p>
        <input class='upload' type='file'>
        <p class='create' >Chưa chọn file</p>  

            
    
    <button type='submit' class="btn btn-primary" name="submit" style="margin-left:550px">Hoàn tất </button>
    </form>                                           


<?php
    if (isset($_POST["submit"])) {
        $id=$_POST["subject_id"];
        $content = $_POST["content"];
        if ($content == "") {
    
            echo "Nhập đầy đủ thông tin!";
        
    }else{
        $sql = "INSERT INTO homework(subject_id, homework_content ) VALUES ('$id',  '$content')";
        mysqli_query($con,$sql); 
        echo "Đăng bài viết thành công!";
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