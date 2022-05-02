<?php
include 'connect.php'; 
$user=$_POST['userOL'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="./header.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <title>Document</title>
</head>
<body>
 <div class="nav-mobile">
        <ul class="nav-mobile_list">
            <li class="item-mobile"><a href="./#homepage"><i class="fas fa-home"></i></a></li>
            <li class="item-mobile"><a href="./manage.php"><i class="fas fa-suitcase"></i></a></li>
            <li class="item-mobile"><a href="#lich"><i class="fas fa-calendar"></i></a></li>
            <li class="item-mobile"><a class ='noti-mobile'><i class="fas fa-bell"></i></a></li>
            <li class="item-mobile"><a class ='mess-mobile'><i class="fas fa-comment"></i></a></li>
        </ul>
    </div>
    
    <div class = 'frameNoti noti'>
        <h5><i class="fas fa-bell"></i>Thông báo</h5>
       
        <?php 
         $sql = "SELECT * FROM subject where user_name='$user'";
         $kq = $con->query($sql);
         while($row = $kq->fetch_assoc()) {
            $subjectid=$row['subject_id'];
            $sql1 = "SELECT * FROM homework where subject_id='$subjectid'";
            $kq1 = $con->query($sql1);
            while($row1 = $kq1->fetch_assoc()) {
                $homeworkid=$row1['homework_id'];
                $sql2 = "SELECT * FROM comment cmt join user on cmt.user_name=user.user_name where homework_id='$homeworkid' and user.user_name != '$user'";
                $kq2 = $con->query($sql2);
                while($row2 = $kq2->fetch_assoc()) {
                    echo "
                    <form action='./homework.php' method='POST' >
                    <input type='hidden' name='userOL' value=$user> 
                    <input type='hidden' name='subject_id' value=$subjectid> 
                    <input type='hidden' name='homework_id' value=$homeworkid> 
                    <div class = itemNoti>                           
                        <div class = 'imageNoti'>
                            <img src=".$row2['user_image'].">
                        </div>
                        <div class = 'contentNoti'>
                            <button type='submit'>
                                    
                            <h4>".$row2['user_fullname']."</h4>
                            <p>".$row2['comment_content']."</p>
                            <button>
                        </div>                                                     
                    </div>
                    </form>
                    ";
                }
            }
         }
        ?>



        <?php
        $sql = "SELECT * FROM friend where friend_user='$user' and friend_status=2";
                $kq = $con->query($sql);
            while($row = $kq->fetch_assoc()) {
                $friend_user = $row['user_name'];
                $sql1 = "SELECT * FROM user where user_name='$friend_user'";
                $kq1 = $con->query($sql1);
                $row1 = mysqli_fetch_assoc($kq1);
                $name_user = $row1['user_fullname'];
                $img_user = $row1['user_image'];
                echo "
                    <div class = itemNoti>
                        <div class = 'imageNoti'>
                            <img src=".$img_user.">
                        </div>
                        <div class = 'contentNoti'>
                            <h4>".$name_user."</h4>
                            <form action='' method='post'>
                                <p class='p'>Đã gửi lời mời kết bạn &nbsp;  
                                    <input type='hidden' name='userOL' value=$user> 
                                    <input type='hidden' name='user' value=$friend_user>
                                    <button type='submit' class='add-friend' name='add_friend'>Chấp nhận</button>
                                    <button type='submit' class='cancel-friend' name='cancel_friend'>Từ chối</button>
                                </p>
                            </form>
                        </div>
                    </div>
                ";
            }
        ?>
<!-- Xử lý kết bạn -->
    <?php
        if(isset($_POST['add_friend'])){
             $user=$_POST['userOL'];
              $friend_user=$_POST["user"];
            $sql2 = "INSERT INTO friend(friend_user, user_name, friend_status) 
                VALUES ('$friend_user','$user', 1)";
            $kq2=$con->query($sql2);
            
        }                
    ?>
    <?php
        if(isset($_POST['add_friend'])){
            $friend_user = $_POST['user'];
            $sql = "UPDATE friend SET friend_status=1 where friend_user='$user' and user_name='$friend_user'";
            mysqli_query($con,$sql);  
        }
    ?>
<!-- Xử lý Từ chối -->   
<?php
        if(isset($_POST['cancel_friend'])){
            $friend_user = $_POST['user'];
            $sql = "DELETE FROM friend where friend_user='$user' and user_name='$friend_user' and friend_status = 2 ";
            mysqli_query($con,$sql);  
        }
    ?>
        
    </div>
    <div class = 'frameNoti mess'>
        <h5 class = 'titleNoti'><i class="fab fa-facebook-Notienger"></i> Tin nhắn</h5>
            <div class = 'itemNoti'>
                <div class = 'imageNoti'></div>
                <div class = 'contentNoti'>
                    <h4>Nguyen Van A</h4>
                    <p>Bài tập mới được giao</p>
                </div>
            </div>
            <div class = 'itemNoti'>
                <div class = 'imageNoti'></div>
                <div class = 'contentNoti'>
                    <h4>Nguyen Van A</h4>
                    <p>Bài tập mới được giao</p>
                </div>
            </div>
            <div class = 'itemNoti'>
                <div class = 'imageNoti'></div>
                <div class = 'contentNoti'>
                    <h4>Nguyen Van A</h4>
                    <p>Bài tập mới được giao</p>
                </div>
            </div>
            <div class = 'itemNoti'>
                <div class = 'imageNoti'></div>
                <div class = 'contentNoti'>
                    <h4>Nguyen Van A</h4>
                    <p>Bài tập mới được giao</p>
                </div>
            </div>
        <div class = 'frameMess'>
            <div class = 'navigationMess'>
                <button
                    class = 'backMess'
                >
                    <i class="fas fa-angle-left"></i>
                </button>
                <div class = 'imageMess'></div>
                <h5 class = 'nameMess'>Nguyễn Trần Thiên Tân</h5>
            </div>
            <div class = 'contentMess'>
                <div class = 'messMess'>
                    <p class = 'sendMess'>Làm người yêu mình nhé!</p>
                </div>
                <div class = 'messMess'>
                    <p class = 'receiveMess'>Tớ chỉ xem cậu là bạn thôi :)</p>
                </div>
            </div>
            <div class = 'navigationMessSend'>
                <input class = 'inputMessChat' placeholder = "Nhập tin nhắn"></input>
                <button class = 'buttonMessSend'><i class ="fad fa-paper-plane"></i></button>
            </div>
        </div>


    </div>
    <div class = 'backgroundNav'>
        <h2 class = 'titleNav'>Online Class</h2>
        <ul class = 'listItemsNav'>
        <li class='itemNav'>
            <form action="./index.php" method='post'>
                <input type="hidden" name="userOL" value=<?php echo $user?>>
                <input class='itemNav' type="submit" value="Trang chủ">
            </form>
        </li>
        <?php
                    $sql = "SELECT * FROM subject sj join user on sj.user_name=user.user_name where sj.user_name='$user'";
                    $result = $con->query($sql);
                    $row = $result->fetch_assoc();
                        echo "
                    
                         <form action='./manage.php' method='post'>
                             <input type='hidden' name='userOL' value=$user>
                             <li class = 'itemNav'><input type='submit' value='Môn học'></li>
                         </form>

                            ";
                    
                        ?>
            
        <li class='itemNav'>
            <form action='./index.php#lich' method='post'>
                <input type="hidden" name="userOL" value=<?php echo $user?>>
                <input class='itemNav' type="submit" value="Lịch dạy">
            </form>
        </li>

            <li class = 'itemNav actNoti'>
                Thông báo
                
                </li>
            <li class="itemNav actMess">
                Tin nhắn
                
            </li>
            <li>
            <?php
            
               
                ?>
                <script>
                    function hamDropdown() {
                document.querySelector(".noidung_dropdown").classList.toggle("hienThi");
                }
                </script>
                
                </li>  
        </ul>
    </div> 
    
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
    
    document.querySelector('.frameNoti').addEventListener('click', function(event){
        event.stopPropagation()
    })
    document.querySelectorAll('.frameNoti')[1].addEventListener('click', function(event){
        event.stopPropagation()
    })


    //Background Header
    document.addEventListener('scroll', () => {
        if(window.scrollY > 0) {
            document.querySelector('.backgroundNav').classList.remove('noactiveNav')
            document.querySelector('.backgroundNav').classList.add('activeNav')
        }
        else {
            document.querySelector('.backgroundNav').classList.add('noactiveNav')
            document.querySelector('.backgroundNav').classList.remove('activeNav')
        }
    })
   
    
    //Content Mess
    var contentMess = false
    const itemNoti = document.querySelectorAll('.itemNoti')
    for (i of itemNoti){
        i.addEventListener('click', function(){
            if(!contentMess) {
                document.querySelector('.frameMess').style.display = 'flex'
                contentMess = true
            }
            else {
                document.querySelector('.frameMess').style.display = 'none'
                contentMess = false
            }
        })
    }
    document.querySelector('.backMess').addEventListener('click', () => {
        document.querySelector('.frameMess').style.display = 'none'
        contentMess = false
    })
    
    //Active Noti
    var noti = false
    document.querySelector('.actNoti').addEventListener('click', function() {
        if(!noti) {
            document.querySelector('.noti').style.display = 'flex'
            noti = true
        }
        else {
            document.querySelector('.noti').style.display = 'none'
            noti = false
        }
    })
    
    //Mess Mobile
    document.querySelector('.mess-mobile').addEventListener('click', function() {
        if(!mess) {
            document.querySelector('.mess').style.bottom = '100px'
            document.querySelector('.mess').style.display = 'flex'
            document.querySelector('.mess').style.right = '20px'
            mess = true
        }
        else {
            document.querySelector('.mess').style.display = 'none'
            mess = false
        }
    })
    document.querySelector('.frameMess').addEventListener('click', function(e) {
        e.stopPropagation();
    })

    //Active Notification Mobile
    document.querySelector('.noti-mobile').addEventListener('click', function() {
        if(!noti) {
            document.querySelector('.noti').style.display = 'flex'
            document.querySelector('.noti').style.right = '20px'
            document.querySelector('.noti').style.bottom = '100px'
            noti = true
        }
        else {
            document.querySelector('.noti').style.display = 'none'
            noti = false
        }
    })

    //Active Message
    var mess = false
    document.querySelector('.actMess').addEventListener('click', function() {
        if(!mess) {
            document.querySelector('.mess').style.display = 'flex'
            mess = true
        }
        else {
            document.querySelector('.mess').style.display = 'none'
            mess = false
        }
    })
</script>
</html>