<?php
include 'connect.php';
include 'header.php';
$user=$_GET['userOL'];
?>
<br> <br> <br>
<link rel="stylesheet" type="text/css" href="./style.css">
<br>
 <form action="" method="POST" class="addclass" enctype="multipart/form-data">
    <ul class="addclass-1">
        <li><h1>Tạo môn học</h1> <br> </li>
        <li><input class="create-1" type="text" name="subject_code" placeholder="Mã môn học"></li>
        <li><input class="create-1" type="text" name="subject_name"placeholder="Tên môn học"></li>
        <li>
                <!-- <input type="radio" name="subject_semester" value="Học kỳ 1"  >Học Kỳ 1
                <input type="radio" name="subject_semester" value="Học kỳ 2" >Học Kỳ 2
                <input type="radio" name="subject_semester" value="Học kỳ 3" >Học Kỳ 3
                 -->
                 <select class="semester" name="subject_semester">
                 <option value="">Chọn học kỳ</option>
                <option value="Học kỳ 1">Học kỳ 1</option>
                <option value="Học kỳ 2">Học kỳ 2</option>
                <option value="Học kỳ 3">Học kỳ 3</option>
            </select> 
        </li>   
        
        <li><input class="upload-1" type="file" name="fileUpload">
            <p class="create-3">Hình ảnh</p>
        </li>
        <li><input class="create-1" type="text" name="subject_year" placeholder="Nhập năm học"></li>
        <li><input class="create-1" type="text" name="subject_credit" placeholder="Số tín chỉ"></li>
        <li><button name="submit-sj" class="btn btn-secondary" style="margin-left:100px">Thêm môn học </button></li>
    </ul>
    <ul class="addclass-2">
        <li><h1>Lịch giảng dạy</h1> <br></li>
        <li>
            <?php 
            $sql="SELECT * FROM subject where user_name='$user'";
            $kq=$con->query($sql);
            $code = array();
            while($row=$kq->fetch_array()){
                $code[] = $row; 
             
            }
            ?>
             <select class="create-1" name="subject_id">
                <option >Mã môn học</option> 
                 <?php foreach($code as $key => $value){ ?>
                    <option value="<?php echo $value["subject_id"];; ?>"><?php echo $value["subject_code"]; ?></option> 
                <?php } ?> 
                
             </select> 
           
        </li>
        <li><h5>Thời gian bắt đầu học kỳ </h5></li>
        <li><input class="create-1" type="date" name="calendar_start" ></li>
        
        <li><h6>Thời gian môn học </h6>
        <input class="create-1" type="datetime-local" name="calendar_time" style="margin-top:0"></li>
        <li><h5 style="word-spacing: 150px;">Từ Đến </h5></li> 
        <li><input class="create-2" type="text" name="subject_weekstart" placeholder="1">    
            <input class="create-2" type="text" name="subject_weekend" placeholder="15"></li> <br> <br> <br>
    <li><button name="submit-calendar" class="btn btn-secondary" style="margin-left:100px">Thêm lịch dạy </button></li>
    </ul> 
</form> <br>

<?php 
if (isset($_POST["submit-sj"])) {
    $code = $_POST["subject_code"];
    $name = $_POST["subject_name"];
    // $image = $_POST["subject_image"];
    $duongdan = $_FILES["fileUpload"]["name"];
    $year = $_POST["subject_year"];
    $semester = $_POST["subject_semester"];
    $credit = $_POST["subject_credit"];
    $path = "image/";
    $slug = $path . $duongdan;
    move_uploaded_file($_FILES["fileUpload"]["tmp_name"],'./image/' . $duongdan);
    if($code == "" || $name == "" || $duongdan == "" || $year =="" || $credit == "" ){
        echo "<div class='alert alert-danger' role='alert'> 
            Vui lòng nhập đầy đủ thông tin!
            </div>
        ";
    }else{
    $sql = "INSERT INTO subject(subject_code, subject_name, subject_image, subject_year, subject_semester, subject_credit, user_name) VALUES ( '$code', '$name',' $slug', '$year', '$semester','$credit', '$user')";
    mysqli_query($con,$sql);
    echo "<div class='alert alert-primary' role='alert'>
            Thêm môn học thành công, hãy thêm lịch giảng dạy!
            </div>
        ";
    }
}
?>
 <?php 
     if (isset($_POST["submit-calendar"])) {
     $idsj = $_POST["subject_id"];
     $start = $_POST["calendar_start"];
     $time = $_POST["calendar_time"];
     $weekstart = $_POST["subject_weekstart"];
     $weekend = $_POST["subject_weekend"];
     if($start == "" || $time == "" || $weekstart =="" || $weekend ==""){
        echo "<div class='alert alert-danger' role='alert'> 
            Vui lòng nhập đầy đủ thông tin!
            </div>
        ";
    }else{
     $sql = "INSERT INTO calendar(subject_id, calendar_start, calendar_time, subject_weekstart, subject_weekend) VALUES ( '$idsj', '$start', '$time', '$weekstart', '$weekend')";
     mysqli_query($con,$sql);
     echo "<div class='alert alert-primary' role='alert'>
            Thêm lịch giảng dạy thành công.
            </div>
        ";
    }
 }
?> 
<script>
    //Thêm hình ảnh
        document.querySelector('.create-3').addEventListener('click', function () {
            console.log(123)
        document.querySelector('.upload-1').click()
    })
    document.querySelector('.upload-1').addEventListener('change', function () {
        document.querySelector('.create-3').innerHTML = document.querySelector('.upload-1').value
    })
    
    
    </script>