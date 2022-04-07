<?php
    include './connect.php';
    $user=$_GET['userOL'];
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

<div id='subject'>
    <div class = "mainSession row pad">
        <h2 class = "title row-md-10">Quản lí môn học</h2>
        <div class = "navigation col-md-6">
            <ul class = "listNav">
                <!-- <li><a href="./addclass.php">Thêm lớp học</a></li> -->
                <form action='./addclass.php' method='get'>
                    <input type='hidden' name='userOL' value=<?php echo $user ?>>
                    <li><input type='submit' value='Thêm lớp học' style="border:none;background:none"></li>
                </form>
                <li><a href="">Xem vi phạm</a></li>
                <li>
                <form action="./search.php" method="GET" class="box">
                    <b>Tìm kiếm</b>
                    <input class="search-class" type="text" name="search" placeholder="Nhập nội dung"> 
                    <input type="hidden" name="userOL" value=<?php echo $user?>>
                </form>
                </li>
            </ul>
        </div>
        <div class = "items row">
            <?php 
                include('./connect.php');

                $sql="SELECT * FROM subject where user_name='$user'";
                $kq=$con->query($sql);
                while($row=$kq->fetch_assoc()){
  
                    ?>
                    <div class = 'itemBox col-md-4'>
                        <!--Xóa môn học -->
                        <div class="collapse collapse-horizontal" id="collapseWidthExample">  
                                <form action = "./deletesubject.php" method = "GET"  class = "formDelete" >
                                    <button type="submit" class = "delete"><i class="fa-solid fa-xmark"></i></button>
                                    <input type="hidden" name="subject_id" value = " <?php echo $row['subject_id']; ?>" >
                                    <input type="hidden" name="userOL" value=<?php echo $user?>>
                                </form>  
                        </div> 
                        <div class = 'item'>
                             <div class = 'backgroundItem' style="background:url(<?php echo $row['subject_image']; ?> ); background-size: cover" >
                              
                          
                            </div>
                            <div class= 'titleItem'>
                                 <!-- <a href="subject.php?id=<php echo $row['subject_id']; ?>"><h3 class = 'keySubject'><php echo $row['subject_code']; ?></h3>
                                <h5 class = 'nameSuject'><php echo $row['subject_name']; ?></h5></a>  -->
                                 <form action='./subject.php' method='get'>                                  
                                    <input type='hidden' value="<?php echo $row['subject_id']; ?>" name='subject_id'>
                                    <input type='hidden' name='userOL' value=<?php echo $user ?>>                                                                    
                                    <h3 class = 'keySubject'><input type='submit' value="<?php echo $row['subject_code'] ;?>"></h3>
                                    <h5 class = 'nameSubject'><input type='submit' value="<?php echo $row['subject_name'] ;?>"><h5>
                                </form> 

                                <!-- Sua mon hoc -->
                                <div class="collapse collapse-horizontal" id="collapseWidthExample">                                                            
                                     <form action = "./suasubject.php" method = "GET"  >
                                        <button type="submit" class = "repair"><i class="fa-solid fa-pencil"></i></button>
                                        <input type="hidden" name="subject_id" value = " <?php echo $row['subject_id']; ?>" >
                                        <input type="hidden" name="userOL" value=<?php echo $user?>>
                                    </form>                               
                                </div> 
                            </div>
                            
                            <div class = 'navItem'>
                                <button class = 'submit'><i class='fas fa-user'></i></button>
                                <button class = 'submit'><i class='fas fa-user-plus'></i></button>
                                
                                <!--Them bài giảng -->
                                <form action="./add_document.php" method = "GET"  >   
                                <button class = 'submit'><i class='fas fa-file-alt'></i></button>
                                <input type="hidden" name="subject_id" value = " <?php echo $row['subject_id']; ?>" >  
                                <input type="hidden" name="userOL" value=<?php echo $user?>>
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
</div>
    <script>
    
   
   
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


       
       
</script>
</body>
</html>