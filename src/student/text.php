        <?php
            include('./connect.php');
            $user_name = $_POST['userName'];

            $sql1 = "SELECT * FROM chat  where user_name='$user_name'";
            $result1 = $conn->query($sql1);
            while($row1 = $result1->fetch_assoc()) {
                $friend = $row1['friend_user'];
                if(isset($friend)){
                    $get_user = "SELECT * FROM user where user_name='$friend'"; 
                    $result0 = $conn->query($get_user);
                    $result0 = $result0->fetch_assoc();
                    //lấy chat id tin nhắn send
                    $query = "SELECT chat_id FROM chat WHERE user_name = '$user_name' AND friend_user = '$friend'";

                    foreach($conn -> query($query) as $value) {
                        $idSend = $value['chat_id'];
                    }
                    //lấy chat id tin nhắn received
                    $query = "SELECT chat_id FROM chat WHERE user_name = '$friend' AND friend_user = '$user_name'";
                    
                    foreach($conn -> query($query) as $value) {
                        $idReceived = $value['chat_id'];
                    }
                    
                            $listMessSend = [];

                            $query = "SELECT * FROM message WHERE chat_id = '$idSend' ORDER BY mess_time DESC";
                            foreach($conn -> query($query) as $value) {
                                echo "
                                <div class = 'messMess'>
                                    <p class = 'sendMess'>".$value['mess_content']."</p>
                                </div>
                                ";
                            }
                            $listMessReceived = [];

                            $query = "SELECT * FROM message WHERE chat_id = '$idReceived' ORDER BY mess_time DESC";
                            foreach($conn -> query($query) as $value) {
                                echo "
                                <div class = 'messMess'>
                                    <p class = 'receiveMess'>".$value['mess_content']."</p>
                                </div>
                                ";
                            }
                       
                }
            }
        ?>