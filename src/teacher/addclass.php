<?php
include 'connect.php';
include 'header.php';
$user=$_POST['userOL'];
?>
<br> <br> <br>
<link rel="stylesheet" type="text/css" href="./style.css">
<br>
 <form action="" method="POST" class="addclass" enctype="multipart/form-data">
    <ul class="addclass-1">
        <li><h1>Tạo môn học</h1> <br> </li>
        <li><input type='hidden' name='userOL' value=<?php echo $user ?>></li>
        <li><input class="create-1" type="text" name="subject_name" placeholder="Tên môn học"></li>
        <li><input class="create-1" type="text" name="id"></li>
        <li><input class="upload-1" type="file" name="fileUpload">
            <p class="create-3">Hình ảnh</p>
        </li>
        <li><input class="create-1" type="text" name="subject_week" placeholder="Tuần học"></li>
        <li><h5>Thời gian bắt đầu học kỳ </h5></li>
        <li><input class="create-1" type="date" name="subject_time"></li>
        <li><button name="submit-sj" class="btn btn-secondary" style="margin-left:100px">Thêm môn học </button></li>

    </ul>
    <ul class="addclass-2">
        <li><h1>Lịch giảng dạy</h1> <br></li>
        <li><input type='hidden' name='userOL' value=<?php echo $user ?>></li>
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
                <option >Môn học</option> 
                 <?php foreach($code as $key => $value){ ?>
                    <option value="<?php echo $value["subject_id"]; ?>"><?php echo $value["subject_name"]; ?></option> 
                <?php } ?> 
                
             </select> 
           
        </li>
        <li><h6>Thời gian môn học </h6>
        <input class="create-1" type="datetime-local" name="subject_time" style="margin-top:0"></li>
         
    <li><button name="submit-calendar" class="btn btn-secondary" style="margin-left:100px">Thêm lịch dạy </button></li>
    </ul> 
</form> <br>

<?php 
if (isset($_POST["submit-sj"])) {
    $id = $_POST["id"];
    $name = $_POST["subject_name"];
    $week = $_POST["subject_week"];
    $time = $_POST["subject_time"];
    // $image = $_POST["subject_image"];
    $duongdan = $_FILES["fileUpload"]["name"];
    $path = "image/";
    $slug = $path . $duongdan;
    move_uploaded_file($_FILES["fileUpload"]["tmp_name"],'./image/' . $duongdan);
    if($id == "" || $name == "" || $duongdan == "" ){
        echo "<div class='alert alert-danger' role='alert'> 
            Vui lòng nhập đầy đủ thông tin!
            </div>
        ";
    }else{
    $sql = "INSERT INTO subject(subject_id, subject_name, subject_week, subject_time, subject_image, user_name) VALUES ( '$id', '$name', '$week', '$time','$slug', '$user')";
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
     $time = $_POST["subject_time"];
     if($idsj == "" || $time == "" ){
        echo "<div class='alert alert-danger' role='alert'> 
            Vui lòng nhập đầy đủ thông tin!
            </div>
        ";
    }else{
     $sql = "INSERT INTO calendar(subject_id, subject_time) VALUES ( '$idsj', '$time')";
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