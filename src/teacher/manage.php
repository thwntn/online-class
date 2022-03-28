<?php
    include './connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./manage.css">
    <link rel="stylesheet" href="modulemanage/framework/css/bootstrap.css">
    <script src="modulemanage/framework/js/bootstrap.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Baloo+2:wght@600&family=Barlow:wght@300&display=swap" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <br> <br>
  <?php include 'header.php'; ?>
    <div class = "mainSession row pad">
        <h2 class = "title row-md-10">Quản lí môn học</h2>
        <div class = "navigation col-md-6">
            <ul class = "listNav">
                <li><a href="./addclass.php">Thêm lớp học</a></li>
                <li><a href="">Xem vi phạm</a></li>
                <li>
                <form action="search.php" method="GET" class="box">
                <b>Tìm kiếm</b>
                <input class="search-class" type="text" name="search" placeholder="Nhập nội dung"> 
                </form>
                </li>
            </ul>
        </div>
        <div class = "items row">
            <?php 
                
                $sql="SELECT * FROM subject ";
                $kq=$con->query($sql);
                while($row=$kq->fetch_assoc()){
                    ?>
                    <div class = 'itemBox col-md-4'>
                        <!--Xóa môn học -->
                        <div class="collapse collapse-horizontal" id="collapseWidthExample">  
                                <form action = "./deletesubject.php" method = "GET"  class = "formDelete" >
                                    <button type="submit" class = "delete"><i class="fa-solid fa-xmark"></i></button>
                                    <input type="hidden" name="code" value = " <?php echo $row['subject_code']; ?>" >
                                </form>  
                        </div> 
                        <div class = 'item'>
                            <div class = 'backgroundItem' style="background:url( <?php echo $row['subject_image'];?> ); background-size: cover">                           
                            </div>
                            <div class= 'titleItem'>
                                <a href="./subject.php?code=<?php echo $row['subject_code']; ?>"><h3 class = 'keySubject'><?php echo $row['subject_id']; ?></h3>
                                <h5 class = 'nameSuject'><?php echo $row['subject_name']; ?></h5></a>
                                <!-- Sua mon hoc -->
                                <div class="collapse collapse-horizontal" id="collapseWidthExample">                                                            
                                     <form action = "./suasubject.php" method = "GET"  >
                                        <button type="submit" class = "repair"><i class="fa-solid fa-pencil"></i></button>
                                        <input type="hidden" name="code" value = " <?php echo $row['subject_code']; ?>" >
                                    </form>                               
                                </div> 
                            </div>
                            
                            <div class = 'navItem'>
                                <button class = 'submit'><i class='fas fa-user'></i></button>
                                <button class = 'submit'><i class='fas fa-user-plus'></i></button>
                                
                                <!--Them mon hoc -->
                                <form action="add_homework.php" method = "GET"  >   
                                <button class = 'submit'><i class='fas fa-file-alt'></i></button>
                                <input type="hidden" name="code" value = " <?php echo $row['subject_code']; ?>" >  
                                </form>                                                              
                                                        
                                <button class = 'submit' data-bs-toggle='collapse' data-bs-target='#collapseWidthExample' aria-expanded='false' aria-controls='collapseWidthExample'><i class='fas fa-pen'></i></button>
                                <button class = 'submit'><i class='fas fa-star'></i></button>
                            </div>
                        </div>
                    </div>

                    <?php
                        }
                    ?>                  
        </div> 
        <button class = "more">Xem thêm...</button>
    </div>

    <script>
    //upload file
    //     document.querySelector('.create').addEventListener('click', function () {
    //     document.querySelector('.upload').click()
    // })
    // document.querySelector('.upload').addEventListener('change', function () {
    //     document.querySelector('.create').innerHTML = document.querySelector('.upload').value
    // })
    //navigation
    document.querySelector('.frameNoti').addEventListener('click', function(event){
        event.stopPropagation()
    })
    document.querySelectorAll('.frameNoti')[1].addEventListener('click', function(event){
        event.stopPropagation()
    })


    //Background Header
    document.addEventListener('scroll', () => {
        if(window.scrollY > 0) {
            document.querySelector('.backgroundNav').classList.remove('noactiveNav')
            document.querySelector('.backgroundNav').classList.add('activeNav')
        }
        else {
            document.querySelector('.backgroundNav').classList.add('noactiveNav')
            document.querySelector('.backgroundNav').classList.remove('activeNav')
        }
    })


    //Content Mess
    var contentMess = false
    const itemNotis = document.querySelectorAll('.itemNoti')
    for (i of itemNotis){
        i.addEventListener('click', function(){
            if(!contentMess) {
                document.querySelector('.frameMess').style.display = 'flex'
                contentMess = true
            }
            else {
                document.querySelector('.frameMess').style.display = 'none'
                contentMess = false
            }
        })
    }
    document.querySelector('.backMess').addEventListener('click', () => {
        document.querySelector('.frameMess').style.display = 'none'
        contentMess = false
    })

    //Mess Mobile
    document.querySelector('.mess-mobile').addEventListener('click', function() {
        if(!mess) {
            document.querySelector('.mess').style.bottom = '100px'
            document.querySelector('.mess').style.display = 'flex'
            document.querySelector('.mess').style.right = '20px'
            mess = true
        }
        else {
            document.querySelector('.mess').style.display = 'none'
            mess = false
        }
    })
    document.querySelector('.frameMess').addEventListener('click', function(e) {
        e.stopPropagation();
    })

    //Active Notification Mobile
    document.querySelector('.noti-mobile').addEventListener('click', function() {
        if(!noti) {
            document.querySelector('.noti').style.display = 'flex'
            document.querySelector('.noti').style.right = '20px'
            document.querySelector('.noti').style.bottom = '100px'
            noti = true
        }
        else {
            document.querySelector('.noti').style.display = 'none'
            noti = false
        }
    })

    //Active Noti
    var noti = false
    document.querySelector('.actNoti').addEventListener('click', function() {
        if(!noti) {
            document.querySelector('.noti').style.right = '100px'
            document.querySelector('.noti').style.display = 'flex'
            noti = true
        }
        else {
            document.querySelector('.noti').style.display = 'none'
            noti = false
        }
    })


    //Active Message
    var mess = false
    document.querySelector('.actMess').addEventListener('click', function() {
        if(!mess) {
            document.querySelector('.mess').style.right = '100px'
            document.querySelector('.mess').style.display = 'flex'
            mess = true
        }
        else {
            document.querySelector('.mess').style.display = 'none'
            mess = false
        }
    })
    document.querySelector('.frameMess').addEventListener('click', function(e) {
        e.stopPropagation();
    })
   
    //Xóa môn học
    document.addEventListener('DOMContentLoaded', function() {
    var el = document.getElementsByClassName("formDelete"); 
    for(var i=0;i < el.length;i++) {
    el[i].addEventListener("submit", function(e) { 
            e.preventDefault();
            Swal.fire({ 
                title: 'Bạn có chắc chắn muốn xóa không?',
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


        //Sua mon hoc
       
</script>
</body>
</html>