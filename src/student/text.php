<?php
    include('./connect.php');

    $user_name = $_POST['userName'];
    $user_friend = $_POST['userFriend'];

    
    //lấy chat id tin nhắn send
    $query = "SELECT chat_id FROM chat WHERE user_name = '$user_name' AND friend_user = '$user_friend'";

    foreach($conn -> query($query) as $value) {
        $idSend = $value['chat_id'];
    }
    
    //lấy chat id tin nhắn received
    $query = "SELECT chat_id FROM chat WHERE user_name = '$user_friend' AND friend_user = '$user_name'";
    
    foreach($conn -> query($query) as $value) {
        $idReceived = $value['chat_id'];
    }

    //lấy tin nhắn gứi
    $listMessSend = [];

    $query = "SELECT * FROM message WHERE chat_id = '$idSend' ORDER BY mess_time ASC";
    foreach($conn -> query($query) as $value) {
        array_push($listMessSend, $value);
    }

    //lấy tin nhắn nhận
    $listMessReceived = [];

    $query = "SELECT * FROM message WHERE chat_id = '$idReceived' ORDER BY mess_time ASC";
    foreach($conn -> query($query) as $value) {
        array_push($listMessReceived, $value);
    }

    $data = [$listMessReceived, $listMessSend];



    // xử lí data mesage
    $arrSend = $data[1];
    $arrReceived = $data[0];

    
    // print_r($arrSend);
    
    $result = [];
    
    $loop = count($arrSend) + count($arrReceived);
    
    for($i = 0; $i< $loop; $i++) {
        if(count($arrSend) > 0 && count($arrReceived) > 0) {
            if(strtotime($arrReceived[count($arrReceived)-1]['mess_time']) > strtotime($arrSend[count($arrSend)-1]['mess_time'])) {
                $temp = array_pop($arrReceived);
                $temp['type'] = 'received';
                array_push($result, $temp);
            }
            else {
                $temp = array_pop($arrSend);
                $temp['type'] = 'send';
                array_push($result, $temp);
            };
        }
        else if(count($arrReceived) > 0 && count($arrSend) <= 0) {
            $temp = array_pop($arrReceived);
            $temp['type'] = 'received';
            array_push($result, $temp);
        }
        else if(count($arrReceived) <= 0 && count($arrSend) > 0) {
            $temp = array_pop($arrSend);
            $temp['type'] = 'send';
            array_push($result, $temp);
        }
    }

    //final data
    // print_r($result);

    foreach( $result as $value ) {
        if($value['type'] == 'send') {
            echo "
                <div class = 'messMess'>
                    <p class = 'sendMess'>".$value['mess_content']."</p>
                </div>
            ";
        } else {
            echo "
                <div class = 'messMess'>
                    <p class = 'receiveMess'>".$value['mess_content']."</p>
                </div>
            ";
        }
    }

?>