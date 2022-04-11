import { useEffect, useState } from 'react';
import style from './chatbox.module.css'

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
        <div className = {style.frame}>
            <div className = {style.navigation}>
                <button
                    className = {style.back}
                    onClick={(event) => {
                        event.stopPropagation()
                        object.setGoToMess()
                    }}
                >
                    <i className="fas fa-angle-left"></i>
                </button>
                <div className = {style.image}></div>
                <h5 className ={style.name}>{object.friend.user_fullname}</h5>
            </div>
            <div className = {style.content}>
                {messages.map(message => {
                    let type
                    switch (message.type) {
                        case 'send': {
                            type = 'chatbox_send__zJkFJ'
                            break
                        }
                        case 'received': {
                            type = 'chatbox_receive__ix311'
                            break;
                        }
                    }
                    return (
                        <div key = {message.mess_id} className = {style.mess}>
                            <p className = {type}>
                                {message.mess_content}
                                <div className={style.time}>
                                    {message.mess_time.slice(-8, -3)}
                                </div>
                            </p>
                        </div>
                    )
                })}
            </div>
            <div className = {style.navigationSend}>
                <input
                    className = {style.inputChat}
                    placeholder = "Nhập tin nhắn"
                    onClick = {e => {
                        e.stopPropagation()
                    }}
                    onChange = {e => {
                        setContentMessage(e.target.value)
                    }}
                ></input>
                <button
                    className = {style.buttonSend}
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