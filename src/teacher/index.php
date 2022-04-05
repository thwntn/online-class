<?php
    $user=$_POST['userOL'];
    $_POST['userOL'];
include 'connect.php' ; 
 ?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
<meta charset="UFT-8">
<meta name="viewport" content="width=device-width, initial-scale=0.8">
<link rel="stylesheet" type="text/css" href="./style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="main">
    <div class="nav-mobile">
        <ul class="nav-mobile_list">
            <li class="item"><a href="#homepage"><i class="fas fa-home"></i></a></li>
            <li class="item"><a href="./manage.php"><i class="fas fa-suitcase"></i></a></li>
            <li class="item"><a href="#lich"><i class="fas fa-calendar"></i></a></li>
            <li class="item"><a class ='noti-mobile'><i class="fas fa-bell"></i></a></li>
            <li class="item"><a class ='mess-mobile'><i class="fas fa-comment"></i></a></li>
        </ul>
    </div>
    <div class = 'frameNoti noti'>
        <h5><i class="fas fa-bell"></i>Thông báo</h5>
        
                    <?php
                    
                    $sql="SELECT * FROM notification nt JOIN subject sj ON nt.user_name = sj.user_name  ";
                    $kq=$con->query($sql);
                    while($row=$kq->fetch_assoc()){
                    echo "<div class = 'itemNoti'>";
                    echo "<div class = 'imageNoti'>";
                    echo "<img src=".$row['subject_image'].">";
                    echo "</div>";
                    echo  "<div class = 'contentNoti'>";
                    echo "<h4>"; echo $row['subject_name']; echo "</h4>";
                    echo $row['noti_content'];
                    echo "</div>";
                    echo "</div>";
                    }
                ?> 
            
        
       
    </div>

    <div class = 'frameNoti mess'>
        <h5 class = 'titleNoti'><i class="fab fa-facebook-Notienger"></i> Tin nhắn</h5>
        <?php 
            $sql="SELECT * FROM chat c JOIN message ms ON c.chat_id = ms.chat_id JOIN user ON c.user_name=user.user_name  ";
            $kq=$con->query($sql);
            while($row=$kq->fetch_assoc()){
                echo "
                    <div class = 'itemNoti'>
                    <div class = 'imageNoti'>
                    <img src=".$row['user_image'].">
                    </div>
                    <div class = 'contentNoti'>
                    <h4>  ".$row['friend_user']." </h4>
                    <p>".$row['mess_content']."</p>
                    </div>
                    </div>
                 ";
                 
            }

        ?>
            <!-- <div class = 'itemNoti'>
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
            </div> -->

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
    <div id='homepage'>
        <div class = 'backgroundNav'>
            <h2 class = 'titleNav'>Online Class</h2>
            <ul class = 'listItemsNav'>
                <li class = 'itemNav'><a href = '#homepage'>Trang chủ</a></li>
        
                <?php
                    $sql = "SELECT * FROM subject sj join user on sj.user_name=user.user_name where sj.user_name='$user'";
                    $result = $con->query($sql);
                    $row = $result->fetch_assoc();
                        echo "

                         <form action='./manage.php' method='get'>
                             <input type='hidden' name='userOL' value=$user>
                             <li class = 'itemNav'><input type='submit' value='Môn học'></li>
                         </form>

                            ";
                    
                        ?>
                <li class = 'itemNav'><a href = '#lich'>Lịch dạy</a></li>
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
                //echo "<img src=".$row['user_image']." class='login'>"; 
                echo $row['user_name']; 
                ?>
                <!-- <php echo "<img src=".$row['user_image']." class='login'>" ?> -->
                

  
                    
                </li>
            </ul>
        </div>
    </div>
        <div  class="content">
            <h1><b>Trang giảng viên</h1>
            <p>Chào mừng đến trang giảng viên</b></p>
            <form action="./search.php" method="GET" class="text">
                <input class="search" type="text" name="search" placeholder="Nhập nội dung"> <br>
                <input type="hidden" name="userOL" value=<?php echo $user?>>
               
                <button type="submit" class="submit">Search...</button>
            </form>      
        </div>
</div>
<div id="lich">
        <div id="ten-lich">Lịch dạy</div>
        <div class="container">
            <div class="row">
                <div class="col-6 calendar-frame">
                    <?php
                        $day = date("d");
                        $month = date("m");
                        $year = date('Y');
                        echo "
                        <div class = 'calendar_header'>
                            <div class = 'nav-cal'>
                                <button class = 'nav-cal_prev'><i class='fas fa-angle-left'></i></button>
                                <div>Tháng ".$month."</div>
                                <button class = 'nav-cal_next'><i class='fas fa-angle-right'></i></button>
                            </div>
                            <div class = 'header_year'>2022</div>
                        </div>
                        <div class = 'calendar-content'>
                        ";
                        include('./model/calendar.php');
                        echo "</div>";
                    ?>
                </div>
            
                <div class="col-5">
                     <table>
                        <tr> 
                            <th>Buổi</th>
                            <th>Ngày</th>
                            <th>Mã môn</th>
                            <th>Tên môn</th> 
                            </tr>
                            <?php 
                            
                        
                            
                            $sql=" SELECT * FROM calendar cd JOIN subject sj ON cd.subject_id=sj.subject_id where user_name='$user' ";
                            $kq=$con->query($sql);
                            
                            while($row=$kq->fetch_assoc()){
                            $calendar = $row['calendar_time'];
                            $time = substr($calendar,-9,6);
                            $ngay = substr($calendar,-11,2);
                            $thang = substr($calendar,-14,2);
                            echo "
                            <tr>
                            <td>".$time."</td>
                            <td>".$ngay."/".$thang."</td>
                            <td>".$row['subject_code']."</td>
                            <td>".$row['subject_name']."</td>
                          
                         
                            
                            
                           </tr>
                            ";
                                
                            }
                        
                            ?>
                         
                    </table> 
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
//navigation
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

    //Active Noti
    var noti = false
    document.querySelector('.actNoti').addEventListener('click', function() {
        if(!noti) {
            document.querySelector('.noti').style.right = '100px'
            document.querySelector('.noti').style.display = 'flex'
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
            document.querySelector('.mess').style.right = '100px'
            document.querySelector('.mess').style.display = 'flex'
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
</script>
</body>
</html>