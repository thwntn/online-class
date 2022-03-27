import { useEffect, useState } from 'react';
import style from './chatbox.module.css'

const ChatBox = ({data}) => {
    const [messages, setMessages] = useState([])
    const [contentMessage, setContentMessage] = useState()

    const sendMessage = () => {
        const _data = data
        const url = 'http://localhost/online-class/src/administrator/api/sendmess.php'
        fetch(url, {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            credentials: 'same-origin',
            headers: {
                'Content-Type': 'application/json'
            },
            redirect: 'follow',
            referrerPolicy: 'no-referrer',
            body: JSON.stringify({
                userName : data.friend.user_name,
                userFriend: data.friend.friend_user,
                chatId: data.friend.chat_id,
                content: contentMessage
            })
        })
        .then( response => response.json() )
        .then( responseJson => {
            console.log(responseJson);
        })
    }

    useEffect(() => {
        const url = 'http://localhost/online-class/src/administrator/api/message.php'
        fetch(url)
        .then((response) => response.json())
        .then((responseJson => setMessages(responseJson)))
    }, [])
    console.log(data);
    return (
        <div className = {style.frame}>
            <div className = {style.navigation}>
                <button
                    className = {style.back}
                    onClick={(event) => {
                        event.stopPropagation()
                        data.setGoToMess()
                    }}
                >
                    <i className="fas fa-angle-left"></i>
                </button>
                <div className = {style.image}></div>
                <h5 className ={style.name}>Nguyễn Trần Thiên Tân</h5>
            </div>
            <div className = {style.content}>
                {messages.map(message => {
                    let type
                    switch (message.mess_type) {
                        case '1': {
                            type = 'chatbox_send__zJkFJ'
                            break
                        }
                        case '2': {
                            type = 'chatbox_receive__ix311'
                            break;
                        }
                    }
                    return (
                        <div className = {style.mess}>
                            <p className = {type}>{message.mess_content}</p>
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
                        console.log(contentMessage);
                    }}
                ></input>
                <button
                    className = {style.buttonSend}
                    onClick = {(e) => {
                        sendMessage()
                        e.stopPropagation()
                    }} 
                ><i className ="fad fa-paper-plane"></i></button>
            </div>
        </div>
    )
}
export default ChatBox