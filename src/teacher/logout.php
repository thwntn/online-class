<?php
    session_start();
    unset($_SESSION['user_name']);
    header("Location:http://localhost/online-class/src/administrator/online/login/login.html");
    ?>