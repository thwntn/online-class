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
    <br> <br>
  <?php include "header.php"; ?>
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
            <!-- <div class = "itemBox col-md-4">
                <div class = "item">
                <div class = "backgroundItem" style="background-image: url(./image/internet.jpg)"></div>
                    <div class= "titleItem">
                        <h3 class = "keySubject">CT222</h3>
                        <h5 class = "nameSuject">Mạng máy tính</h5>
                    </div>
                    <div class = "navItem">
                        <button class = "submit"><i class="fas fa-user"></i></button>
                            

                        
               
                        <button class = "submit"><i class="fas fa-user-plus"></i></button>
                        <button class="submit" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-file-alt"></i></i></button>
                                
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title" id="exampleModalLabel">Thêm nội dung</h1>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="margin-right: -320px;">Hủy</button>
                                    <button type="button" class="btn btn-primary submit">Hoàn tất</button>
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
            </div> -->

            <?php 
                $con = mysqli_connect('localhost', 'root','', 'online-class');
                $sql="select * FROM subject  ";
                $kq=$con->query($sql);
                while($row=$kq->fetch_assoc()){
                    echo "
                    <div class = 'itemBox col-md-4'>
                        <div class = 'item'>
                            <div class = 'backgroundItem'>
                            <img src=".$row['subject_image'].">
                            </div>
                            <div class= 'titleItem'>
                            <a href='./subject.php?code=".$row['subject_code']."''><h3 class = 'keySubject'>".$row['subject_id']."</h3>
                                <h5 class = 'nameSuject'>".$row['subject_name']."</h5></a>
                            </div>
                            <div class = 'navItem'>
                                <button class = 'submit'><i class='fas fa-user'></i></button>
                                <button class = 'submit'><i class='fas fa-user-plus'></i></button>
                                <button class = 'submit' data-bs-toggle='modal' data-bs-target='#exampleModal'><i class='fas fa-file-alt'></i></button>
                                <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                <div class='modal-dialog modal-lg'>
                                <div class='modal-content'>
                                <div class='modal-header'>
                                    <h1 class='modal-title' id='exampleModalLabel'>Thêm nội dung</h1>
                                    <button  class='btn btn-secondary' data-bs-dismiss='modal' style='margin-right: -320px;'>Hủy</button>
                                    <button  class='btn btn-primary submit'>Hoàn tất</button>
                                </div>
                                <div class='modal-body'>
                                        <form action='' method='post' >           
                                            <table>
                                            <tr> 
                                                <td><input class='create-1'  type='text' name='id' placeholder='Mã tài liệu' ></td>
                                                <td><input class='create-1'   type='date' name='date-finish'></td>
                                            </tr>
                                            <tr>    
                                                <td colspan='2'><textarea class='create-1' name='content'></textarea></td>
                                            </tr>
                                            <tr>    
                                                <td>
                                                <input class='upload' type='file'>
                                                <p class='create'>Chưa chọn file</p></td>
                                            </tr>
                                        </table>
                                    </form>  
                                    
                                </div>
                                </div>
                            </div>
                            </div>  







                                <button class = 'submit'><i class='fas fa-pen'></i></button>
                                <button class = 'submit'><i class='fas fa-star'></i></button>
                            </div>
                        </div>
                    </div>

                    ";
                }

            ?>

            <!-- <div class = "itemBox col-md-4">
                <div class = "item">
                    <div class = "backgroundItem" style="background-image: url(./image/csdl.jpg)"></div>
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
                    <div class = "backgroundItem" style="background-image: url(./image/lt.jpg)"></div>
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
                    <div class = "backgroundItem" style="background-image: url(./image/ctdl.jpg)"></div>
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
                    <div class = "backgroundItem" style="background-image: url(./image/internet.jpg)"></div>
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
            </div> -->
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