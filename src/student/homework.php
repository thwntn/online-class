<?php
    include './demo/connect.php';
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
            <li><a href="index.php">&nbsp;<img src="image/Home-2-2-icon.png" style="width:20px">&nbsp;Trang chủ</a></li>
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
                        <div class = 'item' style='background-image: url($img)'></div>
                        <a href='./subject.php?code=".$row['subject_code']."'>".$row['subject_name']."</a>
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
                                             where homework_id='.$_GET["id"].'';
            $result = $conn->query($sql);
            $result = mysqli_fetch_array($result);

            $k = $result['homework_time'];
            $day = substr($k,-11,2);
            $month = substr($k,-14,2);
            $year = substr($k,-20,4);
            $user_img = $result['user_image'];
            echo"
            <p>
                <a href=''>
                    <img src='image/format+list+icon.png'>&nbsp;".$result['subject_id']."  ".$result['subject_name']."
                </a>
            </p>
        
        <ul>
            <img src='$user_img' class='img2'>
            <li><b>&nbsp;".$result['user_full_name']." <br>
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
            <img src="image/user-profile-icon-free-vector.jpg">
            <form action="" method="get" class="comment-1">
                <input class="comment-2" type="text" name="comment">
                <button class="send" type="submit"><i class="fas fa-paper-plane"></i></button>
            </form>
        </div> <br> 
        <ul>
            <img src="image/user-profile-icon-free-vector.jpg" class="img2">
            <li><b>Trần Thị Tố Quyên</li>
            <li style="font-size:10px">21/01/2022</b></li>
            <li>Nội dung bình luận </li>
        </ul>

    </div>
    <div class="right">
        <div class="right-1">
            <p><b>Bài tập của bạn</p> 
            <p class="link"><a href="">Thêm bài tập</a></b></p>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>