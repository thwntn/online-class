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
                                             join homework hw on sj.subject_id=hw.subject_id
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
                        <form action = "" method = "POST" style="margin-top:-50px;margin-right:20px" >
                            <button type ="button" class="repair" id="myBtn" style="width:50px"><i class="fa-solid fa-pencil"></i></button>
                            <input type="hidden" name="subject_id" value = " <?php echo $row['subject_id']; ?>" >
                            <input type="hidden" name="userOL" value=<?php echo $user?>>
                             <!-- Sửa môn học -->
                             <div class="container">       
                                           <div id="myModal" class="modal">
                                                <div class="modal-content" >                                 
                                                    <form action="" method="post">
                                                        <h2>Chỉnh sửa môn học</h2>
                                                        <div class="fomrgroup">
                                                            <input type="text" name="subject_id" value="<?php echo $row["subject_id"] ?>"> <br> <br>
                                                            <input type="text" name="subject_name" value="<?php echo $row["subject_name"] ?>">

                                                        </div>
                                                        <div class="fomrgroup-1" style="text-align:center;">                   
                                                            <button class="btn btn-primary" type='submit' name="update_sj">Save</button>
                                                            <button class="btn btn-danger" id="close">Cancel</button> &nbsp;
                                                        </div>
                                                    </form>
                                                    <?php
                                                        $user=$_POST['userOL'];
                                                        $subject = $_POST['subject_id'];
                                                        if(isset($_POST["update_sj"])) {
                                                            $sjid = $_POST["subject_id"];
                                                            $name = $_POST["subject_name"];
                                                            if ($name == "" || $sjid == "") {
                                                                echo  "<script>alert('Vui lòng nhập đầy đủ thông tin')</script>";
                                                            }else{
                                                            $sql = "UPDATE subject SET subject_id = '$sjid', subject_name='$name' WHERE subject_id='$subject'";
                                                            mysqli_query($con,$sql);    
                                                        
                                                            }
                                                        } 
                                                        ?>
                                                </div>
                                            </div>                                       
                                        </div>  
                        </form>
                    <p>
                </div>
        

           
    </div> <br>
    
    
    <!-- <form action="./add_homework.php" method = "post" >   
        <button class='add-dl'>Thêm bài tập</button>
        <input type="hidden" name="subject_id" value = "<php echo $row['subject_id']; ?>" >  
        <input type="hidden" name="userOL" value=<php echo $user?>>
    </form>    
                                 -->

    <div class="link">
    <a href="" class='repair'><i class='fa-solid fa-pencil'></i></a>


       
        <div class="shadow p-4 mb-5 bg-white rounded">
            <p>Danh sách thành viên</p>
            
        </div>
    </div> 
    <?php
        $name = $row['user_fullname'];
        $img_user = $row['user_image'];
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
             ?>
             <div id='content'>
                 <div class='content-1'>
                    <!-- Xóa bài tập, bài giảng -->
                 <form action = "" method = "post"  class = "formXoa" >
                            <input type="hidden" name="subject_id" value = "<?php echo $row['subject_id'] ?>" >
                            <button type="submit" class = "img1" name ="delete"><i class='fa-solid fa-xmark'></i></button>
                            
                            <input type="hidden" name="homework_id" value = "<?php echo $row['homework_id'] ?>" >
                            <input type="hidden" name='userOL' value=<?php echo $user ?>>
                </form>  
                <?php 
                if(isset($_POST['homework_id'])){
                $homework_id = $_POST['homework_id'];
                    $sql="DELETE FROM homework where homework_id='$homework_id'";
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
                     
                         <!-- <a href='./homework.php?id=<php echo $row['homework_id'];?>'>
                             <p><php echo $row['homework_content']?> </p>
                         </a> -->

                         <form action='./homework.php' method='post' class='form-subject'>                                  
                            <input type='hidden' value="<?php echo $row['homework_id']; ?>" name='homework_id'>
                            <input type='hidden' name='userOL' value=<?php echo $user ?>>                                                                    
                            <input  type='submit' value="<?php echo $row['homework_content'] ;?>" style="font-size:17px;color:blue!important"> <br>
                        </form> 

                     
                    </div>
                 </div>
             </div>
             <?php
        }
    ?>
                    
    <div id="xemthem">
        <button class='button'>Xem thêm...</button>
    

 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script>
    
    
   

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
    
    //Sửa môn học
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