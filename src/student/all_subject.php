<?php
    include './demo/connect.php';
    $user_name = $_POST['userOL'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.2">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="./header.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="./all_subject.css" media="screen" />
</head>
<body>
    <div class="wrapper">
        <header>
            <div class = 'backgroundNav'>
                <h2 class = 'titleNav'>Online Class</h2>
                <ul class = 'listItemsNav'>
                    <li class = 'itemNav'>
                        <form action="./index.php" method='post'>
                            <input type="hidden" name="userOL" value=<?php echo $user_name ?>>
                            <input class='header-subject' type="submit" value="Trang chủ">
                        </form>
                    </li>
                    <li class = 'itemNav'>
                        <form action="./all_subject.php" method='post'>
                            <input type="hidden" name="userOL" value=<?php echo $user_name ?>>
                            <input class='header-subject' type="submit" value="Môn học">
                        </form>
                    </li>
                    <li class = 'itemNav baitap1'>
                        Bài tập được giao
                        <div class = 'frameNoti btap1'>
                            <h5><i class="fas fa-book"></i>Bài tập được giao</h5>
                                <?php
                                    $sql = "SELECT * FROM registry rg join homework hw on rg.subject_id=hw.subject_id
                                    join subject sj on rg.subject_id=sj.subject_id where rg.user_name='$user_name' order by homework_time ASC";
                                    $result = $conn->query($sql);
                                    while($row = $result->fetch_assoc()) {
                                        $sj_id = substr($row['subject_id'],-13,5);
                                        echo "
                                        <a href='./subject.php?code=".$row['subject_id']."'>
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
                    <li class = 'itemNav'>
                        <form action="./index.php#lich" method='post'>
                            <input type="hidden" name="userOL" value=<?php echo $user_name ?>>
                            <input class='header-subject' type="submit" value="Lịch học">
                        </form>
                    </li>
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
                            <h5 class = 'titleNoti'><i class="fab fa-facebook-messenger"></i>Tin nhắn</h5>
                            <?php
                                $sql = "SELECT * FROM chat join user on chat.user_name = user.user_name";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()) {
                                    echo "
                                        <div class = itemNoti>
                                            <div class = 'imageNoti'>
                                                <img src=".$row['user_image'].">
                                            </div>
                                            <div class = 'contentNoti'>
                                                <h4>".$row['user_name']."</h4>
                                                <p></p>
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
    </div>
    <div class="container-fluid">
        <h6>DANH SÁCH MÔN HỌC ĐÃ ĐĂNG KÝ </h6>
        <div class="row">
           <?php
                $sql = "SELECT * FROM subject sj join user u on sj.user_name=u.user_name join registry rg on sj.subject_id=rg.subject_id where rg.user_name='$user_name'";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()) {
                        $img = $row['subject_image'];
                        $subject_id1 = $row['subject_id'];
                        $sj_id = substr($subject_id1,-13,5);
                        $subject_name = $row['subject_name'];
                        echo"
                        <div class='col-4'>
                            <form action='./subject.php' method='POST'>
                                <input type='hidden' name='userOL' value=$user_name>
                                <input type='hidden' name='subject_id' value=".$subject_id1.">
                                <div class = 'item' style='background-image: url($img);'> 
                                    <p class='data'>
                                        <input style='border:none; background: none;' type='submit' value='$sj_id &nbsp $subject_name'> <br>
                                        &nbsp;<b class='data1'>".$row['user_fullname']."</b>
                                        <button type='submit' class='btn btn-danger'>Xóa Lớp</button>
                                    </p>
                                </div>
                            </form>
                        </div>
                        ";
                    }
            ?>
            <!-- <div class="col-4">
                a
            </div>
            <div class="col-4">
                a
            </div> -->
        </div>
    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="style.js"></script>
</body>
</html>