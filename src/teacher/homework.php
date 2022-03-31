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
<link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Baloo+2:wght@600&family=Barlow:wght@300&display=swap" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <br>
    <div class="menu">
        <ul class="menu-1">
            <li><a href="index.php">&nbsp;<img src="image/Home-2-2-icon.png" style="width:20px">&nbsp;Trang chủ</a></li>
             <hr>
        </ul>
        <ul class="menu-2">
            <li>Lớp học</li>
            <?php
                $sql = "SELECT * FROM subject";
                $kq = $con->query($sql);
                while($row = $kq->fetch_assoc()) {
                    $img = $row['subject_image'];
                    echo"
                    <li>
                        <div class = 'item' style='background-image: url($img)'></div>
                        <a href='./subject.php?id=".$row['subject_id']."'>".$row['subject_name']."</a>
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
                                             where homework_id='.$_GET["id"].' ';
            $kq = $con->query($sql);
            $row = mysqli_fetch_array($kq);

            $k = $row['homework_time'];
            $day = substr($k,-11,2);
            $month = substr($k,-14,2);
            $year = substr($k,-20,4);
            $user_img = $row['user_image'];
            ?>
            <p>
            <img src='image/format+list+icon.png' class='listmenu'>
                <a href=''>
                    &nbsp;<?php echo $row['subject_code']; 
                                echo $row['subject_name']; ?>
                </a>
            </p>
        <ul>
        
        <button class='img1' data-bs-toggle='collapse' data-bs-target='#collapseWidthExample' aria-expanded='false' aria-controls='collapseWidthExample'><i class='fa-solid fa-pencil'></i></button>
        <div class='collapse collapse-horizontal' id='collapseWidthExample'>  
                         <form action = "./delete_homework.php" method = "GET"  class = "formXoa" >
                            <button type="submit" class = "delete"><i class='fa-solid fa-xmark'></i></button>
                            <input type="hidden" name="id" value = "<?php echo $row['homework_id'] ?>" >
                        </form>  
        </div> 
        <img src="<?php echo $user_img; ?>" class='img2'>
            <li><b>&nbsp;<?php echo $row['user_fullname']; ?> <br>
                &nbsp; 
                <i>
                <?php echo $day; echo "/"; echo $month;echo "/"; echo $year;?>
                </i> </b>
            
            </li>
            <hr style='width:95%'>
              <div class='collapse collapse-horizontal' id='collapseWidthExample'>  
                    <form action = "./suahomework.php" method = "GET" >
                            <button type="submit" class = "delete"><i class='fa-solid fa-pencil'></i></button>
                            <input type="hidden" name="id" value = "<?php echo $row['homework_id'] ?>" >
                        </form> 
                        &nbsp;
            </div> 
            
            <li style='color:red'>
                <?php echo $row['homework_content']; ?>
            </li>
            
        
        </ul> <br> <hr> <br>
        <div class="comment">
    
    
            

             <img src="image/user.png">
             <form action="" method="post" class="comment-1">
                <input class="comment-2" type="text" name="comment">
                <button class="send" type="submit" name="upload"><i class="fas fa-paper-plane"></i></button>
            </form>
            <?php
            if(isset($_POST['comment'])){
                $homework_id=$_GET['id'];
                $content=$_POST["comment"];
                $sql1 = "INSERT INTO comment(comment_content, comment_time, user_name, homework_id) 
                    VALUES ('$content', now(),'ngocdiem','$homework_id')";
                $kq1=$con->query($sql1);
            }
    ?>
         </div>  
                <?php 
                $sql = 'SELECT * FROM comment cmt join homework hw on cmt.homework_id=hw.homework_id 
                                                  join user on cmt.user_name=user.user_name
                                                  where hw.homework_id= '.$_GET["id"].' ';
                $kq = $con->query($sql);
                while($row = mysqli_fetch_array($kq)){
                    echo "
                    <ul>
                    <img src=".$row['user_image']." class='img2'>
                    <li><b>".$row['user_fullname']."</li>
                    <li style='font-size:10px'>".$row['comment_time']."</b></li>
                    <li>".$row['comment_content']."</li>
                    </ul>
                    ";
                }
                ?>

    </div>
    <div class="right">
        
        <div class="right-2">
            <p><b>Danh sách sinh viên đã nộp bài
                20/40</b></p>

            <?php 
            $sql='SELECT * FROM homework hw join score on hw.homework_id=score.homework_id
                                            join user on score.user_name=user.user_name
                                            where hw.homework_id= '.$_GET["id"].' ';
             $kq = $con->query($sql);
             while($row = mysqli_fetch_assoc($kq)){
                 echo "
                    <ul>
                    <li><img src=".$row['user_image']." style='width:40px;border-radius:20px;''></li> 
                    <li style='font-size:15px'>".$row['user_fullname']."</li> 
                    <li><a href=''><img src='image/free-file-icon-1453-thumb.png' style='width:15px'></a></li>
                    <li><a href=''><img src='image/img_179653.png' style='width:10px'></i></a></li>
                    </ul>
                 ";
             }
            ?>
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
            
                    <?php
                        $sql='SELECT * FROM homework hw join score on hw.homework_id=score.homework_id
                                                        join user on score.user_name=user.user_name
                                                        where hw.homework_id= '.$_GET["id"].' ';
                        $kq = $con->query($sql);
                        while($row = mysqli_fetch_assoc($kq)){
                            echo "
                            <ul>
                            <li><img src=".$row['user_image']." style='width:40px;border-radius:20px;'></li>
                            <li>".$row['user_fullname']."</li>
                            <li><a href=''><img src='image/free-file-icon-1453-thumb.png' style='width:15px'></a></li>
                            <li style='color:red'><b>".$row['score_level']."</b></li>
                        </ul>
                            ";
                        }
                ?>
                    </div>
                    
                    </div>
                </div>
            </div>
    </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script> 
    const menu = document.querySelector('.menu');
    const listmenu = document.querySelector('.listmenu');
    const main = document.querySelector('.main');

    listmenu.onclick = function() {
        main.classList.toggle('expand');
        menu.classList.toggle('hide');
        
    }
    //Xoa bai tap
    document.addEventListener('DOMContentLoaded', function() {
        var el = document.getElementsByClassName("formXoa"); 
        for(var i=0;i < el.length;i++) {
        el[i].addEventListener("submit", function(e) { 
                e.preventDefault();
                Swal.fire({ 
                    title: 'Bạn chắc chắn muốn xóa?',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Delete'
                }).then((result) => {
                    if (result.isConfirmed) {            
                    e.target.submit();
                    }
                })
        });
    }  
        }, false);
</script>
</body>
</html>