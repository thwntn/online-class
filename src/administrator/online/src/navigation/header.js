import { useState, useEffect } from 'react'
import style from './header.module.css'
const items = ['Trang chủ', 'Tài khoản', 'Thông báo', 'Tin nhắn', 'Nhật kí']

function Header () {
    const [scroll, setScroll] = useState(style.noActive)
    useEffect(() => {
        document.addEventListener('scroll', () => {
            if(window.scrollY > 0) setScroll (style.active)
            else setScroll (style.noActive)
        })
    }, [])
    return(
        <div className = {style.background + ` ${scroll}`}>
            <h2 className = {style.title}>Online Class</h2>
            <ul style = {{display: 'flex', listStyle: 'none', margin: '0px'}}>
                {items.map((items) => <li key = {items} className = {style.item}>{items}</li>)}
            </ul>
        </div>
    )
}

export default Header