import style from './navmobile.module.css'
import Noti from './notification.js'
import Mess from './message.js'
import { useState } from 'react'
import Function from '../functionmobile/function.js'


const NavMobile = () => {
    const [mess, setMess] = useState(false)
    const [noti, setNoti] = useState(false)
    const [func, setFunc] = useState(false)
    return (
        <div className = {style.frame}>
            <ul className = {style.listAction}>
                <li className = {style.item}><a href = '#home'><i className="fas fa-home"></i></a></li>
                <li
                    className = {style.item}
                    onClick = {() => setMess(!mess)}
                ><i className = "fas fa-comment"></i></li>
                <li
                    className = {style.item}
                    onClick = {() => setFunc(!func)}
                >
                    <div className = {style.function}><i className = "fas fa-plus"></i></div>
                </li>
                <li
                    className = {style.item}
                    onClick = {() => setNoti(!noti)}
                ><i className = "fas fa-bell"></i></li>
                <li className = {style.item}><i className ="fas fa-clipboard"></i></li>
            </ul>
            {noti && <Noti ></Noti>}
            {mess && <Mess></Mess>}
            {func && <Function data = {{setFunc, func}}></Function>}
        </div>
    )
}

export default NavMobile