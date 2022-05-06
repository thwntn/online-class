import { useState, useEffect, useRef, useContext } from 'react'
import style from './header.module.css'
import { PageContext } from '../../context/MainContext'
import Noti from './notification'
import Message from './message'
import Confirm from '../confirm/confirm'
import Log from '../log/log'

const items = ['Trang chủ', 'Tài khoản', 'Thông báo', 'Tin nhắn', 'Nhật kí']

function Header ({setMain}) {
    const [scroll, setScroll] = useState(style.noActive)
    const [activeNoti, setActiveNoti] = useState(false)
    const [activeMessage, setActiveMess] = useState(false)
    const [notRead, setNotRead] = useState(null)
    
    const page = useContext(PageContext)
    console.log(page);

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
          setNotRead(responseJson[responseJson.length-1].notRead)
      })
    }
  

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

    return(
        <div className = {style.background + ` ${scroll}`}>
            <h2 className = {style.title}>Online Class</h2>
            <ul className = {style.listItems} style = {{display: 'flex', listStyle: 'none', margin: '0px'}}>
                <li
                    className = {style.item}
                    onClick = {() => {
                        page.setMain(page.HomePage)
                        setScroll (style.noActive)
                    }}
                    ><a href = '#home'><i className="fal fa-home"></i></a></li>
                <li
                    className = {style.item}
                    onClick = {() => {
                        setScroll (style.active)
                        page.setMain(<Confirm></Confirm>)
                    }}
                    onDoubleClick={() => {
                        page.pinItem('account')
                    }}
                ><a href = '#account'><i className="fal fa-user-alt"></i></a></li>
                <li
                    className = {style.item}
                    onClick = {() => {
                        page.setMain(page.Statistical)
                        setScroll (style.active)
                    }}
                    onDoubleClick={() => {
                        page.pinItem('manage')
                    }}
                ><a href = '#manage'><i className="fal fa-chart-bar"></i></a></li>
                <li
                    onClick = {() => {
                        setScroll (style.active)
                        page.setMain(<Log></Log>)
                    }}
                    onDoubleClick={() => {
                        page.pinItem('log')
                    }}
                    className = {style.item}
                ><a href = '#log'><i className="fal fa-clipboard"></i></a></li>
                <li
                    onClick={() => {
                        setActiveNoti(!activeNoti)
                        resetNotification()
                    }}
                    className = {style.item}
                >
                    <i className="fal fa-bell"></i> {notRead == 0 ? null : <h5 className={style.notRead}>{notRead}</h5>}
                    {activeNoti && <Noti setNotRead = {setNotRead}></Noti>}
                </li>
                <li onClick={() => setActiveMess(!activeMessage)} className = {style.item}>
                    <i className="fal fa-comment"></i>
                    {activeMessage && <Message></Message>}
                </li>
            </ul>
            <button className = {style.expandMenu}><i className="fas fa-bars"></i></button>
        </div>
    )
}

export default Header