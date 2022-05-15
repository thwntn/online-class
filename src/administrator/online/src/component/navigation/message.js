import { useEffect, useRef, useState } from 'react'
import style from './message.module.css'
import ChatBox from './chatbox.js'

const Mess = () => {
    const itemMess = useRef()
    const [messages, setMessages] = useState([])
    const [gotoMess, setGoToMess] = useState(false)
    const [friend, setFriend] = useState({})

    console.log(messages);
    useEffect(() => {
        fetch("http://localhost/online-class/src/administrator/api/chat.php")
        .then(response => response.json())
        .then(responseJson => setMessages(responseJson))
    }, [])
    return (
        <div  ref = {itemMess} className = {style.frame}>
            <h5 className = {style.title}><i className="fab fa-facebook-messenger"></i>Tin nhắn</h5>
            {messages.map((message) => (
                <div
                    key = {message.chat_id}
                    className = {style.item}
                    onClick = {(event) => {
                        event.stopPropagation()
                        setGoToMess(true)
                        setFriend(message)
                    }}
                >
                    <div className = {style.image} style={{ backgroundImage: `url(http://localhost/online-class/src/database/${message.user_name}/image/${message.user_image})`}}></div>
                    <div className = {style.content}>
                        <h4>{message.user_fullname}</h4>
                        <p>{message.user_email}</p>
                    </div>
                </div>
            ))}
            {gotoMess && <ChatBox object = {{setGoToMess, friend}}></ChatBox>}
        </div>
    )
}
export default Mess