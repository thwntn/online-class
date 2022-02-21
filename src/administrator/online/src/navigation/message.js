import { useEffect, useRef, useState } from 'react'
import style from './message.module.css'
import ChatBox from './chatbox.js'

const data = [
    {
        id: 1,
        name: 'Nguyễn Trần Thiên Tân',
        mess: 'Arron iu thwntn00'
    },
    {
        id: 2,
        name: 'Viết Tài',
        mess: 'Arron iu thwntn00'
    },
    {
        id: 3,
        name: 'Nhật Minh',
        mess: 'Arron iu thwntn00'
    },
    {
        id: 4,
        name: 'Tuấn Hưng',
        mess: 'Arron iu thwntn00'
    }
]

const Mess = () => {
    const itemMess = useRef()
    const [gotoMess, setGoToMess] = useState(false)
   
    return (
        <div  ref = {itemMess} className = {style.frame}>
            <h5 className = {style.title}><i className="fab fa-facebook-messenger"></i> Tin nhắn</h5>
            {data.map((item) => (
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
                        <h4>{item.name}</h4>
                        <p>{item.mess}</p>
                    </div>
                </div>
            ))}
            {gotoMess && <ChatBox func = {setGoToMess}></ChatBox>}
        </div>
    )
}
export default Mess