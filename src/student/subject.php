<?php
    include './demo/connect.php';
    $subject_id = $_POST['subject_id'];
    $user_name = $_POST['userOL'];
?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <meta charset="UFT-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <link rel="stylesheet" type="text/css" href="./giaovien.css">
    <link rel="stylesheet" type="text/css" href="./modal_sj.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
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
    <div class = 'frameNoti btap1'>
        <h5><i class="fas fa-book"></i>Bài tập được giao</h5>
             <?php
                $sql = "SELECT sj.user_name, sj.subject_image, sj.subject_id, hw.homework_content, hw.homework_id FROM registry rg join homework hw on rg.subject_id=hw.subject_id
                    join subject sj on rg.subject_id=sj.subject_id where rg.user_name='$user_name' order by homework_time ASC";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    $homework_id = $row['homework_id'];
                    $subject_id1 = $row['subject_id'];
                    $sj = substr($row['subject_id'],-13,5);
                    echo "
                    <form action='./homework.php' method='post'>
                        <input type='hidden' name='userOL' value=$user_name> 
                        <input type='hidden' name='subject_id' value=$subject_id1> 
                        <input type='hidden' name='homework_id' value=$homework_id>
                        <div class = itemNoti>
                            <div class = 'imageNoti'>
                            <button type='submit' class='button' >
                                <img src='http://localhost/online-class/src/database/{$row['user_name']}/image/{$row['subject_image']}'>  
                                <button>
                            </div>
                            <div class = 'contentNoti'>
                                <h4>".$sj."</h4> 
                                <p class='p-homework'>".$row['homework_content']."</p>
                            </div>
                        </div>
                    </form>
                    ";
                }
            ?>
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
                            <div class = 'imageNoti'>
                                <img src='http://localhost/online-class/src/database/{$result0['user_name']}/image/{$result0['user_image']}'>  
                            </div>
                            <div class = 'contentNoti'>
                                <h4>".$result0['user_fullname']."</h4>
                                <p>Tin nhắn</p>
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
                    <!-- <div class = 'imageMess'>
                        <img src="http://localhost/online-class/src/database/{$result0['user_name']}/image/{$result0['user_image']}">
                    </div> -->
                    <h5 class = 'nameMess'>".$result0['user_fullname']."</h5>
                </div>
                <div class = 'contentMess'>
                </div>
                <div class = 'navigationMessSend'>
                        <input style="color: black;" class = 'inputMessChat' placeholder = 'Nhập tin nhắn'></input>
                        <button  class = 'buttonMessSend'><i class="fas fa-paper-plane"></i></button>
                </div>
            </div>
    </div>
    <div id='homepage'>
        <div class = 'backgroundNav'>
            <h2 class = 'titleNav'>Online Class</h2>
            <ul class = 'listItemsNav'>
                <li class = 'itemNav'>
                    <form action="./index.php" method='post'>
                        <input type="hidden" name="userOL" value=<?php echo $user_name ?>>
                        <input class='header-subject' type="submit" value="Trang chủ" style='color:black'>
                    </form>
                </li>
                <li class = 'itemNav'>
                    <form action="./all_subject.php" method='post'>
                            <input type="hidden" name="userOL" value=<?php echo $user_name ?>>
                            <input class='header-subject' type="submit" value="Môn học" style='color:black'>
                        </form>
                </li>
                <li class = 'itemNav baitap1'>Bài tập được giao</li>
                <li class = 'itemNav'>
                    <form action="./index.php#lich" method='post'>
                        <input type="hidden" name="userOL" value=<?php echo $user_name ?>>
                        <input class='header-subject' type="submit" value="Lịch học" style='color:black'>
                    </form>
                </li>
                <li class = 'itemNav actNoti'>Thông báo</li>
                <li class="itemNav actMess">Tin nhắn</li>
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
    
</div>
<div class="main-subject">
        <?php
            $sql = "SELECT * FROM subject sj join user  u on sj.user_name=u.user_name  
                 where sj.subject_id='$subject_id'";
            $result = $conn->query($sql);
            $result = mysqli_fetch_array($result);
            $anh = $result['subject_image'];
            $sj = substr($result['subject_id'],-13,5);
            echo "
                <div class='name-subject' style='background:url(http://localhost/online-class/src/database/{$result['user_name']}/image/{$anh});background-repeat: no-repeat;background-size: cover;'>
                    <p>
                        <b>".$sj."</b>
                        ".$result['subject_name']."
                    </p>
                </div>
            ";           
        ?>       
    </div>
    <div class="link">
        <div class="shadow p-4 mb-5 bg-white rounded">
            <form action="" method="post">
                <p>Danh sách lớp:</p>
                <input type='hidden' name='userOL' value = <?php echo $user_name ?>>
                <input type='hidden' name='subject_id' value =<?php echo $subject_id ?>>
                <button type='button' class ='button' id="myBtn">Xem</button>
                <div class="container">
                    <div id="myModal" class="modal">
                        <div class="modal-content">                             
                            <form action="" method="post">
                                <span class="close">&times;</span>
                                <h3>DANH SÁCH LỚP</h3>
                                <h4><?php echo $subject_id?></h4>
                                <div class='list'>
                                <?php   
                                    $get_user = "SELECT * FROM  registry rg join user u on rg.user_name=u.user_name 
                                        where subject_id='$subject_id'";
                                    $data = $conn->query($get_user);
                                    while($row = $data->fetch_assoc()) {
                                        $img_user = $row['user_image'];
                                        $user = $row['user_name'];
                                        echo "
                                                <p class='list-1'>
                                                    <img src='http://localhost/online-class/src/database/{$row['user_name']}/image/{$img_user}' alt='' class='a1'> 
                                                    ".$row['user_fullname']."
                                                </p>
                                          
                                          ";
                                    }
                                ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div> 
    <?php
        $name = $result['user_fullname'];
        $img_user = $result['user_image'];
        $sql = "SELECT sj.user_name, hw.homework_content, hw.homework_time ,hw.homework_id FROM  subject sj join homework hw on hw.subject_id=sj.subject_id
             where sj.subject_id='$subject_id'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            $k = $row['homework_time'];
            $day = substr($k,-11,2);
            $month = substr($k,-14,2);
            $year = substr($k,-20,4);
            $homework_content = $row['homework_content'];
            
            echo "
            <div id='content'>
                <div class='content-1'>
                    <div class='media'>
                        <img src='http://localhost/online-class/src/database/{$row['user_name']}/image/{$img_user}' class='mr-3' alt='...'>
                        <div class='media-body'>
                        <p class='mb-0'>".$name."</p>
                        <i class='day'>".$day."/".$month."/".$year."</i>
                        </div>
                    </div>
                    <hr>
                    <div id='baitap'>
                        <form action='./homework.php' method='post'>
                            <input type='hidden' name='userOL' value=$user_name>
                            <input type='hidden' name='homework_id' value=".$row['homework_id'].">
                            <input type='hidden' name='subject_id' value=$subject_id>
                            <p>
                                <input  class='tittle' type='submit' value='$homework_content' > <br>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
            ";
        }
    ?>
    <div id="xemthem">
        <button class="btn btn-light">Xem thêm...</button>
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

    // Sửa comment
    var modal = document.getElementById('myModal');
    var btn = document.getElementById("myBtn");
    var span = document.getElementsByClassName("close")[0];
    btn.onclick = function() {
        modal.style.display = "block";
    }
    span.onclick = function() {
        modal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

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

        console.log(JSON.parse(sessionStorage.getItem('dataOLChat')) != null);
    }, 2000);
</script>
</body>
</html>