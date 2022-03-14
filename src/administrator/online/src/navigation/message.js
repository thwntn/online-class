import { useEffect, useRef, useState } from 'react'
import style from './message.module.css'
import ChatBox from './chatbox.js'

var chats = []

fetch("http://localhost/online-class/src/administrator/api/chat.php")
    .then(data => data.json())
    .then(data => chats = data)

const Mess = () => {
    console.log(chats)
    const itemMess = useRef()
    const [gotoMess, setGoToMess] = useState(false)
   
    return (
        <div  ref = {itemMess} className = {style.frame}>
            <h5 className = {style.title}><i className="fab fa-facebook-messenger"></i>Tin nhắn</h5>
            {chats.map((chat) => (
                <div
                    key = {style.id}
                    className = {style.item}
                    onClick = {(event) => {
                        event.stopPropagation()
                        setGoToMess(true)
                    }}
                >
                    <div className = {style.image}></div>
                    <div className = {style.content}>
                        <h4>{chat.friend_user}</h4>
                        <p>{chat.mess}</p>
                    </div>
                </div>
            ))}
            {gotoMess && <ChatBox func = {setGoToMess}></ChatBox>}
        </div>
    )
}
export default Mess