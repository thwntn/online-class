import style from './accountactive.module.css'
import InfoUser from './infouser.js'
import {useEffect, useState} from 'react'
import Confirm from '../confirm.js'
import Convert from './convert.js'

const AccountActive = (property) => {
    //fetch data
    const [users, setUsers] = useState([])
    useEffect(() => {
        async function fetchData() {
            const users = await fetch('http://localhost/online-class/src/administrator/api/user.php')
            const usersJSON = await users.json()
            setUsers(usersJSON)
        }
        fetchData()
    }, [])
    const [close, setClose] = useState(style.active)
    const [view, setView] = useState('none')
    const [active, setActive] = useState('')
    const [convert, setConvert] = useState('none')
 
     
    const closed = () => {
        setTimeout(() => {
            setView('none')
        }, 200)
    }
    const finish = () => {
    }
    return (
        <div className = {style.frame + ' ' + style.active}>
            <div className = {style.accountBox}>
                <div className = {style.backgroundImage}></div>
                <div className = {style.titleMobile}><h5>Tài khoản hiện hành</h5></div>
                <div className = {style.frameMobile}>
                <h3 className = {style.title}>Tài khoản hiện hành</h3>
                    <div
                        className = {style.closemobile}
                        onTouchMove = {() => property.data(false)}
                    ></div>
                    <input className = {style.search} placeholder = 'Nhập tên cần tìm kiếm'></input>
                    <button onClick = {() => property.func()} className = {style.close}>Đóng</button>
                    <div className = {style.boxItems + ' row'}>
                        {users.map((user, index) => (
                            <div key = {index} className = {style.itemsElement + ' col-md-4'}>
                                <div className = {style.item}>
                                    <div className = {style.imgUser} style = {{backgroundImage: './abc.jpg'}}></div>
                                    <div className = {style.nameUser}>{user.user_fullname}</div>
                                    <div className = {style.actionUser}>
                                        <button className = {style.gotoUser}><i className="fad fa-sign-in"></i></button>
                                        <button
                                            className = {style.convertUser}
                                            onMouseOver={() => setConvert(index)}
                                            onMouseLeave={() => setConvert('')}
                                        >
                                            <i className="fad fa-repeat-1"></i>
                                            {convert === index && <Convert></Convert>}
                                        </button>
                                        <button
                                            onClick = {() => {setView(index)}}
                                            className = {style.viewUser}
                                        >
                                            <i className="fad fa-eye"></i>
                                            {view === index && <InfoUser func = {{close: closed,finish: finish}}></InfoUser>}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </div>
        </div>
    )
}

export default AccountActive