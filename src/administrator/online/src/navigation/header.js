import { useState, useEffect, useRef } from 'react'
import style from './header.module.css'
import Noti from './notification.js'
import HomePage from '../homepage/homepage'
import Log from '../log/log'
import Confirm from '../confirm/confirm'
import Message from './message.js'
import AccountActive from '../confirm/infouser/accountactive'
import Statistical from '../statistical/statistical'

const items = ['Trang chủ', 'Tài khoản', 'Thông báo', 'Tin nhắn', 'Nhật kí']

function Header ({setMain}) {
    const [scroll, setScroll] = useState(style.noActive)
    const [activeNoti, setActiveNoti] = useState(false)
    const [activeMessage, setActiveMess] = useState(false)
    const [notRead, setNotRead] = useState(null)

    //đặt thông báo về trạng thái đã đọc hết
    const resetNotification = () => {
        const url = 'http://localhost/online-class/src/administrator/api/resetNotification.php'
        fetch(url)
    }

    const fetchNotification = () => {
      const url = 'http://localhost/online-class/src/administrator/api/fetchNotification.php'
      fetch(url)
      .then(response => response.json())
      .then(responseJson => {
          console.log(responseJson);
          setNotRead(responseJson[responseJson.length-1].notRead)
      })
    }
  
    useEffect(() => {
      fetchNotification()
    }, [])

    useEffect(() => {
      const id = setInterval(() => {
        fetchNotification()
      }, 5000);
      return () => {
        clearInterval(id)
      }
    }, [])

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
                <li
                    className = {style.item}
                    onClick = {() => setMain(<Statistical></Statistical>)}
                ><a href = '#manage'>Thống kê</a></li>
                <li
                    onClick = {() => setMain(<Log></Log>)}
                    className = {style.item}
                ><a href = '#log'>Nhật kí</a></li>
                <li
                    onClick={() => {
                        setActiveNoti(!activeNoti)
                        resetNotification()
                    }}
                    className = {style.item}
                >
                    Thông báo {notRead == 0 ? null : <h5 className={style.notRead}>{notRead}</h5>}
                    {activeNoti && <Noti setNotRead = {setNotRead}></Noti>}
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