<?php
    include './connect.php';
    include './logSystem.php';
    $homework_id = $_POST['homework_id'];
    $user = $_POST['userOL'];
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
            <!-- <li><a href="index.php">&nbsp;<img src="image/Home-2-2-icon.png" style="width:20px">&nbsp;Trang chủ</a></li> -->
            <li>
            <form action='./index.php' method='post'>                                  
                <input type="hidden" name="userOL" value=<?php echo $user?>>
                <img src="image/Home-2-2-icon.png" style="width:20px">&nbsp;<input style="border:none;background:none" type="submit" value="Trang chủ">
            </form>
                        
                   
            </li>
            <hr>
        </ul>
        <ul class="menu-2">
            <li>Lớp học</li>
            
            <?php
                $sql = "SELECT * FROM subject sj join user on sj.user_name=user.user_name where sj.user_name='$user'";
                $kq = $con->query($sql);
                while($row = $kq->fetch_assoc()) {
                    $img = $row['subject_image'];
                    $subject = $row['subject_id'];
                    $id = substr($subject,0,5);
                    
                    echo "
                    <li>
                    <form action='./subject.php' method='post'>                                  
                        <input type='hidden' value=".$row['subject_id']." name='subject_id'>
                        <input type='hidden' name='userOL' value=$user>                                                                    
                        <div class = 'item' style='background-image: url(http://localhost/online-class/src/database/{$subject}/image/{$img})'></div> 
                        <p><input class='sj-name' type='submit' value=".$id."> 
                        ".$row['subject_name']."</p>
                    </form>
                    </li>
                    ";
                
                }
            ?>
        </ul>
    </div>
    <div class="main">
        <?php
            $sql = "SELECT * FROM subject sj join user  u on sj.user_name=u.user_name  
                                             join homework hw on sj.subject_id=hw.subject_id
                                             where homework_id='$homework_id' ";
            $kq = $con->query($sql);
            $row = mysqli_fetch_array($kq);
            $k = $row['homework_time'];
            $hw_finish = $row['homework_finish'];
            // $hw_day = substr($hw_finish,-11,2);
            // $hw_month = substr($hw_finish,-14,2);    
            // $hw_time = substr($hw_finish,-9,6);  
            $subject = $row['subject_id'];
            $id = substr($subject,0,5);    
            $day = substr($k,-11,2);
            $month = substr($k,-14,2);
            $year = substr($k,-20,4);
            $user_img = $row['user_image'];
            ?>
            <p style ="font-size:30px" class="tittle">
            <img src='image/format+list+icon.png' class='listmenu'>
              
                    &nbsp;<?php echo $id; echo "&nbsp;";
                                echo $row['subject_name']; ?>
                
            </p>
            
             <!-- Sửa tài liệu -->  
             <form action = "" method = "POST" >
                            <button type = "button" class = "img1" id="myBtn" data-target=".modal1" data-toggle="modal"><i class='fa-solid fa-pencil'></i></button>
                            <input type="hidden" name="homework_id" value = "<?php echo $row['homework_id']; ?>" >
                            <input type="hidden" name="subject_id" value = "<?php echo $row['subject_id']; ?>" >
                            <input type="hidden" name="userOL" value=<?php echo $user?>> 
                            <div class="container">       
                            <div id="myModal" class="modal modal1">
                            <div class="modal-content" style="width:60%;height:70%" >                                 
                                <form action="" method="post" >
                                    <h2>Sửa tài liệu</h2>
                                    <div class="fomrgroup" >
                                         
                                   
                                    <input class='create' type="text" name="homework_id" value = "<?php echo $row['homework_id'] ?>" >
                                    <textarea class='create' name="homework_content" style="height:100px"> <?php echo $row["homework_content"]; ?> </textarea>        
                                    <input class='create' type="text" name="homework_finish" value= <?php echo $row["homework_finish"]; ?> > 
                                  
                                    </div>
                                    <div class="fomrgroup-1" style="text-align:center;">                   
                                        <button class="btn btn-primary" type='submit' name="update-hw">Save</button>
                                        <button class="btn btn-danger" id="close">Cancel</button> &nbsp;
                                    </div>
                                </form>
                                <?php
                                    if(isset($_POST["update-hw"])) {
                                        $homework = $_POST["homework_id"];
                                        $content = $_POST["homework_content"];
                                        $hw_finish = $_POST["homework_finish"];
                                        if ($content == "") {
                                            echo "Vui lòng nhập đầy đủ thông tin.";
                                       }else{
                                        $sql2 = "UPDATE homework SET homework_id='$homework',  homework_content='$content', homework_time=now(), homework_finish='$hw_finish' WHERE homework_id='$homework_id'";
                                         mysqli_query($con,$sql2);
                                         logSystem('chỉnh sửa tài liệu', $user, $con);
                                            }
                                        }
                                ?>
                            </div>
                        </div>
                                                    
                    </div>   
                        </form> 
            
        <ul>
        <img src="<?php echo "http://localhost/online-class/src/database/{$user}/image/{$row['user_image']}" ?>" class='img2'>
            <li><b>&nbsp;<?php echo $row['user_fullname']; ?> <br>
                &nbsp; 
                <i>
                <?php echo $day; echo "/"; echo $month;echo "/"; echo $year;
                ?>
                </i> </b>
            </li>
            <?php 
            if($hw_finish == ""){

            }else{
            echo"
                <li class='hw-finish'><i>Đến hạn: ".$hw_finish."  </i>
                    
                </li> ";
            }
            ?>
            <hr style='width:95%'>
             
            <li>
                <?php 
                echo "
                <a href='http://localhost/online-class/src/database/{$row['subject_id']}/homework/{$row['homework_content']}' style='color:blue;font-size:15px'>".$row['homework_content']."</i></a>
                ";
                
                ?>
              
            </li>
            
        
        </ul> <br> <hr> <br>
        <div class="comment">
        
             <img src="<?php echo "http://localhost/online-class/src/database/{$user}/image/{$row['user_image']}" ?>">
             <form action="" method="post" class="comment-1">
                <input class="comment-2" type="text" name="comment" require>
                <input type='hidden' name='userOL' value=<?php echo $user ?>>
                <input type='hidden' name='subject_id' value=<?php echo $row['subject_id']; ?>>
                <input type='hidden' name='homework_id' value=<?php echo $homework_id ?>>
                <button class="send" type="submit" name="upload"><i class="fas fa-paper-plane"></i></button>
            </form>
            <?php
                if(isset($_POST['comment'])){
                    $homework_id=$_POST['homework_id'];
                    $content=$_POST["comment"];
                    if($content == ""){

                    }else{
                    $sql1 = "INSERT INTO comment(comment_content, comment_time, user_name, homework_id) 
                        VALUES ('$content', now(),'$user','$homework_id')";
                    $kq1=$con->query($sql1);
                    logSystem('thêm bình luận', $user, $con);
                }
            }
            ?>
         </div>  
                <?php 
                $sql = "SELECT * FROM comment cmt join homework hw on cmt.homework_id=hw.homework_id 
                                                  join user on cmt.user_name=user.user_name
                                                  where hw.homework_id= '$homework_id' order by comment_time desc";
                $kq = $con->query($sql);
                while($row = mysqli_fetch_assoc($kq)){
                    $comment_id=$row['comment_id'];
                    $user1=$row['user_name'];
                    if($user1 == $user){
                    ?>
                    <!-- Xóa comment -->
                    <form action="" method="post" class="formDelete" >
                        <input type="hidden" name="homework_id" value = "<?php echo $row['homework_id'] ?>" >
                        <button type="submit"  class='img3' name="delete_cmt" ><i class='fa-solid fa-xmark'></i></button>
                        <input type="hidden" name="id" value = "<?php echo $row['comment_id'] ?>" >
                        
                        <input type="hidden" name="userOL" value="<?php echo $user?>">                       
                    </form>
                    <?php
                            if (isset( $_POST["id"])) {
                                $cmt_id=$_POST["id"];
                                $sql3="DELETE FROM comment where comment_id=' $cmt_id'";
                                mysqli_query($con,$sql3);
                            }
                        ?>
                    <!-- Sửa comment -->   
                    <form action="" method="post" >
                        <input type="hidden" name="homework_id" value = "<?php echo $row['homework_id'] ?>" >
                        <input type="hidden" name="comment_id" value = "<?php echo $row['comment_id'] ?>" >
                        <input type="hidden" name="userOL" value="<?php echo $user?>">
                        <button type="button" class="img3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class='fa-solid fa-pencil'></i>
                        </button>                                          
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" style="height:200px">
                        
                            <h3 style="text-align:center">Sửa bình luận</h3>
               
                        
                       
                                    <form action="" method="post">
                                        
                                        <div class="fomrgroup">
                                            <input type="hidden" name="comment_id" value = "<?php echo $row['comment_id'] ?>" >
                                            <input type="text" class='cmt-content' name="comment_content" value="<?php echo $row["comment_content"] ?>">
                                        </div>
                                        
                                    </form>
                                    <?php
                                    if(isset($_POST["update-cmt"])) {
                                        
                                        $cmt_content = $_POST["comment_content"];
                                        if ($cmt_content == "") {
                                            echo  "<script>alert('Vui lòng nhập đầy đủ thông tin')</script>";
                                        }else{
                                        $sql2 = "UPDATE comment SET comment_content='$cmt_content', comment_time=now() WHERE comment_id=' $comment_id'";
                                        mysqli_query($con,$sql2);    
                                        logSystem('Sửa bình luận', $user, $con);
                                        }
                                    }
                                    ?>     
                        
                        
                        <div class="fomrgroup-1" style="text-align:center;">   
                            <button style="width:70px;"  type="submit" class="btn btn-primary" name="update-cmt">Save</button>
                            <button style="width:70px"   type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                </div>
                        </div>
                    </div>
                    </div>
                    </form>
                     
                    <?php
                    }
                    ?>
                     <ul>
                    <img src="<?php echo "http://localhost/online-class/src/database/{$user1}/image/{$row['user_image']}" ?>" class='img2'>
                    <li><b><?php echo $row['user_fullname'] ?></li>
                    <li style='font-size:12px'><?php echo $row['comment_time'] ?></b></li>
                    <li><?php echo $row['comment_content'] ?></li>
                    </ul>
                <?php
                }
                ?>

    </div>
    <div class="right">
        
        <div class="right-2">
        <p><b>Danh sách sinh viên đã nộp bài
                </b></p>
                
            <?php 
            $sql="SELECT * FROM homework hw join document dc on hw.homework_id=dc.homework_id
                                            join user on dc.user_name=user.user_name
                                            where hw.homework_id= '$homework_id' ";

             $kq = $con->query($sql);
             while($row = mysqli_fetch_assoc($kq)){
               
                
                    echo "
                 <div class='list-score'>                                                  
                    <p><img src='http://localhost/online-class/src/database/{$row['user_name']}/image/{$row['user_image']}' class='user-img'> ".$row['user_fullname']."</p>
                </div>                                                        
                   ";
             }
            
               ?><br>
            <div id="xemthem">
            <form action="./homework_score.php" method="post">
                <button class='button' type="submit">Xem thêm...</button>
                <input type="hidden" name="homework_id" value = "<?php echo $homework_id ?>" >
                <input type="hidden" name="userOL" value="<?php echo $user?>">
            </form>
            </div>
                <br>
                <form action="" method="post" >
                    <input type="hidden" name="userOL" value = "<?php echo $user ?>">
                    <button type='button' class='point' data-bs-toggle='modal' data-bs-target='#exampleModal1'>Chấm điểm</button>  
                    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content" style="height:250px;width:500px">
                               <div class="fomrgroup" >
                                    <form action="" method="post">
                                    <?php 
                                    $sql1="SELECT * FROM document dc join user on dc.user_name=user.user_name 
                                                    where homework_id='$homework_id'";
                                    $kq1=$con->query($sql1);
                                    $code = array();
                                    while($row1=$kq1->fetch_array()){
                                        $code[] = $row1; 
                                        $subject_score=$row1['subject_id'];
                                    }
                                    ?>
                                             
                                    <input type="hidden" name="subject_id" value = "<?php echo $subject_score ?>" >
                                    <input type="hidden" name="homework_id" value = "<?php echo $homework_id ?>" >
                                    <select class="create" name="user_name" style="width:150px">
                                        <option >Tên</option> 
                                        <?php foreach($code as $key => $value){ ?>
                                            <option value="<?php echo $value["user_name"]; ?>"><?php echo $value["user_fullname"]; ?></option> 
                                        <?php } ?> 
                                        
                                    </select>
                                    <select name="score_level" class="create" style="width:150px">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="F">F</option>
                                    </select>
                                            
                                    </form>
                                </div>                
                                <div class="fomrgroup-1" style="text-align:center;">   
                                    <input style="width:70px;" type="submit" class="btn btn-primary" name="submit-score" value="Save">
                                    <input style="width:70px"  type="button" class="btn btn-danger" data-bs-dismiss="modal" value="Cancel">
                                </div>
                                <?php 
                                if(isset($_POST["submit-score"])){
                                    
                                    $user_score=$_POST["user_name"];
                                    $score_level=$_POST["score_level"];
                                    if($score_level == ""  ){
                                        
                                    }else{
                                    $sql2 = "INSERT INTO score( user_name, subject_id, homework_id, score_level) VALUES ('$user_score', '$subject_score','$homework_id','$score_level')";
                                    mysqli_query($con,$sql2); 
                                    logSystem('Chấm điểm', $user, $con);
                                        }
                                    }
                                ?>
                                <?php 
                                if(isset($_POST["submit-score"])){
                                    
                                    $user_score=$_POST["user_name"];
                                    $score_level=$_POST["score_level"];
                                    if($score_level == ""  ){
                                        
                                    }else{
                                    $sql2 = "UPDATE score SET score_level='$score_level' where user_name='$user_score' and subject_id='$subject_score'";
                                    mysqli_query($con,$sql2); 
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </form  >       
    
            
            
            <!-- Bảng điểm -->
            <form action="" method="post">
            <button type="button" class="score" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Bảng điểm</button> 
            <input type="hidden" name="homework_id" value = "<?php echo $row['homework_id'] ?>" >
            <input type="hidden" name="subject_id" value = "<?php echo $row['subject_id'] ?>" >
            <input type="hidden" name="user_name" value = "<?php echo $row['user_name'] ?>" >
            <input type="hidden" name="userOL" value="<?php echo $user?>">

            </form>

            
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" style="width:70%">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Bảng điểm</h5>
                        <button type="button" data-bs-dismiss="modal" aria-label="Close" style="color:red">Đóng</button>
                    </div>
                    <div class="modal-body">
            
                    <?php
                        $sql="SELECT * FROM homework hw join score on hw.homework_id=score.homework_id
                                                        join user on score.user_name=user.user_name
                                                        where hw.homework_id= '$homework_id'";
                        $kq = $con->query($sql);
                        echo"<table>";
                        while($row = mysqli_fetch_assoc($kq)){
                            echo "<tr>";
                            for($i=1;$i<4;$i++)
                            {
                                echo "<td style='width:300px'>";
                                if($row!=false)
                                    {  
                                    echo "
                                    <ul>
                                    <li><img src='http://localhost/online-class/src/database/{$row['user_name']}/image/{$row['user_image']}' style='width:40px;border-radius:20px;margin-left:-10px'></li>
                                    <li style='margin-top:8px'>".$row['user_fullname']."</li>
                                    
                                    <li style='color:red; margin-top:10px'><b>".$row['score_level']."</b></li> 
                                    </ul> 
                                    ";
                                    }else{
                                    echo "&nbsp;";
                                    }
                                    echo"</td>";
                                        if($i!=3)
                                        {
                                            $row= $kq->fetch_assoc();
                                        }
                                    } 
                                    echo"</tr>";
                            }
                            echo"</table>";


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
        var el = document.getElementsByClassName("formDelete"); 
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

// Sửa comment
var modal = document.getElementById('myModal');
    
    // Lấy phần button mở Modal
    var btn = document.getElementById("myBtn");

    // Lấy phần span đóng Modal
    var span = document.getElementsByClassName("close")[0];

    // Khi button được click thi mở Modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // Khi span được click thì đóng Modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // Khi click ngoài Modal thì đóng Modal
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
       
   
</script>
</body>
</html>