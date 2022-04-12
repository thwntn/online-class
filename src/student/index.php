<?php
    include './demo/connect.php';
    $_POST['userOL'];
    $user_name = $_POST['userOL'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="./style.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="./header.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="./modal_index.css">
</head>
<body onload="show()">
    <div class="nav-mobile">
            <ul class="nav-mobile_list">
            <li class="item"><a href="#home"><i class="fas fa-home"></i></a></li>
            <li class="item"><a href="./manage.php"><i class="fas fa-suitcase"></i></a></li>
            <li class="item"><a href="#ten-lich"><i class="fas fa-calendar"></i></a></li>
            <li class="item"><a class ='noti-mobile'><i class="fas fa-bell"></i></a></li>
            <li class="item"><a class ='mess-mobile'><i class="fas fa-comment"></i></a></li>
        </ul>
    </div>
    <div class = 'frameNoti noti'>
        <h5>
            <i class="fas fa-bell"></i>Thông báo
        </h5>
        <?php
            $sql = "SELECT * FROM subject sj join registry rg on sj.subject_id=rg.subject_id 
                join notification nf on sj.user_name=nf.user_name where rg.user_name='$user_name'";
            $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                if($row['noti_status'] == 1){
                    $sj_id = substr($row['subject_id'],-13,5);
                    echo "
                        <div class = itemNoti>
                            <div class = 'imageNoti'>
                                <img src=".$row['subject_image'].">
                            </div>
                            <div class = 'contentNoti'>
                                <h4>".$sj_id."</h4>
                                <p>".$row['noti_content']."</p>
                            </div>
                        </div>
                    ";
                }else{
                    echo "
                        <div class = itemNotiStatus>
                            <div class = 'imageNoti'>
                                <img src=".$row['subject_image'].">
                            </div>
                            <div class = 'contentNoti'>
                                <h4>".$sj_id."</h4>
                                <p>".$row['noti_content']."</p>
                            </div>
                        </div>
                    ";
                    }
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
    <div id="wrapper">
        <header>
            <div class = 'backgroundNav'>
                <h2 class = 'titleNav'>Online Class</h2>
                <ul class = 'listItemsNav'>
                    <li class = 'itemNav'><a href = '#wrapper'>Trang chủ</a></li>
                    <li class = 'itemNav'>
                        <form action="./all_subject.php" method='post'>
                            <input type="hidden" name="userOL" value=<?php echo $user_name ?>>
                            <input class='header-subject' type="submit" value="Môn học">
                        </form>
                    </li>
                    <li class = 'itemNav baitap1'>
                        Bài tập được giao
                        <div class = 'frameNoti btap1'>
                            <h5>
                                <i class="fas fa-book"></i>Bài tập được giao
                            </h5>
                                <?php
                                    $sql = "SELECT * FROM registry rg join homework hw on rg.subject_id=hw.subject_id
                                        join subject sj on rg.subject_id=sj.subject_id where rg.user_name='$user_name' order by homework_time ASC";
                                    $result = $conn->query($sql);
                                    while($row = $result->fetch_assoc()) {
                                        $sj_id = substr($row['subject_id'],-13,5);
                                        echo "
                                        <a href='./subject.php?id=".$row['subject_id']."'>
                                            <div class = itemNoti>
                                                <div class = 'imageNoti'>
                                                    <img src=".$row['subject_image'].">
                                                </div>
                                                <div class = 'contentNoti'>
                                                    <h4>".$sj_id."</h4>
                                                    <p class='p-homework'>".$row['homework_content']."</p>
                                                </div>
                                            </div>
                                        </a>
                                    ";
                                    }
                                ?>
                        </div>
                        </li>
                    </li>
                    <li class = 'itemNav'><a href = '#lich'>Lịch học</a></li>
                    <li class = 'itemNav actNoti1'>
                        Thông báo
                        <div class = 'frameNoti noti1'>
                            <h5><i class="fas fa-bell"></i>Thông báo</h5>
                            <?php
                                $sql = "SELECT * FROM subject sj join registry rg on sj.subject_id=rg.subject_id 
                                    join notification nf on sj.user_name=nf.user_name where rg.user_name='$user_name'";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()) {
                                    $sj_id = substr($row['subject_id'],-13,5);
                                    if($row['noti_status'] == 1){
                                        echo "
                                        <div class = itemNoti>
                                            <div class = 'imageNoti'>
                                                <img src=".$row['subject_image'].">
                                            </div>
                                            <div class = 'contentNoti'>
                                                <h4>".$sj_id."</h4>
                                                <p>".$row['noti_content']."</p>
                                            </div>
                                        </div>
                                    ";
                                    }else{
                                        echo "
                                        <div class = itemNotiStatus>
                                            <div class = 'imageNoti'>
                                                <img src=".$row['subject_image'].">
                                            </div>
                                            <div class = 'contentNoti'>
                                                <h4>".$sj_id."</h4>
                                                <p>".$row['noti_content']."</p>
                                            </div>
                                        </div>
                                    ";
                                    }
                                }
                            ?>
                        </div>
                        </li>
                    <li class="itemNav actMess1">
                        Tin nhắn
                        <div class = 'frameNoti mess1'>
                            <h5 class = 'titleNoti'>
                                <i class="fab fa-facebook-messenger"></i> Tin nhắn
                            </h5>
                            <?php
                                $sql="SELECT * FROM chat c JOIN message ms ON c.chat_id = ms.chat_id JOIN user ON c.user_name=user.user_name  ";
                                $result = $conn->query($sql);
                                
                                while($row = $result->fetch_assoc()) {
                                    echo "
                                        <div class = itemNoti>
                                            <div class = 'imageNoti'>
                                                <img src=".$row['user_image'].">
                                            </div>
                                            <div class = 'contentNoti'>
                                                <h4> ".$row['friend_user']."</h4>
                                                <p>".$row['mess_content']."</p>
                                            </div>
                                        </div>
                                    ";
                                }
                                ?>
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
                    </li>
                    <!-- <li>
                        <form action="#" method="get">
                            <div class="search-box">
                                <input type="text" name="timkiem" class="search-text" placeholder="Tìm kiếm">
                                <div id="button">
                                    <i class="fa fa-search w3-xlarge"></i>
                                </div>
                            </div>
                        </form>
                    </li> -->
                </ul>
            </div>
        </header>
        <div class="content">
            <h1>Trang Sinh Viên</h1>
            <p>Chào mừng đến với trang sinh viên</p>
            <div>
                <form action="" method="post">
                    <input type="text" name="search" id="search" placeholder="Nhập mã môn học"><br>
                    <button type="submit" name="btnsearch" id="btt-search" value="search">Search...</button>
                    <input type="hidden" name="userOL" value=<?php echo $user_name ?>>
                </form>
    <!-- Tìm kiếm môn học-->
                <?php
                    if (isset( $_POST['btnsearch'])) {
                        $search = $_POST['search'];
                        $sql = "SELECT * FROM subject WHERE (subject_id like '%$search%') ";
                        $kq=$conn->query($sql);
                        $num = mysqli_num_rows($kq);
                        if ($num > 0 && $search != "") {
                            while($row=$kq->fetch_assoc()){
                                $subject_id = $row['subject_id'];
                                $sj_id = substr($row['subject_id'],-13,5);

                                $get_registry = "SELECT * FROM registry rg join subject sj on rg.subject_id=sj.subject_id
                                    where rg.subject_id='$subject_id' and rg.user_name='$user_name'";
                                $result = $conn->query($get_registry);
                                $result = mysqli_fetch_array($result);
                                if(isset($result)){
                                    $subject_id = $result['subject_id'];
                                    $subject_name = $result['subject_name'];
                                echo "
                                        <form action='./subject.php' method='post'>
                                            <input type='hidden' name='userOL' value=$user_name>
                                            <input type='hidden' name='subject_id' value=$subject_id>
                                            <input class='btn-submit' type='submit' value='$sj_id &nbsp; $subject_name' name='submit'>
                                        </form>                                    
                                ";
                                }else{
                                    echo "
                                    <h6>".$sj_id." &nbsp;  ".$row['subject_name']." &nbsp; 
                                        <u> 
                                            <form action='./registry.php' method='post'>
                                                <input type='hidden' name='userOL' value=$user_name>
                                                <input type='hidden' name='subject_id' value=$subject_id>
                                                <input class='submit' type='submit' value='Đăng ký' name='submit'>
                                            </form>
                                        </u>
                                    </h6>
                                ";
// Xử lý đăng ký môn học
                                }
                            }
                        }
                        else {
                            echo "Không tìm thấy kết quả!";
                        }
                    }
                    
                ?>
            </div>
        </div>
    </div>
    <br>
<!-- Môn học  -->
    <!-- <div class="subject">
        <p class="subject-logo"id="monhoc"><i> Học là học để mà hành <br>
            Vừa hành vừa học mới là người khôn.</i></p>
        <div class="slide-anh">
            <div id="btn-left" onclick="moveLeft()">
                <button class="btn btn-outline-light"><img src="./image/btn-right.jpg" alt=""></button>
            </div> -->
    <!-- Lấy môn học ra -->
            <?php
                // $sql = "SELECT * FROM registry rg join subject sj on rg.subject_id=sj.subject_id where rg.user_name='$user_name'";
                // $result = $conn->query($sql);
                // while($row = $result->fetch_assoc()) {
                //     echo "
                //         <form action='./subject.php' method='post' class='form-subject'>
                //             <div class='slide' id='a1'>
                //                 <input type='hidden' value=".$row['subject_id']." name='subject_id'>
                //                 <input type='hidden' name='userOL' value=$user_name>
                //                 <img src=".$row['subject_image'].">
                //                 <h4>
                //                     <input style='border:none; background: none;' type='submit' value=".$row['subject_id'].">
                //                 </h4>
                //                 <p>".$row["subject_name"]."</p>
                //             </div>
                //         </form>
                //     ";
                // }
            ?>
            <!-- <div id="btn-right" onclick="moveRight()">
                <button class="btn btn-outline-light"><img src="./image/btn-right.jpg" alt=""></button>
            </div>
        </div>
    </div> -->
    <br>
<!-- Lịch học -->
    <div id="lich">
        <div id="ten-lich">Lịch học</div>
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
                            <div class = 'header_year'>2020</div>
                        </div>
                        <div class = 'calendar-content'>
                        ";
                        include('./control/calendar.php');
                        echo "</div>";
                    ?>
                </div>
                <div class="col-1"></div>
                <div class="col-5">
                    <table>
                        <tr>
                            <th>Buổi</th>
                            <th>Ngày</th>
                            <th>Mã môn</th>
                            <th>Tên môn</th>
                        </tr>
                        <?php
                            $sql = "SELECT * FROM registry rg join calendar cl on rg.subject_id=cl.subject_id
                                join subject sj on rg.subject_id=sj.subject_id where rg.user_name='$user_name' order by cl.subject_time ASC";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) {
                                $k = $row['subject_time'];
                                $k1 = $row['subject_id'];
                                $code = substr($k1,-14,5);
                                $day1 = substr($k,-2,2);
                                $month1 = substr($k,-5,2);
                                $hour = substr($k,-3,2);
                                echo"
                                    <tr>
                                        <td></td>
                                        <td>".$day1."/".$month1."</td>
                                        <td>".$code."</td>
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
    <script src= "./style.js"></script>
    <script>
        const load = () => {
            setTimeout(() => {
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
                var noti = false
                var mess = false
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
            }, 1000);
        }
        load()

    </script>
</body>
</html>