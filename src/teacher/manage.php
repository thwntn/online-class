<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./manage.css">
    <link rel="stylesheet" href="modulemanage/framework/css/bootstrap.css">
    <script src="modulemanage/framework/js/bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<div class="nav-mobile">
        <ul class="nav-mobile_list">
            <li class="item-mobile"><a href="#home"><i class="fas fa-home"></i></a></li>
            <li class="item-mobile"><a href="./manage.php"><i class="fas fa-suitcase"></i></a></li>
            <li class="item-mobile"><a href="#ten-lich"><i class="fas fa-calendar"></i></a></li>
            <li class="item-mobile"><a class ='noti-mobile'><i class="fas fa-bell"></i></a></li>
            <li class="item-mobile"><a class ='mess-mobile'><i class="fas fa-comment"></i></a></li>
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
    <div class = "mainSession row pad">
        <h2 class = "title row-md-10">Quản lí môn học</h2>
        <div class = "navigation col-md-6">
            <ul class = "listNav">
                <li><a href="./addclass.php">Thêm lớp học</a></li>
                <li><a href="">Xem vi phạm</a></li>
                <li>
                <form action="" method="get" class="box">
                <b>Tìm kiếm</b>
                <input class="search-class" type="text" name="search" placeholder="Nhập nội dung"> 
                </form>
                </li>
            </ul>
        </div>
        <div class = "items row">
            <div class = "itemBox col-md-4">
                <div class = "item">
                <div class = "backgroundItem" style="background-image: url(./img/internet.jpg)"></div>
                    <div class= "titleItem">
                        <h3 class = "keySubject">CT222</h3>
                        <h5 class = "nameSuject">Mạng máy tính</h5>
                    </div>
                    <div class = "navItem">
                        <button class = "submit"><i class="fas fa-user"></i></button>
                            

                        <button class = "submit"><i class="fas fa-pen"></i></button>
                        <button class = "submit"><i class="fas fa-star"></i></button>
               
                        <button class = "submit"><i class="fas fa-user-plus"></i></button>
                        <button class="submit" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-file-alt"></i></i></button>
                                <!-- Modal -->
                                 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title" id="exampleModalLabel">Thêm nội dung</h1>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="margin-right: -320px;">Hủy</button>
                                    <button type="button" class="btn btn-primary">Hoàn tất</button>
                                </div>
                                <div class="modal-body">
                                        <form action="" method="post" >           
                                            <table>
                                            <tr> 
                                                <td><input class="create-1"  type="text" name="id" placeholder="Mã tài liệu" ></td>
                                                <td><input class="create-1"   type="date" name="date-finish"></td>
                                            </tr>
                                            <tr>    
                                                <td colspan="2"><textarea class="create-1" name="content"></textarea></td>
                                            </tr>
                                            <tr>    
                                                <td>
                                                <input class="upload" type='file'>
                                                <p class="create">Chưa chọn file</p></td>
                                            </tr>
                                        </table>
                                    </form>  
                                    
                                </div>
                                </div>
                            </div>
                            </div>  

                        <button class = "submit"><i class="fas fa-pen"></i></button>
                        <button class = "submit"><i class="fas fa-star"></i></button>
                    </div>
                </div>
            </div>
            <div class = "itemBox col-md-4">
                <div class = "item">
                    <div class = "backgroundItem" style="background-image: url(./img/csdl.jpg)"></div>
                    <div class= "titleItem">
                        <h3 class = "keySubject">CT111</h3>
                        <h5 class = "nameSuject">Cơ sở dữ liệu</h5>
                    </div>
                    <div class = "navItem">
                        <button class = "submit"><i class="fas fa-user"></i></button>
                        <button class = "submit"><i class="fas fa-user-plus"></i></button>
                        <button class = "submit"><i class="fas fa-file-alt"></i></button>
                        <button class = "submit"><i class="fas fa-pen"></i></button>
                        <button class = "submit"><i class="fas fa-star"></i></button>
                    </div>
                </div>
            </div>
            <div class = "itemBox col-md-4">
                <div class = "item">
                    <div class = "backgroundItem" style="background-image: url(./img/lt.jpg)"></div>
                    <div class= "titleItem">
                        <h3 class = "keySubject">CT212</h3>
                        <h5 class = "nameSuject">Niên luận mạng máy tính</h5>
                    </div>
                    <div class = "navItem">
                        <button class = "submit"><i class="fas fa-user"></i></button>
                        <button class = "submit"><i class="fas fa-user-plus"></i></button>
                        <button class = "submit"><i class="fas fa-file-alt"></i></button>
                        <button class = "submit"><i class="fas fa-pen"></i></button>
                        <button class = "submit"><i class="fas fa-star"></i></button>
                    </div>
                </div>
            </div>
            <div class = "itemBox col-md-4">
                <div class = "item">
                    <div class = "backgroundItem" style="background-image: url(./img/ctdl.jpg)"></div>
                    <div class= "titleItem">
                        <h3 class = "keySubject">CT321</h3>
                        <h5 class = "nameSuject">Cấu trúc dữ liệu</h5>
                    </div>
                    <div class = "navItem">
                        <button class = "submit"><i class="fas fa-user"></i></button>
                        <button class = "submit"><i class="fas fa-user-plus"></i></button>
                        <button class = "submit"><i class="fas fa-file-alt"></i></button>
                        <button class = "submit"><i class="fas fa-pen"></i></button>
                        <button class = "submit"><i class="fas fa-star"></i></button>
                    </div>
                </div>
            </div>
            <div class = "itemBox col-md-4">
                <div class = "item">
                    <div class = "backgroundItem" style="background-image: url(./img/internet.jpg)"></div>
                    <div class= "titleItem">
                        <h3 class = "keySubject">CT311</h3>
                        <h5 class = "nameSuject">Lập trình mạng</h5>
                    </div>
                    <div class = "navItem">
                        <button class = "submit"><i class="fas fa-user"></i></button>
                        <button class = "submit"><i class="fas fa-user-plus"></i></button>
                        <button class = "submit"><i class="fas fa-file-alt"></i></button>
                        <button class = "submit"><i class="fas fa-pen"></i></button>
                        <button class = "submit"><i class="fas fa-star"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <button class = "more">Xem thêm...</button>
    </div>
    <script>
        document.querySelector('.create').addEventListener('click', function () {
            console.log(123)
        document.querySelector('.upload').click()
    })
    document.querySelector('.upload').addEventListener('change', function () {
        document.querySelector('.create').innerHTML = document.querySelector('.upload').value
    })
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