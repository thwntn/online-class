<?php
include './connect.php';
include './header.php';

if(isset($_GET['code'])){
    $code=$_GET['code'];
    $sql="SELECT * FROM subject where subject_code='$code'";
    $kq=$con->query($sql);
    $row=$kq->fetch_assoc(); 

     }
     ?>
      <p style="font-size:40px;margin-top:100px;margin-left:350px">Them tai lieu</p> 
 <form method = "POST"  class="add">           
                                            <table>
                                               <tr> 
                                               <td style="font-size:25px"><?php 
                                                    echo $row["subject_id"]; echo "&nbsp";
                                                  echo $row["subject_name"];
                                                  ?></td>
                                            </tr>   
                                            <input type="hidden" name="subject_code" value = " <?php echo $row["subject_code"]; ?>" >
                                            
                                            
                                            <tr>    
                                                <td colspan='2'><textarea class='create-1' name="dc-content"></textarea></td>
                                            </tr>
                                            <tr>    
                                                <td>
                                                <input class='upload' type='file'>
                                                 <!-- <p class='create'>Chưa chọn file</p></td>  -->
                                            </tr>
                                        </table>  
                                        <button type='submit' class="btn btn-primary" name="submit-dc" style="margin-left:550px">Hoàn tất </button>
    </form>                                           


<?php
    if (isset($_POST["submit-dc"])) {
        $code=$_POST["subject_code"];
        $date = $_POST["homework_finish"];
        $content = $_POST["content"];
        // $file_hw=$_POST["content"];
        if ( $date == "" || $content == "") {
    
            echo "Nhập đầy đủ thông tin!";
        
    }else{
        $sql = "INSERT INTO homework( subject_code, homework_finish, homework_content) VALUES ('$code', '$date', '$content')";
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
// document.querySelector('.create').addEventListener('click', function () {
//         document.querySelector('.upload').click()
//     })
//     document.querySelector('.upload').addEventListener('change', function () {
//         document.querySelector('.create').innerHTML = document.querySelector('.upload').value
//     })
</script>