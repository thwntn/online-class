
<link rel="stylesheet" href="./manage.css">
<link rel="stylesheet" href="modulemanage/framework/css/bootstrap.css">
    <script src="modulemanage/framework/js/bootstrap.js"></script>
 <?php  
include 'connect.php';
include 'header.php';
 if (isset($_GET['search'])){
    $search=$_GET['search'];
     $sql="SELECT * FROM subject where subject_id like '%$search%'";
     $kq=$con->query($sql);
     $num = mysqli_num_rows($kq);
     
     if (empty($search)) {
         echo "Dữ liệu không được để trống!";
         } else {
         if ($num > 0 && $search != "") {
             $row=$kq->fetch_assoc();
             ?>

        <br> <br> <br> 
        <div class = "mainSession row pad">
        <h2 class = "title row-md-10">Quản lí môn học</h2>
        <div class = "navigation col-md-6">
            <ul class = "listNav">
                <li><a href="./addclass.php">Thêm lớp học</a></li>
                <li><a href="">Xem vi phạm</a></li>
                <li>
                <form action="search.php" method="GET" class="box">
                <b>Tìm kiếm</b>
                <input class="search-class" type="text" name="search" placeholder="Nhập nội dung"> 
                </form>
                </li>
            </ul>
        </div>
             <div class = "items row" >
           
                    <div class = 'itemBox col-md-4'>
                        <!--Xóa môn học -->
                        <div class="collapse collapse-horizontal" id="collapseWidthExample">  
                                <form action = "./deletesubject.php" method = "GET"  class = "formDelete" >
                                    <button type="submit" class = "delete"><i class="fa-solid fa-xmark"></i></button>
                                    <input type="hidden" name="code" value = " <?php echo $row['subject_code']; ?>" >
                                </form>  
                        </div> 
                        <div class = 'item'>
                            <div class = 'backgroundItem' style="background:url( <?php echo $row['subject_image'];?> ); background-size: cover">                           
                            </div>
                            <div class= 'titleItem'>
                                <a href="./subject.php?code=<?php echo $row['subject_code']; ?>"><h3 class = 'keySubject'><?php echo $row['subject_id']; ?></h3>
                                <h5 class = 'nameSuject'><?php echo $row['subject_name']; ?></h5></a>
                                <!-- Sua mon hoc -->
                                <div class="collapse collapse-horizontal" id="collapseWidthExample">                                                            
                                     <form action = "./suasubject.php" method = "GET"  >
                                        <button type="submit" class = "repair"><i class="fa-solid fa-pencil"></i></button>
                                        <input type="hidden" name="code" value = " <?php echo $row['subject_code']; ?>" >
                                    </form>                               
                                </div> 
                            </div>
                            
                            <div class = 'navItem'>
                                <button class = 'submit'><i class='fas fa-user'></i></button>
                                <button class = 'submit'><i class='fas fa-user-plus'></i></button>
                                
                                <!--Them mon hoc -->
                                <form action="add_homework.php" method = "GET"  >   
                                <button class = 'submit'><i class='fas fa-file-alt'></i></button>
                                <input type="hidden" name="code" value = " <?php echo $row['subject_code']; ?>" >  
                                </form>                                                              
                                                        
                                <button class = 'submit' data-bs-toggle='collapse' data-bs-target='#collapseWidthExample' aria-expanded='false' aria-controls='collapseWidthExample'><i class='fas fa-pen'></i></button>
                                <button class = 'submit'><i class='fas fa-star'></i></button>
                            </div>
                        </div>
                    </div>

                                    
        </div> 
             <?php
         }else {
             echo  "<script>alert('Khong tim thay ket qua')</script>";
            
             }
    }
 }


    
?> 