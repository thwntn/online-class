import { useState } from 'react'
import AccountActive from '../confirm/infouser/accountactive'
import Manage from '../manage/manage'
import Log from '../log/log'
import style from './function.module.css'


const Function = (func) => {
    const [acc, setAcc] = useState(false)
    const [manage, setManage] = useState(false)
    const [log, setLog] = useState(false)

    return (
        <div className = {style.frame}>
            <div
                className = {style.close}
              onClick = {() => func.data.setFunc(!func.data.func)}
            ><i class="fas fa-times"></i></div>
            <ul className = {style.listFunc}>
                <li
                    className = {style.item}
                    onClick = {() => setAcc(!acc)}
                >
                    <a href = "#account">
                        <div
                            className = {style.user}
                            style = {{backgroundImage: 'url(./image/user.png)'}}
                        ></div>
                        <h5>Tài khoản</h5>
                    </a>
                </li>
                <li
                    className = {style.item}
                    onClick = {() => setManage(!manage)}
                    >
                        <a href = '#manage'>
                            <div
                                className = {style.user}
                                style = {{backgroundImage: 'url(./image/subject.png)'}}
                            ></div>
                            <h5>Môn học</h5>
                        </a>
                </li>
                <li
                    className = {style.item}
                    onClick = {() => setLog(!log)}
                >
                    <a href = "#log">
                        <div
                            className = {style.user}
                            style = {{backgroundImage: 'url(./image/log.png)'}}
                        ></div>
                        <h5>Nhật kí</h5>
                    </a>
                </li>
                <li className = {style.item}>
                    <a>
                        <div
                            className = {style.user}
                            style = {{backgroundImage: 'url(./image/warning.png)'}}
                        ></div>
                        <h5>Cảnh báo</h5>
                    </a>
                </li>
            </ul>
            {acc && <AccountActive data = {setAcc}></AccountActive>}
            {manage && <Manage data = {setManage}></Manage>}
            {log && <Log data = {setLog}></Log>}
        </div>
    )
}

export default Function