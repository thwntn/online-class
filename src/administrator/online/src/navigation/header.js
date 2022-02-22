import { useState, useEffect, useRef } from 'react'
import style from './header.module.css'
import Noti from './notification.js'
import Message from './message.js'
const items = ['Trang chủ', 'Tài khoản', 'Thông báo', 'Tin nhắn', 'Nhật kí']

function Header () {
    const [scroll, setScroll] = useState(style.noActive)
    const [activeNoti, setActiveNoti] = useState(false)
    const [activeMessage, setActiveMess] = useState(false)

    useEffect(() => {
        document.addEventListener('scroll', () => {
            if(window.scrollY > 0) setScroll (style.active)
            else setScroll (style.noActive)
        })
    }, [])
    return(
        <div className = {style.background + ` ${scroll}`}>
            <h2 className = {style.title}>Online Class</h2>
            <ul className = {style.listItems} style = {{display: 'flex', listStyle: 'none', margin: '0px'}}>
                <li className = {style.item}><a href = '#home'>Trang chủ</a></li>
                <li className = {style.item}><a href = '#account'>Tài khoản</a></li>
                <li className = {style.item}><a href = '#manage'>Quản lí môn học</a></li>
                <li className = {style.item}><a href = '#log'>Nhật kí</a></li>
                <li onClick={() => setActiveNoti(!activeNoti)} className = {style.item}>
                    Thông báo
                    {activeNoti && <Noti></Noti>}
                    </li>
                <li onClick={() => setActiveMess(!activeMessage)} className = {style.item}>
                    Tin nhắn
                    {activeMessage && <Message></Message>}
                </li>
                <li className = {style.item}></li>

            </ul>
        </div>
    )
}

export default Header