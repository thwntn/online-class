<?php
    include './demo/connect.php';
    include './logSystem.php';
    $user_name=$_POST['userOL'];
    $_POST['userOL'];

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./profile.css">

    <!-- bootstrap -->

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <script src="https://use.fontawesome.com/f4fe177e5d.js"></script>

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="./modal_user.css">

</head>
<body>
    <div class='frame row'>
        <div class='background'></div>
        <div class='leftBar col-md-3'>
            <?php
                $sql="SELECT * FROM user where user_name='$user_name'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
            ?>
            <div class = 'row'>
                <div class='imageUser col-md-12'}>
                    <img src='<?php echo "http://localhost/online-class/src/database/{$user_name}/image/{$row['user_image']}" ?>'class='image'>
                </div>
            </div>
            <div class='infoAdd row'>
                <h4><?php echo $row['user_fullname'] ?></h4>
                <i><?php echo $row['user_major'] ?></i>
                
                <button></button>
            </div>
            <div class='count row'>
                <div class='homeWork'>
                    <?php 
                        $sql = "SELECT hw.subject_id FROM registry rg join homework hw on rg.subject_id=hw.subject_id where user_name='$user_name'";
                        $result = $conn->query($sql);
                        $code = array();
                        while($row = $result->fetch_assoc()) {
                            $code[] = $row;             
                        }
                    ?>
                    <h3><?php echo count($code); ?></h3>
                    <l>B??i t???p</l>
                </div>
                <div class='class'>
                    <?php 
                        $sql = "SELECT * FROM registry where user_name='$user_name'";
                        $result = $conn->query($sql);
                        $data = array();
                        while($row1 = $result->fetch_assoc()) {
                            $data[] = $row1;             
                        }
                    ?>
                    <h3><?php echo count($data); ?></h3>
                    <l>L???p h???c</l>
                </div>
            </div>
            <div class='change row'>
                <!-- <button>Ch???nh s???a th??ng tin</button> -->
                <div class="shadow p-4 mb-5 bg-white rounded">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type='hidden' name='userOL' value = <?php echo $user_name ?>>
                        <button type='button' class ='button' id="myBtn">Ch???nh s???a th??ng tin</button>
                        <div class="container">
                            <div id="myModal" class="modal">
                                <div class="modal-content">                             
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <h6>CH???NH S???A TH??NG TIN</h6>
                                        <div class="fomrgroup">
                                            <?php
                                                $sql="SELECT * FROM user where user_name='$user_name'";
                                                $result = $conn->query($sql);
                                                $row1 = $result->fetch_assoc();
                                            ?>
                                            <b>H??? v?? t??n:</b>
                                            <input class='a' type="text" name="user_fullname" value="<?php echo $row1['user_fullname'] ?>">
                                            <b>T??n ng??nh:</b>
                                            <input class='a' type="text" name="user_major" value="<?php echo $row1["user_major"] ?>">
                                            <b>Phone:</b>
                                            <input class='a' type="text" name="user_phone" value="<?php echo $row1["user_phone"] ?>"><br>
                                            <b>Email:</b>
                                            <input class='a' type="text" name="user_email" value="<?php echo $row1["user_email"] ?>"><br>
                                            <b>H??nh ???nh:</b>
                                            <input class='a' type="file" name="avatar">
                                            <input type='hidden' name='userOL' value=<?php echo $user_name ?>><br>
                                            <b>?????a ch???:</b>
                                            <input class='a' type="text" name="user_address" value="<?php echo $row1["user_address"] ?>">
                                        </div>
                                        <div class="fomrgroup1">
                                            <button class="btn btn-danger" id="close">????ng</button> &nbsp;
                                            <button class="btn btn-primary" type='submit' name="update">L??u</button>
                                        </div>
                                        <?php
                                                if(isset($_POST["update"])) {
                                                    $fullname = $_POST["user_fullname"];
                                                    $major = $_POST["user_major"];
                                                    $email = $_POST["user_email"];
                                                    $phone = $_POST["user_phone"];
                                                    $address = $_POST["user_address"];
                                                    $duongdan = $_FILES['avatar']['name'];
                                                    
                                                    if(is_dir('../database/'.$user_name.'/image/')) {
                                                    }
                                                    else {
                                                        mkdir("../database/".$user_name."/image/", 7777, true);
                                                    }

                                                    move_uploaded_file($_FILES['avatar']['tmp_name'],'../database/'.$user_name.'/image/' . $duongdan);
                                                    // move_uploaded_file($_FILES['avatar']['tmp_name'],'../student/image/' . $duongdan);
                                                    if ($fullname == "" || $email == "" || $phone == "" || $address == "" || $major == "" || $duongdan == "") {
                                                
                                                    }else{
                                                        $sql = "UPDATE user SET user_fullname='$fullname', user_email='$email', user_phone='$phone', user_address='$address', user_major='$major', user_image='$duongdan' WHERE user_name='$user_name'";
                                                        mysqli_query($conn,$sql);

                                                        logSystem('Ch???nh s???a th??ng tin', $user_name, $conn);    
                                                    }
                                                }
                                            ?>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class='rightBar col-md-6'}>
            <div class='banner row'>
                <div class='bannerImg'></div>
            </div>
            <div class='content row'>
                <div class='ofUser col-md-12'>
                    <h5>B???n b??</h5>
                    <div class='friend row'>
                    <?php
                    $get_friend ="SELECT * FROM friend where user_name='$user_name' and friend_status=1";
                    $result = $conn->query($get_friend);
                    while($row1 = $result->fetch_assoc()) {
                        $user_friend = $row1['friend_user'];
                        $get = "SELECT * FROM user where user_name='$user_friend'";
                        $data = $conn->query($get);
                        while($row = $data->fetch_assoc()) {
                            $user_fullname = $row['user_fullname'];
                            echo "
                                <div class='friendItem'>
                                    <div class='imageFriend'>
                                        <form action='./createChat.php' method='post'>
                                            <input type='hidden' name='userOL' value=$user_name>
                                            <input type='hidden' name='user' value=$user_friend>
                                            <button type='submit' class='btn-im'>
                                                <img src='http://localhost/online-class/src/database/{$user_friend}/image/{$row['user_image']}' class='image1'>
                                            </button>
                                        </form>

                                        <form action='./profile_user.php' method='post'>
                                            <input type='hidden' name='userOL' value=$user_name>
                                            <input type='hidden' name='user' value=$user_friend>
                                            <input class='name'  type='submit' value='$user_fullname'>    
                                        </form>
                                    </div>
                                </div>
                                ";
                            }
                        }
                    ?>
                    </div>
                    <br>
                    <h5>M??n h???c</h5>
                    <div class='subject row'>
                        <?php
                        $sql = "SELECT * FROM subject sj join registry rg on sj.subject_id=rg.subject_id where rg.user_name='$user_name'";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc()) {
                            $subject_id = $row['subject_id'];
                            $get = "SELECT * FROM user u join subject sj on u.user_name=sj.user_name where subject_id='$subject_id'";
                            $data = $conn->query($get);
                            while($row1 = $data->fetch_assoc()) {
                                $user_name1 = $row1['user_name'];
                            echo "
                                <div class='subjectItem'>
                                    <div class='icon'>
                                        <i class='fas fa-book-reader'></i>
                                    </div>
                                    <div class='imageSubject'>
                                        <img src='http://localhost/online-class/src/database/{$user_name1}/image/{$row1['user_image']}' class='image2'>
                                    </div>
                                    <div class='infoSuject'>
                                        <div>
                                            <h5>".$row['subject_name']."</h5>
                                            <l>".$row1['user_fullname']."</l>
                                            
                                            <form action='./subject.php' method='POST'>
                                                <input type='hidden' name='userOL' value=$user_name>
                                                <input type='hidden' name='subject_id' value=".$subject_id.">
                                                <button type='submit'>Truy c???p</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                ";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class='discription col-md-3'>
            <h5>TH??NG TIN C?? NH??N:</h5>
            <p>
                <?php
                    $sql="SELECT * FROM user where user_name='$user_name'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    echo "
                        <b>H??? t??n : </b>".$row['user_fullname']."<br>
                        <b>?????a ch??? : </b>".$row['user_address']."<br>
                        <b>Email : </b>".$row['user_email']." <br>
                        <b>Ng??nh : </b>".$row['user_major']."<br>
                    ";
                ?>
            </p>
            <h4>
                <form action="./index.php" method="post">
                    <input type='hidden' name='userOL' value=<?php echo $user_name ?>>
                    <button type="submit" class='home'>Trang ch??? &nbsp; <img src="./image/ten.jpg" alt="" class='ag'></button>
                </form>
            </h4>
        </div>
    </div>
    <script>
        const handle = {
            randomColor: function() {
                return `rgb(${Math.floor(Math.random()*255)}, ${Math.floor(Math.random()*255)}, ${Math.floor(Math.random()*255)})`
            },
            event: function() {
                const iconBook = document.querySelectorAll('.icon i')
                for(let item of iconBook) {
                    item.style.color = this.randomColor()
                }
            },
            start: function () {
                this.event()
            }
        }

        handle.start()

        var modal = document.getElementById('myModal');
    
        // modal
        var btn = document.getElementById("myBtn");
        var span = document.getElementsByClassName("close")[0];
        btn.onclick = function() {
            modal.style.display = "block";
        }
        span.onclick = function() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        //Th??m h??nh ???nh
        // document.querySelector('.user-image').addEventListener('click', function () {
        //      document.querySelector('.upload').click()
        //  })
        //  document.querySelector('.upload').addEventListener('change', function () {
        //      document.querySelector('.user-image').innerHTML = document.querySelector('.upload').value
        //  })
    </script>
</body>
</html>