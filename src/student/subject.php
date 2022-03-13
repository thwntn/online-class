<?php
    include './demo/connect.php';
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
    <link rel="stylesheet" type="text/css" href="./giaovien.css" media="screen" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
            <header>
                <div class="navbar menu">
                    <p>Online Class</p>
                    <ul>
                        <li>Trang chủ</li>
                        <li>Lớp học</li>
                        <li>Lịch dạy</li>
                        <li>Thông báo</li>
                        <li style="margin-right: 50px;">Tin nhắn</li>
                    </ul>
                </div>
            </header>
    </div>
    <div class="name-subject">
        <p><b>CT111</b>Niên luận ngành Mạng máy tính và truyền thông.</p>
    </div>
    <div class="link">
        <div class="shadow p-4 mb-5 bg-white rounded">
            <p>Đường dẫn cuộc họp <a href=""></a></p>
            <a href="https://meet.google.com/hfz-duwk-hzq">https://meet.google.com/hfz-duwk-hzq</a>
        </div>
        <div class="shadow p-4 mb-5 bg-white rounded">
            <p>Bài tập sắp đến hạn</p>
            <button>Empty</button>
        </div>
    </div> 
    <div id="content">
        <div class="content-1">
            <div class="media">
                <img src="./image/subject-la-gi.jpg" class="mr-3" alt="...">
                <div class="media-body">
                  <p class="mb-0">Trần Thị Tố Quyên 01234 đã đăng một bài tập mới <a href="#"></a></p>
                  <h6>22/01/2022</h6>
                </div>
            </div>
            <hr>
            <div id="baitap">
                <p>Bài Tập 1.1:</p>
                <h6>The media object helps build complex and repetitive 
                    components where some media is positioned alongside content that doesn’t wrap around said media.</h6>
            </div>
        </div>
    </div>
    <div id="content">
        <div class="content-1">
            <div class="media">
                <img src="./image/stack-of-beautiful-books.png" class="mr-3" alt="...">
                <div class="media-body">
                  <p class="mb-0">Trần Thị Tố Quyên 01234 đã đăng một bài tập mới <a href="#"></a></p>
                  <h6>22/01/2022</h6>
                </div>
            </div>
            <hr>
            <div id="baitap">
                <p>Bài Tập 1.1:</p>
                <h6>The media object helps build complex and repetitive 
                    components where some media is positioned alongside content that doesn’t wrap around said media.</h6>
            </div>
        </div>
    </div>
    <div id="xemthem">
        <button>Xem thêm...</button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</body>
</html>