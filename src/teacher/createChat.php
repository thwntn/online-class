<?php
    include('./connect.php');
   
    $userName = $_POST['userOL'];
    $friendUser = $_POST['user'];

    $queryCheck = "SELECT chat_id FROM chat WHERE user_name = '$userName' AND friend_user = '$friendUser'";
    $result = $con -> query($queryCheck);

    $final = $result -> fetch_assoc();

    if($final == null) {
        $query = "INSERT INTO chat(user_name, friend_user) VALUE ('$userName', '$friendUser');";
        $query .= "INSERT INTO chat(user_name, friend_user) VALUE ('$friendUser', '$userName')";
    
         $con -> multi_query($query);
         echo "
         <form action='index.php' method='post'>
            <button type='submit'>Điều hướng sang trang khác</button>
            <input type='hidden' name='userOL' value=$userName>
         </form>
         ";
    } else {
        
        echo "Đã có cuộc trò chuyện";
        
    }
    
?>
 