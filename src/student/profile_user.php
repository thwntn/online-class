<?php
    include './demo/connect.php';
    $user_name=$_POST['userOL'];
    $user = $_POST['user'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./profile_user.css">

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" type="text/css" href="./modal_user.css">
</head>
<body>
    <div class='frame row'>
        <div class='background'></div>
        <div class='leftBar col-md-3'>
            <?php
                $sql="SELECT * FROM user where user_name='$user'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
            ?>
            <div class = 'row'>
                <div class='imageUser col-md-12'}>
                    <!-- <img src='<?php echo $row['user_image'] ?>' alt="" class='image'> -->
                    <img src='<?php echo "http://localhost/online-class/src/database/{$user}/image/{$row['user_image']}" ?>'class='image'>

                </div>
            </div>
            <div class='infoAdd row'>
                <h4><?php echo $row['user_fullname'] ?></h4>
                <i><?php echo $row['user_major'] ?></i>
                <?php
                    $get_user = "SELECT * FROM friend where friend_user='$user' and user_name='$user_name'";
                    $data = $conn->query($get_user);
                    $data = mysqli_fetch_array($data); 
                    if(isset($data)){
                        if($data['friend_user']==$user and $data['user_name']==$user_name and $data['friend_status']==2){
                        echo "
                            <form action='' method='post'>
                                <input type='hidden' name='userOL' value=$user_name>
                                <input type='hidden' name='user' value=$user>
                                <button type='submit' name='edit_submit' class='btn'>???? g???i l???i m???i k???t b???n</button>
                            </form>
                        ";
                        }else if($data['friend_status']==1){
                            echo "
                            <div class='dropdown'>
                                <button onclick='hamDropdown()' class='nut_dropdown' type='submit'>B???n b??</button>
                                    <div class='noidung_dropdown'>
                                        <form action='' method='post'>
                                            <input type='hidden' name='userOL' value=$user_name>
                                            <input type='hidden' name='user' value=$user>
                                            <input type='submit' name='delete_submit' class='btn-a' value='H???y k???t b???n'>
                                        </form>
                                    </div>
                            </div>  
                            ";
                        } 
                    }else{
                        echo "
                        <form action='' method='post'>
                            <input type='hidden' name='userOL' value=$user_name>
                            <input type='hidden' name='user' value=$user>
                            <button type='submit' name='btn_submit'>K???t b???n</button>
                        </form>
                        ";
                    }
                ?>
                            <!-- <form action='' method='post'>
                                <input type='hidden' name='userOL' value=$user_name>
                                <input type='hidden' name='user' value=$user>
                                <button type='submit' name='delete_submit' class='btn'>B???n b??</button>
                            </form> -->
                <h4 class='h4'>
<!-- X??? l?? k???t b???n -->
                    <?php
                        if(isset($_POST['btn_submit'])){
                            $user_name=$_POST['userOL'];
                            $user=$_POST["user"];
                            $sql1 = "INSERT INTO friend(friend_user, user_name, friend_status) 
                                VALUES ('$user','$user_name', 2)";
                            $kq1=$conn->query($sql1);
                            echo "
                                <div class='cont'>
                                    ???? g???i l???i m???i k???t b???n!
                                </div>
                            ";
                        }
                    ?>
                </h4>
<!-- X??? l?? h???y k???t b???n -->
                <?php
                    if (isset( $_POST['edit_submit'])) {
                        $sql="DELETE FROM friend where friend_user='$user' and user_name='$user_name' and friend_status=2";
                        mysqli_query($conn,$sql);
                    }
                ?>
<!-- X??? l?? X??a k???t b???n -->
                <?php
                    if (isset( $_POST['delete_submit'])) {
                        $sql1="DELETE FROM friend where friend_user='$user' and user_name='$user_name'";
                        mysqli_query($conn,$sql1);
                    }
                ?>
                <?php
                    if (isset( $_POST['delete_submit'])) {
                        $sql2="DELETE FROM friend where friend_user='$user_name' and user_name='$user'";
                        mysqli_query($conn,$sql2);
                    }
                ?>

            </div>
            <div class='count row'>
                <div class='homeWork'>
                    <?php 
                        $sql = "SELECT hw.subject_id FROM registry rg join homework hw on rg.subject_id=hw.subject_id where user_name='$user'";
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
                        $sql = "SELECT * FROM user where user_name='$user'";
                        $data1 = $conn->query($sql);
                        $data1 = mysqli_fetch_array($data1);
                        if($data1['user_type']==2){
                    ?>
                    <?php 
                        $sql = "SELECT * FROM registry where user_name='$user'";
                        $result = $conn->query($sql);
                        $data = array();
                        while($row1 = $result->fetch_assoc()) {
                            $data[] = $row1;             
                        }
                        echo "
                            <h3>".count($data)."</h3>
                            <l>L???p h???c</l>
                        ";
                    ?>
                    <?php
                        }else{
                            $sql = "SELECT * FROM subject where user_name='$user'";
                            $result = $conn->query($sql);
                            $data1 = array();
                            while($row1 = $result->fetch_assoc()) {
                                $data1[] = $row1;             
                            }
                            echo "
                            <h3>".count($data1)."</h3>
                            <l>L???p h???c</l>
                        ";
                        }
                    ?>
                </div>
            </div>
            <div class='change row'>
                <form action="./index.php" method="post">
                    <input type='hidden' name='userOL' value=<?php echo $user_name ?>>
                    <button type='submit' class ='button' id="myBtn">Trang ch???</button>
                </form>
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
                    $get_friend ="SELECT * FROM friend where user_name='$user' and friend_status=1";
                    $result = $conn->query($get_friend);
                    while($row1 = $result->fetch_assoc()) {
                        $user_friend = $row1['friend_user'];
                        $get = "SELECT * FROM user where user_name='$user_friend'";
                        $data = $conn->query($get);
                        while($row = $data->fetch_assoc()) {
                            $user_fullname = $row['user_fullname'];
                            if($row['user_name']==$user_name){
                                echo "
                                    <div class='friendItem'>
                                        <div class='imageFriend'>
                                            <form action='./profile.php' method='post'>
                                                <input type='hidden' name='userOL' value=$user_name>
                                                <img src='http://localhost/online-class/src/database/{$user_name}/image/{$row['user_image']}' class='image1'>
                                                <button type='submit' class ='btn_name' >B???n</button>
                                            </form>
                                        </div>
                                    </div>
                                ";
                            }else{
                                echo "
                                    <div class='friendItem'>
                                        <div class='imageFriend'>
                                            <form action='./profile_user.php' method='post'>
                                                <input type='hidden' name='userOL' value=$user_name>
                                                <input type='hidden' name='user' value=$user_friend>
                                                <img src='http://localhost/online-class/src/database/{$user_friend}/image/{$row['user_image']}' class='image1'>
                                                <input class ='name'  type='submit' value='$user_fullname'>
                                            </form>
                                        </div>
                                    </div>
                                    ";
                                }
                            }
                        }
                    ?>
                    </div>
                    <br>
                    <?php
                        $sql = "SELECT * FROM user where user_name='$user'";
                        $data1 = $conn->query($sql);
                        $data1 = mysqli_fetch_array($data1);
                        if($data1['user_type']==1){
                            echo "<h5>M??n d???y</h5>";
                    ?>
                    <div class='subject row'>
                        <?php
                        $sql = "SELECT * FROM subject where user_name='$user'";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc()) {
                            $subject_id = $row['subject_id'];
                            
                            $sql = "SELECT * FROM user where user_name='$user'";
                            $row2 = $conn->query($sql);
                            $row2 = mysqli_fetch_array($row2);
                            $user_name1 = $row2['user_name'];
                            echo "
                                <div class='subjectItem'>
                                    <div class='icon'>
                                        <i class='fas fa-book-reader'></i>
                                    </div>
                                    <div class='imageSubject'>
                                        <img src='http://localhost/online-class/src/database/{$user_name1}/image/{$row['subject_image']}' class='image2'>
                                        
                                    </div>
                                    <div class='infoSuject'>
                                        <div>
                                            <h5>".$row['subject_name']."</h5>
                                            <l>".$row2['user_fullname']."</l>
                                            
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
                        ?>
                    </div>
                    <?php
                        }else{
                            echo "<h5>M??n h???c</h5>";
                        
                    ?>
                    <div class='subject row'>
                        <?php
                        $sql = "SELECT * FROM subject sj join registry rg on sj.subject_id=rg.subject_id where rg.user_name='$user'";
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
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class='discription col-md-3'>
            <h5>Th??ng tin c?? nh??n</h5>
            <p>
                <?php
                    $sql="SELECT * FROM user where user_name='$user'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    echo "
                        <b>H??? t??n : </b>".$row['user_fullname']."<br>
                        <b>?????a ch??? : </b>".$row['user_address']."<br>
                        <b>Email : </b>".$row['user_email']." <br>
                        <b>Ng??nh h???c: </b>".$row['user_major']."<br>    
                    ";
                ?>
            </p>
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

    // ch???nh s???a th??ng tin c?? nh??n
    var modal = document.getElementById('myModal');
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
    // document.querySelector('.create-3').addEventListener('click', function () {
    //         console.log(123)
    //     document.querySelector('.upload-1').click()
    // })
    // document.querySelector('.upload-1').addEventListener('change', function () {
    //     document.querySelector('.create-3').innerHTML = document.querySelector('.upload-1').value
    // })

    function hamDropdown() {
        document.querySelector(".noidung_dropdown").classList.toggle("hienThi");
    } 

    </script>
</body>
</html>