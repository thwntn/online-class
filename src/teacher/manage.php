<?php
    include './connect.php';
    $user=$_POST["userOL"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./manage.css">
    <link rel="stylesheet" href="modulemanage/framework/css/bootstrap.css">
    <script src="modulemanage/framework/js/bootstrap.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Baloo+2:wght@600&family=Barlow:wght@300&display=swap" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <br> <br>
    

   <?php 
   include 'header.php';
   ?>


    <div class = "mainSession row pad">
        <h2 class = "title row-md-10">Quản lí môn học</h2>
        <div class = "navigation col-md-6">
            <ul class = "listNav">
                <!-- <li><a href="./addclass.php">Thêm lớp học</a></li> -->
                <form action='./addclass.php' method='POST'>
                    <input type='hidden' name='userOL' value=<?php echo $user ?>>
                    <li><input type='submit' value='Thêm lớp học' style="border:none;background:none"></li>
                </form>
                <li><a href="">Xem vi phạm</a></li>
                <li>
                <form action="./search.php" method="post" class="box">
                    <b>Tìm kiếm</b>
                    <input class="search-class" type="text" name="search" placeholder="Nhập nội dung"> 
                    <input type="hidden" name="userOL" value=<?php echo $user?>>
                </form>
                </li>
            </ul>
        </div>
        
        <div class = "items row">
            <?php 
                
                $sql="SELECT * FROM subject where user_name='$user'";
                $kq=$con->query($sql);
                while($row=$kq->fetch_assoc()){
                    $subject = $row['subject_id'];
                    $id = substr($subject,0,5);
                    ?>
                    <div class = 'itemBox col-md-4'>
                        <!--Xóa môn học -->
                        <div class="collapse collapse-horizontal" id="collapseWidthExample">  
                                <form action = "" method = "POST"  class = "formDelete" >
                                    <button type="submit" class = "delete"><i class="fa-solid fa-xmark"></i></button>
                                    <input type="hidden" name="subject_id" value = " <?php echo $row['subject_id']; ?>" >
                                    <input type="hidden" name="userOL" value=<?php echo $user?>>
                                </form>  
                                <?php 
                                    if(isset($_POST['subject_id'])){
                                
                                    $sql="DELETE FROM subject where subject_id='$subject'";
                                    mysqli_query($con,$sql);
                                }
                                ?>
                        </div> 
                        <div class = 'item'>
                             <div class = 'backgroundItem' style="background:url(<?php echo $row['subject_image']; ?> ); background-size: cover" >
                            </div>
                            <div class= 'titleItem'>
                
                                 <form action='./subject.php' method='post'>                                  
                                 <input type='hidden' value="<?php echo $row['subject_id']; ?>" name='subject_id'>
                                    <input type='hidden' name='userOL' value=<?php echo $user ?>>                                                                    
                                    <h3 class = 'keySubject'><input type='submit' value="<?php echo $id ;?>"></h3>
                                    <h5 class = 'nameSubject'><input type='submit' value="<?php echo $row['subject_name'] ;?>"><h5>
                                </form>
                            
                            
                            </div>
                            <div class = 'navItem'>
                                <button class = 'submit'><i class='fas fa-user'></i></button>
                                <button class = 'submit'><i class='fas fa-user-plus'></i></button>
                                
                                <!--Them bài giảng -->
                                <form action = "" method = "post"  >   
                                    <button type="button" class = 'submit' id="myBtn"><i class='fas fa-file-alt'></i></button>
                                    <input type="hidden" name="subject_id" value = " <?php echo $row['subject_id']; ?>" >  
                                    <input type="hidden" name="userOL" value=<?php echo $user?>>
                                    
                                     <div class="container">       
                                           <div id="myModal" class="modal">
                                                <div class="modal-content" >                                 
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <h2>Thêm tài liệu</h2>
                                                        <div class="fomrgroup">
                                                            <input class='create-1' type="text" name="subject_id" value="<?php echo $row['subject_id']; ?>">
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
                                                        echo  "<script>alert('Thêm thành công')</script>";
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        
                                        </div>  

                                </form> 
                                                                
                                                        
                                <button class = 'submit' data-bs-toggle='collapse' data-bs-target='#collapseWidthExample' aria-expanded='false' aria-controls='collapseWidthExample'><i class='fas fa-pen'></i></button>
                                <button class = 'submit'><i class='fas fa-star'></i></button>
                                
                            </div>
                        </div>
                    </div>

                    <?php
                        }
                    ?>                  
        </div> 



        <button class = "more">Xem thêm...</button>
    </div>


  
    <script>  
    document.querySelector('.create').addEventListener('click', function () {
         document.querySelector('.upload').click()
     })
     document.querySelector('.upload').addEventListener('change', function () {
         document.querySelector('.create').innerHTML = document.querySelector('.upload').value
     })
    //Xóa môn học
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