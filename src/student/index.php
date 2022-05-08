<?php
    include './demo/connect.php';
    $user_name=$_POST['userOL'];
 ?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <meta charset="UFT-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<div class="main">
    <div class="nav-mobile">
        <ul class="nav-mobile_list">
            <li class="item"><a href="#homepage"><i class="fas fa-home"></i></a></li>
            <li class="item"><a class ='btap1-mobile'><i class="fas fa-suitcase"></i></a></li>
            <li class="item"><a href="#lich"><i class="fas fa-calendar"></i></a></li>
            <li class="item"><a class ='noti-mobile'><i class="fas fa-bell"></i></a></li>
            <li class="item"><a class ='mess-mobile'><i class="fas fa-comment"></i></a></li>
        </ul>
    </div>
    <div class = 'frameNoti noti'>
        <h5><i class="fas fa-bell"></i>Thông báo</h5>
        <?php
            $get = "SELECT * FROM friend where friend_user='$user_name' and friend_status=2";
            $data = $conn->query($get);
            while($row1 = $data->fetch_assoc()) {
                $user = $row1['user_name'];
                $sql = "SELECT * FROM user where user_name='$user'";
                $data1 = $conn->query($sql);
                $data1 = mysqli_fetch_array($data1);

                $name_user = $data1['user_fullname'];
                $img_user = $data1['user_image'];
                echo "
                    <div class = itemNoti>
                        <div class = 'imageNoti'>
                            <img src='http://localhost/online-class/src/database/{$user}/image/{$img_user}'>
                        </div>
                        <div class = 'contentNoti'>
                            <h4>".$name_user."</h4>
                            <form action='' method='post'>
                                <p class='p'>Đã gửi lời mời kết bạn &nbsp;  
                                    <input type='hidden' name='userOL' value=$user_name> 
                                    <input type='hidden' name='user' value=$user>
                                    <button type='submit' class='add' name='add_friend'>Chấp nhận</button>
                                </p>
                            </form>
                        </div>
                    </div>
                ";
            }
            $sql = "SELECT sj.user_name, sj.subject_image, sj.subject_id, nf.noti_content FROM subject sj join registry rg on sj.subject_id=rg.subject_id 
                join notification nf on sj.user_name=nf.user_name where rg.user_name='$user_name'";
            $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                // if($row['noti_status'] == 1){
                    $sj_id = substr($row['subject_id'],-13,5);
                    echo "
                        <div class = itemNoti>
                            <div class = 'imageNoti'>
                                <img src='http://localhost/online-class/src/database/{$row['user_name']}/image/{$row['subject_image']}'>  
                            </div>
                            <div class = 'contentNoti'>
                                <h4>".$sj_id."</h4>
                                <p>".$row['noti_content']."</p>
                            </div>
                        </div>
                    ";
                // }else{
                //     echo "
                //         <div class = itemNotiStatus>
                //             <div class = 'imageNoti'>
                //                 <img src=".$row['subject_image'].">
                //             </div>
                //             <div class = 'contentNoti'>
                //                 <h4>".$sj_id."</h4>
                //                 <p>".$row['noti_content']."</p>
                //             </div>
                //         </div>
                //     ";
                //     }
                }
            
        ?>
        <!-- Xử lý kết bạn -->
        <?php
            if(isset($_POST['add_friend'])){
                $user_name=$_POST['userOL'];
                $user=$_POST["user"];
                $sql1 = "INSERT INTO friend(friend_user, user_name, friend_status) 
                    VALUES ('$user','$user_name', 1)";
                $kq1=$conn->query($sql1);
                
            }                
        ?>
        <?php
            if(isset($_POST['add_friend'])){
                $user = $_POST['user'];
                $sql = "UPDATE friend SET friend_status=1 where friend_user='$user_name' and user_name='$user'";
                mysqli_query($conn,$sql);  
            }
        ?>
    </div>

    <div class = 'frameNoti mess'>
        <h5 class = 'titleNoti'><i class="fab fa-facebook-Notienger"></i> Tin nhắn</h5>
        <?php
            $sql1 = "SELECT * FROM chat  where user_name='$user_name'";
            $result1 = $conn->query($sql1);
            while($row1 = $result1->fetch_assoc()) {
                $friend = $row1['friend_user'];
                if(isset($friend)){
                    $get_user = "SELECT * FROM user where user_name='$friend'"; 
                    $result0 = $conn->query($get_user);
                    $result0 = $result0->fetch_assoc();
                    //lấy chat id tin nhắn send
                    $query = "SELECT chat_id FROM chat WHERE user_name = '$user_name' AND friend_user = '$friend'";
                    
                    foreach($conn -> query($query) as $value) {
                        $idSend = $value['chat_id'];
                    }
                    //lấy chat id tin nhắn received
                    $query = "SELECT chat_id FROM chat WHERE user_name = '$friend' AND friend_user = '$user_name'";
                    
                    foreach($conn -> query($query) as $value) {
                        $idReceived = $value['chat_id'];
                    }
                    echo "
                        <div class = 'itemNoti' user = $result0[user_name]>
                            <div class = 'imageNoti'></div>
                            <div class = 'contentNoti'>
                                <h4>".$result0['user_fullname']."</h4>
                                <p>Bài tập mới được giao</p>
                            </div>
                        </div>
                        ";
                }
            }
            ?>
            <div class = 'frameMess'>
                <div class = 'navigationMess'>
                    <button class = 'backMess'>
                        <i class='fas fa-angle-left'></i>
                    </button>
                    <div class = 'imageMess'></div>
                    <h5 class = 'nameMess'>".$result0['user_fullname']."</h5>
                </div>
                <div class = 'contentMess'>
                </div>
                <div class = 'navigationMessSend'>
                        <input style="color: black;" class = 'inputMessChat' placeholder = 'Nhập tin nhắn'></input>
                        <button  class = 'buttonMessSend'><i class="fas fa-paper-plane"></i></button>
                </div>
            </div>
        <!-- <div class = 'frameMess'>
            <div class = 'navigationMess'>
                <button class = 'backMess'>
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
        </div> -->
    </div>
    <div id='homepage'>
        <div class = 'backgroundNav'>
            <h2 class = 'titleNav'>Online Class</h2>
            <ul class = 'listItemsNav'>
                <li class = 'itemNav'><a href = '#homepage'>Trang chủ</a></li>
                <li class = 'itemNav'>
                    <form action="./all_subject.php" method='post'>
                        <input type="hidden" name="userOL" value=<?php echo $user_name ?>>
                        <input class='header-subject' type="submit" value="Môn học">
                    </form>
                </li>
                <li class = 'itemNav baitap1'>Bài tập được giao</li>
                <li class = 'itemNav'><a href = '#lich'>Lịch học</a></li>
                <li class = 'itemNav actNoti'>Thông báo</li>
                <li class="itemNav actMess">Tin nhắn</li>
                <!-- <li> -->
                    <!-- <form action="" method="post" class="box">
                        <button type="submit" name='submit' class='submit'><i class="fas fa-search"></i></button>
                        <input class="search-class" type="text" name="search" placeholder="Nhập nội dung"> 
                        <input type="hidden" name="userOL" value=<?php echo $user_name?>>
                    </form> -->
                    <?php
                        // if (isset( $_POST['search'])) {
                        //     $search = $_POST['search'];
                        //     $sql = "SELECT * FROM user WHERE (user_name like '%$search%') ";
                        //     $kq=$conn->query($sql);
                        //     $num = mysqli_num_rows($kq);
                        //     if ($num > 0 && $search != "") {
                        //         while($row=$kq->fetch_assoc()){
                        //             $user = $row['user_name'];
                        //             echo $user;
                        //         }
                        //     }
                        // }
                    ?>
                <!-- </li> -->
                <li>
                    <?php
                        $sql="SELECT * FROM user where user_name='$user_name'";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        echo "
                        <img src='http://localhost/online-class/src/database/{$user_name}/image/{$row['user_image']}' style='width:40px;border-radius:50px'>
                        ".$row['user_fullname']."

                        <div class='dropdown'>
                            <button onclick='hamDropdown()' class='nut_dropdown'> <i class='fa-solid fa-caret-down'></i></button>
                            <div class='noidung_dropdown'>
                                <form action='./profile.php' method='post'>
                                    <input type='hidden' name='userOL' value=$user_name>
                                    <input class='sub-taikhoan' type='submit' value='Tài khoản'>
                                </form>
                                <a href='logout.php'>Đăng xuất &nbsp;
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
    </div>
    <div  class="content">
        <h1>Trang Sinh Viên</h1>
        <p>Chào mừng đến với trang sinh viên</p>
            <form action="" method="post">
                <input type="text" name="search" id="search" placeholder="Nhập nội dung tìm kiếm"><br>
                <button type="submit" name="btnsearch" id="btt-search" value="search">Tìm kiếm</button>
                <input type="hidden" name="userOL" value=<?php echo $user_name ?>>
            </form>
            <!-- Tìm kiếm môn học-->
            <?php
                if (isset( $_POST['btnsearch'])) {
                    $search = $_POST['search'];
                    $sql = "SELECT * FROM user WHERE (user_name like '%$search%') ";
                    $kq=$conn->query($sql);
                    $num = mysqli_num_rows($kq);
                    if ($num > 0 && $search != "") {
                        while($row=$kq->fetch_assoc()){
                            $user_fullname = $row['user_fullname'];
                            $user = $row['user_name'];
                            echo "
                                <form action='./profile_user.php' method='post'>
                                    <input type='hidden' name='userOL' value=$user_name>
                                    <input type='hidden' name='user' value=$user>
                                    <input class='btn-submit' type='submit' value='$user_fullname' name='submit'>
                                </form>                                    
                            ";
                            }
                        }
                        else {
                            echo "Không tìm thấy kết quả!";
                        }
                    }
                    
            ?>
    </div>
</div>
<!-- <button class = 'nav-cal_next'><i class='fas fa-angle-right'></i></button>
<button class = 'nav-cal_prev'><i class='fas fa-angle-left'></i></button> -->
<div id="lich">
    <div id="ten-lich">Lịch Học</div>
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
                                <div>Tháng ".$month."</div>
                            </div>
                            <div class = 'header_year'>2022</div>
                        </div>
                        <div class = 'calendar-content'>
                        ";
                        include('./control/calendar.php');
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
                            $sql = "SELECT cl.subject_time , sj.subject_id, sj.subject_name FROM registry rg join calendar cl on rg.subject_id=cl.subject_id
                                 join subject sj on rg.subject_id=sj.subject_id where rg.user_name='$user_name' order by cl.subject_time ASC";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) {
                                $k = $row['subject_time'];
                                $k1 = $row['subject_id'];
                                $code = substr($k1,-14,5);
                                $day1 = substr($k,-11,2);
                                $month1 = substr($k,-14,2);
                                $hour = substr($k,-8,5);
                                echo"
                                    <tr>
                                        <td>".$hour."</td>
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
    // document.querySelector('.frameMess').addEventListener('click', function(e) {
    //     e.stopPropagation();
    // })

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
            document.querySelector('.noti').style.right = '250px'
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
    //bai tap
    var noti = false
    document.querySelector('.baitap1').addEventListener('click', function() {
    if(!noti) {
        document.querySelector('.btap1').style.right = '600px'
        document.querySelector('.btap1').style.display = 'flex'
        noti = true
    }
    else {
        document.querySelector('.btap1').style.display = 'none'
        noti = false
        }
    })

    // mess
    function fetchMess(userName, userFriend) {
        $.get(
            "./mess/text.php",
            {userName: userName, userFriend: userFriend},
            function(data)
            {
                $('.contentMess').html(data)
            }
        )

        sessionStorage.setItem("dataOLChat", JSON.stringify({
            userName: userName,
            userFriend: userFriend
        }))
    }

    $('.itemNoti').on('click', function() {
        fetchMess('<?php echo $user_name ?>', this.getAttribute('user'))
        $('.nameMess').html(this.children[1].children[0].innerHTML)
    })
    
    // send mess

    function sendMess () {
        let users = JSON.parse(sessionStorage.getItem('dataOLChat'))
        const actionSend = new Promise(resolve => {
            resolve(
                    $.post(
                    "./mess/sendmess.php",
                    {userName: users.userName, userFriend: users.userFriend, content: $('.inputMessChat').val()},
                    function (data) {
                        console.log(data);
                    }
                )
            )
        })

        if($('.inputMessChat').val() != '') {
            actionSend
            .then(() => {
                fetchMess(users.userName, users.userFriend)
            })
        }
        $('.inputMessChat').val('')
    }

    $('.buttonMessSend').on('click', sendMess)

    // updatemess
    setInterval(() => {
        let users = JSON.parse(sessionStorage.getItem('dataOLChat'))
        if(users != null) {
            fetchMess(users.userName, users.userFriend)
        }
    }, 2000);
</script>
</body>
</html>