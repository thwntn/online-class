<?php
    include('./connect.php');

    $time = new DateTimeImmutable(date('Y-m-d'), new DateTimeZone('Etc/GMT+7'));
    $today = $time->format('Y-m-d');

    $reviousLogin = $time->modify("-240 hours")->format('Y-m-d');
    $reviousSignUp = $time->modify("-96 hours")->format('Y-m-d');

    $queryLogin = "SELECT * FROM statictical WHERE time > '$reviousLogin' && type = 'login'";
    $querySignUp = "SELECT * FROM statictical WHERE time > '$reviousSignUp' && type = 'signup'";
    $queryInteractive = "SELECT * FROM statictical WHERE time > '$reviousSignUp' && type = 'interactive'";

    $result = $conn -> query($queryLogin);
    
    $object = [];

    $login = [];
    $signUp = [];
    $interactive = [];

    while($data = $result -> fetch_assoc()) {
        array_push($login, $data);
    }
    foreach(($conn -> query($querySignUp)) as $value) {
        array_push($signUp, $value);
    }
    foreach(($conn -> query($queryInteractive)) as $value) {
        array_push($interactive, $value);
    }

    $object['login'] = $login;
    $object['signUp'] = $signUp;
    $object['interactive'] = $interactive;

   print_r(json_encode($object));
?>