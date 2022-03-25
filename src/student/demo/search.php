<?php 
include 'connect.php';
if (isset($_REQUEST['search'])){
    $search=addslashes($_GET['search']);
    $sql="SELECT * FROM subject where subject_id like '%$search%'";
    $kq=$conn->query($sql);
    $num_rows = mysqli_num_rows($kq);
    if (empty($search)) {
        echo "Dữ liệu không được để trống!";
    } else {
        if ($num_rows > 0 && $search != "") {
            while($row=$kq->fetch_assoc()){
                echo $row['subject_name'];
            }
        } else {
            echo "Không tìm thấy kết quả!";
        }
    } 
}
?>
