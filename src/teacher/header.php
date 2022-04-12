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
                    $con = mysqli_connect('localhost', 'root','', 'online-class');

                    $sql="SELECT * FROM notification nt JOIN subject sj ON nt.user_name = sj.user_name  ";
                    $kq=$con->query($sql);
                    while($row=$kq->fetch_assoc()){
                    echo "<div class = 'itemNoti'>";
                    echo "<div class = 'imageNoti'>";
                    echo "<img src=".$row['subject_image'].">";
                    echo "</div>";
                    echo  "<div class = 'contentNoti'>";
                    echo "<h4>"; echo $row['subject_code']; echo "</h4>";
                    echo $row['noti_content'];
                    echo "</div>";
                    echo "</div>";
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
            
                $sql="SELECT * FROM user where user_name='$user'";
                $result = $con->query($sql);
                $row = $result->fetch_assoc();
                echo "
                <img src=".$row['user_image']." style='width:40px;border-radius:50px'>
                ".$row['user_fullname']."

                <div class='dropdown'>
                    <button onclick='hamDropdown()' class='nut_dropdown'> <i class='fa-solid fa-caret-down'></i></button>
                    <div class='noidung_dropdown'>
                        <a href='#'>Tài khoản</a> 
                        <a href='#'>Đăng xuất 
                        <i class='fa-solid fa-right-from-bracket'></i>
                        </a>
                    </div>
                    </div>
                ";
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