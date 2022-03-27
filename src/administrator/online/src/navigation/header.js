import { useState, useEffect, useRef } from 'react'
import style from './header.module.css'
import Noti from './notification.js'
import HomePage from '../homepage/homepage'
import Log from '../log/log'
import Confirm from '../confirm/confirm'
import Message from './message.js'
import AccountActive from '../confirm/infouser/accountactive'
const items = ['Trang chủ', 'Tài khoản', 'Thông báo', 'Tin nhắn', 'Nhật kí']

function Header ({setMain}) {
    const [scroll, setScroll] = useState(style.noActive)
    const [activeNoti, setActiveNoti] = useState(false)
    const [activeMessage, setActiveMess] = useState(false)

    let expandMenu = '48px';
    const setExpandMenu = () => {
        if(expandMenu === '362px'){
            expandMenu = '48px'
            return '48px'
        }
        else {
            expandMenu = '362px'
            return '362px'
        }
    }

    useEffect(() => {
        document.addEventListener('scroll', () => {
            if(window.scrollY > 0) setScroll (style.active)
            else setScroll (style.noActive)
        })
    }, [])
    useEffect(() => {
        document.querySelector('.header_expandMenu__V7fSv').addEventListener('click', () => {
            document.querySelector('.header_background__PngjP').style.height = setExpandMenu()
        })
    })

    return(
        <div className = {style.background + ` ${scroll}`}>
            <h2 className = {style.title}>Online Class</h2>
            <ul className = {style.listItems} style = {{display: 'flex', listStyle: 'none', margin: '0px'}}>
                <li
                    className = {style.item}
                    onClick = {() => setMain(<HomePage></HomePage>)}
                    ><a href = '#home'>Trang chủ</a></li>
                <li
                    className = {style.item}
                    onClick = {() => setMain(<Confirm></Confirm>)}
                ><a href = '#account'>Tài khoản</a></li>
                <li className = {style.item}><a href = '#manage'>Thống kê</a></li>
                <li className = {style.item}><a href = '#log'>Nhật kí</a></li>
                <li onClick={() => setActiveNoti(!activeNoti)} className = {style.item}>
                    Thông báo
                    {activeNoti && <Noti></Noti>}
                    </li>
                <li onClick={() => setActiveMess(!activeMessage)} className = {style.item}>
                    Tin nhắn
                    {activeMessage && <Message></Message>}
                </li>
            </ul>
            <button className = {style.expandMenu}><i className="fas fa-bars"></i></button>
        </div>
    )
}

export default Header