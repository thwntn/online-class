<?php
include "header.php";
?>
<hr>

<form action="" method="post" class="addclass">
	<table style="float:left">
        <tr>
            <td><h1>Tạo môn học</h1> <br> </td>
        </tr>
		<tr> 
			<td><input class="create" type="text" name="id" placeholder="Mã môn học"></th>
        </tr>
        <tr>
			<td><input class="create" type="text" name="name"placeholder="Tên môn học"></th>
		</tr>
        <tr>
            <td>
            <select class="create">
            <option >Học kỳ 1</option>
            <option >Học kỳ 2</option>
            <option >Học kỳ 3</option>
            </select>
            </td>
        </tr>
        <tr>
			<td><input class="create" type="text" name="img" placeholder="Hình ảnh"></td>
		</tr>
		<tr>
			<td><input class="create" type="text" name="year" placeholder="Nhập năm học"></td>
		</tr>
        <tr>
			<td><input class="create" type="text" name="credit" placeholder="Số tín chỉ"></td>
        </tr>
	</table>


    <table style="float:right">
        <tr>
            <td><h1>Lịch giảng dạy</h1> <br> </td>
        </tr>
        <tr>
        <td><h3>Thời gian bắt đầu học kỳ </h3></td>
        </tr>
		<tr> 
			<td><input class="create" type="date" name="datestart"></td>
        </tr>
        <tr>
        <td><h3>Thời gian môn học </h3></td>
        </tr>
        <tr>    
            <td><input class="create" type="date" name="datestart"></td>
		</tr>
        <tr>
        <td><h3>Từ </h3></td>
        <td><h3>Đến </h3></td>
        </tr>
		<tr>
            <td><input class="create" type="date" name="datestart"></td>
			<td><input class="create" type="date" name="datestart"></td>
        </tr>
	</table>
</form>