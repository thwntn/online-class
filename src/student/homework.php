<?php
    include './demo/connect.php';
    include './logSystem.php';
    $user_name = $_POST['userOL'];
    $subject_id = $_POST['subject_id'];
    $homework_id = $_POST['homework_id'];
?>

<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <meta charset="UFT-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./homework.css">
    <link rel="stylesheet" type="text/css" href="./modal.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Baloo+2:wght@600&family=Barlow:wght@300&display=swap" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <header>
        <?php
            $sql = 'SELECT * FROM subject sj join user  u on sj.user_name=u.user_name  
                                             join homework hw on sj.subject_id=hw.subject_id
                                             where homework_id='.$_POST["homework_id"].'';
            $result = $conn->query($sql);
            $result = mysqli_fetch_array($result);

            $k = $result['homework_time'];
            $subject_id1 = $result['subject_id'];
            $sj_id = substr($subject_id1,-13,5);
            $hour= substr($k,-20,3);
            $day = substr($k,-11,2);
            $month = substr($k,-14,2);
            $year = substr($k,-20,4);
            $user_img = $result['user_image'];
            ?>
        <input type="checkbox" class='input-icon'> <p class='input-name'><?php echo ''.$sj_id.'  '.$result['subject_name'].' '?></p>
        <div class='menu-icon'>
            <div class='menu-line'>

            </div>
        </div>
        <div class='menu-item'>
            <div class='home-a'>
                <form action="./index.php" method='post'>
                    <input type="hidden" name="userOL" value=<?php echo $user_name ?>>
                    <p>
                        &nbsp;<img src="image/Home.png" style="width:26px">&nbsp;</i>&nbsp;
                        <input class='header1-subject' type="submit" value="Trang ch???">
                    </p>
                </form>
            </div>
            <div>
                <form action="./index.php#lich" method='post'>
                    <input type="hidden" name="userOL" value=<?php echo $user_name ?>>
                    <p>
                        
                        &nbsp;<img src="image/calender.jpg" style="width:50px">&nbsp;
                        <input class='header-subject' type="submit" value="L???ch h???c">
                    </p>
                </form>
            </div>
            <hr class='hr'>
            <?php
                $sql = "SELECT sj.subject_id, sj.subject_image, sj.user_name, sj.subject_name FROM subject sj join registry rg on sj.subject_id=rg.subject_id where rg.user_name='$user_name'";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    $img = $row['subject_image'];
                    $subject_id1 = $row['subject_id'];
                    $sj_id = substr($subject_id1,-13,5);
                    $subject_name = $row['subject_name'];
                    echo"
                    <li>
                        <form action='./subject.php' method='POST'>
                            <input type='hidden' name='userOL' value=$user_name>
                            <input type='hidden' name='subject_id' value=".$subject_id1.">
                            <div class = 'item' style='background-image: url(http://localhost/online-class/src/database/{$row['user_name']}/image/{$img})'></div>
                            <p> 
                                &nbsp; ".$sj_id." &nbsp;
                                <input style='border:none; background: none; color:black' type='submit' value='$subject_name'>
                            </p>
                        </form>
                    </li>
                    ";
                }
            ?>
        </div>
        <div class='header-text'>
            <hr>
        <div class="main">
        <?php
            $sql = 'SELECT * FROM subject sj join user  u on sj.user_name=u.user_name  
                                             join homework hw on sj.subject_id=hw.subject_id
                                             where homework_id='.$_POST["homework_id"].'';
            $result = $conn->query($sql);
            $result = mysqli_fetch_array($result);

            $k = $result['homework_time'];
            $hour= substr($k,-20,3);
            $day = substr($k,-11,2);
            $month = substr($k,-14,2);
            $year = substr($k,-20,4);
            $user = $result['user_name'];
            $user_img = $result['user_image'];
            echo"
        
        <ul>
            <img src='http://localhost/online-class/src/database/{$user}/image/{$user_img}'class='img2'>
            
            <li><b>&nbsp;".$result['user_fullname']." <br>
                &nbsp; 
                <i>
                    ".$day."/".$month."/".$year."
                </i> </b>
            </li>
            <hr style='width:95%'>
            <li class='homework_content'>
                <b>".$result['homework_content']."</b>
            </li>
            ";
        ?>
        </ul><hr>
        <!-- B??nh lu???n -->
        <div class="comment">
            <?php
                $get = "SELECT * FROM user";
                $data = $conn->query($get);
                while($row = $data->fetch_assoc()) {
                    $name=$row['user_name'];
                    if($name==$user_name){
            ?>
                <img src='<?php echo "http://localhost/online-class/src/database/{$user_name}/image/{$row['user_image']}" ?>'class='img'>
                <!-- <img class='img' src="<?php echo $row['user_image'] ?>"> -->
            <?php
                    }
                }
            ?>
            <form action="" method="post" class="comment-1">
                <input class="comment-2" type="text" name="comment" require>
                <input type='hidden' name='userOL' value=<?php echo $user_name ?>>
                <input type='hidden' name='subject_id' value=<?php echo $subject_id ?>>
                <input type='hidden' name='homework_id' value=<?php echo $homework_id ?>>
                <button class="send" type="submit" name="upload"><i class="fas fa-paper-plane"></i></button>
            </form>
            <?php
                if(isset($_POST['comment'])){
                    $homework_id=$_POST['homework_id'];
                    $content=$_POST["comment"];
                    if($content == ""){

                    }else{
                    $sql1 = "INSERT INTO comment(comment_content, comment_time, user_name, homework_id) 
                        VALUES ('$content', now(),'$user_name','$homework_id')";
                    $kq1=$conn->query($sql1);
                    logSystem('B??nh lu???n', $user_name, $conn);
                }
            }
            ?>
        </div> <br> 
        <?php 
            $sql = 'SELECT * FROM comment cmt join homework hw on cmt.homework_id=hw.homework_id 
                                              join user on cmt.user_name=user.user_name
                                              where hw.homework_id= '.$_POST["homework_id"].' order by comment_time DESC';
            $kq = $conn->query($sql);
            while($row = mysqli_fetch_array($kq)){
                $k1 = $row['comment_time'];
                $hour1= substr($k1,-9,9);
                $day1 = substr($k1,-11,2);
                $month1 = substr($k1,-14,2);
                $year1 = substr($k1,-20,4);
                $user_name1 = $row['user_name'];
                $comment_id = $row['comment_id'];
                if($user_name1==$user_name){
                    echo "
                    <ul>
                        <img src='http://localhost/online-class/src/database/{$user_name1}/image/{$row['user_image']}'class='img2'>
                        <li><b>".$row['user_fullname']."</li>
                        
                        <li style='font-size:10px'></b>".$hour1." &nbsp; ".$day1."/".$month1."/".$year1."</li>
                        <li>".$row['comment_content']."</li>
                        <li>";
                        ?>
                            <form action = '' method = 'post'  >
                                <input type='hidden' name='comment_id' value =<?php echo  $row['comment_id'] ?>>
                                <input type='hidden' name='userOL' value = <?php echo $user_name ?>>
                                <input type='hidden' name='subject_id' value =<?php echo $subject_id ?>>
                                <input type='hidden' name='homework_id' value =<?php echo $row['homework_id'] ?>>
                                <button type='button' class ='button' id="myBtn" >S???a</button>
                                <div class="container">
                                    <div id="myModal" class="modal">
                                        <div class="modal-content">
            <!-- N???i dung form edit_comment -->                                    
                                            <form action="" method="post">
                                                <h2>Ch???nh s???a b??nh lu???n</h2>
                                                <div class="fomrgroup">
                                                    <b>N???i dung:</b>
                                                    <input type="text" name="comment_content" value="<?php echo $row["comment_content"] ?>">
                                                </div>
                                                <div class="fomrgroup" style="text-align:center;">
                                                    <button class="btn btn-danger" id="close">????ng</button> &nbsp;
                                                    <button class="btn btn-primary" type='submit' name="update">L??u</button>
                                                </div>
                                            </form>
                                            <?php
                                                if(isset($_POST["update"])) {
                                                    $comment_content = $_POST["comment_content"];
                                                    if ($comment_content == "") {
                                                
                                                    }else{
                                                    $sql = "UPDATE comment SET comment_content='$comment_content', comment_time=now() WHERE comment_id='$comment_id'";
                                                    mysqli_query($conn,$sql);  
                                                    logSystem('Ch???nh s???a b??nh lu???n', $user_name, $conn);  
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                            </form>
            <!-- Form x??a comment  -->
                        <?php
                        echo "
                        <form action = '' method = 'post' class='formDelete'>
                            <button type='submit' class ='button' name='delete'>X??a</button>
                            <input type='hidden' name='id' value =".$row['comment_id']." >
                            <input type='hidden' name='userOL' value =$user_name >
                            <input type='hidden' name='subject_id' value =$subject_id >
                            <input type='hidden' name='homework_id' value = ".$row['homework_id']." >
                        </form>
                    </li>
                </ul> 
                "; 
                }
                else{
                    echo "
                    <ul>
                        <img src='http://localhost/online-class/src/database/{$user_name1}/image/{$row['user_image']}'class='img2'>
                        <li><b>".$row['user_fullname']."</li>
                        <li style='font-size:10px'></b>".$hour1." &nbsp; ".$day1."/".$month1."/".$year1."</li>
                        <li>".$row['comment_content']."</li>
                    </ul>   
                ";
                }
            }
        ?>
                   
        <!-- X??a b??nh lu???n -->
        <?php
            if (isset( $_POST['id'])) {
                $sql='DELETE FROM comment where comment_id='.$_POST["id"].'';
                mysqli_query($conn,$sql);
                logSystem('X??a b??nh lu???n', $user_name, $conn);
            }
        ?>
    </div>

<!-- N???p b??i -->

    <div class="right">
        <div class="right-1">
            <?php 
             $get_csore = "SELECT s.score_level, s.homework_id FROM score s join homework hw on s.homework_id=hw.homework_id where s.homework_id='$homework_id' and user_name='$user_name'";
             $data = $conn->query($get_csore);
             $data = mysqli_fetch_array($data);
             if(isset($data)){
                echo "
                <p class='p'>
                    <b>B??i t???p c???a b???n
                    <i class='a'>??i???m: ".$data['score_level']."</i>   
                </p>
                ";
             }else{
                echo "
                <p class='p'>
                    <b>B??i t???p c???a b???n   
                    <i class='a'>??i???m: ch??a c??</i>
                </p>
                ";
             }
            ?>
            
            <?php   
                $get_homework = "SELECT * FROM document where homework_id='$homework_id' and user_name='$user_name'";
                $result = $conn->query($get_homework);
                $result = mysqli_fetch_array($result);
                if(isset($result)){
            ?>
                <form action="" method = "POST" enctype="multipart/form-data">
                    <!-- <input class='upload' name="id"><p class='create'> <?php echo $result['doucument_directory'] ?></p> -->
                    <input class='upload' name="id"><p class='create'> <?php echo "<a href='http://localhost/online-class/src/database/{$user_name}/homework/{$result['doucument_directory']}'>".$result['doucument_directory']."</a> "?></p>
                    <input type='hidden' name='homework_id' value = <?php echo $homework_id ?>>
                    <input type='hidden' name='userOL' value=<?php echo $user_name ?>>
                    <input type='hidden' name='subject_id' value=<?php echo $subject_id ?>>
                    <button type="submit" class="btn btn-outline-secondary" name="edit_submit">H???y N???p b??i</button>
                </form>
            <?php
                }else{
            ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <input class='upload' type='file' name='fileUpload'><p class='create'><i class='fas fa-plus'></i>Th??m b??i t???p</p>
                    <input type='hidden' name='userOL' value=<?php echo $user_name ?>>
                    <input type='hidden' name='subject_id' value=<?php echo $subject_id ?>>
                    <input type='hidden' name='homework_id' value=<?php echo $homework_id ?>>
                    <button type="submit" class="btn btn-outline-secondary" name="btn_submit">N???p b??i</button>
                </form>  
            <?php
                }
            ?>  
        </div>
<!-- X??? l?? N???p b??i t???p -->
                <?php
                    if (isset($_POST["btn_submit"])) {
                        $homework_id=$_POST["homework_id"];
                        $sql = 'SELECT * FROM subject sj join user  u on sj.user_name=u.user_name  
                                join homework hw on sj.subject_id=hw.subject_id where homework_id='.$homework_id.'';
                        $data = $conn->query($sql);
                        $data = mysqli_fetch_array($data);
                        $subject_id = $data['subject_id'];
                        
                        $duongdan = $_FILES['fileUpload']['name'];
                        
                        if(is_dir('../database/'.$user_name.'/homework/')) {
                        }
                        else {
                            mkdir("../database/".$user_name."/homework/", 7777, true);
                        }

                        move_uploaded_file($_FILES['fileUpload']['tmp_name'],'../database/'.$user_name.'/homework/' . $duongdan);
                        if ( $duongdan == "") {
                            echo "
                                <div class='alert alert-danger' role='alert' >
                                    Ch??a ch???n file!
                                </div>";  
                    }else{
                        $sql2 = "INSERT INTO document( doucument_directory, user_name, subject_id, homework_id) 
                            VALUES ('$duongdan','$user_name','$subject_id','$homework_id')";
                        mysqli_query($conn,$sql2); 

                        logSystem('N???p b??i t???p', $user_name, $conn);

                        echo "
                            <div class='alert alert-primary' role='alert' >
                                N???p b??i th??nh c??ng!
                            </div>";
                        }
                    }                                   
                ?>
<!-- X??? l?? H???y n???p b??i -->
        <?php
            if (isset( $_POST['edit_submit'])) {
                $sql='DELETE FROM document where homework_id='.$_POST["homework_id"].'';
                mysqli_query($conn,$sql);
            }
        ?>
    </div>
        </div>
    </header>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script> 
//upload file
document.querySelector('.create').addEventListener('click', function () {
        document.querySelector('.upload').click()
    })
    document.querySelector('.upload').addEventListener('change', function () {
        document.querySelector('.create').innerHTML = document.querySelector('.upload').value
    })

//X??a comment
document.addEventListener('DOMContentLoaded', function() {
        var el = document.getElementsByClassName("formDelete"); 
        for(var i=0;i < el.length;i++) {
        el[i].addEventListener("submit", function(e) { 
                e.preventDefault();
                Swal.fire({ 
                    title: 'B???n ch???c ch???n mu???n x??a?',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Delete'
                }).then((result) => {
                    if (result.isConfirmed) {            
                    e.target.submit();
                    }
                })
        });
    }  
        }, false);

// S???a comment
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
</script>
</script>
</body>
</html>