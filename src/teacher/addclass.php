<?php
include "header.php";
include 'connect.php';
?>
<br> <br> <br>
<link rel="stylesheet" type="text/css" href="./style.css">
<br>
 <form action="" method="POST" class="addclass">
    <ul class="addclass-1">
        <li><h1>Tạo môn học</h1> <br> </li>
        <li><input class="create-1" type="text" name="subject_id" placeholder="Mã môn học"></li>
        <li><input class="create-1" type="text" name="subject_name"placeholder="Tên môn học"></li>
        
             <div class="btn-group" role="group" aria-label="Basic example" name="subject_semester">
                <button type="button" value="Học kỳ 1" class="btn btn-secondary">Học kỳ 1</button>
                <button type="button" value="Học kỳ 2" class="btn btn-secondary">Học kỳ 2</button>
                <button type="button" value="Học kỳ 3" class="btn btn-secondary">Học kỳ 3</button>
            </div> 
            
        <li><input class="upload-1" type="file" name="subject_image">
            <p class="create-3">Hình ảnh</p>
        </li>
        <li><input class="create-1" type="text" name="subject_year" placeholder="Nhập năm học"></li>
        <!-- <li>
            <select name="subject_semester">
                <option value="Học kỳ 1">Học kỳ 1</option>
                <option value="Học kỳ 2">Học kỳ 2</option>
                <option value="Học kỳ 3">Học kỳ 3</option>
            </select>
        </li> -->
        <li><input class="create-1" type="text" name="subject_credit" placeholder="Số tín chỉ"></li>
        <li><input class="create-1" type="text" name="user_name" placeholder="name"></li>
        <li><button name="submit-btn" class="btn btn-secondary" style="margin-left:100px">Tạo môn học </button> </li>
     </ul>
     

    <ul class="addclass-2">
        <li><h1>Lịch giảng dạy</h1> <br></li>
        <li><h5>Thời gian bắt đầu học kỳ </h5></li>
        <li><input class="create-1" type="date" name="calendar_start" ></li>
        
        <li><h6>Thời gian môn học </h6>
        <input class="create-1" type="datetime-local" name="calendar_time" style="margin-top:0"></li>
        <li><h5 style="word-spacing: 150px;">Từ Đến </h5></li> 
        <li><input class="create-2" type="text" name="subject_weekstart" placeholder="1">    
            <input class="create-2" type="text" name="subject_weekend" placeholder="15"></li> <br> <br> <br>
     
    </ul> 
   
</form>
<!--  
if (isset($_POST["submit"])) {
    $id = $_POST["subject_id"];
    $name = $_POST["subject_name"];
    $image = $_POST["subject_image"];
    $year = $_POST["subject_year"];
    $semester = $_POST["subject_semester"];
    $credit = $_POST["subject_credit"];
    $user = $_POST["user_name"];

    $start = $_POST["calendar_start"];
    $time = $_POST["calendar_time"];
    $weekstart = $_POST["subject_weekstart"];
    $weekend = $_POST["subject_weekend"];
//     if ($idn == "" || $tieude == "" || $hinhanh == "" || $tomtat == "" || $noidung == "") {
//         echo "Vui lòng nhập đầy đủ thông tin.";
//    }else{
    $sql = "INSERT INTO subject(subject_id, subject_name, subject_image, subject_year, subject_semester, subject_credit, user_name) VALUES ( '$id', '$name','$image', '$year', '$semester','$credit', '$user')";
    $sql = "INSERT INTO calendar(calendar_start, calendar_time, subject_weekstart, subject_weekend) VALUES ( '$start', '$time', '$weekstart', '$weekend')";
    mysqli_multi_query($con,$sql);
    echo "Bài viết đã thêm thành công";

}


 -->

<script>
        document.querySelector('.create-3').addEventListener('click', function () {
            console.log(123)
        document.querySelector('.upload-1').click()
    })
    document.querySelector('.upload-1').addEventListener('change', function () {
        document.querySelector('.create-3').innerHTML = document.querySelector('.upload-1').value
    })

    </script>