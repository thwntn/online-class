
<link rel="stylesheet" href="./manage.css">
<link rel="stylesheet" href="modulemanage/framework/css/bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<script src="modulemanage/framework/js/bootstrap.js"></script>
 <?php  
include './connect.php';
$user=$_POST['userOL'];
 if (isset($_POST['search'])){
    $search=$_POST['search'];
     $sql="SELECT * FROM subject where subject_id like '%$search%'";
     $kq=$con->query($sql);
     $num = mysqli_num_rows($kq);
     
     if (empty($search)) {
         echo "Dữ liệu không được để trống!";
         } else {
         if ($num > 0 && $search != "") {
             $row=$kq->fetch_assoc();
             $subject = $row['subject_id'];
             $id = substr($subject,0,5);
             ?>
               <br> <br> <br> 

    
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
                
                                 <form action='./subject.php' method='post'>                                  
                                 <input type='hidden' value="<?php echo $row['subject_id']; ?>" name='subject_id'>
                                    <input type='hidden' name='userOL' value=<?php echo $user ?>>                                                                    
                                    <h3 class = 'keySubject'><input type='submit' value="<?php echo $id ;?>"></h3>
                                    <h5 class = 'nameSubject'><input type='submit' value="<?php echo $row['subject_name'] ;?>"><h5>
                                </form> 
                                <div class="collapse collapse-horizontal" id="collapseWidthExample">                                                           
                                     <form action = "" method = "POST"  >
                                        <button type="button" class="btn" id="myBtn" data-target="#modal1"><i class="fa-solid fa-pencil"></i></button>
                                        <input type="hidden" name="subject_id" value = " <?php echo $row['subject_id']; ?>" >
                                        <input type="hidden" name="userOL" value=<?php echo $user?>>
<!-- 
                                        <div class="modal" id="modal1">
                                        <div class="header">
                                            <div class="title">First Modal</div>
                                            <button class="btn close-modal">&times;</button>
                                        </div>
                                        <div class="body">
                                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facere ea
                                            officia consectetur. Laborum, dolor? Assumenda quo corrupti eveniet
                                            velit fugit fugiat odit, dolorum labore obcaecati quia. Commodi
                                            assumenda sed maxime!
                                        </div>
                                        </div>                                 -->





                                         <!-- Sửa môn học -->
                                        <div class="container">
                                       
                                           <div id="myModal" class="modal modal-1">
                                                <div class="modal-content" >                                 
                                                    <form action="" method="post">
                                                        <h2>Chỉnh sửa môn học</h2>
                                                        <div class="fomrgroup">
                                                            <input type="text" name="subject_id" value="<?php echo $row["subject_id"] ?>"> <br> <br>
                                                            <input type="text" name="subject_name" value="<?php echo $row["subject_name"] ?>">

                                                        </div>
                                                        <div class="fomrgroup-1" style="text-align:center;">                   
                                                            <button class="btn btn-primary" type='submit' name="update">Lưu</button>
                                                            <button class="btn btn-danger" id="close">Đóng</button> &nbsp;
                                                        </div>
                                                    </form>
                                                    <?php
                                                        if(isset($_POST["update"])) {
                                                            $sjid = $_POST["subject_id"];
                                                            $name = $_POST["subject_name"];
                                                            if ($name == "" || $sjid == "") {
                                                        
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
                                        </div>
                            
                            
                            
                            </div>
                            <div class = 'navItem'>
                                <button class = 'submit'><i class='fas fa-user'></i></button>
                                <button class = 'submit'><i class='fas fa-user-plus'></i></button>
                                
                                <!--Them bài giảng -->
                                <form action = "" method = "post"  >   
                                    <button type="button" class="btn" data-target="#modal2" ><i class='fas fa-file-alt'></i></button>
                                    <input type="hidden" name="subject_id" value = " <?php echo $row['subject_id']; ?>" >  
                                    <input type="hidden" name="userOL" value=<?php echo $user?>>
                                    </form> 
                                    <div class="modal" id="modal2">
                                    <div class="header">
                                        <div class="title">Second Modal</div>
                                        <button class="btn close-modal">&times;</button>
                                    </div>
                                    <div class="body">
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facere ea
                                        officia consectetur. Laborum, dolor? Assumenda quo corrupti eveniet
                                        velit fugit fugiat odit, dolorum labore obcaecati quia. Commodi
                                        assumenda sed maxime!
                                    </div>
                                    </div>
                                </form>                                        
                                                        
                                <button class = 'submit' data-bs-toggle='collapse' data-bs-target='#collapseWidthExample' aria-expanded='false' aria-controls='collapseWidthExample'><i class='fas fa-pen'></i></button>
                                <button class = 'submit'><i class='fas fa-star'></i></button>
                                
                            </div>
                        </div>
                    </div>

                                  
        </div> 



        <button class = "more">Xem thêm...</button>
    </div>

 
            
             <?php
         }else {
             echo  "<script>alert('Khong tim thay ket qua')</script>";
            
             }
    }
 
}

    
?> 

