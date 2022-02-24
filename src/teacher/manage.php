<?php include "./header.php"; ?>
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

    </script>
</body>
</html>