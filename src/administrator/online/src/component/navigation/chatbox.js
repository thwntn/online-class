import { useEffect, useState } from 'react';
import styles from './chatbox.module.css'

const ChatBox = ({ object }) => {

    console.log(object);

    const [messages, setMessages] = useState([])
    const [contentMessage, setContentMessage] = useState()
    const [refesh, setRefesh] = useState(null)

    //lấy tin nhắn từ cơ sở dữu liệu
    const fetchMessage = () => {
        const url = 'http://localhost/online-class/src/administrator/api/fetchMessage.php'
        fetch(url, {
            method: 'post',
            body: JSON.stringify({
                userName: 'admin',
                userFriend: object.friend.friend_user
            })
        })
        .then(response => response.json())
        .then(responseJson => {


            //xử lí dữ liệu tin nhắn phân loại nhắn, gửi
            const list = []
            
            function handing(object1, object2) {
                
                const loop = object1.length + object2.length
                let i = 0
                while(i < loop) {
                    let data = null
                    if (object1.length > 0 && object2.length > 0) {
                        if(Date.parse(object1[object1.length - 1].mess_time) > Date.parse(object2[object2.length - 1].mess_time)) {
                            data = object1.pop()
                            data.type = 'received'
                            list.push(data)
                        } else {
                            data = object2.pop()
                            data.type = 'send'
                            list.push(data)
                        }
                    } else if (object1.length == 0 && object2.length > 0) {
                        data = object2.pop()
                        data.type = 'send'
                        list.push(data)
                    } else if (object1.length > 0 && object2.length == 0) {
                        data = object1.pop()
                        data.type = 'received'
                        list.push(data)
                    }
                    i++
                }
                setMessages(list)
            }
            handing(responseJson[0], responseJson[1])
        })
    }
    useEffect(() => {
        fetchMessage()
    }, [refesh])

    useEffect(() => {
        const id = setInterval(() => {
            fetchMessage()
        }, 5000);

        return () => {
            clearInterval(id)
        }
    }, [])

    const sendMessage = () => {
        const _object = object

        let status = null
        
        const url = 'http://localhost/online-class/src/administrator/api/sendmess.php'
        fetch(url, {
            method: 'POST',
            body: JSON.stringify({
                userName : object.friend.user_name,
                userFriend: object.friend.friend_user,
                chatId: object.friend.chat_id,
                content: contentMessage
            })
        })
        .then( response => response.json() )
        .then( responseJson => {
            status = responseJson
            setRefesh(Math.random())
        })
    }

    return (
        <div className = {styles.frame}>
            <div className = {styles.navigation}>
                <button
                    className = {styles.back}
                    onClick={(event) => {
                        event.stopPropagation()
                        object.setGoToMess()
                    }}
                >
                    <i className="fas fa-angle-left"></i>
                </button>
                <div className = {styles.image} style={{ backgroundImage: `url(http://localhost/online-class/src/database/${object.friend.user_name}/image/${object.friend.user_image})`}}></div>
                <h5 className ={styles.name}>{object.friend.user_fullname}</h5>
            </div>
            <div className = {styles.content}>
                {messages.map(message => {
                    let type
                    switch (message.type) {
                        case 'send': {
                            type = styles.send
                            break
                        }
                        case 'received': {
                            type = styles.received
                            break;
                        }
                    }
                    return (
                        <div key = {message.mess_id} className = {styles.mess}>
                            <p className = {type}>
                                {message.mess_content}
                                <div className={styles.time}>
                                    {message.mess_time.slice(-8, -3)}
                                </div>
                            </p>
                        </div>
                    )
                })}
            </div>
            <div className = {styles.navigationSend}>
                <input
                    className = {styles.inputChat}
                    placeholder = "Nhập tin nhắn"
                    onClick = {e => {
                        e.stopPropagation()
                    }}
                    onChange = {e => {
                        setContentMessage(e.target.value)
                    }}
                ></input>
                <button
                    className = {styles.buttonSend}
                    onClick = {(e) => {
                        const inPut = document.querySelector('input')
                        if(inPut.value != '') {
                            sendMessage()
                        }
                        inPut.value = ''
                        e.stopPropagation()
                    }} 
                ><i className ="fad fa-paper-plane"></i></button>
            </div>
        </div>
    )
}
export default ChatBox