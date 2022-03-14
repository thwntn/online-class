<?php
    include './connect.php';
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
                $result = $con->query($sql);
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
            $result = $con->query($sql);
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
        <a href=''><img src='image/Pencil-icon.png' class='img1'></a>
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
            <img src="image/user.png">
            <form action="" method="get" class="comment-1">
                <input class="comment-2" type="text" name="comment">
                <button class="send" type="submit"><i class="fas fa-paper-plane"></i></button>
            </form>
        </div> <br> 
        <ul>
            <img src="image/user.png" class="img2">
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
        <div class="right-2">
            <p><b>Danh sách sinh viên đã nộp bài
                20/40</b></p>
            <ul>
                <li><img src="image/user1.jpg" style="width:40px;border-radius:20px;"></li> 
                <li>Tên người dùng</li>
                <li><a href=""><img src="image/free-file-icon-1453-thumb.png" style="width:15px"></a></li>
                <li><a href=""><img src="image/img_179653.png" style="width:10px"></a></li>
            </ul>

            <ul>
                <li><img src="image/user1.jpg" style="width:40px;border-radius:20px;"></li>
                <li>Tên người dùng</li>
                <li><a href=""><img src="image/free-file-icon-1453-thumb.png" style="width:15px"></a></li>
                <li><a href=""><img src="image/img_179653.png" style="width:10px"></a></li>
            </ul>

            <ul>
                <li><img src="image/user1.jpg" style="width:40px;border-radius:20px;"></li>
                <li>Tên người dùng</li>
                <li><a href=""><img src="image/free-file-icon-1453-thumb.png" style="width:15px"></a></li>
                <li><a href=""><img src="image/img_179653.png" style="width:10px"></a></li>
            </ul>

            <!-- Button trigger modal -->
            <button type="button" class="score" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Bảng điểm
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Bảng điểm</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <ul>
                            <li><img src="image/user1.jpg" style="width:40px;border-radius:20px;"></li>
                            <li>Tên người dùng</li>
                            <li><a href=""><img src="image/free-file-icon-1453-thumb.png" style="width:15px"></a></li>
                            <li style="color:red"><b>C</b></li>
                        </ul>
                        <ul>
                            <li><img src="image/user1.jpg" style="width:40px;border-radius:20px;"></li>
                            <li>Tên người dùng</li>
                            <li><a href=""><img src="image/free-file-icon-1453-thumb.png" style="width:15px"></a></li>
                            <li style="color:red"><b>B</b></li>
                        </ul>
                        <ul>
                            <li><img src="image/user1.jpg" style="width:40px;border-radius:20px;"></li>
                            <li>Tên người dùng</li>
                            <li><a href=""><img src="image/free-file-icon-1453-thumb.png" style="width:15px"></a></li>
                            <li style="color:red"><b>A</b></li>
                        </ul>
                    </div>
                    
                    </div>
                </div>
            </div>
    </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>