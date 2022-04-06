<?php
include 'connect.php';
    if (isset( $_GET['btnsearch'])) {
        $search = $_GET['search'];
        $sql = "SELECT * FROM subject WHERE (subject_code like '%$search%') ";
     
        $kq=$conn->query($sql);
        $num = mysqli_num_rows($kq);
        if ($num > 0 && $search != "") {
            echo '<table>';
            while($row=$kq->fetch_assoc()){
                echo '<tr>';
                    echo "<td>{$row['subject_name']}</td>";
                echo '</tr>';
            }
            echo '</table>';
        } 
        else {
            echo "Khong tim thay ket qua!";
        }
    }
?>