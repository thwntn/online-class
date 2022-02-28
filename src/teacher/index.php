<!DOCTYPE html>
<html lang="en">
<html>
<head>
<meta charset="UFT-8">
<link rel="stylesheet" type="text/css" href="./style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
</head>
<body>
<div class="main">
    <header>
    <div class="container-fluid" >
        <div class="row">
            <div class="col-5">
                Online class
            </div>
            <div class="col-1" style="width:150px">
                <a href="./index.php">Trang chủ</a>
            </div>
            <div class="col-1" style="width:150px">
                <a href="./manage.php">Lớp học</a>
            </div>
            <div class="col-1" style="width:150px">
                <a href="#lich">Lịch dạy</a>
            </div>
            <div class="col-1" style="width:150px">
                <p id="menuclick">Thông báo</p>
                 <ul class="sub-menu" id="click">
                                <li class="tieude">Thông báo</li> 
                                <li>
                                    <table class="table1">
                                        <tr>
                                            <td id="hinh"><img src="./img/user-profile-icon-free-vector.jpg" class="mx-3 my-3" alt="..."></td>
                                            <td >
                                                CT123 <br><h6>Nội dung....</h6>
                                            </td>
                                        </tr>
                                    </table>
                                </li>
                                <li>
                                    <table class="table2">
                                        <tr>
                                            <td rowspan="2"><img src="./img/user-profile-icon-free-vector.jpg" class="mx-3 my-3" alt="..."></td>
                                            <td>
                                                CT123 <br><h6>Nội dung....</h6>
                                            </td>
                                        </tr>
                                    </table>
                                </li>
                                <li>
                                    <li>
                                        <table class="table1">
                                            <tr>
                                                <td id="hinh"><img src="./img/user-profile-icon-free-vector.jpg" class="mx-3 my-3" alt="..."></td>
                                                <td>
                                                    CT123 <br><h6>Nội dung....</h6>
                                                </td>
                                            </tr>
                                        </table>
                                    </li>
                                </li>
                                <li>
                                    <table class="table2">
                                        <tr>
                                            <td rowspan="2"><img src="./img/user-profile-icon-free-vector.jpg" class="mx-3 my-3" alt="..."></td>
                                            <td>
                                                CT123 <br><h6>Nội dung....</h6>
                                            </td>
                                        </tr>
                                    </table>
                                </li>
                            </ul> 
            </div>

            <div class="col-1" style="width:150px">
                <a href="">Tin nhắn</a>
            </div>
        </div>  
    </div>
    </header>
    <div class="content">
        <h1><b>Trang giảng viên</h1>
        <p>Chào mừng đến trang giảng viên</b></p>
        <form action="" method="get" class="text">
            <input class="search" type="text" name="search" placeholder="Nhập nội dung"> <br>
            <button type="button" class="submit">Search...</button>
        </form>
    </div>
   
</div>
<div id="lich">
        <div id="ten-lich">Lịch dạy</div>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <table>
                        <tr>
                            <th><i class="fa-solid fa-angle-left"></i></th>
                            <th colspan="2">Tháng 1</th>
                            <th><i class="fa-solid fa-angle-right"></i></th>
                            <th colspan="5"></th>
                            <th colspan="2">Năm:2022</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                            <td>9</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>11</td>
                            <td>12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                        </tr>
                        <tr>
                            <td>19</td>
                            <td>20</td>
                            <td>21</td>
                            <td>22</td>
                            <td>23</td>
                            <td>24</td>
                            <td>25</td>
                            <td>26</td>
                            <td>27</td>
                        </tr>
                        <tr>
                            <td>28</td>
                            <td class="date-1">29</td>
                            <td class="date-2">30</td>
                            <td class="date-3">31</td>
                            <td colspan="7"></td>
                        </tr>
                    </table>
                </div>
                <div class="col-1">

                </div>
                <div class="col-5">
                    <table>
                        <tr>
                            <th>Buổi</th>
                            <th>Ngày</th>
                            <th>Mã môn</th>
                            <th>Tên môn</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <br><br>
    </div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){   
    $(window).scroll(function() { 
        if($(this).scrollTop()){
            $('header').addClass('sticky');
        }else{
            $('header').removeClass('sticky');
        }
    });
});

//Thông báo
var status=0;
        document.getElementById("menuclick").onclick = function() {myFunction()};
        function myFunction() {
            if(status==0){
                document.getElementById("click").style.display="inline-block";
                status=1;
            }
            else{
                status=0;
                document.getElementById("click").style.display="none";
            }
        }

</script>
</body>
</html>