
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
<?php 
 if (isset($_POST['search'])){
    $search=$_POST['search'];
     $sql="SELECT * FROM subject where subject_id like '%$search%' and user_name = '$user'";
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