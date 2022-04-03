<?php
    include './demo/connect.php';
    $user_name = $_GET['userOL'];
?>

<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <meta charset="UFT-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./homework.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="menu">
        <ul class="menu-1">
            <li>
                <form action="./index.php" method='post'>
                    <input type="hidden" name="userOL" value=<?php echo $user_name ?>>
                    <p>
                        &nbsp;<img src="image/Home-2-2-icon.png" style="width:20px">&nbsp;
                        <input class='header-subject' type="submit" value="Trang chủ">
                    </p>
                </form>
            </li>
             <hr>
        </ul>
        <ul class="menu-2">
            <li>Lớp học</li>
            <?php
                $sql = "SELECT * FROM subject";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    $img = $row['subject_image'];
                    echo"
                    <li>
                        <form action='./subject.php' method='get'>
                            <input type='hidden' name='userOL' value=$user_name>
                            <input type='hidden' name='subject_id' value=".$_GET['subject_id'].">
                            <div class = 'item' style='background-image: url($img)'></div>
                            <p> 
                                &nbsp;
                                <input style='border:none; background: none;' type='submit' value=".$row['subject_code'].">
                                &nbsp;".$row['subject_name']."
                            </p>
                        </form>
                    </li>
                    ";
                }
            ?>
        </ul>
    </div>
    <div class="main">
        <?php
            $sql = 'SELECT * FROM subject sj join user  u on sj.user_name=u.user_name  
                                             join homework hw on sj.subject_id=hw.subject_id
                                             where homework_id='.$_GET["homework_id"].'';
            $result = $conn->query($sql);
            $result = mysqli_fetch_array($result);

            $k = $result['homework_time'];
            $hour= substr($k,-20,3);
            $day = substr($k,-11,2);
            $month = substr($k,-14,2);
            $year = substr($k,-20,4);
            $user_img = $result['user_image'];
            echo"
            <p>
                <a href=''>
                    <img class='icon' src='image/format+list+icon.png'>&nbsp;".$result['subject_code']."  ".$result['subject_name']."
                </a>
            </p>
        
        <ul>
            <img src='$user_img' class='img2'>
            <li><b>&nbsp;".$result['user_fullname']." <br>
                &nbsp; 
                <i>
                    ".$day."/".$month."/".$year."
                </i> </b>
            </li>
            <hr style='width:95%'>
            <li style='color:red'>
                ".$result['homework_content']."
            </li>
            ";
        ?>
        </ul><hr>
        <div class="comment">
            <img class='img' src='<?php echo $user_img ?>'>
            <form action="" method="post" class="comment-1">
                <input class="comment-2" type="text" name="comment" require>
                <button class="send" type="submit" name="upload"><i class="fas fa-paper-plane"></i></button>
            </form>
            <?php
                if(isset($_POST['comment'])){
                    $homework_id=$_GET['homework_id'];
                    $content=$_POST["comment"];
                    if($content == ""){

                    }else{
                    $sql1 = "INSERT INTO comment(comment_content, comment_time, user_name, homework_id) 
                        VALUES ('$content', now(),'$user_name','$homework_id')";
                    $kq1=$conn->query($sql1);
                }
            }
            ?>
        </div> <br> 
        <?php 
            $sql = 'SELECT * FROM comment cmt join homework hw on cmt.homework_id=hw.homework_id 
                                              join user on cmt.user_name=user.user_name
                                              where hw.homework_id= '.$_GET["homework_id"].' order by comment_time DESC';
            $kq = $conn->query($sql);
            while($row = mysqli_fetch_array($kq)){
                $k1 = $row['comment_time'];
                $hour1= substr($k1,-9,9);
                $day1 = substr($k1,-11,2);
                $month1 = substr($k1,-14,2);
                $year1 = substr($k1,-20,4);
                $user_name1 = $row['user_name'];
                if($user_name1==$user_name){
                    echo "
                    <ul>
                        <img src=".$row['user_image']." class='img2'> 
                        <li><b>".$row['user_fullname']."</li>
                        
                        <li style='font-size:10px'></b>".$hour1." &nbsp; ".$day1."/".$month1."/".$year1."</li>
                        <li>".$row['comment_content']."</li>
                        <li>
                            <form action = './edit_comment.php' method = 'GET'  >
                                <button type='submit' class ='button'>Sửa</button>
                                <input type='hidden' name='id' value = ".$row['comment_id']." >
                            </form>

                            <form action = './delete_comment.php' method = 'GET'  class = 'formDelete' >
                                <button type='submit' class ='button'>Xóa</button>
                                <input type='hidden' name='id' value =".$row['comment_id']." >
                                <input type='hidden' name='userOL' value =".$user_name." >
                                <input type='hidden' name='homework_id' value = ".$row['homework_id']." >
                            </form>
                        </li>
                    </ul> 
                    "; 
                }
                else{
                    echo "
                    <ul>
                        <img src=".$row['user_image']." class='img2'> 
                        <li><b>".$row['user_fullname']."</li>
                        
                        <li style='font-size:10px'></b>".$hour1." &nbsp; ".$day1."/".$month1."/".$year1."</li>
                        <li>".$row['comment_content']."</li>
                    </ul>   
                ";
                }
            }
        ?>
    </div>
    <div class="right">
        <div class="right-1">
            <p class="p"><b>Bài tập của bạn</p> 
            <form action="" method = "POST" enctype="multipart/form-data">
                <input class='upload' type='file' name='fileUpload'><p class='create'><i class="fas fa-plus"></i>Thêm bài tập</p>
                <button type="submit" class="btn btn-outline-secondary" name="btn_submit">Nộp bài</button>
            </form>
        </div>
        <?php
            if (isset($_POST["btn_submit"])) {
                $homework_id=$_GET["homework_id"];
                $sql = 'SELECT * FROM subject sj join user  u on sj.user_name=u.user_name  
                                             join homework hw on sj.subject_id=hw.subject_id
                                             where homework_id='.$_GET["homework_id"].'';
                $data = $conn->query($sql);
                $data = mysqli_fetch_array($data);
                $subject_id = $data['subject_id'];
                
                $duongdan = $_FILES['fileUpload']['name'];
                move_uploaded_file($_FILES['fileUpload']['tmp_name'],'./homework/' . $duongdan);
                if ( $duongdan == "") {
                    echo "
                        <div class='alert alert-danger' role='alert' >
                            Chưa chọn file!
                        </div>";  
            }else{
                $sql2 = "INSERT INTO document( doucument_directory, document_date, user_name, subject_id, homework_id) 
                    VALUES ('$duongdan', now(), '$user_name','$subject_id','$homework_id')";
                mysqli_query($conn,$sql2); 
                echo "
                    <div class='alert alert-primary' role='alert' >
                        Nộp bài thành công!
                    </div>";
                }
            }                                    
        ?> 
    </div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script> 
//upload file
document.querySelector('.create').addEventListener('click', function () {
        document.querySelector('.upload').click()
    })
    document.querySelector('.upload').addEventListener('change', function () {
        document.querySelector('.create').innerHTML = document.querySelector('.upload').value
    })
</script>
</body>
</html>