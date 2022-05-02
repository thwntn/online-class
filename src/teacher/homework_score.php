<?php
    include './connect.php';
    $user = $_POST['userOL'];
     $homework_id = $_POST['homework_id'];
?>

<!DOCTYPE html>
<html lang="en">
<html>
<head>
<meta charset="UFT-8">
<title>Document</title>
<link rel="stylesheet" type="text/css" href="./homework_score.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Baloo+2:wght@600&family=Barlow:wght@300&display=swap" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <br>
    <div class="menu">
        <ul class="menu-1">
            <!-- <li><a href="index.php">&nbsp;<img src="image/Home-2-2-icon.png" style="width:20px">&nbsp;Trang chủ</a></li> -->
            <li>
            <form action='./index.php' method='post'>                                  
                <input type="hidden" name="userOL" value=<?php echo $user?>>
                <img src="image/Home-2-2-icon.png" style="width:20px">&nbsp;<input style="border:none;background:none" type="submit" value="Trang chủ">
            </form>
                        
                   
            </li>
            <hr>
        </ul>
        <ul class="menu-2">
            <li>Lớp học</li>
            
            <?php
                $sql = "SELECT * FROM subject sj join user on sj.user_name=user.user_name where sj.user_name='$user'";
                $kq = $con->query($sql);
                while($row = $kq->fetch_assoc()) {
                    $img = $row['subject_image'];
                    $subject = $row['subject_id'];
                    $id = substr($subject,0,5);
                    
                    echo "
                    <li>
                    <form action='./subject.php' method='post'>                                  
                        <input type='hidden' value=".$row['subject_id']." name='subject_id'>
                        <input type='hidden' name='userOL' value=$user>                                                                    
                        <div class = 'item' style='background-image: url($img)'></div> 
                        <p><input class='sj-name' type='submit' value=".$id."> 
                        ".$row['subject_name']."</p>
                    </form>
                    </li>
                    ";
                
                }
            ?>
        </ul>
    </div>
    <div class="main">
        <?php
            $sql = "SELECT * FROM subject sj
                                             join homework hw on sj.subject_id=hw.subject_id
                                             where homework_id='$homework_id' ";
            $kq = $con->query($sql);
            $row = mysqli_fetch_array($kq);
         
            
            $subject = $row['subject_id'];
            $id = substr($subject,0,5);
            ?>
            <p style ="font-size:30px" class="tittle">
            <img src='image/format+list+icon.png' class='listmenu'>
              
                    &nbsp;<?php echo $id; echo "&nbsp;";
                                echo $row['subject_name']; ?>
                
            </p>
            
    <h1>Danh sách sinh viên nộp bài</h1>
    <div class = 'items row'>
    <?php 
            $sql="SELECT * FROM homework hw join document dc on hw.homework_id=dc.homework_id
                                            join user on dc.user_name=user.user_name
                                            where hw.homework_id= '$homework_id' ";

             $kq = $con->query($sql);
             while($row = mysqli_fetch_assoc($kq)){                     
                    echo "                  
                        <div class = 'itemBox col-md-4'>
                            <div class='list-score'>                                                  
                                <p><img src='http://localhost/online-class/src/database/{$row['user_name']}/image/{$row['user_image']}' class='user-img'> ".$row['user_fullname']."</p>
                                <button><i class='fa-solid fa-file'></i></button>
                                
                            </div>             
                        </div>                                                            
                   ";                   
             }
               ?>
        </div>  
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script> 
                                   
                                
    const menu = document.querySelector('.menu');
    const listmenu = document.querySelector('.listmenu');
    const main = document.querySelector('.main');

    listmenu.onclick = function() {
        main.classList.toggle('expand');
        menu.classList.toggle('hide');
        
    }
    

   
</script>
</body>
</html>