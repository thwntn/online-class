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
     <p style="font-size:40px;margin-top:100px;margin-left:350px">Thêm bài tập</p> 
 <form method = "POST" class="add" >          
 
    <table>
        <tr> 
            <td style="font-size:25px"><?php 
                echo $row["subject_code"]; echo "&nbsp";
                echo $row["subject_name"];
                ?></td>

        </tr>   
        <input type="hidden" name="subject_id" value = " <?php echo $row["subject_id"]; ?>" >                                           
        <tr> 
            <td><p class='create-1'>Ngày hết hạn</p></td>
            <td><input class='create-1'   type='date' name="homework_finish"></td>
        </tr>
        <tr>    
        <td colspan='2'><textarea class='create-1' name="content"></textarea></td>
        </tr>
        <tr>    
        <td>
        <input class='upload' type='file'>  
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
        $content = $_POST["content"];
        // $file_hw=$_POST["content"];
        if ( $date == "" || $content == "") {
    
            echo "Nhập đầy đủ thông tin!";
        
    }else{
        $sql = "INSERT INTO homework( subject_id, homework_finish, homework_content) VALUES ('$id', '$date', '$content')";
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