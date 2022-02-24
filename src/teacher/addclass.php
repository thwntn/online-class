<?php
include "header.php";
?>
<link rel="stylesheet" type="text/css" href="./style.css">
<br>
 <form action="" method="post" class="addclass">
    <ul class="addclass-1">
        <li><h1>Tạo môn học</h1> <br> </li>
        <li><input class="create-1" type="text" name="id" placeholder="Mã môn học"></li>
        <li><input class="create-1" type="text" name="name"placeholder="Tên môn học"></li>
        <li>
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-secondary">Học kỳ 1</button>
                <button type="button" class="btn btn-secondary">Học kỳ 2</button>
                <button type="button" class="btn btn-secondary">Học kỳ 3</button>
            </div>
        </li>
        <li><input class="upload-1" type="file" name="img">
            <p class="create-3">Hình ảnh</p>
        </li>
        <li><input class="create-1" type="text" name="year" placeholder="Nhập năm học"></li>
        <li><input class="create-1" type="text" name="credit" placeholder="Số tín chỉ"></li>

    </ul>
    <ul class="addclass-2">
        <li><h1>Lịch giảng dạy</h1> <br></li>
        <li><h5>Thời gian bắt đầu học kỳ </h5></li>
        <li><input class="create-1" type="date" name="calender_start" ></li>
        
        <li><h6>Thời gian môn học </h6>
        <input class="create-1" type="date" name="calender_time" style="margin-top:0"></li>
        <li><h5 style="word-spacing: 150px;">Từ Đến </h5></li> 
        <li><input class="create-2" type="text" name="weekstart" placeholder="1">    
            <input class="create-2" type="text" name="weekend" placeholder="15"></li>

    </ul>
</form>
<script>
        document.querySelector('.create-3').addEventListener('click', function () {
            console.log(123)
        document.querySelector('.upload-1').click()
    })
    document.querySelector('.upload-1').addEventListener('change', function () {
        document.querySelector('.create-3').innerHTML = document.querySelector('.upload-1').value
    })

    </script>