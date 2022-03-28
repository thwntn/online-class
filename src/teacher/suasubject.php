<?php
include './connect.php';

if(isset($_GET['code'])){
    $code=$_GET['code'];   
    $sql="SELECT * FROM subject where subject_code='$code'";
    $kq=$con->query($sql);
    $row=$kq->fetch_assoc();
   
    ?>
     <link rel="stylesheet" type="text/css" href="./giaovien.css" media="screen" />
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <p style="font-size:40px">Sửa môn học </p>
     <form method="POST" >
    <input name="subject_id"  class='create-1' value="<?php echo $row["subject_id"] ?>">
    <input name="subject_name" class='create-1' value="<?php echo $row["subject_name"] ?>">
    <button type='submit' class="btn btn-secondary"  name="update">Submit</button>
    </form>   
    <?php
    if(isset($_POST["update"])) {
        $id = $_POST["subject_id"];
        $name = $_POST["subject_name"];
        $sql = "UPDATE subject SET subject_id='$id', subject_name='$name' WHERE subject_code='$code'";
         mysqli_query($con,$sql);
        header('Location:manage.php');  
    }
} 
?>