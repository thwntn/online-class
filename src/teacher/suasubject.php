<?php
include './connect.php';
$user=$_GET['userOL'];
$subject_id = $_GET['subject_id'];
if(isset($subject_id)){ 
    $sql="SELECT * FROM subject where subject_id='$subject_id'";
    $kq=$con->query($sql);
    $row=$kq->fetch_assoc();
   
    ?>
     <link rel="stylesheet" type="text/css" href="./giaovien.css" media="screen" />
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <p style="font-size:40px">Sửa môn học </p>
     <form method="POST" >
    <input name="subject_code"  class='create-1' value="<?php echo $row["subject_code"] ?>">
    <input name="subject_name" class='create-1' value="<?php echo $row["subject_name"] ?>">
    <button type='submit' class="btn btn-secondary"  name="update">Submit</button>
    </form>   
    <?php
    if(isset($_POST["update"])) {
        $code = $_POST["subject_code"];
        $name = $_POST["subject_name"];
        if ( $code == "" || $name == "") {
    
        }else{
        $sql = "UPDATE subject SET subject_code='$code', subject_name='$name' WHERE subject_id='$subject_id'";
         mysqli_query($con,$sql);
         header('Location:manage.php?userOL='.$user.'');
        }
    }
} 
?>