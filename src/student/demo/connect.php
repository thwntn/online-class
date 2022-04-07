<?php
  // $servername = 'localhost';
  // $username = 'root';
  // $password = '';
  // $database ='online-class';
  // $conn = mysqli_connect($servername,$username,$password,$database);
  $conn = new MySQLi('192.168.1.50', 'connect', 'thwntn', 'online-class') or die ('Error'. $conn->err);
?>