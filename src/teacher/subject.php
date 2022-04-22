<?php
    include './connect.php';
    $subject_id = $_POST['subject_id'];
    $user = $_POST['userOL'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.2">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="./giaovien.css" media="screen" />
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Baloo+2:wght@600&family=Barlow:wght@300&display=swap" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  
    <?php include 'header.php'; ?>
    <div class="main-subject">
        <?php
        
        
            $sql = "SELECT * FROM subject sj join user  u on sj.user_name=u.user_name  
                                             
                                             where sj.subject_id='$subject_id' ";
            $kq = $con->query($sql);
            $row=$kq->fetch_assoc();
            $anh = $row['subject_image'];
            $subject = $row['subject_id'];
            $id = substr($subject,0,5);
            ?>
                <div class='name-subject' style='background:url(<?php echo $anh ?>); background-size: cover '>
                    <p>
                        <?php echo $id ?>
                        <?php echo $row['subject_name'] ?>
                        
                    <p>
                </div>
        

           
    </div> <br>
    <form action="" method = "post" enctype="multipart/form-data">   
                    <button type="button"  class='add-dl' id = "myBtn" data-target=".modal1">Thêm bài tập</button>
                    <input type="hidden" name="subject_id" value = "<?php echo $row['subject_id']; ?>" >  
                    <input type="hidden" name="userOL" value=<?php echo $user?>>
                    
                     <div class="container">       
                        <div id="myModal" class="modal modal1">
                            <div class="modal-content" style="width:60%;height:70%" >                                 
                                <form action="" method="post" enctype="multipart/form-data">
                                    <h2>Thêm tài liệu</h2>
                                    <div class="fomrgroup">
                                        <input class='create-1' type="hidden" name="subject_id" value="<?php echo $row['subject_id']; ?>">
                                        <input class='create-1' type="text" name="homework_id" placeholder="Mã tài liệu">
                                        <input class='create-1' name="content" placeholder="Nội dung">
                                                                    
                                        <input class='create-1' type="datetime-local" name="finish" >
                                        <input class='upload' type='file' name = "fileUpload">
                                        <p class='create' >Chưa chọn file</p>                                                            
                                    </div>
                                    <div class="fomrgroup-1" style="text-align:center;">                   
                                        <button class="btn btn-primary" type='submit' name="btn_submit">Save</button>
                                        <button class="btn btn-danger" id="close">Cancel</button> &nbsp;
                                    </div>
                                </form>
                                <?php
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
                                            $sql = "INSERT INTO homework( homework_id, subject_id, homework_content, homework_time, homework_finish) VALUES ('$id', '$subject_id', '$content' '$duongdan', now(), '$finish')";
                                            mysqli_query($con,$sql); 
                                            
                                            }
                                        }
                                ?>
                            </div>
                        </div>
                                                    
                    </div>   
             </form>
             <form action="" method = "post" enctype="multipart/form-data">   
                    <button style="width:150px;margin-right:10px" type="button"  class='add-dl' id = "myBtn" data-target=".modal3" data-toggle="modal">Thêm thông báo</button>
                    <input type="hidden" name="subject_id" value = "<?php echo $row['subject_id']; ?>" >  
                    <input type="hidden" name="userOL" value=<?php echo $user?>>
                    
                     <div class="container">       
                        <div id="myModal" class="modal modal3">
                            <div class="modal-content" style="width:55%;height:30%" >                                 
                                <form action="" method="post" enctype="multipart/form-data">
                                    <h2>Thêm thông báo</h2>
                                    <div class="fomrgroup">
                                        <input type="hidden" name="subject_id" value="<?php echo $row['subject_id']; ?>">
                                       
                                        <input style="width:400px" class='create-1' name="noti_content" placeholder="Nội dung">
                                                                    
                                      
                                                                                              
                                    </div>
                                    <div class="fomrgroup-1" style="text-align:center;">                   
                                        <button class="btn btn-primary" type='submit' name="submit_noti">Save</button>
                                        <button class="btn btn-danger" id="close">Cancel</button> &nbsp;
                                    </div>
                                </form>
                                <?php
                                    if (isset($_POST["submit_noti"])) {
                                        $content_noti= $_POST["noti_content"];
                                    
                                       
                                        if ($content_noti == "") {     
                                            echo  "<script>alert('Vui lòng nhập đầy đủ thông tin')</script>";
                                        }else{
                                            $sql1 = "INSERT INTO notification( noti_content, noti_time, noti_status, user_name) VALUES ('$content_noti', now(),0,'$user')";
                                            mysqli_query($con,$sql1); 
                                            
                                            }
                                        }
                                ?>
                            </div>
                        </div>
                                                    
                    </div>   
             </form>
                             

    <div class="link">
        <form action="" method="post">
            <button type="button" class="repair" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='fa-solid fa-pencil'></i></button>            
            <input type="hidden" name="subject_id" value = "<?php echo $row['subject_id'] ?>" >
            <input type="hidden" name="user_name" value = "<?php echo $row['user_name'] ?>" >
            <input type="hidden" name="userOL" value="<?php echo $user?>">
            </form>      
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" style="width:70%">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Danh sách thành viên</h5>
                        <button type="button" data-bs-dismiss="modal" aria-label="Close" style="background:none;border:none">Đóng</button>
                    </div>
                    <div class="modal-body">
             
                    <?php
                        $sql="SELECT * FROM user join registry rg on user.user_name=rg.user_name
                                                 join subject sj on rg.subject_id=sj.subject_id   
                                                                                 
                                                        where sj.subject_id= '$subject_id'";
                        $kq = $con->query($sql);
                        echo"<table>";
                        while($row = mysqli_fetch_assoc($kq)){
                            echo "<tr>";
                            for($i=1;$i<4;$i++)
                            {
                                echo "<td style='width:300px'>";
                                if($row!=false){  
                                    $sql3="SELECT friend_user FROM friend where user_name='$user' ";
                                    $kq3 = $con->query($sql3);
                                    while($row3 = mysqli_fetch_assoc($kq3)){
                             
                                    $friend=$row3['friend_user']; echo $friend;
                                    //$friend_status=$row3['friend_status'];
                                    echo "
                                    <ul>
                                    <li><img src=".$row['user_image']." ></li>
                                    <li style='margin-top:10px'>".$row['user_fullname']."</li> 
                                    ";
                                   
                                     if($friend == ""){
                                    echo "<li style='margin-top:10px'><i class='fa-solid fa-user-plus'></i></li>";
                                     }else{
                                        echo "<li style='margin-top:10px'><i class='fa-solid fa-user-group'></i></li>";
                                    }
                                    
                                        //echo "<li style='margin-top:10px'><i class='fa-solid fa-user-group'></i></li>"; 
                                    
                                                                                            
                                    echo "</ul>"; 
                                     }  
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
        <div class="shadow p-4 mb-5 bg-white rounded">
            <p>Danh sách thành viên</p>           
        </div>
    </div> 

    
    <?php
   
        $sql = " SELECT * FROM subject sj join user  u on sj.user_name=u.user_name  
                                            join homework hw on sj.subject_id=hw.subject_id
                                            where sj.subject_id='$subject_id' order by homework_time desc";
        $kq = $con->query($sql);
        while($row=$kq->fetch_assoc()){
            
             $k = $row['homework_time'];
             $day = substr($k,-11,2);
             $month = substr($k,-14,2);
             $year = substr($k,-20,4);
             $user=$row['user_name'];
             $homework_id=$row['homework_id'];
             $img_user = $row['user_image'];
             $name = $row['user_fullname'];
             ?>
             <div id='content'>
                 <div class='content-1'>
                    <!-- Xóa bài tập, bài giảng -->
                    
                 <form action = "" method = "post"  >
                            <input type="hidden" name="subject_id" value = "<?php echo $row['subject_id'] ?>" >
                            <button type="submit" class = "img1" name ="delete_hw"><i class='fa-solid fa-xmark'></i></button>
                            
                            <input type="hidden" name="homework_id" value = "<?php echo $row['homework_id'] ?>" >
                            <input type="hidden" name='userOL' value=<?php echo $user ?>>
                </form>  
                <?php 
                if(isset($_POST['delete_hw'])){
                
                    $sql='DELETE FROM homework where homework_id='.$_POST['homework_id'].'';
                    mysqli_query($con,$sql);
                }
                ?>
                
                     <div class='media'>                        
                         <img src="<?php echo $img_user; ?>" class='mr-3' alt='...'>                      
                         <div class='media-body'>
                         <p class='mb-0'><?php echo $name ?><a href='#'></a></p>
                         <h6><?php echo $day; echo "/"; echo $month;echo "/"; echo $year;?></h6>
                         </div>
                     </div>
               
                     <hr>
                     <div id='baitap'>                                            
                         <form action='./homework.php' method='post' class='form-subject'>                                  
                            <input type='hidden' value="<?php echo $row['homework_id']; ?>" name='homework_id'>
                            <input type='hidden' name='userOL' value=<?php echo $user ?>>                                                                    
                            <input type='submit' value="<?php echo $row['homework_content'] ;?>" style="font-size:17px;color:blue!important"> <br>
                        </form> 
                        <!-- Sửa tài liệu -->  
                        <form action = "" method = "POST" >
                            <button style="margin-top:-70px" type = "button" class = "img1" id="myBtn" data-target=".modal2" data-toggle="modal"><i class='fa-solid fa-pencil'></i></button>
                            <input type="hidden" name="homework_id" value = "<?php echo $row['homework_id']; ?>" >
                            <input type="hidden" name="subject_id" value = "<?php echo $row['subject_id']; ?>" >
                            <input type="hidden" name="userOL" value=<?php echo $user?>> 
                            <div class="container">       
                        <div id="myModal" class="modal modal2">
                            <div class="modal-content" style="width:60%" >                                 
                                <form action="" method="post" enctype="multipart/form-data">
                                    <h2>Sửa tài liệu</h2>
                                    <div class="fomrgroup" >
                                         
                                   
                                    <input class='create-1' type="text" name="homework_id" value = "<?php echo $row['homework_id'] ?>" >
                                    <textarea class='create-1' name="homework_content"> <?php echo $row["homework_content"]; ?> </textarea>        
                                    <input class='create-1' name="homework_finish" value= "<?php echo $row["homework_finish"]; ?> "> <br> <br>
                                  
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
                                            
                                            }
                                        }
                                ?>
                            </div>
                        </div>
                                                    
                    </div>   
                        </form> 

                     
                    </div>

                 </div>
             </div>
             <?php
        }
    ?>
                    
    <div id="xemthem">
        <button class='button'>Xem thêm...</button>
    </div>
       
 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script>
    document.querySelector('.create').addEventListener('click', function () {
         document.querySelector('.upload').click()
     })
     document.querySelector('.upload').addEventListener('change', function () {
         document.querySelector('.create').innerHTML = document.querySelector('.upload').value
     })
    
   

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
    
    //Sửa tài liệu
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