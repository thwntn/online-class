<?php
include 'connect.php';
$user=$_POST['userOL'];$_POST['userOL'];
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
                <div class='imageUser col-md-12' style='background:url(<?php echo $row['user_image'] ?>); background-size: cover '}>
                   
                    <form action="" method='POST'>
                             <input type='hidden' name='userOL' value=<?php echo $user ?>>
                             <input class="upload" type="file" name="fileUpload">
                             <p class="changeUser"><i class="fa-solid fa-camera"></i></p>
                    </form>
                    <?php 
                     if(isset($_POST["fileUpload"])) {
                        $duongdan = $_FILES['fileUpload']['name'];
                        if(is_dir('../database/'.$user.'/image/')) {
                        }
                        else {
                            mkdir("../database/".$user."/image/", 7777, true);
                        }

                        move_uploaded_file($_FILES['fileUpload']['tmp_name'],'../database/'.$user.'/image/' . $duongdan);
                        if ($duongdan == "") {
                    
                        }else{
                        $sql = "UPDATE user SET user_image='$duongdan' where user_name='$user'";
                        mysqli_query($con,$sql);    
                        }
                     }
                    ?>
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
           
            <button type = "button"  id="myBtn" >Chỉnh sửa thông tin </button>
        
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
                                    <div class='friendItem' style='background:url($user_img); background-size: cover '>                                           
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
                             <div class='imageSubject' style='background:url(<?php echo $row['subject_image']; ?>); background-size: cover '></div>
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
            <h5>Description</h5>
            <p>
            Experts predict that annual eCommerce sales will exceed $6 trillion dollars by 2023. 

            Retail conglomerates and small businesses alike turn to online stores to sell products to a wider audience and increase their revenue. 

            However, as more eCommerce websites pop up each day, staying competitive can be challenging. 

            When it comes to your online store, you don’t have the luxury of an in-person sales team to close the deal. Conversions come down to the effectiveness of your product page and product descriptions. 
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
         document.querySelector('.changeUser').addEventListener('click', function () {
         document.querySelector('.upload').click()
     })
     document.querySelector('.upload').addEventListener('change', function () {
         document.querySelector('.changeUser').innerHTML = document.querySelector('.upload').value
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