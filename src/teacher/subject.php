<?php
    include './connect.php';
    include './logSystem.php';
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
                <div class='name-subject' style='background:url(<?php echo "http://localhost/online-class/src/database/{$subject_id}/image/{$anh}" ?>); background-size: cover '>
                        <p>
                        <?php echo $id ?>
                        <?php echo $row['subject_name'] ?>   
                        </p>
                        <form action = "" method = "POST" >
                                    <button type="button" class = "repair-1" id="myBtn" data-target=".modal2" data-toggle="modal"><i class='fas fa-pen'></i></button>
                                    <input type="hidden" name="subject_id" value = " <?php echo $row['subject_id']; ?>" >
                                    <input type="hidden" name="userOL" value=<?php echo $user?>>      
                                   
                                    <div class="container">       
                                           <div id="myModal" class="modal modal2">
                                                <div class="modal-content" style="width:40%;height:50%" >                                 
                                                    <form action="" method="post">
                                                        <h2>Chỉnh sửa môn học</h2>
                                                        <div class="fomrgroup">
                                                            <input style="width:250px;margin-left:-30px" class='create-1' type="text" name="subject_id" value="<?php echo $row["subject_id"] ?>"> 
                                                            <input style="width:250px;margin-left:-30px" class='create-1' type="text" name="subject_name" value="<?php echo $row["subject_name"] ?>">

                                                        </div>
                                                        <div class="fomrgroup-1" style="text-align:center;">                   
                                                            <button class="btn btn-primary" type='submit' name="update_sj">Save</button>&nbsp;
                                                            <button class="btn btn-danger" id="close">Cancel</button> 
                                                        </div>
                                                    </form>
                                                    <?php
                                                      
                                                        if(isset($_POST["update_sj"])) {
                                                            $sjid = $_POST["subject_id"];
                                                            $name = $_POST["subject_name"];
                                                            if ($name == "" || $sjid == "") {
                                                                echo  "<script>alert('Vui lòng nhập đầy đủ thông tin')</script>";
                                                            }else{
                                                            $sql = "UPDATE subject SET subject_id = '$sjid', subject_name='$name' WHERE subject_id='$subject'";
                                                            mysqli_query($con,$sql);    
                                                            logSystem('chỉnh sửa môn học', $user, $con);
                                                            }
                                                        } 
                                                        ?>
                                                </div>
                                            </div>                                       
                                        </div>  
                                    </form>
                </div>
    </div> <br>
    
    <!-- Thêm tài liệu -->
    <form action="" method = "post" enctype="multipart/form-data">   
                    <button type="button"  class='add-dl' id = "myBtn" data-target=".modal1" data-toggle="modal">Thêm tài liệu</button>
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
                                        if(is_dir('../database/'.$subject_id.'/homework/')) {
                                        }
                                        else {
                                            mkdir("../database/".$subject_id."/homework/", 7777, true);
                                        }
                
                                        move_uploaded_file($_FILES['fileUpload']['tmp_name'],'../database/'.$subject_id.'/homework/' . $duongdan);
                                        
                                        if ($id == "") {     
                                            echo  "<script>alert('Vui lòng nhập đầy đủ thông tin')</script>";
                                        }else{
                                            $sql = "INSERT INTO homework( homework_id, subject_id, homework_content, homework_time, homework_finish) VALUES ('$id', '$subject_id', '$content' '$duongdan', now(), '$finish')";
                                            mysqli_query($con,$sql); 
                                            logSystem('thêm 1 tài liệu', $user, $con);
                                            
                                            }
                                        }
                                ?>
                            </div>
                        </div>
                                                    
                    </div>   
             </form>
             <!-- Thêm thông báo -->
             

             <form action="" method = "post" >   
                    <button style="width:150px;margin-right:10px" type="button"  class='add-dl' id = "myBtn" data-target=".modal3" data-toggle="modal">Thêm thông báo</button>
                    <input type="hidden" name="subject_id" value = "<?php echo $row['subject_id']; ?>" >  
                    <input type="hidden" name="userOL" value=<?php echo $user?>>
                    
                     <div class="container">       
                        <div id="myModal" class="modal modal3">
                            <div class="modal-content" style="width:55%;height:50%" >   
                                                     
                                <form action="" method="post" >
                                    <h2>Thêm thông báo</h2>
                                    <div class="fomrgroup">
                                        <input type="hidden" name="subject_id" value="<?php echo $subject_id; ?>">
                                
                                        <textarea style="width:400px;height:100px" class='create-1' name="noti_content"> </textarea>                                                                   
                                                         
                                    </div>
                                    <div class="fomrgroup-1" style="text-align:center;">                   
                                        <button class="btn btn-primary" type='submit' name="submit_noti">Save</button>
                                        <button class="btn btn-danger" id="close">Cancel</button> &nbsp;
                                    </div>
                                </form>
                                <?php
                                 $sql3="SELECT * FROM registry where subject_id = '$subject_id' ";
                                 $kq3 = $con->query($sql3);
                                 while($row3=$kq3->fetch_assoc()){
                                    $user_rg= $row3['user_name'];                                                                                                    
                                    if (isset($_POST["submit_noti"])) {
                                        $content_noti= $_POST["noti_content"];
                                        
                                       
                                        if ($content_noti == "") {     
                                            echo  "<script>alert('Vui lòng nhập đầy đủ thông tin')</script>";
                                        }else{
                                            $sql = "INSERT INTO notification( noti_content, noti_time, noti_status, user_name) VALUES ('$content_noti', now(),0,'$user_rg')";
                                            mysqli_query($con,$sql); 
                                            logSystem('thêm 1 thông báo', $user, $con);
                                            }
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                        </form>                       
                    </div>   
           
                            
<!-- Danh sách thành viên -->
    <div class="link">
        <!-- <form action="" method="post">
            <button type="button" class="repair" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class='fa-solid fa-pencil'></i></button>            
            <input type="hidden" name="subject_id" value = "<?php echo $row['subject_id'] ?>" >
            <input type="hidden" name="user_name" value = "<?php echo $row['user_name'] ?>" >
            <input type="hidden" name="userOL" value="<?php echo $user?>">
              
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" style="width:70%">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Danh sách thành viên</h5>
                            <button type="button" data-bs-dismiss="modal" aria-label="Close" style="background:none;border:none">Đóng</button>
                        </div> -->
                <form action="" method = "post" >   
                    <button type="button"  class="repair" id = "myBtn" data-target=".modal4" data-toggle="modal"><i class='fa-solid fa-pencil'></i></button>
                    <input type="hidden" name="subject_id" value = "<?php echo $row['subject_id'] ?>" >
                    <input type="hidden" name="user_name" value = "<?php echo $row['user_name'] ?>" >
                    <input type="hidden" name="userOL" value="<?php echo $user?>">
                    
                     <div class="container">       
                        <div id="myModal" class="modal modal4">
                            <div class="modal-content" style="width:80%">
                            <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Danh sách thành viên</h5>
                            <button class="btn btn-danger" id="close">Đóng</button>
                        </div>
                            <div class="modal-body">
                                
                                <div class = "items row">
                            <?php
                                $sql="SELECT * FROM registry where subject_id= '$subject_id'";
                                $kq = $con->query($sql);
                            
                                    while($row = mysqli_fetch_assoc($kq)){
                                    $user_registry=$row['user_name'];
                                    $subject_id=$row['subject_id'];
                                    $sql1="SELECT * FROM user where user_name= '$user_registry'";
                                    $kq1 = $con->query($sql1);
                                    $row1 = mysqli_fetch_assoc($kq1);
                                    $sql2="SELECT * FROM homework where subject_id='$subject_id'";
                                    $kq2 = $con->query($sql2);
                                    $row2 = mysqli_fetch_assoc($kq2);
                                        $id_hw=$row2['homework_id'];
                                        // $document=$row2['document_directory'];
                                        
                                    echo "
                                    <div class = 'itemBox col-md-4'>
                                    <form action = '' method = 'POST'  >
                                        
                                        <input type='hidden' name='homework_id' value = $id_hw >
                                        <button type='submit' class='delete-rg' name='delete-rg' ><i class='fa-solid fa-xmark'></i></button>
                                        <input type='hidden' name='subject_id' value = $subject_id >
                                        <input type='hidden' name='user_name' value=$user_registry>
                                        <input type='hidden' name='userOL' value=$user>
                                    </form>                                                                                                             
                                    <ul>
                                    <li><img src='http://localhost/online-class/src/database/{$row1['user_name']}/image/{$row1['user_image']}' ></li>
                                    <li style='margin-top:10px'>".$row1['user_fullname']."</li> 
                                    </ul>         
                                    </div>                           
                                    ";
                                  
                                      
                                        
                                     
                                
                            ?> 
                             <?php 
                             if(isset($_POST['delete-rg'])){     
                                $sj_id=$_POST['subject_id'] ;
                                $user_rg=$_POST['user_name'] ;                     
                            $sql5="DELETE FROM score where subject_id='$sj_id' and user_name='$user_rg'";
                            mysqli_query($con,$sql5);
                            }
                            // if(isset($_POST['delete-rg'])){     
                            //     $sj_id=$_POST['subject_id'] ;
                            //     $user_rg=$_POST['user_name'] ;
                            //     $hw_id=$_POST['homework_id'] ;
                            // $sql7="DELETE FROM document where homework_id='$hw_id'";
                            // mysqli_query($con,$sql7);
                            // }           
                                    if(isset($_POST['delete-rg'])){     
                                        $sj_id=$_POST['subject_id'] ;
                                        $user_rg=$_POST['user_name'] ;               
                                    $sql6="DELETE FROM registry where subject_id='$sj_id' and user_name='$user_rg'";
                                    mysqli_query($con,$sql6);
                                    }
                                                           
                                }
                                ?>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            
        </form> 
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
             $homework=$row['homework_id'];
             $img_user = $row['user_image'];
             $name = $row['user_fullname'];
             ?>
             <div id='content'>
                 <div class='content-1'>
                    <!-- Xóa bài tập, bài giảng -->
                    
                 <form action = "" method = "POST" class="formDelete" >
                            <input type="hidden" name="subject_id" value = "<?php echo $row['subject_id'] ?>" >
                            <button type="submit" class = "img1" name="delete-hw" ><i class='fa-solid fa-xmark'></i></button>
                            
                            <input type="hidden" name="id" value = "<?php echo $homework?>" >
                            <input type="hidden" name='userOL' value=<?php echo $user ?>>
                </form>  
                <?php 
                                    if(isset($_POST["id"])){    
                                    $hw_id=$_POST["id"];                  
                                    $sql1="DELETE FROM homework where homework_id='$hw_id'";
                                    mysqli_query($con,$sql1);
                                }
                                ?>
                
                     <div class='media'>                        
                         <img src="<?php echo "http://localhost/online-class/src/database/{$user}/image/{$row['user_image']}" ?>" class='mr-3' alt='...'>                      
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
    
   
     
  //Xóa tài liệu
  document.addEventListener('DOMContentLoaded', function() {
    var el = document.getElementsByClassName("formDelete"); 
    for(var i=0;i < el.length;i++) {
    el[i].addEventListener("submit", function(e) { 
            e.preventDefault();
            Swal.fire({ 
                title: 'Bạn có chắc chắn muốn xóa không?',
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


 // Thêm tài liệu, thông báo
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