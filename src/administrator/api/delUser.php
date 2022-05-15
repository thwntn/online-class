<?php
    include('./connect.php');

    $open = fopen('php://input', 'r');
    while($read = fread($open, 1024)) {
        $res = json_decode($read, true);
    }

    $userName = $res['userName'];

    $query = "DELETE FROM score WHERE user_name = '$userName';";
    $query .= "DELETE FROM registry WHERE user_name = '$userName';";
    $query .= "DELETE FROM document WHERE user_name = '$userName';";

    $queryGetSubjectID = "SELECT subject_id FROM subject WHERE user_name = '$userName';";
    $query .= "DELETE FROM comment WHERE user_name = 'toquyen';";
    foreach($conn -> query($queryGetSubjectID) as $value) {
        foreach($conn -> query("SELECT homework_id FROM homework WHERE subject_id = '$value[subject_id]'") as $item){
            $query .= "DELETE FROM comment WHERE homework_id = '$item[homework_id]';";
        }
        $query .= "DELETE FROM document WHERE subject_id = '$value[subject_id]';";
        $query .= "DELETE FROM calendar WHERE subject_id = '$value[subject_id]';";
        $query .= "DELETE FROM registry WHERE subject_id = '$value[subject_id]';";
        $query .= "DELETE FROM homework WHERE subject_id = '$value[subject_id]';";
    }

    $query .= "DELETE FROM subject WHERE user_name = '$userName';";
    $query .= "DELETE FROM notification WHERE user_name = '$userName';";
    $query .= "DELETE FROM message_group WHERE user_name = '$userName';";
    $query .= "DELETE FROM chat_group WHERE user_name = '$userName';";
    $query .= "DELETE FROM log WHERE user_name = '$userName';";

    $queryGetMessageID = "SELECT chat_id FROM chat WHERE user_name = '$userName' OR friend_user = '$userName'";
    foreach( $conn -> query($queryGetMessageID) as $value ) {
        $query .= "DELETE FROM message WHERE chat_id = '$value[chat_id]';";
    }

    $query .= "DELETE FROM chat WHERE user_name = '$userName' OR friend_user = '$userName';";
    $query .= "DELETE FROM authentication WHERE user_name = '$userName';";
    $query .= "DELETE FROM friend WHERE user_name = '$userName' OR friend_user = '$userName';";
    $query .= "DELETE FROM user WHERE user_name = '$userName';";

    echo $conn -> multi_query($query);

?>