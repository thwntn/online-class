<?php
$con = mysqli_connect('localhost', 'root','', 'online-class');

    $sql="select * FROM subject  ";
    $kq=$con->query($sql);
    while($row=$kq->fetch_assoc()){
   
    echo $row['subject_id'];
    echo $row['subject_name'];
    echo $row['subject_image'];
    }

?>
