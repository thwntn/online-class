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
    <div id="wrapper">
        <header class = "header-main">
            <div class="inner-header menu">
                <a href="" id="logo" style="text-decoration: none">Online Class</a>
                <nav>
                    <ul id="main-menu">
                        <li><a href="#wrapper" style="text-decoration: none">Trang chủ</a></li>
                        <li><a href="#monhoc" style="text-decoration: none">Môn học</a></li>
                        <li>
                            <p id="menuclick2">Bài tập được giao</p>
                            <ul class="sub-menu" id="click2">
                                <li class="tieude"><i class="fas fa-book"></i>Bài tập được giao</li>
                                <li>
                                    <table>
                                        <tr>
                                            <td id="hinh"><img src="./image/subject-la-gi.jpg" class="mx-3 my-3" alt="..."></td>
                                            <td style="line-height: 0.5;" class="mt-1">
                                                CT123 <br><h6>Nội dung....</h6>
                                            </td>
                                        </tr>
                                    </table>
                                </li>
                                <li>
                                    <table>
                                        <tr>
                                            <td id="hinh"><img src="./image/subject-la-gi.jpg" class="mx-3 my-3" alt="..."></td>
                                            <td style="line-height: 0.5;" class="mt-1">
                                                CT123 <br><h6>Nội dung....</h6>
                                            </td>
                                        </tr>
                                    </table>
                                </li>
                                <li>
                                    <table>
                                        <tr>
                                            <td id="hinh"><img src="./image/subject-la-gi.jpg" class="mx-3 my-3" alt="..."></td>
                                            <td style="line-height: 0.5;" class="mt-1">
                                                CT123 <br><h6>Nội dung....</h6>
                                            </td>
                                        </tr>
                                    </table>
                                </li>
                                <li>
                                    <table>
                                        <tr>
                                            <td id="hinh"><img src="./image/subject-la-gi.jpg" class="mx-3 my-3" alt="..."></td>
                                            <td style="line-height: 0.5;" class="mt-1">
                                                CT123 <br><h6>Nội dung....</h6>
                                            </td>
                                        </tr>
                                    </table>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#lich" style="text-decoration: none">Lịch học</a></li>
                        <li>
                            <p id="menuclick">Thông báo</p>
                            <ul class="sub-menu" id="click">
                                <li class="tieude"><i class="fas fa-bell"></i>Thông báo</li>
                                <li>
                                    <table class="table1">
                                        <tr>
                                            <td id="hinh"><img src="./image/subject-la-gi.jpg" class="mx-3 my-3" alt="..."></td>
                                            <td style="line-height: 0.5;" class="mt-1">
                                                CT123 <br><h6>Nội dung....</h6>
                                            </td>
                                        </tr>
                                    </table>
                                </li>
                                <li>
                                    <table>
                                        <tr>
                                            <td rowspan="2"><img src="./image/subject-la-gi.jpg" class="mx-3 my-3" alt="..."></td>
                                            <td style="line-height: 0.5;">
                                                CT123 <br><h6>Nội dung....</h6>
                                            </td>
                                        </tr>
                                    </table>
                                </li>
                                <li>
                                    <li>
                                        <table class="table1">
                                            <tr>
                                                <td id="hinh"><img src="./image/subject-la-gi.jpg" class="mx-3 my-3" alt="..."></td>
                                                <td style="line-height: 0.5;">
                                                    CT123 <br><h6>Nội dung....</h6>
                                                </td>
                                            </tr>
                                        </table>
                                    </li>
                                </li>
                                <li>
                                    <table>
                                        <tr>
                                            <td rowspan="2"><img src="./image/subject-la-gi.jpg" class="mx-3 my-3" alt="..."></td>
                                            <td style="line-height: 0.5;">
                                                CT123 <br><h6>Nội dung....</h6>
                                            </td>
                                        </tr>
                                    </table>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <p id="menuclick1">Tin nhắn</p>
                            <ul class="sub-menu" id="click1">
                                <li class="tieude"><i class="fab fa-facebook-messenger"></i>Tin nhắn</li>
                                <li>
                                    <table class="table1">
                                        <tr>
                                            <td id="hinh"><img src="./image/subject-la-gi.jpg" class="mx-3 my-3" alt="..."></td>
                                            <td style="line-height: 0.5;" class="mt-1">
                                                Thùy Liên <br><h6>Nội dung tin nhắn</h6>
                                            </td>
                                        </tr>
                                    </table>
                                </li>
                                <li>
                                    <table>
                                        <tr>
                                            <td rowspan="2"><img src="./image/subject-la-gi.jpg" class="mx-3 my-3" alt="..."></td>
                                            <td style="line-height: 0.5;">
                                                Văn A <br><h6>Nội dung....</h6>
                                            </td>
                                        </tr>
                                    </table>
                                </li>
                                <li>
                                    <li>
                                        <table class="table1">
                                            <tr>
                                                <td id="hinh"><img src="./image/subject-la-gi.jpg" class="mx-3 my-3" alt="..."></td>
                                                <td style="line-height: 0.5;">
                                                    User A <br><h6>Nội dung....</h6>
                                                </td>
                                            </tr>
                                        </table>
                                    </li>
                                </li>
                                <li>
                                    <table>
                                        <tr>
                                            <td rowspan="2"><img src="./image/subject-la-gi.jpg" class="mx-3 my-3" alt="..."></td>
                                            <td style="line-height: 0.5;">
                                                User B <br><h6>Nội dung....</h6>
                                            </td>
                                        </tr>
                                    </table>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <form action="#" method="get">
                                <div class="search-box">
                                    <input type="text" name="timkiem" class="search-text" placeholder="Tìm kiếm">
                                    <div id="button">
                                        <i class="fa fa-search w3-xlarge"></i>
                                    </div>
                                </div>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        <div class="content">
            <h1>We Grow Ecommerc</h1>
            <p>On average we've helped businesses revenue by 90% YoY. <br>
                See what we can do for you</p>
            <div>
                <form action="#" method="get">
                    <input type="text" name="search" id="search" placeholder="Nhập mã môn học"><br>
                    <button type="button" id="btt-search">Search...</button>
                </form>
            </div>
        </div>
    </div>
    <br>
    <div class="subject" id="monhoc">
        <h1>Results-Driven, Delightful Design & Marketing</h1>
        <p>Grow With Studio is a digital marketing agency that helps ecommerce businesses of every size see big results. <br>
            Our personalized, people-first strategies will put your</p>
        <div class="slide-anh">
            <div id="btn-left" onclick="moveLeft()">
                <button class="btn btn-outline-light">
                    <img src="./image/btn-right.jpg" alt="">
                </button>
            </div>
            <div class="slide" id="a1">
                <img src="./image/stack-of-beautiful-books.png" alt="...">
                <h4>CT432</h4>
                <p>Niên luận ngành Mạng.</p>
            </div>
            <div class="slide" id="a2">
                <img src="./image/subject-la-gi.jpg" alt="...">
                <h4>CT432</h4>
                <p>Niên luận ngành Mạng.</p>
            </div>
            <div class="slide" id="a3">
                <img src="./image/stack-of-beautiful-books.png" alt="...">
                <h4>CT432</h4>
                <p>Niên luận ngành Mạng.</p>
            </div>
            <div class="slide" id="a4">
                <img src="./image/—Pngtree—email mail delivery computer illustration_6783868.png" alt="...">
                <h4>CT432</h4>
                <p>Niên luận ngành Mạng.</p>
            </div>
            <div class="slide" id="a5">
                <img src="./image/price-of-the-internet-cover.png" alt="...">
                <h4>CT432</h4>
                <p>Niên luận ngành Mạng.</p>
            </div>
            <div class="slide" id="a6">
                <img src="./image/—Pngtree—email mail delivery purple illustration_6783874.png" alt="...">
                <h4>CT432</h4>
                <p>Niên luận ngành Mạng.</p>
            </div>
            <div class="slide" id="a7">
                <img src="./image/price-of-the-internet-cover.png" alt="...">
                <h4>CT432</h4>
                <p>Niên luận ngành Mạng.</p>
            </div>
            <div id="btn-right" onclick="moveRight()">
                <button class="btn btn-outline-light"><img src="./image/btn-right.jpg" alt=""></button>
            </div>
        </div>
    </div>
    <br>
    <div id="lich">
        <div id="ten-lich">Lịch dạy</div>
        <div class="container">
            <div class="row">
                <div class="col-12 calendar-frame">
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