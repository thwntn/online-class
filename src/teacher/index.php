<!DOCTYPE html>
<html lang="en">
<html>
<head>
<meta charset="UFT-8">
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
</head>
<body>
<div class="main">
<header>
<div class="container-fluid" >
    <div class="row">
        <div class="col-5">
            Online class
        </div>
        <div class="col-1" style="width:150px">
            <a href="index.php">Trang chủ</a>
            </div>
        <div class="col-1" style="width:150px">
            <a href="class.php">Lớp học</a>
        </div>
        <div class="col-1" style="width:150px">
            <a href="">Lịch dạy</a>
        </div>
        <div class="col-1" style="width:150px">
            <a href="">Thông báo</a>
        </div>
        <div class="col-1" style="width:150px">
            <a href="">Tin nhắn </a>
        </div>
    </div>  
</div>
</header>
<div class="content">
<h1><b>Trang giảng viên</b></h1>
    <p><b>Chào mừng đến trang giảng viên</b></p>
</div>
    <form action="" method="get" class="text">
    <input class="search" type="text" name="search" placeholder="Nhập nội dung"> <br>
    <button type="button" class="submit">Search...</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){   
    $(window).scroll(function() { 
        if($(this).scrollTop()){
            $('header').addClass('sticky');
        }else{
            $('header').removeClass('sticky');
        }
    });
});
</script>
</body>
</html>