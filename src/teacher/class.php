<?php
include "header.php";
?>
<br>
<ul class="add">
    <li><a href="addclass.php">Thêm lớp học</a></li>
    <li><a href="">Xem vi phạm</a></li>
    <li>
    <form action="" method="get" class="box">
    <b>Tìm kiếm</b>
    <input class="search-class" type="text" name="search" placeholder="Nhập nội dung"> 
    </form>
    </li>
</ul>
<br> <br> 

    <div class="subject">
    <ul>
        <li style="font-size:30px;margin-top:5px;height:30px">CT112</li>
        <li> Tên môn học </li> 
    <br> <br> <hr>
        <li><a href=""><img src="img/4299946.png" ></a></li>
        <li><a href=""><img src="img/add-user.png" ></a></li> 
        <li><button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <img src="img/File-icon.png" ></button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel">Thêm nội dung</h1>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="margin-right: -320px;">Hủy</button>
                    <button type="button" class="btn btn-primary">Hoàn tất</button>
                </div>
                <div class="modal-body">
                        <form action="" method="post" >           
                            <table>
                            <tr> 
                                <td><input class="create-1"  type="text" name="id" placeholder="Mã tài liệu" ></td>
                                <td><input class="create-1"   type="date" name="date-finish" placeholder="Thời hạn"></td>
                             </tr>
                             <tr>    
                                <td colspan="2"><textarea class="create-1" name="content"></textarea></td>
                            </tr>
                            <tr>    
                                <td><input class="create-1"  type="file" value="Thêm tài liệu" name="doccument"></td>
                            </tr>
                        </table>
                    </form>  
                    
                </div>
                </div>
            </div>
            </div> 
        </li>
        <li><a href=""><img src="img/Pencil-icon.png" ></a></li> 
        <li><a href=""><img src="img/Messaging-Star-icon.png" ></a></li> 
    </ul>
    </div> 

   
    