<!DOCTYPE html>
<html lang="en">
<html>
<head>
<meta charset="UFT-8">
<meta name="viewport" content="width=device-width, initial-scale=0.8">
<link rel="stylesheet" type="text/css" href="./style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
</head>
<body>
<div class="main">
    <div class="nav-mobile">
        <ul class="nav-mobile_list">
            <li class="item"><a href="#home"><i class="fas fa-home"></i></a></li>
            <li class="item"><a href="./manage.php"><i class="fas fa-suitcase"></i></a></li>
            <li class="item"><a href="#ten-lich"><i class="fas fa-calendar"></i></a></li>
            <li class="item"><a class ='noti-mobile' href="#"><i class="fas fa-bell"></i></a></li>
            <li class="item"><a class ='mess-mobile' href="#"><i class="fas fa-comment"></i></a></li>
        </ul>
    </div>
    <div class = 'frameNoti noti'>
        <h5><i class="fas fa-bell"></i>Thông báo</h5>
        <div class = 'itemNoti'>
            <div class = 'imageNoti'></div>
            <div class = 'contentNoti'>
                <h4>CT211</h4>
                <p>Bài tập mới được giao</p>
            </div>
        </div>
        <div class = 'itemNoti'>
            <div class = 'imageNoti'></div>
            <div class = 'contentNoti'>
                <h4>CT211</h4>
                <p>Bài tập mới được giao</p>
            </div>
        </div>
        <div class = 'itemNotiStatus'>
            <div class = 'imageNoti'></div>
            <div class = 'contentNoti'>
                <h4>CT211</h4>
                <p>Bài tập mới được giao</p>
            </div>
        </div>
        <div class = 'itemNoti'>
            <div class = 'imageNoti'></div>
            <div class = 'contentNoti'>
                <h4>CT211</h4>
                <p>Bài tập mới được giao</p>
            </div>
        </div>
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
            <li class = 'itemNav'><a href = '#home'>Trang chủ</a></li>
            <li class = 'itemNav'><a href = './manage.php'>Mo</a></li>
            <li class = 'itemNav'><a href = '#manage'>Môn học</a></li>
            <li class = 'itemNav'><a href = '#log'>Nhật kí</a></li>
            <li class = 'itemNav actNoti'>
                Thông báo
                
                </li>
            <li class="itemNav actMess">
                Tin nhắn
                
            </li>
        </ul>
    </div>
    <div id = 'home' class="content">
        <h1><b>Trang giảng viên</h1>
        <p>Chào mừng đến trang giảng viên</b></p>
        <form action="" method="get" class="text">
            <input class="search" type="text" name="search" placeholder="Nhập nội dung"> <br>
            <button type="button" class="submit">Search...</button>
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
                            <div class = 'header_year'>2020</div>
                        </div>
                        <div class = 'calendar-content'>
                        ";
                        include('./control/calendar.php');
                        echo "</div>";
                    ?>
                </div>
                <div class="col-1">

                </div>
                <div class="col-5">
                    <table>
                        <tr>
                            <th>Buổi</th>
                            <th>Ngày</th>
                            <th>Mã môn</th>
                            <th>Tên môn</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <br><br>
    </div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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