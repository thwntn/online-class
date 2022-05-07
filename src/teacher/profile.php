<?php
include 'connect.php';
include './logSystem.php';
$user=$_POST['userOL'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./profile.css">


    <!-- bootstrap -->
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> 
    <script src="https://use.fontawesome.com/f4fe177e5d.js"></script>

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <?php 
    $sql="SELECT * FROM user where user_name='$user'";
    $kq = $con->query($sql);
    $row = $kq->fetch_assoc();
    $user_name=$row['user_name'];
    ?>
    <div class='frame row'>
        <div class='background'></div>
        <div class='leftBar col-md-3'>
            <div class = 'row'>
                
                <div class='imageUser col-md-12' style='background:url(<?php echo "http://localhost/online-class/src/database/{$user}/image/{$row['user_image']}" ?>); background-size: cover '}>
                   
                  
                </div>
            </div>
            <div class='infoAdd row'>
                <h4><?php echo $row['user_fullname'] ?></h4>
                <i><?php echo $row['user_major'] ?></i>
               
                <!-- <button>Kết bạn</button> -->
                
            </div>
            <div class='count row'>
          
                <!-- <div class='homeWork'>
                    <h3>23</h3>
                    <l>Bài tập</l>
                </div> -->
                <!-- <div class='class'>
                    <h3>23</h3>
                    <l>Lớp học</l>
                </div> -->
            </div>
            
            <div class='change row'>

            <div class="container">
                
                
                <form action="" method = "post" enctype="multipart/form-data">   
                    <button type="button" id="myBtn" data-target=".modal1" >Chỉnh sửa thông tin</button>
                    <input type="hidden" name="userOL" value=<?php echo $user?>>
                    <!-- The Modal -->
                    <div id="myModal" class="modal modal1">
                        <div class="modal-content" style="width:60%;height:87%">
                            <form action="" method = "post">
                                <span class="close">&times;</span>
                                <form action="" method="post" >
                                    <h2>Chỉnh sửa thông tin</h2>
                                    <div class="fomrgroup">
                                        <input type="text" name="user_fullname" value="<?php echo $row['user_fullname']; ?>">
                                        <input type="text" name="user_email" value="<?php echo $row['user_email'] ?>"> 
                                        <input type="text" name="user_phone" value="<?php echo $row['user_phone'] ?>">    
                                        <input type="text" name="user_address" value="<?php echo $row['user_address'] ?>">  
                                        <input type="text" name="user_major" value="<?php echo $row['user_major'] ?>">                                            
                                        <input style="display:none" class='upload' type="file" name = "avatar">
                                         <p  class="user-image">Hình ảnh</p>
                            
                                            <input type='hidden' name='userOL' value=<?php echo $user ?>>
                                        
                                    </div>
                                    <div class="fomrgroup-1" style="text-align:center;margin-top:30px">                   
                                        <button class="btn btn-primary" type='submit' name="update-user">Save</button>
                                    </div>
                            </form>
                            <?php 
                                
                                if(isset($_POST["update-user"])) {
                                    $fullname = $_POST["user_fullname"];
                                    $email = $_POST["user_email"];
                                    $phone = $_POST["user_phone"];
                                    $address = $_POST["user_address"];
                                    $major = $_POST["user_major"];       
                                    $duongdan = $_FILES['avatar']['name'];
                                                    
                                    if(is_dir('../database/'.$user.'/image/')) {
                                    }
                                    else {
                                        mkdir("../database/".$user."/image/", 7777, true);
                                    }

                                    move_uploaded_file($_FILES['avatar']['tmp_name'],'../database/'.$user.'/image/' . $duongdan);
                                    if ($fullname == "" || $email == "" || $phone == "" || $address == "" || $major == "" || $duongdan == "") {
                                     
                                   }else{
                                    $sql = "UPDATE user SET user_fullname='$fullname', user_email='$email', user_phone='$phone', user_address='$address', user_major='$major', user_image='$duongdan' WHERE user_name='$user'";
                                     mysqli_query($con,$sql);
                                     logSystem('chỉnh sửa thông tin', $user, $con);
                                        }
                                    }
                            ?>
                            
                        </div>
                    </div>
                    </form> 
                </div>
         

            
            </div>       
        </div>
        
        <div class='rightBar col-md-6'}>
            <div class='banner row'>
                <div class='bannerImg'></div>
            </div>
            <div class='content row'>
                <div class='ofUser col-md-12'>
                <h3>Bạn bè</h3>
                
                        
                  
                    <div class='friend row'>
                    <?php
                    $get_friend ="SELECT * FROM friend where user_name='$user' and friend_status=1";
                    $result = $con->query($get_friend);
                    while($row1 = $result->fetch_assoc()) {
                        $user_friend = $row1['friend_user'];
                        $get = "SELECT * FROM user where user_name='$user_friend'";
                        $data = $con->query($get);
                        while($row = $data->fetch_assoc()) {
                            $user_img=$row['user_image'];
        
                            echo "
                            <form action='./profile_friend.php' method='post' >
                                    <ul>
                                    <li><p>".$row['user_fullname']."</p></li>
                                    <input type='hidden' name='userOL' value=$user>
                                    <input type='hidden' name='user' value=".$row['user_name'].">
                                    <button type='submit' style='border:none;background:none'>
                                    <li> 
                                        <div class='friendItem' style='background:url(http://localhost/online-class/src/database/{$row['user_name']}/image/{$row['user_image']}); background-size: cover '>                                           
                                        </div> 
                                    </li>
                                    </button>
                                </ul>
                                </form>
                                
                                ";
                            }
                        }
                    ?>
                        
                    </div>
                 
                     <h3>Môn học</h3>
                     <div class='subject row'>
                     <?php 
                    $sql="SELECT * FROM subject where user_name='$user'";
                    $kq = $con->query($sql);
                   
                    while($row = $kq->fetch_assoc()){
                        
                        ?>
                         <div class='subjectItem'>
                             <div class='icon'>
                                 <i class='fas fa-book-reader'></i>
                             </div>
                             <div class='imageSubject' style='background:url(<?php echo "http://localhost/online-class/src/database/{$row['subject_id']}/image/{$row['subject_image']}" ?>); background-size: cover '></div>
                             <div class='infoSuject'>
                                 <div>
                                     <h5><?php echo $row['subject_name']; ?></h5>    
                                     <form action='./subject.php' method='POST'>
                                                <input type='hidden' name='userOL' value=<?php echo $user ?>>
                                                <input type='hidden' name='subject_id' value=<?php echo $row['subject_id'] ?>>
                                                <button type='submit'>Truy cập</button>
                                    </form>                         
                                                            
                                 </div>
                             </div>
                        </div>
                   <?php } ?>        
                    </div> 
                </div>              
            </div>     
                 
        </div>
        <div class='discription col-md-3'>
        <form action="./index.php" method='post'>
                <input type="hidden" name="userOL" value=<?php echo $user?>>
                <button type="submit" class="home">Trang chủ</button>
        </form>
            <h5>Description</h5>
            <p>
            <?php 
                    $sql="SELECT * FROM user where user_name='$user'";
                    $kq = $con->query($sql);
                   
                    $row = $kq->fetch_assoc();
                    echo "
                        Email: ".$row['user_email']."<br>
                        SĐT: ".$row['user_phone']."<br>
                        Địa chỉ: ".$row['user_address']."<br>
                        Ngành: ".$row['user_major']."
                    ";
                        ?>   
            </p>
        </div>
        
    </div>   
   
                                                    
    <script>
        const handle = {
            randomColor: function() {
                return `rgb(${Math.floor(Math.random()*255)}, ${Math.floor(Math.random()*255)}, ${Math.floor(Math.random()*255)})`
            },
            event: function() {
                const iconBook = document.querySelectorAll('.icon i')
                for(let item of iconBook) {
                    item.style.color = this.randomColor()
                }
            },
            start: function () {
                this.event()
            }
        }

        handle.start()

          //Thêm hình ảnh
           document.querySelector('.user-image').addEventListener('click', function () {
           document.querySelector('.upload').click()
       })
       document.querySelector('.upload').addEventListener('change', function () {
           document.querySelector('.user-image').innerHTML = document.querySelector('.upload').value
       })

// Modal
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