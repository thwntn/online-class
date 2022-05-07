<?php
include 'connect.php';
$user=$_POST['userOL'];
$friend_user=$_POST['user'];
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
    $sql="SELECT * FROM user where user_name='$friend_user'";
    $kq = $con->query($sql);
    $row = $kq->fetch_assoc();
    ?>
    <div class='frame row'>
        <div class='background'></div>
        <div class='leftBar col-md-3'>
            <div class = 'row'>
                <div class='imageUser col-md-12' style='background:url(<?php echo "http://localhost/online-class/src/database/{$friend_user}/image/{$row['user_image']}" ?>); background-size: cover '}>                
                </div>
            </div>
            <div class='infoAdd row'>
            <h4><?php echo $row['user_fullname'] ?></h4>
                    <i><?php echo $row['user_major'] ?></i> 
            <?php 
                $sql2="SELECT * FROM friend where user_name = '$user' and friend_user = '$friend_user'";
                $kq2 = $con->query($sql2);
                $row2 = $kq2->fetch_assoc();
                 if(isset($row2)){
                    if($row2['friend_user']==$friend_user && $row2['user_name']==$user && $row2['friend_status']==2){
                        
                        echo "
                        <form action='' method='post'>
                            <input type='hidden' name='userOL' value=$user>
                            <input type='hidden' name='user' value=$friend_user>
                            <button type='submit' name='edit_friend' style='width:170px'>Đã gửi lời mời kết bạn</button>
                        </form>
                        ";
                        }else if($row2['friend_status'] == 1){
                        echo "                                 
                         
                    <div class='dropdown'>
                        <button onclick='hamDropdown()' class='nut_dropdown' type='submit'>Bạn bè</button>
                            <div class='noidung_dropdown'>
                                <form action='' method='post'>
                                    <input type='hidden' name='userOL' value=$user>
                                    <input type='hidden' name='user' value=$friend_user>
                                    <input type='submit' name='unfriend' value='Hủy kết bạn'>
                                </form>
                            </div>
                      </div>                         
                             
                        ";
                        }
                        
                    }else{
                        echo "
                        <form action='' method='post'>
                        <input type='hidden' name='userOL' value=$user>
                        <input type='hidden' name='user' value=$friend_user>
                        <button type='submit' name='submit_friend'>Kết bạn</button>
                    </form>
                            
                        ";
                        }        
                ?>
            
            <!-- Kết bạn -->
                <h4>
                <?php
                        if(isset($_POST['submit_friend'])){
                            // $user_name=$_POST['userOL'];
                            // $user=$_POST["user"];
                            $sql3 = "INSERT INTO friend(friend_user, user_name, friend_status) 
                                VALUES ('$friend_user','$user', 2)";
                            $kq3=$con->query($sql3);
                            echo "
                                <p style='font-size:20px'>
                                    Đã gửi lời mời kết bạn!
                                <p>
                            ";
                        }
                    ?>
                </h4>   
                <!--Hủy kết bạn -->
                <?php
                    if (isset( $_POST['unfriend'])) {
                        $sql="DELETE FROM friend where friend_user='$friend_user' and user_name='$user' and friend_status=1";
                        mysqli_query($con,$sql);
                    }
                ?>
                <?php
                    if (isset( $_POST['unfriend'])) {
                        $sql4="DELETE FROM friend where friend_user='$user' and user_name='$friend_user' and friend_status=1";
                        mysqli_query($con,$sql4);
                    }
                ?>
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
                    $get_friend ="SELECT * FROM friend where user_name='$friend_user' and friend_status=1";
                    $result = $con->query($get_friend);
                    while($row1 = $result->fetch_assoc()) {
                        $user_friend = $row1['friend_user'];
                        $get = "SELECT * FROM user where user_name='$user_friend'";
                        $data = $con->query($get);
                        while($row = $data->fetch_assoc()) {
                            $user_fullname = $row['user_fullname'];
                            $user_img=$row['user_image'];
                            if($row['user_name']==$user){
                             
                                echo "
                                <form action='./profile.php' method='post' >
                                        <ul>
                                        <li><p>Bạn</p></li>
                                        <input type='hidden' name='userOL' value=$user>
                                      
                                        <button type='submit' style='border:none;background:none'>
                                        <li> 
                                            <div class='friendItem' style='background:url(http://localhost/online-class/src/database/{$row['user_name']}/image/{$row['user_image']}); background-size: cover '>                                           
                                            </div> 
                                        </li>
                                        </button>
                                    </ul>
                                    </form>
                                    
                                    ";
                            }else{
                            
                                echo "
                            <form action='./profile_friend.php' method='post' >
                                    <ul>
                                    <li><p>".$row['user_fullname']."</p></li>
                                    <input type='hidden' name='userOL' value=$user>
                                    <input type='hidden' name='user' value=$user_friend>
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
                        }
                    ?>
                        
                    </div>
                 
                     <h3>Môn học</h3>
                     <div class='subject row'>
                         
                     <?php 
                      $sql1="SELECT * FROM user where user_name='$friend_user'";
                      $kq1 = $con->query($sql1);
                      $row1 = $kq1->fetch_assoc();
                      $user_type=$row1['user_type'];
                      if($user_type==1){
                    $sql="SELECT * FROM subject where user_name='$friend_user'";
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
                   <?php 
                        }  
                    }else{
                    
                    $sql = "SELECT * FROM subject sj join registry rg on sj.subject_id=rg.subject_id where rg.user_name='$friend_user'";
                    $result = $con->query($sql);
                    while($row = $result->fetch_assoc()) {
                        $subject_id = $row['subject_id'];
                        $subject_img = $row['subject_image'];
                        $get = "SELECT * FROM user u join subject sj on u.user_name=sj.user_name where subject_id='$subject_id'";
                        $data = $con->query($get);
                        while($row2 = $data->fetch_assoc()) {
                        echo "
                            <div class='subjectItem'>
                                <div class='icon'>
                                    <i class='fas fa-book-reader'></i>
                                </div>
                                <div class='imageSubject'style='background:url($subject_img); background-size: cover '>
                                
                                </div>
                                <div class='infoSuject'>
                                    <div>
                                        <h5>".$row['subject_name']."</h5>
                                        
                                        
                                        <form action='./subject.php' method='POST'>
                                            <input type='hidden' name='userOL' value=$friend_user>
                                            <input type='hidden' name='subject_id' value=".$subject_id.">
                                            <button type='submit'>Truy cập</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            ";
                        }
                    }
                }
                   ?>
                     
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
                    $sql="SELECT * FROM user where user_name='$friend_user'";
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
    function hamDropdown() {
                    document.querySelector(".noidung_dropdown").classList.toggle("hienThi");
                   } 
    </script>
    
</body>
</html>