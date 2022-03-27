import { useEffect, useRef, useState } from 'react'
import style from './message.module.css'
import ChatBox from './chatbox.js'

const Mess = () => {
    const itemMess = useRef()
    const [messages, setMessages] = useState([])
    const [gotoMess, setGoToMess] = useState(false)
    const [friend, setFriend] = useState({})
    
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
                        console.log(friend);
                    }}
                >
                    <div className = {style.image}></div>
                    <div className = {style.content}>
                        <h4>{message.friend_user}</h4>
                        <p>{message.mess}</p>
                    </div>
                </div>
            ))}
            {gotoMess && <ChatBox data = {{setGoToMess, friend}}></ChatBox>}
        </div>
    )
}
export default Mess