<?php
include './demo/connect.php';
    $user_name=$_POST['userOL'];
    $_POST['userOL'];
?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <meta charset="UFT-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <link rel="stylesheet" type="text/css" href="./all_subject.css">
    <!-- <link rel="stylesheet" type="text/css" href="./header.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
                    $subject_id = $row['subject_id'];
                    $sj_id = substr($row['subject_id'],-13,5);
                    echo "
                    <form action='./homework.php' method='post'>
                        <input type='hidden' name='userOL' value=$user_name> 
                        <input type='hidden' name='subject_id' value=$subject_id> 
                        <input type='hidden' name='homework_id' value=$homework_id>

                        <div class = itemNoti>
                            <div class = 'imageNoti'>
                            <button type='submit' class='button' >
                                <img src='http://localhost/online-class/src/database/{$row['user_name']}/image/{$row['subject_image']}'>  
                                <button>
                            </div>
                            <div class = 'contentNoti'>
                                <h4>".$sj_id."</h4> 
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
<div class="container-fluid">
<!-- <img src="./image/list.png" alt="" class='icon-list'> -->
        <h6 class='h6'> DANH SÁCH MÔN HỌC ĐÃ ĐĂNG KÝ </h6>
            <form action="" method="post" class="search">
                <button type="submit" class="btn btn-danger" name="btnsearch" id="btt-search" value="search">Tìm kiếm</button>
                <input type="text" name="search" id="search" placeholder="Nhập mã môn học"><br>
                <input type="hidden" name="userOL" value=<?php echo $user_name ?>>
            </form>
            <?php
                if (isset( $_POST['btnsearch'])) {
                    $search = $_POST['search'];
                    $sql = "SELECT * FROM subject  WHERE (subject_id like '%$search%') ";
                    $kq=$conn->query($sql);
                    $num = mysqli_num_rows($kq);
                    if ($num > 0 && $search != "") {
                        echo "<h6 class='name-sub1'>Kết quả tìm kiếm :</h6>";
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
                                <form action='./subject.php' method='post' class='form-reg'>
                                    <input type='hidden' name='userOL' value=$user_name>
                                    <input type='hidden' name='subject_id' value=$subject_id>
                                    <input class='btn-submit' type='submit' value='$sj_id &nbsp; $subject_name' name='submit'>
                                </form>                                    
                            ";
                            }else{
                                echo " 
                                <h6 class='name-sub'>".$sj_id." &nbsp;  ".$row['subject_name']." &nbsp;
                                        <u>
                                            <form action='./registry.php' method='post' class='reg'>
                                                <input type='hidden' name='userOL' value=$user_name>
                                                <input type='hidden' name='subject_id' value=$subject_id>
                                                <input class='submit' type='submit' value='Đăng ký' name='submit'>
                                            </form>
                                        </u>
                                    </h6>
                                ";
                                }
                            }
                        }
                        else {
                            echo "
                                <h6 class='name-sub1'>Kết quả tìm kiếm :</h6>
                                <h6 class='name-sub'>Không tìm thấy kết quả!</h6>
                            ";
                        }
                    }
                    
            ?>
        <div class="row">
           <?php
                $sql = "SELECT * FROM subject sj join user u on sj.user_name=u.user_name join registry rg on sj.subject_id=rg.subject_id where rg.user_name='$user_name'";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()) {
                        $img = $row['subject_image'];
                        $subject_id1 = $row['subject_id'];
                        $sj_id = substr($subject_id1,-13,5);
                        $subject_name = $row['subject_name'];

                        $sql1 = "SELECT * FROM subject where subject_id='$subject_id1'";
                        $result1 = $conn->query($sql1);
                        while($row1= $result1->fetch_assoc()) {
                            $user = $row1['user_name'];
                            echo"
                            <div class='col-4'>
                                <form action='./subject.php' method='POST'>
                                    <input type='hidden' name='userOL' value=$user_name>
                                    <input type='hidden' name='subject_id' value=".$subject_id1.">
                                    <div class = 'item' style='background-image: url(http://localhost/online-class/src/database/{$user}/image/{$img});'> 
                                        <p class='data'>
                                            <input style='border:none; background: none;' type='submit' value='$sj_id &nbsp $subject_name'> <br>
                                            &nbsp;<b class='data1'>".$row['user_fullname']."</b>
                                        </p>
                                    </div>
                                </form>
                            </div>
                            ";
                        }
                    }
            ?>
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
</script>
</body>
</html>