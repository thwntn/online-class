<?php
    include './demo/connect.php';
    // if(isset($_POST["submit"])){
        $subject_id = $_POST['subject_id'];
        $user_name = $_POST['userOL'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.2">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./modal_index.css">
</head>
<body>
    <div class="container">
        <div id="myModal" class="modal">
            <div class="modal-content">                                    
                <form action="./subject.php" method="post">
                    <h2>Bạn muốn đăng ký môn <br> 
                    <?php echo $subject_id ?></h2>
                        <div class="fomrgroup" style="text-align:center;">
                            <input type='hidden' name='userOL' value=<?php echo $user_name ?>>
                            <input type='hidden' name='subject_id' value=<?php echo $subject_id ?>>
                            <button class="btn btn-outline-danger" type='submit' name="submit">Đăng ký</button>&nbsp;
                            <button class="btn btn-outline-primary" type='submit'>Đóng</button>
                        </div>
                </form>
                <?php
                    if(isset($_POST["submit"])){
                         $sql2 = "INSERT INTO registry(subject_id,user_name) 
                            VALUES ('$subject_id', '$user_name')";
                        mysqli_query($conn,$sql2);    
                    }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</body>
</html>
<?php
    // }
?>
